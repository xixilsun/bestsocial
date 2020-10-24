<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $table = 'follows';
    protected $primaryKey = 'follow_id';
    protected $guarded = ['follow_id'];
    public function follower()
    {
        return $this->belongsTo('App\User','follower_id','id');
    }
    public function following()
    {
        return $this->belongsTo('App\User','following_id','id');
    }
}
