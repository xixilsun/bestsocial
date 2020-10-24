<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $guarded = ['post_id'];
    protected $primaryKey = 'post_id';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function post_likes()
    {
        return $this->hasMany('App\Post_like','post_id','post_id');
    }
    public function post_comments()
    {
        return $this->hasMany('App\Post_comment', 'post_id','post_id');
    }

}
