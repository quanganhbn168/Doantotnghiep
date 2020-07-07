<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Tenderer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'tenderer';

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'address',
        'phone',
        'website',
    ];

    public function projects(){
    	return $this->hasMany(Project::class);
    }

    public function orders(){
    	return $this->hasMany(Order::class);
    }
}
