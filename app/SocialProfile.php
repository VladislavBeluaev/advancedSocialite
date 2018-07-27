<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    protected $fillable = ['provider_name','user_id'];

    public function user()
    {
    	return $this->belongTo(User::class);
    }

    public function profile()
    {
    	return $this->hasOne(Profile::class);
    }
}
