<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\ProductService;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Project;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use Validator;
use DB;
class ProjectController extends Controller
{
    protected $projectService;
    protected $productService;

    public function __construct(ProjectService $projectService,ProductService $productService)
    {
    	$this->projectService = $projectService;
    	$this->productService = $productService;
    }
    public function index(Request $request){

    }
    public function list($id)
    {
        
        $projects = Project::where('tenderer_id',$id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.project.list',['projects'=>$projects]);
    }
    public function formcreate()
    {
    	$categories = Category::all();
    	$units = Unit::all();
    	return view('frontend.project.create',compact('categories','units'));
    }
    public function show($id)
    {
        
    	$project = $this->projectService->findById($id);
        $products =$this->productService->getByProjectId($id);
        
    	return view('frontend.project.show', ['project'=>$project,'products'=>$products]);
    }

    public function detail()
    {
        $projects = Project::orderBy('created_at','desc')->paginate(15);
        return view('frontend.project.detail',['projects'=>$projects]);
    }
    public function store(Request $request)
    {
        $name = $request->input('projectName');

        $rules = array(
            
            'timeStart' =>'required',
            'timeEnd'   =>'required',
            'nameProduct.*'=>'required',
            'quatity.*' =>'required'
        );
        $error = Validator::make($request->all(),$rules);
            if($error->fails())
            {
                return response()->json([
                    'error'=>$error->errors()->all()
                ]);
            }


        $tenderer_id = Auth::guard('tenderer')->user()->id;

    	$project = $this->projectService->save([
    		'name'=>$name,
    		'category_id'=>$request->input('category'),
    		'tenderer_id'=>$tenderer_id,
    		'timeStart'=>Carbon::createFromFormat('d/m/Y', $request->timeStart),
    		'timeEnd'=>Carbon::createFromFormat('d/m/Y', $request->timeEnd),
    	]);

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
                    'description'=>$description[$count],
                    'project_id'=>$project->id
                );

                $insert_data[] = $data;
            }
                Product::insert($insert_data);
    	

    	return view('frontend.project.create')->with('success','Bạn đã tạo thành công dự án mới');
    }

    public function destroy(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $product = Product::where('project_id',$request->project_id);
        $project->delete();
        $product->delete();

        return back()->with('success','bạn đã xoá thành công');
    }

    public function attachContractor(Request $request)
    {
        $attachContractor = [
            'contractor_id'=>$request->contractor_id,
            'project_id'=>$request->project_id,
            'price'=>$request->price,
            'service'=>$request->service
        ];
        DB::table('contractor_project')->insert($attachContractor);

        return back()->with('success','Bạn đã tham dự thành công');
    }

}
