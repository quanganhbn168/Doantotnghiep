<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contractor;
class ContractorController extends Controller
{
    public function index()
    {
    	$contractors = Contractor::paginate(10);
    	return view('backend.contractor.index',compact('contractors'));
    }

    public function listapproved()
    {
    	$contractors = Contractor::whereNull('approved_at')->paginate(10);
        return view('backend.contractor.approved',['contractors'=>$contractors]);
    }

    public function approve($tenderer_id)
    {
        $contractors = Contractor::findOrFail($contractors_id);
        $contractors->update(['approved_at' => now()]);

        return redirect()->view('backend.contractors.index')->withMessage('User approved successfully');
    }
}
