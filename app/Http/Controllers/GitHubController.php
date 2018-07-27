<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\SocialNetworkController;
use App\Contracts\LoginUser;

class GitHubController extends Controller implements SocialNetworkController
{
	protected $socialite;
	public function __construct(LoginUser $socialite)
	{
		$this->socialite = $socialite;
	}
    public function redirectToProvider()
   {
   		 return $this->socialite::authenticate(SocialNetworkController::PROVIDER[0]);
   }

   public function handleProviderCallback()
   {
   		//$user = Socialite::driver('github')->user();
   	return $this->socialite->login(SocialNetworkController::PROVIDER[0],$this);
   		//dd(Socialite::driver('github')->user());
   }

   public function userHasLogIn($user)
   {
   	return redirect('/');
   }
}
