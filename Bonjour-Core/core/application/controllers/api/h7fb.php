<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class H7FB extends REST_Controller
{
	// Call facebook to get the login URL and pass it back to the platform ...
	function loginurl_get()
	{
		// Load core_fbutils ... 
		$this->load->model('core_fbutils');
		 
		// Set the redirect URL which facebook will return to after logging in ...
		// base_url (is the URL of the CORE -> send you to Core.php.index())
		// Add Sitecode parameter to send the platform URL to Core
		// ex: "http://www.colors-studios.com/core" . '?' . "&sitecode=" . encrypted ("http://www.colors-grp.com/test1") ...
// 		$redirect_uri = base_url() . '?'. '&sitecode=' . $this->get('platform_url');
		$redirect_uri = base_url() . '?'. 'sitecode=' . $this->get('platform_url');

// 		$redirect_uri = base_url();

		// get the login url from facebook with the configured return uri
		$loginurl = $this->facebook->getLoginUrl(array('redirect_uri' => "$redirect_uri", 'scope' => 'email,read_friendlists')); // , 'sitecode' => $this->get('platform_url') 
		
		if($loginurl)
		{
			$this->response($loginurl, 200); // 200 being the HTTP response code
		}

		else
		{
			$this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	public function send_post()
	{
		var_dump($this->request->body);
	}


	public function send_put()
	{
		var_dump($this->put('foo'));
	}
}