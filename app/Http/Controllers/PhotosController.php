<?php

namespace App\Http\Controllers;

use App\MoviePhotos;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(isset($data['file'])){
            $file = $data['file'];
            foreach ($file as $f){
                $extention = $f->getClientOriginalExtension();
                $fileName = preg_replace("/\\s/", "_", $f->getClientOriginalName());
                //Move Uploaded File
                $destinationPath = 'uploads/movies/' . preg_replace("/\\s/", "_", $data['movie-id']) . '/photos';
                $moved = $f->move($destinationPath, $fileName);

                if($moved){
                    MoviePhotos::create([
                        'movie_id' => $data['movie-id'],
                        'photo_path' => asset($destinationPath) . '/' . $fileName
                    ]);
                }

            }
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
        //
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
