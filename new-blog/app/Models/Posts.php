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
    
        return $this->belongsTo('App\Models\User');

    }

    public function photos(){

        return $this->morphMany('App\Models\Photo','image');
    
    }
}
