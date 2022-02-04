<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'first_name',
        'last_name',
        'location'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarUrl(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }
    
    
    public function myFriends(){
        return $this->belongsToMany(User::class,'friends','user_id','friend_id');
    }

    public function friendsOf(){
        return $this->belongsToMany(User::class,'friends','friend_id','user_id');
    }

    public function acceptedFriends(){
        return $this->myFriends()->wherePivot('accepted', true);
    }

    /*get all friend request for current user*/
    public function friendRequest(){
        return $this->myFriends()->wherePivot('accepted', false)->get();
    }
    
    /*get all friend request with status [pending] on other side of user*/
    public function friendRequestPending(){
        return $this->friendsOf()->wherePivot('accepted', false)->get();
    }


    /*check if current user has a friend request pending from this user $user
    and it will return true or false value
    */
    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestPending()->where('id',$user->id)->count();
    }

    /*check if received request friend from other user*/
    public function hasFriendRequestReceived(User $user){
        return (bool) $this->friendRequest()->where('id',$user->id)->count();
    }

    /*add friend and attach this user on the relation table*/
    public function addFriend(User $user){
        $this->friendsOf()->attach($user->id);
    }
    /*accept friend request and update pivot*/
    public function acceptFriendRequest(User $user){
        $this->friendRequest()->where('id', $user->id)->first()->pivot->update(['accepted' => true]);
    }
    /*check if user is friend or not and return bool value*/
    public function isFriendWith(User $user){
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    /*get all blocked users*/
    public function blockedFriends(){
        return $this->myFriends()->wherePivot('blocked', true);
    }

    /*get all friends for me and all friends for my friend*/
    /*this relation get accepted request friend from two wise [sender and received ]*/
    public function friends(){
        return $this->myFriends()->wherePivot('accepted', true)->get()
            ->merge($this->friendsOf()->wherePivot('accepted',true)->get());
    }


}
