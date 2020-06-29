<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProjectService;
use Validator;
class ProductController extends Controller
{
    public function insert(Request $request)
    {
    	if($request->ajax())
    	{
    		$rules = array(
    			'nameProduct.*'		=>'required',
    			'quantity.*'		=>'required'
    		);
    		$error = Validator::make($request->all(),$rules);
    		if($error->fails())
    		{
    			return response()->json([
    				'error'=>$error->errors()->all()
    			]);
    		}

    		$nameProduct = $request->nameProduct;
    		$unit = $request->unit;
    		$quantity = $request->quantity;
    		$description = $request->description;

    		for($count = 0; $count<count($nameProduct); $count++)
    		{
    			$data = array(
    				'name'=> $nameProduct[$count],
    				'unit_id'=>$unit[$count],
    				'quantity'=>$quantity[$count],
    				'description'=>$description[$count];
    				'project_id'=>'1'
    			);

    			$insert_data[] = $data;
    			Product::insert($insert_data);
    		}
    	}
    }
}
