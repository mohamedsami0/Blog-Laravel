<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class comment extends Model
{

    protected $fillable = [
        'body', 'post_id'

    ];
    public function post(){

        return $this->belongsTo(Post::Class);
    }

    public function user(){

        return $this->belongsTo(User::Class);
    }
}
