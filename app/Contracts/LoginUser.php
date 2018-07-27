<?php 
namespace App\Contracts;
use App\Store\StoreUser;
use Socialite;
interface LoginUser {

	public static function authenticate($providerName);


    public function login($providerName,$listener);

}