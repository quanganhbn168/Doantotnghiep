<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Models\Category;
class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
    	$this->categoryService = $categoryService;
    }

    public function index()
    {
        $data = $this->categoryService->getAll(null,25);
        return view('backend.category.show', ['data'=>$data]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $category = new Category;

        $category->name = $request->input('name');
        

        $category->save();
        return redirect('/category')->with('success','Save Success');
    }

    public function update(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        $category->update($request->all());

        return redirect('/category')->with('success','Update Success');
    }

    public function destroy(Request $request)
    {

        $category = Category::findOrFail($request->category_id);

        $category->delete();

        return redirect('/category')->with('success','Delete Success');

    }
    /*public function show($id){

    }*/

    public function showform(){
        $categories = Category::all();

        return view('test.form',compact('categories'));
    }
}
