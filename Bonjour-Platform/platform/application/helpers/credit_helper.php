<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
if(!function_exists('get_credit'))
{
	function get_credit() {
		
		$CI =& get_instance();
		log_message('error', 'core URL = '. $CI->config->item('core_url'));
		// Get facebook user ID
		$fbid = '100000130552768';
			
		log_message('error', 'fbid = '.$fbid);
		// Invoke the core to get user's credit from the database
		// 			$credit = $this->rest->get('getcredit', array('fb_id' => $fbid), 'json');
		
		$credit = $CI->core_call->getUserCredit($fbid);
		log_message('error', 'el raseeed, el raseeed: '.$credit);
		return $credit;
	}
}
	
if(!function_exists('buy_credit'))
{
	function buy_credit() {
		
		$CI =& get_instance();
		// Check whether the user chose a value from the radio button or not
	
		if (isset($_POST['credit'])) {
			// Get radio button value
			$credit = $_POST['credit'];
			// Get facebook user ID
			// Set needed parameters values
			$params['fb_id'] = '100000130552768';
			$params['credit'] = $credit;
			log_message('error', 'henahowan'.$credit);
			// Encode the parameters
			$jsn_params = json_encode($params);
			// Invoke the core to buy new credit for the user
			// 				$this->rest->get('buycredit', array('params' => $jsn_params), 'json');
			$CI->core_call->buy_credit($jsn_params);
		}
		$cr = 0;
		$cr = get_credit();
		log_message('error', 'buycredit, new credit: '.$cr);
		echo $cr;
	}
}
	
if(!function_exists('take_credit'))
{
	function take_credit($value) {
		$CI =& get_instance();
		// Set needed parameters values
		$params['fb_id'] = '100000130552768';
		$params['credit'] = $value;
		// Encode the parameters
		$jsn_params = json_encode($params);
		// Invoke the core to buy new credit for the user
		// 			$this->rest->get('buycredit', array('params' => $jsn_params), 'json');
		$CI->core_call->buy_credit($jsn_params);
	}
}

if(!function_exists('buy_card'))
{
	function buy_card($user_id) {
		$CI =& get_instance();
		
		$card_price = intval($CI->input->post('card_price'));
		$user_points = intval($CI->input->post('user_points'));
		$card_id = intval($CI->input->post('card_id'));
		$cat_id = intval($CI->input->post('cat_id'));

		
		log_message('error', $user_points . ' , --------------  '. $card_price);
		if ($user_points >= $card_price) {
			take_credit($card_price * -1);
			$CI->load->model('card_model');
			$CI->card_model->insert_user_card($cat_id , $card_id , $user_id);
			echo get_credit();
		}
		else
			echo -1;
	}
}