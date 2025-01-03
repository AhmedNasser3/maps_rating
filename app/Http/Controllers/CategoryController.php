<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('list', ['places'=> $category->places()->get(),'categories' => Category::all()]);
    }
}