<?php 

namespace App\Http\Controllers;

use App\Cast;
use App\Movie;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    protected $photoPath, $photoFileName;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param $personType
   * @return Response
   */
  public function create($personType)
  {
      $movies = Movie::pluck('title', 'id');
      return view('persons.create', compact('personType', 'movies'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $person)
  {
      if($person == 'cast'){
          $this->saveCast($request);
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
  public function edit($id, $person)
  {
      if($person == 'cast'){
          $this->editCast($id);
      }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

    /**
     * @param Request $request
     */
    public function saveCast(Request $request){
        $this->validate($request, [
           'name' => 'required | max:255',
            /*'photo' => 'required | mimes:png,jpg,jpeg,svg',*/
        ]);

        $data = $request->all();

        $person = Person::create([
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'birth_date' => $data['birth_date'],
            'birth_place' => $data['birth_place'],
            'official_site' => $data['official_site'],
            'biography' => $data['biography'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'instagram' => $data['instagram'],
            'gender' => $data['gender'],
            'photo_path' => asset($this->photoPath) . '/' . $this->photoFileName,
        ]);

        if($person){
            $cast = Cast::create([
                'person_id' => $person->id,
                'movie_id' => $data['movie_id'],
                'character_name' => $data['character_name'],
                'billing_position' => $data['billing_position']
            ]);

            if($cast){
                $movieTitle = Movie::where('id', $data['movie_id'])->first()->title;
                $this->saveImage($data, $movieTitle);
                return redirect()->back()->withSuccess('Cast Member Added Successfully');
            }
            else{
                return redirect()->back()->withSuccess('Error While Adding Cast Member. Try Again!');
            }
            
        }else{
            return redirect()->back()->withSuccess('Error While Adding Cast Member. Try Again!');
        }
    }

    /**
     * save the photo in db
     *
     * @param $data
     */
    public function saveImage($data, $movieTitle)
    {
        if (isset($data['photo'])) {
            $file = $data['photo'];

            $extention = $file->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
            $this->photoFileName = $fileName;
            //Move Uploaded File
            $destinationPath = 'uploads/movies/casts/' . preg_replace("/\\s/", "_", $movieTitle) . '/' . $data['name'];
            $this->photoPath = $destinationPath;
            $file->move($destinationPath, $fileName);
        }
    }
}