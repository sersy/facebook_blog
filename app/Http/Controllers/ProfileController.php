<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function index(Request $request,User $user)
    {

        //return $user;
        //$user =  User::find(auth()->user()->id);
        /*$user =  User::where('user_name',$username)->first();
        if (!$user){
            abort('404');
        }
        return view('profile.index',compact('user'));*/



        //return view('profile.index');

        /*$user =  User::where('user_name',$username)->first();
        $users = User::all();

        if (!$user){
            abort('404');
        }
        return view('profile.index',compact('user','users'));*/
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show($username)
    {
        $profile =  User::where('user_name',$username)->first();
        //$users = User::all();
        //$authUser =  User::find(auth()->user()->id);

        if (!$profile){
            abort('404');
        }
        return view('profile.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user =  User::find(auth()->user()->id);
        if (!$user){
            abort('4014');
        }
        return view('profile.edit',compact('user'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user =  User::find(auth()->user()->id);
        $rules = [
            'user_name' => 'required',
            'first_name' => 'sometimes|nullable|string',
            'last_name' => 'sometimes|nullable|string',
            'location' => 'sometimes|nullable|string',
        ];
        $request->validate($rules);
        $user->update($request->all());
        return redirect()->route('profile.edit',auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
