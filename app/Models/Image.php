<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'name',
    	'path',
    	'tenderer_id',
    	'contractor_id'
    ];

    public function tenderer(){
    	return $this->belongsTo(Tenderer::class);
    }
}
