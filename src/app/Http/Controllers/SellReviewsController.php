<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Sell;
use App\SellReview;
use GlobeLab;

class SellReviewsController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function store(Sell $sell, Request $request)
	{

		#if (Auth::guest()) return Redirect::guest('login');

		$this->validate(request(),[
            'review' => 'required|min:5',
            'rating' => 'required',
        ]);

        $sell->addReview(request(['review', 'rating']));

        GlobeLab::send($sell->user, "Someone has review your item:".$sell->name." Message: " . $request->review);

        //$this->autoText('')
	}

	/*public function autoText($to, $from('name', 'email', 'num'), $item, $msg)
	{

	}*/

}
