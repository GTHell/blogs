<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'body', 'user_id', 'lead_img'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

//    public function comments () {
//        return $this->hasManyThrough('App\Comment', 'App\User');
//    }
}
