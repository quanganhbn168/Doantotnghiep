<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'unit_id',
        'quantity',
        'project_id' 
    ];

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function unit(){
    	return $this->belongsTo(Unit::class);
    }
}
