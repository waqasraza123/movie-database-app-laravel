<?php

namespace App\Http\Controllers;

use App\Crew;
use App\Job;
use Illuminate\Http\Request;
use App\Movie;
use App\Person;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crew = Person::with('crewMovies')->paginate(16);
        return view('crew.crew-index', compact('crew'));
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
        $jobs = Job::pluck('name', 'id');
        return view('crew.crew-create', compact('movies', 'persons', 'jobs'));
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
            'person_id' => 'required | integer',
            'movie_id' => 'required | integer',
            'job_id' => 'required'
        ]);

        $data = $request->all();

        $crew = Crew::create([
            'movie_id' => $data['movie_id'],
            'person_id' => $data['person_id'],
        ]);

        if($crew){
            $crew->jobs()->sync($data['job_id']);
            return redirect()->back()->withSuccess('Crew added Successfully');
        }
        else{
            return redirect()->back()->withErrors('Error Adding Crew, Try Again.');
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
        $crew = Crew::find($id);
        $movies = Movie::pluck('title', 'id');
        $persons = Person::pluck('name', 'id');
        $jobs = Job::pluck('name', 'id');
        if($crew){
            return view('crew.crew-edit', compact('crew', 'persons', 'movies', 'jobs'));
        }
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
            'person_id' => 'required | integer',
            'movie_id' => 'required | integer',
            'job_id' => 'required'
        ]);

        $data = $request->all();

        $crew = Crew::where('id', $id)->update([
            'movie_id' => $data['movie_id'],
            'person_id' => $data['person_id']
        ]);

        if($crew){
            Crew::find($id)->jobs()->sync($data['job_id']);
            return redirect()->back()->withSuccess('Crew Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors('Error Updating Crew, Try Again.');
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
        $crew = Crew::find($id);
        $crew->jobs()->sync([]);
        $crew->delete($id);

        return redirect()->back()->withSuccess('Crew Member Deleted Successfully');
    }
}
