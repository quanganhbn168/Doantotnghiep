<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenderer;
class TendererController extends Controller
{
    public function show($id){
    	$tenderer = Tenderer::find($id);
    	return view('frontend.tenderer.profile',compact('tenderer'));
    }
}
