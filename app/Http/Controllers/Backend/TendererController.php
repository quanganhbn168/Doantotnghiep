<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TendererService;
use App\Models\Tenderer;
class TendererController extends Controller
{
    private $tendererService;

    public function __construct(TendererService $tendererService)
    {
    	$this->tendererService = $tendererService;
    }

    public function index()
    {
    	$tenderers = Tenderer::paginate(10);
    	return view('backend.tenderer.index',compact('tenderers'));
    }
}
