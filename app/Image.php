<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['user_id', 'real_path', 'url_path', 'name'];

    public function user () {
        return $this->belongsTo('App\User');
    }
}
