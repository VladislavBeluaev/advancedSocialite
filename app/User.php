<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','provider_user_id','avatar','api_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if(is_string($role))
        {
            return $this->roles->contains('name',$role);
        }
       return (bool)$this->roles->intersect($role)->count();   //->count() помогает привести пустой объект к числу, так как в случае пустого обекта bool возвращает true
    }

    public function assignRole(string $role)
    {
        try{
            $role = Role::whereName($role)->firstOrFail();
        }
        catch(Exception $exp)
        {
            return "This role does not exist!!";
        }

        $this->roles()->save($role);
    }

    public function social_profile()
    {
        return $this->hasOne(SocialProfile::class);
    }

    public function web_profile()
    {
         return $this->hasOne(Profile::class);
    }

    public function getWebProfileFirstName()
    {
        return $this->web_profile->first_name;
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function comments()
        {
            return $this->hasMany(Comments::class);
        }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function owns($related)
    {
        return $this->id==$related->user_id;
    }
}
