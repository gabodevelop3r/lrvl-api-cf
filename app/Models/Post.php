<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content'
    ];


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function author(){
        
        return $this->belogsTo('App\Models\User','author_id');
    }

}
