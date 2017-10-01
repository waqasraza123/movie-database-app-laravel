<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('blog.blog-index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = DB::table('tagging_tags')->pluck('name', 'name');
        return view('blog.blog-create')->with([
            'tags' => $tags,
            'categories' => $categories
        ]);
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
            'title' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
        $moved = null;
        //save the post image
        if(isset($data['image']) && is_uploaded_file($data['image'])){
            $f = $data['image'];

            $extention = $f->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $f->getClientOriginalName());
            //Move Uploaded File
            $destinationPath = 'uploads/' . '/posts';
            $moved = $f->move($destinationPath, $fileName);
        }


        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'summary' => $data['summary'],
            'image' => isset($fileName) ? asset($destinationPath) . '/' . $fileName : null,
            'is_draft' => $data['status'] == 0 ? true : false,
            'slug' => strtolower(preg_replace("/\\s/", "-", $data['title'])),
            'user_id' => Auth::user()->id
        ]);

        if($post){

            if(isset($data['tags'])){
                $post->tag($data['tags']);
            }
            if(isset($data['categories'])){
                $post->categories()->sync($data['categories']);
            }

            return redirect()->back()->withSuccess('Post Created Successfully!');
        }
        else{
            return redirect()->back()->withErrors('There were problems creating the Post!');
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
        $post = Post::find($id);
        $tags = DB::table('tagging_tags')->pluck('name', 'name');
        $categories = Category::pluck('name', 'id');

        $keywordsSelect = $post->categories()->pluck('categories.id', 'name');
        $tagsSelect = DB::table('tagging_tagged')->where([
            'taggable_type' => 'App\Post',
            'taggable_id' => $id
        ])
            ->pluck('tag_name', 'tag_name');
        return view('blog.blog-edit')->with([
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories,
            'tagsSelected' => $tagsSelect,
            'keywordsSelected' => $keywordsSelect
        ]);
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
            'title' => 'required'
        ]);

        $data = $request->all();
        $moved = null;
        //save the post image
        if(isset($data['image']) && is_uploaded_file($data['image'])){
            $f = $data['image'];

            $extention = $f->getClientOriginalExtension();
            $fileName = preg_replace("/\\s/", "_", $f->getClientOriginalName());
            //Move Uploaded File
            $destinationPath = 'uploads/' . '/posts';
            $moved = $f->move($destinationPath, $fileName);
        }

        $postImage = Post::where('id', $id)->first()->image;
        $post = Post::where('id', $id)->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'summary' => $data['summary'],
            'image' => isset($fileName) ? asset($destinationPath) . '/' . $fileName : $postImage,
            'is_draft' => $data['status'] == 0 ? true : false,
            'slug' => strtolower(preg_replace("/\\s/", "-", $data['title'])),
            'user_id' => Auth::user()->id
        ]);

        if($post){
            $post = Post::find($id);
            if(isset($data['tags'])){
                $post->retag($data['tags']);
            }
            else{
                $post->untag();
            }
            if(isset($data['categories'])){
                $post->categories()->sync($data['categories']);
            }
            else{
                $post->categories()->sync([]);
            }

            return redirect()->back()->withSuccess('Post Updated Successfully!');
        }
        else{
            return redirect()->back()->withErrors('There were problems Updating the Post!');
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
        $post = Post::find($id);
        $post->categories()->sync([]);
        $post->delete();
        return redirect()->back()->withSuccess('Post Deleted Successfully');
    }
}
