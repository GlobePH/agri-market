<?php

namespace App\Http\Controllers;

use Auth;
use GlobeLab;
use Illuminate\Http\Request;

class GlobeLabController extends Controller 
{
	public function subscribe(Request $request)
	{
		if (!$request->code)
			return GlobeLab::authenticate(Auth::user());

		GlobeLab::subscribe($user = Auth::user(), $request->code);
		// GlobeLab::send($user, "Thank you!");
		return redirect('/');
	}
}
