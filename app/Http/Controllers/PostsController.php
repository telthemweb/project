<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
class PostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();
        $tags = Tag::all();
        // check if category and tag iare empty
       if ($categories->count()==0 ||$tags->count() ==0 ) {
        Session::flash('info','You must have categories and tags before you attempt to create a post!!');
           return redirect()->back();
       }
        return view('admin.posts.create')->with('categories', $categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'title'=>'required|',
        'featured'=>'required|image',
        'content'=>'required',
        'category_id'=>'required',
         'tags'=>'required'
       ]);

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();
       $featured->move('uploads/posts/',$featured_new_name);

       // $post = new Post;
        $post = Post::create([
           'title'=>$request->title, 
           'content'=>$request->content, 
           'featured'=>'uploads/posts/'.$featured_new_name,
           'category_id'=>$request->category_id,
           'slug'=>str_slug($request->title)

        ]);


         $post->tags()->attach($request->tags);
        Session::flash('success','Your Post has been created!!');
         $post->save();
          return redirect()->back();
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
         $post =Post::find($id);
         $categories= Category::all();
        return view('admin.posts.edit')->with('post',$post)->with('categories', $categories)->with('tags',Tag::all());
         return redirect()->back();
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

       $this->validate($request,[
        'title'=>'required|',
        'content'=>'required',
        'category_id'=>'required',
         'tags'=>'required'
       ]);
       $post =Post::find($id);

       if ($request->hasFile('featured')) {
           $featured = $request->featured;
           $featured_new_name = time().$featured->getClientOriginalName();
           $featured->move('uploads/posts/',$featured_new_name);
           $post->featured ='uploads/posts/'.$featured_new_name;


           $post->title = $request->title; 
           $post->content = $request->content; 
           $post->category_id = $request->category_id;
            

           $post->save();
           $post->tags()->sync($request->tags);
            Session::flash('success','Your Post has been updated!!');
            return redirect()->route('posts');
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
          $cat = Post::find($id);
        $cat->delete();
        Session::flash('success','Your Post has been deleted!!');
        return redirect()->back();
    }

    public function trashed()
    {
         $post = Post::onlyTrashed()->get();
         return view('admin.posts.trash')->with('posts',$post);
    }
     public function wipe($id)
    {
       $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('danger','Your Post has been permanently deleted!!');
        return redirect()->back();
    }
     public function restore($id)
    {
       $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success','Your Post has been restored!!');
        return redirect()->route('posts');
    }
}
