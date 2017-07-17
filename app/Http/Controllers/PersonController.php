<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{

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
      return view('persons.create', compact('personType'));
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
    }

    /**
     * edit cast member
     *
     * @param $id
     */
    public function editCast($id){
    }
  
}