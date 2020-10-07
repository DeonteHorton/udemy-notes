<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function posts(){
        
        // We can choose to customize the column names, by default it's going to use some ids. in this model we are using two tables 

        //This is were we relate the post table with the country table, we are binding the user_id and the country_id and we are attaching it to the posts method
        return $this->hasManyThrough('App\Models\Posts','App\Models\User');


        // Basically the return statment above looks like this return statment below but the country_id and the user_id is invisible

        // return $this->hasManyThrough('App\Models\Posts','App\Models\User','country_id','user_id');

    }
}
