<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Post_like;
use App\Post_comment_like;
use App\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $id = array();
        $user = Auth::User();
        $id[] = $user->id;
        $posts = array();
        foreach($user->following as $follow)
        {
            $id[] = $follow->following_id;
            // $followed_user = User::find($follow->following_id);
            // foreach($followed_user->posts as $post)
            // {
            //     $posts[]=$post;
            // }
        }
        // dd($id);
        // $post = Post::orderBy('post_id', 'DESC')->get();
        $post = Post::whereIn('user_id',$id)->orderBy('post_id','DESC')->get();
        return view('home',compact('post'));
    }
    public function find()
    {
        $users=User::all();
        return view('find',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // dd($request);
        //one to many
        if($request->hasFile('picture'))
        {
            $dest_path = 'public/image/posts';
            $pict_name = $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs($dest_path, $pict_name);
            $request->validate([
                'caption' => 'required',
                'picture' => 'mimes:jpeg,bmp,png,jpg'
            ]);
            // dd($pict_name);
        }else{
            $pict_name = null;
            $request->validate([
                'caption' => 'required',
            ]);
        }
        // dd($request);
        $post = $user->posts()->create([
            "caption"=>$request["caption"],
            "picture"=>$pict_name,
        ]);
        return redirect()->back()->with('success','Post Berhasil disimpan!');
    }
    public function like(Request $request)
    {
        $user = Auth::user();
        //one to many
        $post = $user->post_likes()->create([
            "post_id"=>$request["post_id"]
        ]);
        return redirect()->back();
    }
    public function dislike($id)
    {
        //one to many
        $post = Post_like::destroy($id);
        return redirect()->back();
    }
    public function comment_like(Request $request)
    {
        $user = Auth::user();
        //one to many
        $comment = $user->post_comment_likes()->create([
            "post_comment_id"=>$request["post_comment_id"]
        ]);
        return redirect()->back();
    }
    public function comment_dislike($id)
    {
        //one to many
        $comment = Post_comment_like::destroy($id);
        return redirect()->back();
    }
    public function store_from_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'caption' => '',
            'picture' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $post = $user->posts()->create([
            'caption' => $request['caption'],
            'picture' => $request['picture']
        ]);
        return redirect()->back()->with('success','Post Created!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
        // dd($id);
        $user = Auth::user();
        // dd($request);
        // one to many
        
        $post = Post::find($id);
        $post->caption = $request['caption'];
        $post->save();
        return redirect()->back()->with('success','Post Updated!');
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
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success','Post Deleted!');
    }

}
