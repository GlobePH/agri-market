<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyersController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');  
    }
    
    public function index()
    {
    	return view('buyers.index');
    }

    public function create()
    {
    	return view('buyers.create');
    }
}
