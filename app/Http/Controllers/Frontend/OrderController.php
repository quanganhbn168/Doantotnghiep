<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use DB;
class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::guard('tenderer')->user()->id;
    	$order = [
    		'tenderer_id'=>Auth::guard('tenderer')->user()->id,
    		'contractor_id'=>$request->contractor_id,
    		'project_id'=>$request->project_id,
    		'price'=>$request->price,
    		'service'=>$request->service,
            'created_at'=>now(),
            'updated_at'=>now()
    	];

    	DB::table('orders')->insert($order);
    	return redirect("/order/list/$user");
    }

    public function show($id)
    {
    	$orders = Order::findOrFail($id);
        return view('frontend.order.show',['orders'=>$orders]);
    	
    }
    public function list($id)
    {
        $orders = Order::where('tenderer_id',$id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.order.list',['orders'=>$orders]);
    }
}
