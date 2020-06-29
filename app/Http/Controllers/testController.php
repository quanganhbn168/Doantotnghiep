<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
class testController extends Controller
{
	public function getCategory(){
		$categories = Category::all();
		return view('testjavascript',compact('categories')); 
	}
    public function showservice(Request $request)
    {
    	$select = $request->get('select');
    	$value = $request->get('value');
    	$dependent = $request->get('dependent');
    	if($request->ajax()){
    		$srs = Service::where('category_id',$request->category_id)->all();
    		$data = view('testjavcript',compact('srs'))->render();
    		return response()->json(['services'=>$data]);
    	}
    }
}
