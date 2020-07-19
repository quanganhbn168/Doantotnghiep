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
    	$tenderers = Tenderer::whereNotNull('approved_at')->paginate(10);
    	return view('backend.tenderer.index',compact('tenderers'));
    }

    public function listapproved()
    {
        $tenderers = Tenderer::whereNull('approved_at')->paginate(10);
        return view('backend.tenderer.approved',['tenderers'=>$tenderers]);
    }

    public function approved($tenderer_id)
    {
        $tenderer = Tenderer::findOrFail($tenderer_id);
        $tenderer->update(['approved_at' => now()]);

        return back()->withMessage('User approved successfully');
    }
}
