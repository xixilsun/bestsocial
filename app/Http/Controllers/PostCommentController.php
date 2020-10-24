<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_comment;
use Auth;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request["comment"] ==NULL) {
            $validatedData = $request->validate([
                'comment' => 'required'
            ]);
        }
        //one to many
        $post = $user->post_comments()->create([
            "comment"=>$request["comment"],
            "post_id"=>$request["post_id"]
        ]);
        return redirect('/feed');
    }
    public function storeProfile(Request $request)
    {
        $user = Auth::user();
        if ($request["comment"] ==NULL) {
            $validatedData = $request->validate([
                'comment' => 'required'
            ]);
        }
        //one to many
        $post = $user->post_comments()->create([
            "comment"=>$request["comment"],
            "post_id"=>$request["post_id"]
        ]);
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
        //
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
        $comment = Post_comment::destroy($id);
        return redirect()->back()->with('success','Komentar berhasil dihapus!');
    }
}
