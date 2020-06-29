<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function showform(){
        $categories = Category::all();

        return view('frontend.project.create',compact('categories'));
    }
}
