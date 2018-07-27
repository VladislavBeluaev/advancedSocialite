<?php 
namespace App\Contracts;

interface SocialNetworkController{

	public function __construct(LoginUser $login);
	public function redirectToProvider();
	public function handleProviderCallback();
	const PROVIDER = array('github','google','linkedin','twitter','facebook',);
}