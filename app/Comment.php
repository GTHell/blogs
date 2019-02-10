<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body', 'parent_id'];

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function reply () {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function replies () {
        return $this->reply()->with('replies');
    }

    public function parent () {
        return $this->belongsTo('App\Comment', 'parent_id');
    }
}
