<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['body','user_id','news_id'];

    public static function boot()
    {
    	parent::boot();
    	static::creating(function($model){

    		$model->user()->associate(\Auth::user());
    	});
    }
    public function new()
    {
    	return $this->belongsTo(News::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


}
