<?php
class Stripe {
	public $settings = array(
		'description' => 'Accept payments via Stripe.',
	);
	function payment_features() {
		return '<img src=" data:image/false;base64,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">';
	}
	function payment_button($params) {
		global $billic, $db;
		$html = '';
		if (get_config('stripe_secret_key') == '' || get_config('stripe_publishable_key') == '') {
			return $html;
		}
		if ($billic->user['verified'] == 0 && get_config('stripe_require_verification') == 1) {
			return 'verify';
		} else {
			$html.= '<form action="http' . (get_config('billic_ssl') == 1 ? 's' : '') . '://' . get_config('billic_domain') . '/Gateway/Stripe/" method="POST">';
			$html.= '<input type="hidden" name="billic_invoice" value="' . $params['invoice']['id'] . '">';
			$html.= '<input type="hidden" name="billic_currency" value="' . get_config('billic_currency_code') . '">';
			$html.= '<input type="hidden" name="billic_amount" value="' . ($params['charge'] * 100) . '">';
			$html.= '<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="' . get_config('stripe_publishable_key') . '" data-image="/i/theme_' . strtolower($GLOBALS['billic_theme']['name']) . '/logo.png" data-zip-code="true" data-name="' . get_config('billic_companyname') . '" data-description="Invoice #' . $params['invoice']['id'] . '" data-amount="' . ($params['charge'] * 100) . '" data-currency="' . get_config('billic_currency_code') . '" data-email="' . safe($billic->user['email']) . '"></script></form>';
		}
		return $html;
	}
	function payment_callback() {
		global $billic, $db;
		switch ($_POST['stripeTokenType']) {
			case 'card':
				if ($_POST['billic_amount'] <= 0) {
					return 'Invalid amount';
				}
				if (empty($_POST['billic_invoice'])) {
					return 'Invoice ID not provided';
				}
				$invoice = $db->q('SELECT * FROM `invoices` WHERE `id` = ?', $_POST['billic_invoice']);
				$invoice = $invoice[0];
				if (empty($invoice)) {
					return 'Invoice "' . $_POST['billic_invoice'] . '" not found';
				}
				$post = array(
					'amount' => $_POST['billic_amount'],
					'currency' => $_POST['billic_currency'],
					'card' => $_POST['stripeToken'],
					'description' => 'Invoice #' . $invoice['id'],
					'capture' => 'true',
				);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
				curl_setopt($ch, CURLOPT_USERPWD, get_config('stripe_secret_key') . ':');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
				$data = curl_exec($ch);
				$err = curl_error($ch);
				if (!empty($err)) {
					return $err;
				}
				$json = json_decode($data, true);
				if (!is_array($json)) {
					return 'Invalid response from Stripe: ' . $data;
				}
				if (array_key_exists('error', $json)) {
					return 'Stripe Error: ' . $json['error']['message'];
				}
				if ($json['livemode'] === false && get_config('stripe_allow_test_payments') == 0) {
					return 'Test mode is not allowed in your settings';
				}
				if ($json['paid'] != true) {
					return 'Charge not paid';
				}
				$billic->module('Invoices');
				$return = $billic->modules['Invoices']->addpayment(array(
					'gateway' => 'Stripe',
					'invoiceid' => $_POST['billic_invoice'],
					'amount' => ($_POST['billic_amount'] / 100) , // value is in cents
					'currency' => $_POST['billic_currency'],
					'transactionid' => $json['id'],
				));
				if ($return === true) {
					$billic->redirect('/User/Invoices/ID/' . $_POST['billic_invoice'] . '/Status/Complete/');
				} else {
					return $return;
				}
			break;
			default:
				return 'Unhandled stripeTokenType';
			break;
		}
	}
	function settings($array) {
		global $billic, $db;
		if (empty($_POST['update'])) {
			echo '<form method="POST"><input type="hidden" name="billic_ajax_module" value="Stripe"><table class="table table-striped">';
			echo '<tr><th>Setting</th><th>Value</th></tr>';
			echo '<tr><td>Require Verification</td><td><input type="checkbox" name="stripe_require_verification" value="1"' . (get_config('stripe_require_verification') == 1 ? ' checked' : '') . '></td></tr>';
			echo '<tr><td>Secret Key</td><td><input type="text" class="form-control" name="stripe_secret_key" value="' . safe(get_config('stripe_secret_key')) . '"></td></tr>';
			echo '<tr><td>Publishable Key</td><td><input type="text" class="form-control" name="stripe_publishable_key" value="' . safe(get_config('stripe_publishable_key')) . '"></td></tr>';
			echo '<tr><td>Allow Test Payments</td><td><input type="checkbox" name="stripe_allow_test_payments" value="1"' . (get_config('stripe_allow_test_payments') == 1 ? ' checked' : '') . '></td></tr>';
			//echo '<tr><td colspan="2">You will need to setup a webhook to go to http'.(get_config('billic_ssl')==1?'s':'').'://'.get_config('billic_domain').'/Gateway/Stripe/</td></tr>';
			echo '<tr><td colspan="2" align="center"><input type="submit" class="btn btn-default" name="update" value="Update &raquo;"></td></tr>';
			echo '</table></form>';
		} else {
			if (empty($billic->errors)) {
				set_config('stripe_require_verification', $_POST['stripe_require_verification']);
				set_config('stripe_secret_key', $_POST['stripe_secret_key']);
				set_config('stripe_publishable_key', $_POST['stripe_publishable_key']);
				set_config('stripe_allow_test_payments', $_POST['stripe_allow_test_payments']);
				$billic->status = 'updated';
			}
		}
	}
}
