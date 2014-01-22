<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// $config['appId']  = 'APP_ID'; 
// $config['secret'] = 'APP_SECRET';// Colors studios App
$config['appId']   = '352621514881126';
$config['secret']  = 'cd54e94fcc7509e7140def0b70fb4e59';//https://developers.facebook.com/docs/reference/php/facebook-getLoginUrl/
$config['facebook_login_parameters'] = array(		// Here we put the permissioms H7 needs from Facebook ...
		'scope' => 'user_actions:music, user_likes, friends_likes',		// Know what display is ?? ...
		'display' => 'page'
);