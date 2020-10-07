<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

        return $this->hasOne('App\Models\Posts');

    }
    public function posts(){
    
        return $this->hasMany('App\Models\Posts');

    }

    public function roles(){
    
        return $this->belongsToMany('App\Models\Roles');


        // this is how you include one of the cloumns in a pivot
        // return $this->belongsToMany('App\Models\Roles')->withPivot('created_at');

        
        // To customize tables name and columns,follow the format below

        // return $this->belongsToMany('App\Models\Roles','user_roles','user_id','role_id');


    }

    public function countries(){

        return $this->belongsToMany('App\Models\Country')->withPivot('name');
    
    }


    public function photos(){

        return $this->morphMany('App\Models\Photo','image');
    
    }



}
