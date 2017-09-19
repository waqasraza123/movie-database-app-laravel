<?php 

namespace App\Http\Controllers;

use App\Movie;
use App\Person;
use App\Video;
use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $videos = Video::all();
      return view('videos.index-videos', compact('videos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $movies = Movie::pluck('title', 'id')->toArray();
      $actors = Person::pluck('name', 'id')->toArray();
      return view('videos.add-videos', compact('movies', 'actors'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $data = $request->all();
      $destinationPath = 'uploads/videos';
      $fileName = null;
      if(isset($data['thumb'])){
          $file = $data['thumb'];

          //Display File Name
          $extention = $file->getClientOriginalExtension();
          $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
          //Move Uploaded File
          $file->move($destinationPath, $fileName);
      }

      $video = Video::create([
          'title' => $data['title'],
          'video_url' => $data['video_url'],
          'video_embed' => $data['video_embed'],
          'quality' => $data['quality'],
          'type' => $data['type'],
          'movie_id' => $data['movie_id'],
          'text' => $data['text'],
          'thumb' => $destinationPath . '/' . $fileName
      ]);

      if($video){
          if(!empty($data['actors']) && count($data['actors']) > 0 && $data['actors'] != "null"){
              $video->people()->sync($data['actors']);
          }
          return redirect()->back()->withSuccess('Video Uploaded Successfully');
      }
      else{
          return redirect()->back()->withErrors('Video Could not Upload.');
      }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $video = Video::find($id);
      $movies = Movie::pluck('title', 'id')->toArray();
      $actors = Person::pluck('name', 'id')->toArray();
      $actorsSelected = $video->people()->pluck('people.id')->toArray();

      return view('videos.edit-video', compact('video', 'movies', 'actors', 'actorsSelected'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $data = $request->all();
      $destinationPath = 'uploads/videos';
      $fileName = null;
      if(isset($data['thumb'])){
          $file = $data['thumb'];

          //Display File Name
          $extention = $file->getClientOriginalExtension();
          $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
          //Move Uploaded File
          $file->move($destinationPath, $fileName);
      }
      $thumb = Video::where('id', $id)->first()->thumb;
      $video = Video::where('id', $id)->update([
          'title' => $data['title'],
          'video_url' => $data['video_url'],
          'video_embed' => $data['video_embed'],
          'quality' => $data['quality'],
          'type' => $data['type'],
          'movie_id' => $data['movie_id'],
          'text' => $data['text'],
          'thumb' => isset($fileName) ? $destinationPath . '/' . $fileName : $thumb
      ]);
      $video = Video::find($id);
      if($video){
          if(!empty($data['actors']) && count($data['actors']) > 0 && $data['actors'] != "null"){
              $video->people()->sync($data['actors']);
          }
          return redirect()->back()->withSuccess('Video Updated Successfully');
      }
      else{
          return redirect()->back()->withErrors('Video Could not be Updated.');
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $video = Video::find($id);
      $video->people()->sync([]);
      $video->delete();

      return redirect()->back()->withSuccess('Video has been Deleted!');
  }
  
}