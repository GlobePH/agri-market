<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
	    return $category;
    }

    public function show(Category $category)
    {
    	
    	#$category = $id;
    	#$category = Category::find($category);


		return view('category.show', compact('category'));	 	
    }
}
