<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'timeStart',
        'timeEnd',
        'category_id',
        'tenderer_id',
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function tenderer(){
    	return $this->belongsTo(Tenderer::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function contractors()
    {
        return $this->belongsToMany(Contractor::class)->withPivot('price', 'service');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
