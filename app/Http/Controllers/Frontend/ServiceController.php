<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;
use App\Models\Service;
class ServiceController extends Controller
{
    public function showYeucauInCategory(Request $request)
	{
		if($request->ajax()){
    		$states = Category::where('category_id',$request->category_id)->pluck("name","id")->all();
    		$data = view('frontend.project.create',compact('states'))->render();
    		return response()->json(['options'=>$data]);
    	}
	}
}
