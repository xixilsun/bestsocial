<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_comment extends Model
{
    //
    protected $table = 'post_comments';
    protected $guarded = ['post_comment_id'];
    protected $primaryKey = 'post_comment_id';
    public function post()
    {
        return $this->belongsTo('App\Post','post_id','post_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function post_comment_likes()
    {
        return $this->hasMany('App\Post_comment_like','post_comment_id','post_comment_id');
    }
}
