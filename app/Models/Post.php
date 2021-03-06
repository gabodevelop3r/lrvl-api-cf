<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'author_id'

    ];


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function author(){
        
        return $this->belongsTo('App\Models\User','author_id');
    }

    public function isAuthorLoaded(){

        return $this->relationLoaded('author');
    }

    public function isCommentsLoaded(){

        return $this->relationLoaded('comments');
    }
    
    

}
