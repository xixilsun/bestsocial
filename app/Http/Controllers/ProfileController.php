<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        return view('profile.show', compact('id'));
    }
    public function follow($id, Request $request)
    {
        // dd($request);
        
        if($request['type']=='follow')
        {
            App\Follow::create([
                'follower_id' => $request['follower_id'],
                'following_id' => $request['following_id'],
            ]);
        }
        else
        {
            App\Follow::where('follower_id','=' ,$request['follower_id'])
                ->where('following_id','=',$request['following_id'])->first()->delete();
        }
        return redirect()->back();
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
        $user = Auth::User();
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'biodata' => 'required',
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->biodata = $request['biodata'];
        $user->update();
        return redirect('/profile/'.$id)->with('success','Profile Updated!');;
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
    }
}
