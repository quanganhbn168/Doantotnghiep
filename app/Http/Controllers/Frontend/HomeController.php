<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Services\ProjectService;
class HomeController extends Controller
{
	protected $projectService;

	public function __construct(ProjectService $projectService)
	{
		$this->projectService = $projectService;
	}
    public function index()
    {
    	$projects = Project::orderBy('created_at','desc')->paginate(10);
    	$categories = Category::all();

    	return view('frontend.home',compact('projects','categories'));
    }
}
