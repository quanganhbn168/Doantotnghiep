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

    	return view('layouts.admin',compact('count_tenderer','count_contractor'));
    }
}
