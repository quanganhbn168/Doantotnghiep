<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenderer;
use App\Models\Contractor;
class DashboardController extends Controller
{
    public function index()
    {
    	$count_tenderer = Tenderer::whereNull('approved_at')->count();
    	$count_contractor = Contractor::whereNull('approved_at')->count();
    	$tenderer = Tenderer::where('status',true)->count();
    	$contractor = Contractor::where('status',true)->count();
    	return view('backend.index',compact('count_tenderer','count_contractor','tenderer','contractor'));
    }
}
