<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sell;

class PageController extends Controller
{
    
    public function index()
    {

    	$sells = Sell::get();
    	
    	return view('spa-home', compact('sells'));

    	// return view('page.index', compact('sells'));
    }
}
