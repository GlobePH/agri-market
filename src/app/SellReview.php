<?php

namespace App;

use Carbon\Carbon;

class SellReview extends Model
{
    
    protected $appends = ['human_created_at', 'formatted_created_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function sell()
    {
    	return $this->belongsTo(Sell::class);
    }

    public function getHumanCreatedAtAttribute()
    {
        return (new Carbon($this->attributes['created_at']))->diffForHumans();
    } 

    public function getFormattedCreatedAtAttribute()
    {
        return (new Carbon($this->attributes['created_at']))->toFormattedDateString();
    }


    public function test()
    {
    	echo "asdasd";
    }

}
