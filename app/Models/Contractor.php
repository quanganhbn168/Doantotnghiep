<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Contractor extends Authenticatable
{
    //public $timestamps = false;
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'address',
        'phone',
        'website',
        'apropved_at',
        
        
    ];

    public function projects(){
    	return $this->belongsToMany('App\Models\Project')->withPivot('price', 'service');
    }

    public function orders(){
    	return $this->hasMany(Order::class);
    }
}
