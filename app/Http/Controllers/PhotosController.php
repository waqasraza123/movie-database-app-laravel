<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MoviePhoto;
use App\Photo;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photos.photos-index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::pluck('title', 'id')->toArray();
        $actors = Person::pluck('name', 'id')->toArray();
        $keywords = DB::table('tagging_tags')->pluck('name', 'name');
        return view('photos.add-photos', compact('movies', 'actors', 'keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(isset($data['photo'])){
            $f = $data['photo'];

            $extention = $f->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $f->getClientOriginalName());
            //Move Uploaded File
            $destinationPath = 'uploads/' . '/photos';
            $moved = $f->move($destinationPath, $fileName);

            if($moved){
                $photo = Photo::create([
                    'photo' => asset($destinationPath) . '/' . $fileName
                ]);
            }
            if($photo){
                if(isset($data['tags']))
                    $photo->tag($data['tags']);
                DB::table('movie_photos')->insert([
                    'movie_id' => $data['movie_id'],
                    'photo_id' => $photo->id
                ]);
                $photo->people()->sync($data['actors']);
                return redirect()->back()->withSuccess('Photo created Successfully');
            }
        }

        return redirect()->back()->withErrors('Unable to save Photo.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = Photo::find($id);
        $movies = Movie::pluck('title', 'id')->toArray();
        $movieSelected = DB::table('movie_photos')->where('photo_id', $id)
            ->join('movies', 'movies.id', '=', 'movie_photos.movie_id')->pluck('movies.id')->toArray();
        $actors = Person::pluck('name', 'id')->toArray();
        $actorsSelected = $p->people()->pluck('people.id')->toArray();
        $keywords = DB::table('tagging_tags')->pluck('name', 'name');
        $keywordsSelect = DB::table('tagging_tagged')->where([
            'taggable_type' => 'App\Photo',
            'taggable_id' => $id
        ])
            ->pluck('tag_name', 'tag_name');
        return view('photos.photos-single', compact('p', 'actors', 'movies', 'keywords', 'movieSelected'
        , 'keywordsSelect', 'actorsSelected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $photo = Photo::find($id);
        if($photo){
            if(isset($data['tags']))
                $photo->retag($data['tags']);
            MoviePhoto::updateOrCreate(
                [
                    'photo_id' => $photo->id
                ],
                [
                    'movie_id' => $data['movie_id'],
                ]
            );
            $photo->people()->sync($data['actors']);
            return redirect()->back()->withSuccess('Photo Updated Successfully');
        }

        return redirect()->back()->withErrors('Unable to Update Photo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
