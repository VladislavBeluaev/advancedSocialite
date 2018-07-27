<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
   protected $fillable = ['title','body','user_id'];

	public function user()
		{
			return $this->belongsTo(User::class);
		}

	public static function withCreator()
	{
		return static::with('user.web_profile')->latest();
		//return $this->user->belongsTo(Profile::class);
	}

	 public function creator()
	 {
	 	return $this->user->web_profile->first_name;
	 }
}


