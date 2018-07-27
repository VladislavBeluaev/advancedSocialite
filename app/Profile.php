<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name','last_name','address','gender','user_id','social_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function profile()
    {
    	return $this->belongsTo(SocialProfile::class);
    }

    public function getFirstNameAttribute()
    {

    	if($first_name = $this->attributes['first_name']) return $first_name;

    	return stristr($this->user->email,'@',true);
    }
}
