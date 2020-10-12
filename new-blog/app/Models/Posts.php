<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title',
        'body'
    ];

    public function user(){
    
        // i can find user that belongs to the post
        return $this->belongsTo('App\Models\User');

    }

    public function photos(){

        // getting all posts image from the photo table
        return $this->morphMany('App\Models\Photo','image');
    
    }

    public function tags(){
    
        // gets all of the tags for the post 
        return $this->morphToMany('App\Models\Tag','taggable');

    }
}
