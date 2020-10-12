<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function post(){

        // i can find the post that belongs to the user
        return $this->hasOne('App\Models\Posts');

    }
    public function posts(){
    
        // i can find all the post that belongs to this user
        return $this->hasMany('App\Models\Posts');

    }

    public function roles(){
    
        // Able to find the roles that belong to the user
        return $this->belongsToMany('App\Models\Roles');

    }

    public function countries(){

        // able to find the countries that belongs to the user
        return $this->belongsToMany('App\Models\Country')->withPivot('name');
    
    }


    public function photos(){

        // getting all users image from the photo table
        return $this->morphMany('App\Models\Photo','image');
    
    }


    // this method is getting the name attribute 
    public function getNameAttribute($value){
    
        return ucfirst($value);

    }

    // this is setting the name attribute 
    public function setNameAttribute($value){
    
        $this->attributes['name'] = strtoupper($value);

    }





}
