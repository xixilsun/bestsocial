<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_comment_like extends Model
{
    //
    protected $table = 'post_comment_likes';
    protected $guarded = ['post_comment_like_id'];
    protected $primaryKey = 'post_comment_like_id';
    public function post_comment()
    {
        return $this->belongsTo('App\Post_comment','post_comment_id','post_comment_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}

