<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Services\ProjectService;
use App\Models\News;
class HomeController extends Controller
{
	protected $projectService;

	public function __construct(ProjectService $projectService)
	{
		$this->projectService = $projectService;
	}
    public function index()
    {
    	$data_projects = Project::orderBy('created_at','desc')->paginate(10);
    	$data_categories = Category::all();
        $data_news = News::orderBy('created_at','desc')->paginate(5);
    	return view('frontend.home',compact('data_projects','data_categories','data_news'));
    }

    public function approval()
    {
        return view('approval');
    }
}
