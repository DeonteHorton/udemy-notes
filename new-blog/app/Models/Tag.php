<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts(){
    
        // gets all of the posts that are assigned to this tag 
        return $this->morphedByMany('App\Models\Posts','taggable');

    }

    public function videos(){
    
        // gets all of the videos that are assigned to this tag 
        return $this->morphedByMany('App\Models\Video','taggable');

    }
}
