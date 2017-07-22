<?php

namespace App;

use Carbon\Carbon;

class Sell extends Model
{
    protected $appends = ['human_created_at', 'formatted_created_at', 'overall_rating', 'count_review'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function sellReview()
    {
    	return $this->hasMany(SellReview::class);
    }

    public function getHumanCreatedAtAttribute()
    {
        return (new Carbon($this->attributes['created_at']))->diffForHumans();
    } 

    public function getFormattedCreatedAtAttribute()
    {
        return (new Carbon($this->attributes['created_at']))->toFormattedDateString();
    }

    public function getOverallRatingAttribute()
    {
        return $this->sellReview()->avg('rating');
    }


    public function getCountReviewAttribute()
    {
        return $this->sellReview()->count();
    }


    public function addReview($data)
    {

        $this->sellReview()->create(
            ['review' => $data['review'], 
            'rating' => $data['rating'], 
            'user_id' => auth()->id()
        ]);

    }
}
