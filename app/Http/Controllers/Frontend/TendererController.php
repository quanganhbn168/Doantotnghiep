<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenderer;
use App\Models\Image;
class TendererController extends Controller
{
    public function show($id){
    	$tenderer = Tenderer::find($id);
    	$image = Image::where('tenderer_id',$id)->first();
    	
    	return view('frontend.tenderer.profile',compact('tenderer','image'));
    }
}
