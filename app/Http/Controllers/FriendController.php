<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $friendsBlocked = Auth::user()->friendsBlocked();

        $friends = Auth::user()->friends()->where('blocked','false');
        //dd($friendsWithBlocked);
        $friendRequest = Auth::user()->friendRequest();
        $blocked = Auth::user()->blockedFriends();
        //dd($blocked);
        /*$aceptedFriend = Auth::user()->acceptedFriends();
        dd($aceptedFriend);*/

        return view('friend.index',compact('friendRequest','blocked','friends'));


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
    /*public function store(Request $request,$username)
    {
        dd($request,$username);
    }*/

    public function getAdd($username)
    {
        $profile =  User::where('user_name',$username)->first();
        if (!$profile){
            session()->flash('error','That user could not be found');
            return redirect()->route('friend.index');
        }

        //prevent user to add them self
        if (Auth::user()->id === $profile->id){
            return redirect()->route('friend.index');
        }
        //check id th auth user has pending request form user || or || user has pending request form auth user
        if (Auth::user()->hasFriendRequestPending($profile) || $profile->hasFriendRequestPending(Auth::user())){
            session()->flash('success', 'Friend request already pending');
            return redirect()->route('profile.show',$profile->user_name);
        }

        //check if auth user and particular user is friend or not
        if (Auth::user()->isFriendWith($profile)){
            session()->flash('success', 'You are already friend');
            return redirect()->route('profile.show',$profile->user_name);
        }

        //add friend

        Auth::user()->addFriend($profile);
        session()->flash('success', 'Friend request send');
        return redirect()->route('profile.show',$profile->user_name);
    }


    public function acceptRequest($username)
    {
        $profile = User::where('user_name', $username)->first();
        if (!$profile) {
            session()->flash('error', 'That user could not be found');
            return redirect()->route('friend.index');
        }

        // to be sure accept request from actually received requests
        //because i can't accept a friend request from a user i haven't received a request from that
        if (!Auth::user()->hasFriendRequestReceived($profile)){
            return redirect()->route('friend.index');
        }

        // do accept
        Auth::user()->acceptFriendRequest($profile);
        session()->flash('success', 'Friend request accepted');
        return redirect()->route('profile.show',$profile->user_name);
    }
    
    
    public function postDelete($username){
        $profile = User::where('user_name', $username)->first();
        if (!$profile) {
            session()->flash('error', 'That user could not be found');
            return redirect()->route('friend.index');
        }

        //check if auth user and particular user is friend or not
        /*if (!Auth::user()->isFriendWith($profile)){
            return redirect()->back();
        }*/

        //deleteFriend
        Auth::user()->deleteFriend($profile);
        session()->flash('success', 'Friend deleted');
        return redirect()->route('profile.show',$profile->user_name);

    }

    public function blockFriend($username){
        $profile = User::where('user_name', $username)->first();
        if (!$profile) {
            session()->flash('error', 'That user could not be found');
            return redirect()->route('friend.index');
        }

        //check if auth user and particular user is friend or not
        if (!Auth::user()->isFriendWith($profile)){
            return redirect()->back();
        }

        //deleteFriend
        Auth::user()->doBlock($profile);
        session()->flash('success', 'Friend blocked');
        return redirect()->route('friend.index');

    }
    //
    public function unBlockFriend($username){

        $profile = User::where('user_name', $username)->first();
        if (!$profile) {
            session()->flash('error', 'That user could not be found');
            return redirect()->route('friend.index');
        }

        //check if auth user and particular user is friend or not
        if (!Auth::user()->isFriendWith($profile)){
            return redirect()->back();
        }

        //deleteFriend
        Auth::user()->unblock($profile);
        session()->flash('success', 'Friend Unblock');
        return redirect()->route('friend.index');

    }
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
