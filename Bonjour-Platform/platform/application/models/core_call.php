<?php 

/**
 * H7 Core Class
 *
 * Make REST requests to Core services with simple syntax.
 *
*/

class core_call extends CI_Model 
{
	
	protected $CI;
	
	function __construct($config = array())
	{
		$this->CI =& get_instance();
		
		log_message('debug', 'REST Class Initialized');
		
		log_message('error', 'The Core URL -> '.$this->CI->config->item('core_api_url'));
		
		$this->CI->load->library('rest');
		$this->CI->rest->initialize(array(
				'server' => $this->CI->config->item('core_api_url'),
				'http_user' => '',
				'http_pass' => '',
				'http_auth' => 'basic' // or 'digest'
		));
	}
	
	// call ( <Method Name>, Parameter Array) ...
	private function callCore($method, $params = array())
	{
		log_message('error', 'The method Name -> '.$method);
		// log_message('error', 'The params -> '.json_encode($params));
// 		$value=8;
// 		return $this->CI->rest->get($method, array('accountid', $params['accountid']), 'json');
		log_message('error', 'core call ->>>>>>', count($params));
		return $this->CI->rest->get($method, $params, 'json'); 
	}

	// call ( <Method Name>, Parameter Array) ...
	function getUserCredit($fbid)
	{		
		$method = 'getcredit';
		log_message('error', ' $fbid==== ' .$fbid);
		$rValue = $this->callCore($method, array('fb_id' => $fbid));

		//log_message('error', 'rValue from user credit ====== '.rValue);
		
		// Validation for return values ...
		// The API call will return an array with 2 parameters:
		// invoke: a boolean that indicates correct processing at API side
		// data: The returned value itself
		// If invoke was false, a 3rd parameter is returned containing error message "named: error" ...
	
		log_message('error', ' rvalueeeee==== ' . print_r($rValue, TRUE));
		// If the method was executed successfully ...
		if($rValue->invoke != FALSE) {
			log_message('error', ' the data : ' . $rValue->data);
			// return required data ...
			return $rValue->data;
		} else {
			log_message('error', 'Error calling H7 API, Method: '. $method . ', error message: ' . $rValue->error);
			return $rValue->error;
	
		}
	}
	
	// call ( <Method Name>, Parameter Array) ...
	function getFacebookFriends($accountid)
	{
		log_message('error', 'account id in getFBFriends = '.$accountid);
		$method = 'friends';
// 		$params = ;
		$rValue = $this->callCore($method, array('accountid' => $accountid));
	
		log_message('error', 'rValue ====== '.$rValue->data);
		// Validation for return values ...
		// The API call will return an array with 2 parameters:
		// invoke: a boolean that indicates correct processing at API side
		// data: The returned value itself
		// If invoke was false, a 3rd parameter is returned containing error message "named: error" ...
	
		// If the method was executed successfully ...
		if($rValue->invoke) {
			log_message('error', ' the data : ' . $rValue->data);
			// return required data ...
			return $rValue->data;
		} else {
			log_message('error', 'Error calling H7 API, Method: '. $method . ', error message: ' . $rValue->error);
			return $rValue->error;
	
		}
	}
	// call ( <Method Name>, Parameter Array) ...
	function buy_credit($fb_id, $credit)
	{
		$method = 'buycredit';
		log_message('error', 'buy credit ->>>>>>'. $fb_id . ' , ' . $credit);
		$rValue = $this->callCore($method, array('fb_id' => $fb_id, 'credit' => $credit));
	
		// Validation for return values ...
		// The API call will return an array with 2 parameters:
		// invoke: a boolean that indicates correct processing at API side
		// data: The returned value itself
		// If invoke was false, a 3rd parameter is returned containing error message "named: error" ...
	
		// If the method was executed successfully ...
		if($rValue->invoke) {
			log_message('error', ' the data : ' . $rValue->data);
			// return required data ...
			return $rValue->data;
		} else {
			log_message('error', 'Error calling H7 API, Method: '. $method . ', error message: ' . $rValue->error);
			return $rValue->error;
	
		}
	}
	function getMe($account_id) {
		$method = 'getMe';
		$rValue = $this->callCore($method, array('account_id' => $account_id));
		
		// Validation for return values ...
		// The API call will return an array with 2 parameters:
		// invoke: a boolean that indicates correct processing at API side
		// data: The returned value itself
		// If invoke was false, a 3rd parameter is returned containing error message "named: error" ...
		
		// If the method was executed successfully ...
		if($rValue->invoke) {
// 			log_message('error', ' the data : ' . $rValue->data);
			// return required data ...
			return $rValue->data;
		} else {
// 			log_message('error', 'Error calling H7 API, Method: '. $method . ', error message: ' . $rValue->error);
			return $rValue->error;
		
		}
	}
}

/* End of file CoreCall.php */
/* Location: ./application/libraries/CoreCall.php */