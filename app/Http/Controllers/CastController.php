<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Movie;
use App\Person;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cast = Person::with('castMovies')->paginate(16);
        return view('cast.cast-index', compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::pluck('title', 'id');
        $persons = Person::pluck('name', 'id');
        return view('cast.cast-create', compact('movies', 'persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'billing_position' => 'required | integer',
            'character_name' => 'required | max : 255',
            'person_id' => 'required | integer',
            'movie_id' => 'required | integer'
        ]);

        $data = $request->all();

        $cast = Cast::updateOrCreate(
            [
                'movie_id' => $data['movie_id'],
                'person_id' => $data['person_id']

            ],
            [
                'billing_position' => $data['billing_position'],
                'character_name' => $data['character_name']
            ]
        );

        if($cast){
            return redirect()->back()->withSuccess('Cast added Successfully');
        }
        else{
            return redirect()->back()->withErrors('Error Adding Cast, Try Again.');
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
        $cast = Cast::find($id);
        $movies = Movie::pluck('title', 'id');
        $persons = Person::pluck('name', 'id');

        return view('cast.cast-edit', compact('cast', 'persons', 'movies'));

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
        $this->validate($request, [
            'billing_position' => 'required | integer',
            'character_name' => 'required | max : 255',
            'person_id' => 'required | integer',
            'movie_id' => 'required | integer'
        ]);

        $data = $request->all();

        $cast = Cast::where('id', $id)->update([
            'movie_id' => $data['movie_id'],
            'character_name' => $data['character_name'],
            'billing_position' => $data['billing_position'],
            'person_id' => $data['person_id']
        ]);

        if($cast){
            return redirect()->back()->withSuccess('Cast Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors('Error Updating Cast, Try Again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cast::destroy($id);

        return redirect()->back()->withSuccess('Cast Member Deleted Successfully');
    }
}
