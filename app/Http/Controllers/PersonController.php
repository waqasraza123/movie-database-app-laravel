<?php 

namespace App\Http\Controllers;

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
      $persons = Person::paginate(16);
      return view('persons.persons-index', compact('persons'));
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create()
  {
      $movies = Movie::pluck('title', 'id');
      return view('persons.create', compact('personType', 'movies'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
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
          $this->saveImage($data);
          return redirect()->back()->withSuccess('Person added Successfully.');
      }else{
          return redirect()->back()->withErrors('Error While Adding Person. Try Again!');
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
      $person = Person::find($id);

      return view('persons.person-edit', compact('person'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $this->validate($request, [
          'name' => 'required | max:255',
          /*'photo' => 'required | mimes:png,jpg,jpeg,svg',*/
      ]);

      $data = $request->all();
      $person = Person::find($id);
      $this->saveImage($data);
      $person = Person::where('id', $id)->update([
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
          'photo_path' => isset($person->photo_path) ? asset($this->photoPath) . '/' . $this->photoFileName : $person->photo_path,
      ]);

      if($person){
          return redirect()->back()->withSuccess('Person updated Successfully.');
      }else{
          return redirect()->back()->withErrors('Error While Adding Cast Member. Try Again!');
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
      Person::destroy($id);

      return redirect()->back()->withSuccess('Person deleted Successfully');
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
            $this->saveImage($data);
            /*$cast = Cast::create([
                'person_id' => $person->id,
                'movie_id' => $data['movie_id'],
                'character_name' => $data['character_name'],
                'billing_position' => $data['billing_position']
            ]);*/
            
        }else{
            return redirect()->back()->withSuccess('Error While Adding Cast Member. Try Again!');
        }
    }

    /**
     * save the photo in db
     *
     * @param $data
     */
    public function saveImage($data)
    {
        if (isset($data['photo'])) {
            $file = $data['photo'];

            $extention = $file->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $file->getClientOriginalName());
            $this->photoFileName = $fileName;
            //Move Uploaded File
            $destinationPath = 'uploads/persons/' . preg_replace("/\\s/", "_", $data['name']);
            $this->photoPath = $destinationPath;
            $file->move($destinationPath, $fileName);
        }
    }
}