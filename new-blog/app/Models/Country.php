<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function posts(){
        
        // We can choose to customize the column names, by default it's going to use some ids. in this model we are using two tables 

        // we are getting all the posts for country, the post table doesn't have a country id but the user table does, so we are getting the post for the country by the country_id in the user table

        return $this->hasManyThrough('App\Models\Posts','App\Models\User');


        // Basically the return statment above looks like this return statment below but the country_id and the user_id is invisible

        // return $this->hasManyThrough('App\Models\Posts','App\Models\User','country_id','user_id');

    }
}
