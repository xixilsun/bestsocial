<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','biodata'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post','user_id','id');
    }
    public function post_likes()
    {
        return $this->hasMany('App\Post_like','user_id','id');
    }
    public function post_comments()
    {
        return $this->hasMany('App\Post_comment','user_id','id');
    }
    public function post_comment_likes()
    {
        return $this->hasMany('App\Post_comment_like','user_id','id');
    }
    public function following()
    {
        return $this->hasMany('App\Follow', 'follower_id','id');
    }
    public function follower()
    {
        return $this->hasMany('App\Follow','following_id','id');
    }
}
