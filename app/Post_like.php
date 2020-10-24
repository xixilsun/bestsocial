<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_like extends Model
{
    //
    protected $table = 'post_likes';
    protected $guarded = ['post_like_id'];
    protected $primaryKey = 'post_like_id';
    public function post()
    {
        return $this->belongsTo('App\Post','post_id','post_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
