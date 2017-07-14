<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieFormRequest;
use App\Http\Requests\UpdateMovieFormRequest;
use App\Language;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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
        return view('movies.create', compact('languages'));
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
            'age_rating' => $data['age_rating'],
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
        }

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
        $langSelect = $movie->languages()->pluck('languages.id', 'language')->toArray();
        return view('movies.edit', compact('movie', 'languages', 'langSelect'));
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
            'poster_path' => asset($this->posterPath) . '/' . $this->posterFileName,
            'background_path' => asset($this->backgroundPath) . '/' . $this->backgroundFileName,
        ]);
        $movie = Movie::find($id);
        if($movie){
            $movie->languages()->sync($data['language']);
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
