<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    

    protected $fillable = [

        'title', 'body', 'category'
    ];

    public function comments(){

        return $this->hasMany(comment::Class)->orderBy('created_at', 'DESC');
    }

    public function user(){

        return $this->belongsTo(User::Class);
    }

    public function tags(){

      return $this->belongsToMany('App\tag');
    }

}
