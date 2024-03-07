<?php
class Stripe {
	public $settings = array(
		'description' => 'Accept payments via Stripe.',
		'default_element_options' => "{\n  style: {\n    base: {\n      iconColor: '#c4f0ff',\n      color: '#fff',\n      fontWeight: 500,\n      ':-webkit-autofill': {\n        color: '#fce883',\n      },\n      '::placeholder': {\n        color: '#87BBFD',\n      },\n    },\n    invalid: {\n      iconColor: '#FFC7EE',\n      color: '#FFC7EE',\n    },\n  },\n}",
		'supported_cards' => [
			'visa' => [
				'name' => 'VISA',
				'image' => 'data:image/png;base64,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'
			],
			'mastercard' => [
				'name' => 'Mastercard',
				'image' => 'data:image/png;base64,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'
			],
			'amex' => [
				'name' => 'American Express',
				'image' => 'data:image/png;base64,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'
			],
			'discover' => [
				'name' => 'Discover',
				'image' => 'data:image/png;base64,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'
			],
		],
		'loader' => 'data:image/gif;base64,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',
	);
	function payment_features() {
		$supported_cards = explode(',', get_config('stripe_supported_cards'));
		if (empty($supported_cards[0])) $supported_cards = array_keys($this->settings['supported_cards']);
		$images = '';
		foreach($this->settings['supported_cards'] as $k => $v) {
			if (in_array($k, $supported_cards))
				$images .= '<img src="'.$v['image'].'" class="stripe-supported-card">';
		}
		$images .= '<style>.stripe-supported-card{margin-right: 5px}</style>';
		return $images;
	}
	function js() {
		if (defined('stripe_js_output')) return;
		echo '<script src="https://js.stripe.com/v3/"></script>';
		define('stripe_js_output', true);
	}
	function global_before_footer() {
		if (get_config('billic_stripe_fraudcheck')==='1')
			$this->js();
	}
	function payment_page($params) {
		global $billic, $db;
		if (get_config('stripe_secret_key') == '' || get_config('stripe_publishable_key') == '') die('Stripe is not enabled');
		if ($billic->user['verified'] == 0 && get_config('stripe_require_verification') == 1) die('Account requires verification to use Stripe');
		
		switch($_GET['SubAction']) {
			case 'AddCard':
				if (empty($billic->user['stripe_customer_id'])) {
					$customer = $this->ch('https://api.stripe.com/v1/customers', [
						'metadata' => [
							'userid' => $billic->user['userid']
						],
						'address' => [
							'line1' => $billic->user['address1'],
							'line2' => $billic->user['address2'],
							'city' => $billic->user['city'],
							'state' => $billic->user['state'],
							'postal_code' => $billic->user['postcode'],
							'country' => str_replace('GB', 'UK', $billic->user['country']),
						],
						'email' => $billic->user['email'],
						'name' => $billic->user['firstname'].' '.$billic->user['lastname'],
					]);
					$db->q('UPDATE `users` SET `stripe_customer_id` = ? WHERE `id` = ?', $customer['id'], $billic->user['id']);
					$billic->user['stripe_customer_id'] = $customer['id'];
				}

				$setupIntent = $this->ch('https://api.stripe.com/v1/setup_intents', [
					'payment_method_types' => ['card'],
					'customer' => $billic->user['stripe_customer_id'],
					'usage' => 'off_session'
				]);

				$client_secret = $setupIntent['client_secret'];
				if (empty($client_secret)) die('There was an error while fetching your information from our card processor. Please contact us.');

				$this->js();
				$elementOptions = $this->get_element_options();	
				$btnStripeTxt = 'Add Card';
				echo '<script>var stripe = Stripe(\''.get_config('stripe_publishable_key').'\');var elements = stripe.elements();</script><button id="btnStripe" class="btn btn-default" onClick="stripeProcess()">'.$btnStripeTxt.'</button><div id="card-element" class="form-control"></div><div id="card-errors" class="alert alert-danger" role="alert" style="display:none"></div><br><br><p>'.get_config('stripe_addcard_terms').'</p><script>var card = elements.create("card", '.$elementOptions.');card.mount("#card-element");card.addEventListener(\'change\', ({error}) => { if (error) { $(\'#card-errors\').text(error.message).show();  } else {    $(\'#card-errors\').text(\'\').hide(); }}); function stripeProcess() { $(\'#card-errors\').text(\'\').hide(); $(\'#btnStripe\').text(\'Please Wait...\').prop(\'disabled\', true); stripe.confirmCardSetup(\''.$client_secret.'\', { payment_method: { card: card, billing_details: { name: "'.addslashes($billic->user['firstname'].' '.$billic->user['lastname']).'", address: { postal_code: "'.$this->simplify_postcode($billic->user['postcode']).'" } } } }).then(function(result) { if (result.error) {  $(\'#btnStripe\').text(\''.$btnStripeTxt.'\').prop(\'disabled\', false); $(\'#card-errors\').text(result.error.message).show(); } else {  $(\'#btnStripe\').text(\'Success!\'); $(location).attr(\'href\', \'http' . (get_config('billic_ssl') == 1 ? 's' : '') . '://' . get_config('billic_domain') . '/User/Invoices/ID/'.$params['invoice']['id'].'/Action/Pay/StripeCardAdded/\'+result.setupIntent.payment_method+\'/\'); }}); }</script><style>#btnStripe{ margin-left: 10px } #card-element{ float:left; height: 2.4em; padding-top: .7em; width: 300px } #card-errors{ margin-top: 10px }</style>';
				break;
			
			case 'CreatePaymentIntent':
				$billic->disable_content();
				$paymentmethodid = $_POST['payment_method'];
				
				preg_match('~^pm_([a-zA-Z0-9]+)$~', $paymentmethodid, $match);
				if (empty($paymentmethodid) || $match[0]!==$paymentmethodid)
					$this->jsonErr('Invalid card selected');
				
				$paymentIntent = $this->ch('https://api.stripe.com/v1/payment_intents', [
					'amount' => ($params['charge'] * 100),
					'currency' => get_config('billic_currency_code'),
					'metadata' => ['invoiceid' => $params['invoice']['id']],
					'payment_method' => $paymentmethodid,
					'customer' => $billic->user['stripe_customer_id'],
					'description' => 'Invoice #'.$params['invoice']['id']
				]);
				
				if (!is_array($paymentIntent))
					$this->jsonErr($paymentIntent);
				
				echo json_encode(['client_secret' => $paymentIntent['client_secret']]);
				break;
			case 'RemovePaymentMethod':
				$billic->disable_content();
				$paymentmethodid = $_POST['payment_method'];
				
				preg_match('~^pm_([a-zA-Z0-9]+)$~', $paymentmethodid, $match);
				if (empty($paymentmethodid) || $match[0]!==$paymentmethodid)
					$this->jsonErr('Invalid card selected');
				
				$resp = $this->ch('https://api.stripe.com/v1/payment_methods/'.$paymentmethodid.'/detach', []);
				if (!is_array($resp))
					$this->jsonErr($resp);
				
				echo json_encode(['status' => 'ok']);
				break;
		}
	}
	function jsonErr($text) {
		echo json_encode(['error' => $text]);
		exit;
	}
	private $ch = null;
	function ch($url, $post = false, $method = null) {
		if ($this->ch===null) {
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 4);
			curl_setopt($this->ch, CURLOPT_TIMEOUT, 6);
			curl_setopt($this->ch, CURLOPT_HEADER, false);
			curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_USERPWD, get_config('stripe_secret_key') . ':');
		}
		curl_setopt($this->ch, CURLOPT_URL, $url);
		if (is_array($post)) {
			if ($method!==null) curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $method); else curl_setopt($this->ch, CURLOPT_POST, true);
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($post));
		} else curl_setopt($this->ch, CURLOPT_POST, false);
		$data = json_decode(curl_exec($this->ch), true);
		if (!is_array($data)) return 'An error occurred while trying to communicate with Stripe';
		if (isset($data['error'])) return 'Stripe returned an error ('.basename($url).'): '.$data['error']['message'];
		return $data;
	}
	function payment_button($params) {
		global $billic, $db;

		if (get_config('stripe_secret_key') == '' || get_config('stripe_publishable_key') == '')
			return false;
		if ($billic->user['verified'] == 0 && get_config('stripe_require_verification') == 1)
			return 'verify';
			
		$cardData = $this->ch('https://api.stripe.com/v1/payment_methods', [
			'customer' => $billic->user['stripe_customer_id'],
			'type' => 'card'
		], 'GET');

		$cards = [];
		if (!empty($billic->user['stripe_customer_id'])) {				
			$cardData = $this->ch('https://api.stripe.com/v1/payment_methods', [
				'customer' => $billic->user['stripe_customer_id'],
				'type' => 'card'
			], 'GET');
			if (is_array($cardData)) {
				foreach($cardData['data'] as $k => $source) {
					$cards[] = $source;
				}
			} else {
				if (strpos($cardData, 'No such customer')!==false) {
					if ($_GET['SubAction']==='NewCustomer')
						return 'There was an error while trying to find your billing account.';
					$db->q('UPDATE `users` SET `stripe_customer_id` = \'\' WHERE `id` = ?', $billic->user['id']);
					$billic->redirect('/User/Invoices/ID/'.$params['invoice']['id'].'/Action/Pay/SubAction/NewCustomer/');
				}
			}
		}

		$this->js();
		$elementOptions = $this->get_element_options();

		$stripe_publishable_key = addslashes(get_config('stripe_publishable_key'));
		$fullName = addslashes($billic->user['firstname'].' '.$billic->user['lastname']);
		$postcode = $this->simplify_postcode($billic->user['postcode']);
		$invoicePaidURL = 'http' . (get_config('billic_ssl') == 1 ? 's' : '') . '://' . get_config('billic_domain') . '/User/Invoices/ID/'.$params['invoice']['id'].'/Status/Completed/';
		$invoicePayURL = 'http' . (get_config('billic_ssl') == 1 ? 's' : '') . '://' . get_config('billic_domain') . '/User/Invoices/ID/'.$params['invoice']['id'].'/Action/Pay/';

		echo <<<EOF
<script>
var stripe = Stripe('$stripe_publishable_key');
function payUsingCard(btn) {
	$('#card-errors').text('').hide();

	var cardlastfour = btn.attr('cardlastfour');
	if (!confirm('Charge card ending in '+cardlastfour+'?'))
		return false;
	var payment_method = btn.attr('paymentmethod');

	btn.text('Please Wait...');
	$('.btn-stripe-pay').prop('disabled', true);
	$('.btn-stripe-remove').prop('disabled', false).text('Remove');

	$.ajax({
	  type: "POST",
	  url: 'Module/Stripe/SubAction/CreatePaymentIntent/',
	  data: {
	  	payment_method: payment_method,
	  },
	  success: function(data) {
	  	if (typeof data.error !== 'undefined') {
			$('#card-errors').text(data.error).show();
			$('.btn-stripe-pay').prop('disabled', false).text('Pay');
			$('.btn-stripe-remove').prop('disabled', false).text('Remove');
		} else {
			stripe.confirmCardPayment(data.client_secret, {
				payment_method: payment_method
			}).then(function(result) {
				if (result.error) {
					$('#card-errors').text(result.error.message).show();
					$('.btn-stripe-pay').prop('disabled', false).text('Pay');
					$('.btn-stripe-remove').prop('disabled', false).text('Remove');
				} else {
					if (result.paymentIntent.status === 'succeeded') {
						$(location).attr('href', '$invoicePaidURL');
					}
				}
			});
		}
	  },
	  dataType: 'json'
	});
}
function removeCard(btn) {
	$('#card-errors').text('').hide();

	var cardlastfour = btn.attr('cardlastfour');
	if (!confirm('Are you sure you want to remove the card ending in '+cardlastfour+'?'))
		return false;
	var payment_method = btn.attr('paymentmethod');

	btn.text('Please Wait...');
	$('.btn-stripe-pay').prop('disabled', true);
	$('.btn-stripe-remove').prop('disabled', true);

	$.ajax({
	  type: "POST",
	  url: 'Module/Stripe/SubAction/RemovePaymentMethod/',
	  data: {
	  	payment_method: payment_method,
	  },
	  success: function(data) {
		if (typeof data.error !== 'undefined') {
			$('#card-errors').text(data.error).show();
			$('.btn-stripe-pay').prop('disabled', false).text('Pay');
			$('.btn-stripe-remove').prop('disabled', false).text('Remove');
		} else {
			$(location).attr('href', '$invoicePayURL');
		}
	  },
	  dataType: 'json'
	});
}
</script>
EOF;

		$waitingForCard = false;
		if (isset($_GET['StripeCardAdded'])) {
			$waitingForCard = true;
		}

		if (empty($cards)) {
			echo 'You have not added any credit or debit cards to your account yet. ';	
		} else {
			echo '<table class="css-table stripe-cards"><tr><th>Type</th><th>Card Number</th><th>Expiry</th><th></th></tr>';
			foreach($cards as $card) {
				$cardError = false;
				foreach($card['card']['checks'] as $k => $v)
					if ($v==='fail')
					$cardError = 'Provided invalid '.strtoupper(explode('_', $k)[0]);

				$brand = $card['card']['brand'];
				if (array_key_exists($brand, $this->settings['supported_cards'])) {
					$brand = '<img src="'.$this->settings['supported_cards'][$brand]['image'].'">';
				}

				$number = 'XXXX XXXX XXXX '.$card['card']['last4'];

				$expiry = $card['card']['exp_month'];
				if ($expiry<11)
					$expiry = '0'.$expiry;
				$expiry .= ' / '.$card['card']['exp_year'];

				if (mktime(23, 59, 59, ($card['card']['exp_month']+1), 0, $card['card']['exp_year'])<time())
					$cardError = 'Expired';

				if ($waitingForCard && $card['id']===$_GET['StripeCardAdded'])
					$waitingForCard = false;

				$btn = '<button class="btn btn-success btn-sm btn-stripe-pay" cardlastfour="'.safe($card['card']['last4']).'" paymentmethod="'.safe($card['id']).'" onClick="payUsingCard($(this))">Pay</button>';
				if ($cardError!==false) $btn = $cardError;
				$btn .= '&nbsp;<button class="btn btn-danger btn-sm btn-stripe-remove" cardlastfour="'.safe($card['card']['last4']).'" paymentmethod="'.safe($card['id']).'" onClick="removeCard($(this))">Remove</button>';

				echo '<tr><td>'.$brand.'</td><td>'.$number.'</td><td>'.$expiry.'</td><td>'.$btn.'</td></tr>';
			}
			echo '</table>';
			echo '<div id="card-errors" class="alert alert-danger" role="alert" style="display:none"></div>';
		}

		if ($waitingForCard) {
			echo '<br><div class="alert alert-info" role="alert"><img src="'.$this->settings['loader'].'"> Please wait, your card is being authorized.</div><script>var paymentRefreshCountdown = 10;setInterval(function() { paymentRefreshCountdown--; if (paymentRefreshCountdown===0) { location.reload(); } }, 1000);</script><br>';
		}
		echo '<a href="Module/Stripe/SubAction/AddCard/">Click here to add a new card.</a>';
		echo '<style>.stripe-cards > tbody > tr > td{vertical-align:middle}</style>';
		return false;
	}
	function get_element_options() {
		$elementOptions = get_config('stripe_element_options');
		if (empty($elementOptions))
			$elementOptions = $this->settings['default_element_options'];	
		return $elementOptions;
	}
	function simplify_postcode($text) {
		return preg_replace('~[^A-Z0-9\-]+~i', '', $text);
	}
	function payment_callback() {
		global $billic, $db;
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);
		if (!is_array($data))
			return 'Invalid Request';
		
		$sig = $_SERVER['HTTP_STRIPE_SIGNATURE'];
		$sig_pairs = explode(',', $sig);
		$sig_arr = [];
		foreach($sig_pairs as $pair) {
			$pair = explode('=', $pair);
			$sig_arr[$pair[0]] = $pair[1];
		}
		
		$hash = hash_hmac('sha256', $sig_arr['t'].'.'.$json, get_config('stripe_endpoint_key'));
		$hash_valid = false;
		foreach($sig_arr as $k => $v) {
			if ($hash===$v) {
				$hash_valid = true;
				break;
			}
		}
		if (!$hash_valid)
			return 'Unauthorized';
		
		if ($sig_arr['t']<(time()-3600))
			return 'Timed out';
		
		if ($data['livemode'] === false && get_config('stripe_allow_test_payments') == 0)
			return 'Test mode is not allowed in your settings';
		
		if ($data['type']==='charge.succeeded' || $data['type']==='payment_intent.succeeded') {
			$invoiceid = $data['data']['object']['metadata']['invoiceid'];
			if (empty($invoiceid))
				return 'Invoice ID not provided';
			$invoice = $db->q('SELECT * FROM `invoices` WHERE `id` = ?', $invoiceid)[0];
			if (empty($invoice))
				return 'Invoice "' . $invoiceid . '" not found';	
		}
		
		switch ($data['type']) {
			case 'charge.succeeded':
				$billic->module('Invoices');
				$return = $billic->modules['Invoices']->addpayment(array(
					'gateway' => 'Stripe',
					'invoiceid' => $invoice['id'],
					'amount' => ($data['data']['object']['amount'] / 100) , // value is in cents
					'currency' => $data['data']['object']['currency'],
					'transactionid' => $data['id'],
				));
				break;
			case 'setup_intent.succeeded':
				if ($data['data']['object']['usage']==='off_session') {
					$paymentMethodID = $data['data']['object']['payment_method'];
					
					$user = $db->q('SELECT * FROM `users` WHERE `stripe_customer_id` = ?', $data['data']['object']['customer'])[0];
					if (empty($user))
						return 'Unable to find Billic user';
					if (empty($user['stripe_customer_id']))
						return 'Billic user does not have a Stripe Customer ID yet';
					
					if (substr($paymentMethodID, 0, 3)!=='pm_')
						return 'Invalid Payment Method ID';
					
					$this->ch('https://api.stripe.com/v1/payment_methods/'.$paymentMethodID.'/attach', [
						'customer' => $user['stripe_customer_id']
					]);
				}
				break;
			default:
				return 'Unhandled type';
			break;
		}
	}
	function settings($array) {
		global $billic, $db;
		if (empty($_POST['update'])) {
			$elementOptions = $this->get_element_options();
			$stripe_addcard_terms = get_config('stripe_addcard_terms');
			if (empty($stripe_addcard_terms)) $stripe_addcard_terms = 'I authorise '.get_config('billic_companyname').' to send instructions to the financial institution that issued my card to take payments from my card account in accordance with the terms of my agreement with you.';
			echo '<form method="POST"><input type="hidden" name="billic_ajax_module" value="Stripe"><table class="table table-striped">';
			echo '<tr><th>Setting</th><th>Value</th></tr>';
			echo '<tr><td>Require Verification</td><td><input type="checkbox" name="stripe_require_verification" value="1"' . (get_config('stripe_require_verification') == 1 ? ' checked' : '') . '></td></tr>';
			echo '<tr><td>Secret Key</td><td><input type="text" class="form-control" name="stripe_secret_key" value="' . safe(get_config('stripe_secret_key')) . '"></td></tr>';
			echo '<tr><td>Publishable Key</td><td><input type="text" class="form-control" name="stripe_publishable_key" value="' . safe(get_config('stripe_publishable_key')) . '"></td></tr>';
			echo '<tr><td>Endpoint Signing Secret</td><td><input type="text" class="form-control" name="stripe_endpoint_key" value="' . safe(get_config('stripe_endpoint_key')) . '"></td></tr>';
			echo '<tr><td colspan="2">You will need to setup a webhook to go to http'.(get_config('billic_ssl')==1?'s':'').'://'.get_config('billic_domain').'/Gateway/Stripe/<br>Event Types: <b>charge.succeeded</b>, <b>setup_intent.succeeded</b></td></tr>';
			echo '<tr><td>Allow Test Mode</td><td><input type="checkbox" name="stripe_allow_test_payments" value="1"' . (get_config('stripe_allow_test_payments') == 1 ? ' checked' : '') . '> Allow Payments from the Test Mode API</td></tr>';
			$supported_cards = explode(',', get_config('stripe_supported_cards'));
			if (empty($supported_cards[0])) $supported_cards = array_keys($this->settings['supported_cards']);
			echo '<tr><td>Supported Cards</td><td>';
			foreach($this->settings['supported_cards'] as $k => $v) {
					echo '<input type="checkbox" name="stripe_supported_cards[]" value="'.$k.'"'.(in_array($k, $supported_cards)?' checked':'').'> <img src="'.$v['image'].'" class="stripe-supported-card"> '.$v['name'].'<br><br>';
			}
			echo '</td></tr>';
			echo '<tr><td>Advanced Fraud Check</td><td><input type="checkbox" name="billic_stripe_fraudcheck" value="1"' . (get_config('billic_stripe_fraudcheck') == 1 ? ' checked' : '') . '> This will include the Stripe javascript on every page of Billic to help detect fraud.</td></tr>';
			echo '<tr><td>Stripe Add Card Terms</td><td><textarea name="stripe_addcard_terms" class="form-control" style="height:200px">' . safe($stripe_addcard_terms) . '</textarea></td></tr>';
			echo '<tr><td>Element Options</td><td><textarea name="stripe_element_options" class="form-control" style="height:600px">' . safe($elementOptions) . '</textarea></td></tr>';
			echo '<tr><td colspan="2" align="center"><input type="submit" class="btn btn-default" name="update" value="Update &raquo;"></td></tr>';
			echo '</table></form>';
		} else {
			if (!empty($_POST['stripe_secret_key']) && substr($_POST['stripe_secret_key'], 0, 3)!=='sk_')
				$billic->errors[] = 'Invalid Secret Key';
			if (!empty($_POST['stripe_publishable_key']) && substr($_POST['stripe_publishable_key'], 0, 3)!=='pk_')
				$billic->errors[] = 'Invalid Publishable Key';
			if (!empty($_POST['stripe_endpoint_key']) && substr($_POST['stripe_endpoint_key'], 0, 6)!=='whsec_')
				$billic->errors[] = 'Invalid Endpoint Secret';
			if (strpos($_POST['stripe_secret_key'], '_live_')!==false && $_POST['stripe_allow_test_payments']==1)
				$_POST['stripe_allow_test_payments'] = 0;
			
			if (empty($billic->errors)) {
				set_config('stripe_require_verification', $_POST['stripe_require_verification']);
				set_config('stripe_secret_key', $_POST['stripe_secret_key']);
				set_config('stripe_publishable_key', $_POST['stripe_publishable_key']);
				set_config('stripe_endpoint_key', $_POST['stripe_endpoint_key']);
				set_config('stripe_allow_test_payments', $_POST['stripe_allow_test_payments']);
				$_POST['stripe_element_options'] = str_replace("\r", '', $_POST['stripe_element_options']);
				if ($_POST['stripe_element_options']===$this->settings['default_element_options'])
					$_POST['stripe_element_options'] = '';
				set_config('stripe_element_options', $_POST['stripe_element_options']);
				set_config('stripe_supported_cards', implode(',', $_POST['stripe_supported_cards']));
				set_config('billic_stripe_fraudcheck', $_POST['billic_stripe_fraudcheck']);
				set_config('stripe_addcard_terms', $_POST['stripe_addcard_terms']);
				$billic->status = 'updated';
			}
		}
	}
}
