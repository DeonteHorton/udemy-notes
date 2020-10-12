<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    
    public function users(){
    
        //  i can find all users that belongs to a certian role
        return $this->belongsToMany('App\Models\User');

    }

}
