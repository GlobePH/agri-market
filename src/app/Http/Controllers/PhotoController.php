<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function saveAvatar(Request $request, Sell $sell)
    {
        
        $file = $request->file('file');

        $name = sha1($file . uniqid()) . '.' . $file->guessClientExtension();

        $file->storeAs('public/avatars', $name);

        $sell->update(['avatar' => $name]);
        return $sell;

    	


    	#$ext = $file->guessClientExtension();


    	#$file->storeAs('avatars/', "avatars.{$ext}", 's3');
        /*
    	request()->file('avatar')->store('avatars');
    	request()->file('photo1')->store('avatars');
    	request()->file('photo2')->store('avatars');
    	request()->file('photo3')->store('avatars');
    	request()->file('photo4')->store('avatars');
    	request()->file('photo5')->store('avatars');
    	
        */
        /*# using amazon web services
    	request()->file('avatar')->store('avatars', 's3');*/

    	// return back();
    }
}
