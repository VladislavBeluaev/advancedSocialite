<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class News extends Model
{
	use Notifiable;

   protected $fillable = ['title','body','user_id'];

	public function user()
		{
			return $this->belongsTo(User::class);
		}
	public function comments()
		{
			return $this->hasMany(Comments::class)->latest();
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
		 public function routeNotificationForMail()
	  {
	    return $this->user->email;
	  }
}


