<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'price',
        'service',
        'tenderer_id',
        'contractor_id',
        'project_id' 
    ];

    public function contractor(){
    	return $this->belongsTo(Contractor::class);
    }

    public function tenderer(){
    	return $this->belongsTo(Tenderer::class);
    }

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
