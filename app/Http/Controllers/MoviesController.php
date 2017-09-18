<?php

namespace App\Http\Controllers;

use App\AgeRating;
use App\Genre;
use App\Http\Requests\CreateMovieFormRequest;
use App\Http\Requests\UpdateMovieFormRequest;
use App\Language;
use App\Movie;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;

class MoviesController extends Controller
{

    protected $posterPath;
    protected $backgroundPath;
    protected $posterFileName;
    protected $backgroundFileName;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::pluck('language', 'id');
        $genres = Genre::pluck('genre', 'id');
        $ageRatings = AgeRating::pluck('age_rating', 'id');
        $keywords = DB::table('tagging_tags')->pluck('name', 'name');
        return view('movies.create', compact('languages', 'genres', 'ageRatings', 'keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateMovieFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieFormRequest $request)
    {
        $data = $request->all();
        $this->saveImage($data);
        $movie = Movie::create([
            'title' => $data['title'],
            'aka_title' => $data['aka_title'],
            'plot' => $data['plot'],
            'synopsis' => $data['synopsis'],
            'release_date' => $data['release_date'],
            'runtime' => $data['runtime'],
            'age_rating' => isset($data['age_rating']) ? $data['age_rating'] : null,
            'views' => $data['views'],
            'homepage' => $data['homepage'],
            'featured' => $data['featured'] == 'featured' ? 1 : 0,
            'stream_url' => $data['stream_url'],
            'buy_url' => $data['buy_url'],
            'poster_path' => asset($this->posterPath) . '/' . $this->posterFileName,
            'background_path' => asset($this->backgroundPath) . '/' . $this->backgroundFileName,
        ]);

        if($movie){
            $movie->languages()->sync($data['language']);
            if(isset($data['genre']))
                $movie->genres()->sync($data['genre']);
            if(isset($data['keywords']))
                $movie->tag($data['keywords']);
        }

        return redirect()->back()->withSuccess('Movie created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $languages = Language::pluck('language', 'id');
        $genres = Genre::pluck('genre', 'id');
        $ageRatings = AgeRating::pluck('age_rating', 'id');
        $keywords = DB::table('tagging_tags')->pluck('name', 'name');
        $langSelect = $movie->languages()->pluck('languages.id', 'language')->toArray();
        $genreSelect = $movie->genres()->pluck('genres.id', 'genre')->toArray();
        $persons = Person::pluck('name', 'id');
        $jobs = Job::pluck('name', 'id');
        $movies = Movie::pluck('title', 'id');
        $cast = $movie->cast;
        $crew = $movie->crew;
        $videos = $movie->videos;
        $keywordsSelect = DB::table('tagging_tagged')->where([
            'taggable_type' => 'App\Movie',
            'taggable_id' => $id
            ])
            ->pluck('tag_name', 'tag_name');
        $ageRatingsSelect = AgeRating::find($movie->age_rating);
        if($ageRatingsSelect){
            $ageRatingsSelect = $ageRatingsSelect->id;
        }
        return view('movies.edit', compact('movie', 'languages', 'langSelect',
            'genres', 'genreSelect', 'ageRatings', 'ageRatingsSelect', 'keywords', 'keywordsSelect',
            'persons', 'movies', 'jobs', 'photos', 'videos', 'cast', 'crew'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieFormRequest $request, $id)
    {
        $data = $request->all();
        $m = Movie::find($id);
        $posterImageDB = $m->poster_path;
        $backgroundImageDB = $m->background_path;
        $this->saveImage($data);
        Movie::where('id', $id)->update([
            'title' => $data['title'],
            'aka_title' => $data['aka_title'],
            'plot' => $data['plot'],
            'synopsis' => $data['synopsis'],
            'release_date' => $data['release_date'],
            'runtime' => $data['runtime'],
            'age_rating' => $data['age_rating'],
            'views' => $data['views'],
            'homepage' => $data['homepage'],
            'featured' => $data['featured'] == 'featured' ? 1 : 0,
            'stream_url' => $data['stream_url'],
            'buy_url' => $data['buy_url'],
            'poster_path' => $this->posterFileName != null ? asset($this->posterPath) . '/' . $this->posterFileName : $posterImageDB,
            'background_path' => $this->backgroundFileName != null ? asset($this->backgroundPath) . '/' . $this->backgroundFileName : $backgroundImageDB,
        ]);
        $movie = Movie::find($id);
        if($movie){
            if(isset($data['language']))
                $movie->languages()->sync($data['language']);
            if(isset($data['genre']))
                $movie->genres()->sync($data['genre']);
            if(isset($data['keywords']))
                $movie->retag($data['keywords']);
            else
                $movie->untag();
        }

        return redirect()->back()->with([
            'success' => 'Movie Updated Successfully',
            'swal' => true,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->languages()->sync([]);
        $movie->genres()->sync([]);
        $movie->untag();
        $movie->delete();

        return redirect()->back()->withSuccess('Movie has been deleted');
    }


    /**
     * save the images
     *
     * @param $data
     * @param Request $request
     */
    public function saveImage($data)
    {
        if(isset($data['poster'])){
            $file = $data['poster'];

            $extention = $file->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
            $this->posterFileName = $fileName;
            //Move Uploaded File
            $destinationPath = 'uploads/movies/' . preg_replace("/\\s/", "_", $data['title']);
            $this->posterPath = $destinationPath;
            $file->move($destinationPath, $fileName);
        }
        if(isset($data['background'])){
            $file = $data['background'];

            //Display File Name
            $extention = $file->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
            $this->backgroundFileName = $fileName;
            //Move Uploaded File
            $destinationPath = 'uploads/movies/' . preg_replace("/\\s/", "_", $data['title']);
            $this->backgroundPath = $destinationPath;
            $file->move($destinationPath, $fileName);
        }
    }
}
