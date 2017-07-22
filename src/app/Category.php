<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function scopeHasItem($query)
    {
    	return $query->where('hasitem', 0);
    }
}
