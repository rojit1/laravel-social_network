<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $posts = Post::orderBy('id','desc')->simplePaginate(3);
        return view('posts.index',['posts'=>$posts,'user'=>$user,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('image')){
            
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            
            $extension = $request->file('image')->getClientOriginalExtension();
            
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            
            $path =  $request->file('image')->storeAs('public/images',$fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }

     
        $posts = new Post;
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        $posts->user_id = Auth()->user()->id;
        $posts->image = $fileNameToStore;
        $posts->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);

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
        return view('posts.edit')->with('post',$post);
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
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('image')){
            // get file with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //Get Just file
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // To store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // Upload
            $path =  $request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        $posts = Post::find($id);
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        if($request->hasFile('image')) {
            Storage::delete('public/images/'.$posts->image);
            $posts->image = $fileNameToStore;
        }
        $posts->save();
        return redirect('/home');
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
        if($post->image != 'noimage.jpg'){
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();
        return redirect('/home');

    }
}
