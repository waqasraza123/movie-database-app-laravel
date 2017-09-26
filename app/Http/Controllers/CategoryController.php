<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = null;
        $categories = Category::all();
        return view('categories.categories-index', compact('categories', 'cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('');
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
            'name' => 'required|min:1'
        ]);
        $data = $request->all();
        $cat = Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'slug' => strtolower(preg_replace("/\\s/", "-", $data['name']))
        ]);

        if($cat){
            return redirect()->back()->withSuccess('Category Added!');
        }
        else{
            return redirect()->back()->withSuccess('There was errors in adding Category!');
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
        $cat = Category::find($id);
        $categories = Category::all();
        $edit = true;
        return view('categories.categories-index', compact('cat', 'categories', 'edit'));
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
            'name' => 'required|min:1'
        ]);
        $data = $request->all();
        $cat = Category::where('id', $id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'slug' => strtolower(preg_replace("/\\s/", "-", $data['name']))
        ]);

        if($cat){
            return redirect()->back()->withSuccess('Category Added!');
        }
        else{
            return redirect()->back()->withSuccess('There was errors in adding Category!');
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
        $cat = Category::find($id);
        $cat->delete();

        return redirect('/categories')->withSuccess('Category Deleted');
    }
}
