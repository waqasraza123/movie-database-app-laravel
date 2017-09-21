<?php 

namespace App\Http\Controllers;

use App\Movie;
use App\Person;
use App\Cast;
use App\Crew;
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
          'birthname' => $data['nickname'],
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
	    $castMovies = $person->castMovies;
      $crewMovies = $person->crewMovies;
      //\Log::info('\ncastMovies: '.$castMovies);
      //\Log::info('\ncrewMovies: '.$crewMovies);
      $filmography = \DB::table('people')
      	->join('casts_movies','people.id','=','casts_movies.person_id')
      	->join('movies','casts_movies.movie_id','=','movies.id')
      	->select('movies.title','casts_movies.known_for','movies.release_date','casts_movies.person_id','casts_movies.movie_id')
      	->get();
      //$filmography = ['title'=>'flan','known_for'=>'no','year'=>'2017'];
      	//$jsonFilmography = json_encode($filmography);
      //\Log::info('\ninFography'.$filmography);
      return view('persons.person-edit', compact('person','filmography'));
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
          'birthname' => $data['nickname'],
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
      //$person1 = Person::where('id', $id)->first();
      //$castMovies = $person->castMovies;
      //$crewMovies = $person->crewMovies;
      //\Log::info('known_for: '.print_r($data['known_for'],true));
      //\Log::info('movie_id: '.print_r($request->get('movie_id'),true));
      
      
      //update casts_movies table
      $movieIdArray = $request->get('movie_id');
      $knownForArray = $request->get('known_for');
      $length = count($movieIdArray);
      for($i = 1;$i<=$length; $i++){
      	Cast::where('person_id','=',$id)
      		->where('movie_id','=',$movieIdArray[$i])
      		->update([
      			'known_for' => $knownForArray[$i]
      		]);
      		//\Log::info('\n$I: '.$i);
      		//\Log::info('known_for: '.$knownForArray[$i]);
      }
      //update crew_movies table
      for($i = 1;$i<=$length; $i++){
      	Crew::where('person_id','=',$id)
      		->where('movie_id','=',$movieIdArray[$i])
      		->update([
      			'known_for' => $knownForArray[$i]
      		]);
      }

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
            'birthname' => $data['nickname'],
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
