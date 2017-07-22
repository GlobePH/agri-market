<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use GlobeLab\User\SubscriberTrait;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SubscriberTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    public function sells()
    {
        return $this->hasMany(Sell::class);
    }

    public function sellItem(Sell $sell)
    {
        $this->sells()->save($sell);
    }

    public function sellreview()
    {
        return $this->hasMany(SellReview::class);
    }
}
