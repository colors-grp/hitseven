<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Secure extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
// Entry point for an authenticated user ...function index() {		// load utils ...		$this->load->model('platform_fbutils');		// get token ...		// Load the cookie from user ...		$cookie = $this->input->cookie('H7Cookie');		if ($cookie) {			$user_data = json_decode($cookie, true);			$this->session->set_userdata(array('access_token' => $user_data['access_token']));			$this->session->set_userdata(array('facebook_uid' => $this->platform_fbutils->decryptIt($user_data['facebook_uid'])));			$this->session->set_userdata(array('is_logged_in' => TRUE));			$this->session->set_userdata(array('core' => "0"));			//$appsecret_proof= hash_hmac('sha256', $real_token, 'cd54e94fcc7509e7140def0b70fb4e59');			//$this->session->set_userdata(array('appsecret_proof' => $appsecret_proof));		}		//		$result = $this->platform_fbutils->get_access_token();		$this->platform_fbutils->set_access_token($this->input->get('access_token'));		$data['ok'] = 1;		//get cover field from facebook		$cover = $this->platform_fbutils->get_facebook_field('cover' ,$this->session->userdata('facebook_uid'),$this->session->userdata('access_token') );		//get name field from facebook		$name  = $this->platform_fbutils->get_facebook_field('name' ,$this->session->userdata('facebook_uid'),$this->session->userdata('access_token') );		//set information of user(name , facebook id , cover id) to be sent to the view for the header		$data['header']['fb_id'] = $name['data']->id;		$data['header']['name'] = $name['data']->name;		$data['header']['cover_id'] = $cover['data']->cover->id;		$data['page'] = 'secure_view';		$this->load->view('template', $data);	}	

	//some example functions
	//function me is DRY and dynamic to show as example
	//object: likes, home, feed, movies, music, books, notes, permissions, photos, albums, videos, uploaded, events, groups, checkins, locations, etc.
	//https://developers.facebook.com/docs/reference/api/
	function me($object = NULL) {
		if ($object == NULL) {
			$this->index();
		} else {
			$this->load->model('platform_fbutils');
			$result = $this->platform_fbutils->get_facebook_object($object, $this->session->userdata('facebook_uid'), $this->session->userdata('access_token'));
			
			if ($result['is_true']) {
				$data['objects'] = $result['data'];
			} else {
				$data['error_message'] = $result['message'];
				$data['objects'] = array();
			}
			
			$data['page'] = 'objects_view';
			$this->load->view('template', $data);
		}
	}
	
	//example function
	function friends() {
		$this->load->model('platform_fbutils');		
		$result = $this->platform_fbutils->get_facebook_object('friends', $this->session->userdata('facebook_uid'), $this->session->userdata('access_token'));
		
		if ($result['is_true']) {
			$data['friends'] = $result['data'];
		} else {
			$data['error_message'] = $result['message'];
			$data['friends'] = array();
		}
		
		$data['page'] = 'friends_view';
		$this->load->view('template', $data);
	}
	
	//example function
	function likes() {		// load the utils ... 
		$this->load->model('platform_fbutils');		// invoke Facebook to get the data you want ...		// Refer to Facebook Graph APIs for the complete list of objects ...
		$result = $this->platform_fbutils->get_facebook_object('likes', $this->session->userdata('facebook_uid'), $this->session->userdata('access_token'));
		if ($result['is_true']) {
			$data['likes'] = $result['data'];
		} else {
			$data['error_message'] = $result['message'];
			$data['likes'] = array();
		}
		$data['page'] = 'likes_view';
		$this->load->view('template', $data);
	}
}