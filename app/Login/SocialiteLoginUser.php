<?php 
namespace App\Login;

use Socialite;
use App\Contracts\LoginUser;
use App\Events\SendWelcomeEmailEvent;
use App\{User,Profile,SocialProfile};
class SocialiteLoginUser implements LoginUser{

	protected $socialiteProfile,$profile,$user;

	public function __construct(SocialProfile $socialiteProfile,Profile $profile)
	{
		$this->socialiteProfile = $socialiteProfile;
		$this->profile = $profile;
	}

	public static function authenticate($provider_name)
    {
        return Socialite::driver($provider_name)->redirect();
    }

    public  function login($provider_name,$listener)
    {
        $this->user = $this->findSocialUserOrCreate($this->getSocialUser($provider_name));
       
        $this->findSocialiteProfileOrCreate($provider_name)->findAppProfileOrCreate();
        
        auth()->login($this->user);
        event(new SendWelcomeEmailEvent($this->user));
        return $listener->userHasLogIn($this->user);
    }

    protected function getSocialUser($provider_name)
    {
    	return Socialite::driver($provider_name)->user();
    }

    protected function findSocialUserOrCreate($SocialUser)
    {
    	return User::firstOrCreate(['email'=>$SocialUser->email],[
        	'provider_user_id'=>$SocialUser->id,
        	'email'=>$SocialUser->email,
        	'avatar'=>$SocialUser->avatar,
        	'username'=>$SocialUser->nickname,
            'api_token'=>str_random(60)
        ]);
    }

    protected function findSocialiteProfileOrCreate($provider_name)
    {
    	$this->socialiteProfile::firstOrCreate(['user_id'=>$this->user->id],[
    		'provider_name'=>$provider_name
    	]);
    	return $this;
    }

    protected function findAppProfileOrCreate()
    {
    	//dd($this->socialiteProfile->id);
    	$this->profile::firstOrCreate(['user_id'=>$this->user->id],[
    		'user_id'=>$this->user->id,
    		'social_id'=>$this->user->social_profile->id
    	]);
    }

}