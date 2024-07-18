<?php

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// Database settings. Change these for your database configuration.
// $dbConfig = [
// 	'host' => 'localhost',
// 	'username' => 'user',
// 	'password' => 'secret',
// 	'name' => 'example_database'
// ];

// PayPal settings. Change these to your account details and the relevant URLs


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

	// for your site.
	$paypalConfig = [
		'email' => 'bbr@gmail.com',
		'return_url' => 'http://bbracing.local/account/donhang?id_donhang='.$_POST['id_order'],
		'cancel_url' => 'http://bbracing.local/paypal/payment-cancelled.html',
		'notify_url' => 'http://bbracing.local/paypal/payments.php'
	];

	$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

	// Product being purchased.
	$itemName = 'BBRACING';
	$itemAmount = $_POST['itemAmount'];
	// var_dump($_POST['itemAmount']);die();
	// Include Functions
	require 'functions.php';
	// var_dump($_POST['thanhtoandonhang']);die();
	// Grab the post data so that we can set up the query string for PayPal.
	// Ideally we'd use a whitelist here to check nothing is being injected into
	// our post data.
	
	$data = [];
	foreach ($_POST as $key => $value) {
		$data[$key] = stripslashes($value);
	}

	// Set the PayPal account.
	$data['business'] = $paypalConfig['email'];

	// Set the PayPal return addresses.
	$data['return'] = stripslashes($paypalConfig['return_url']);
	// $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	// Set the details about the product being purchased, including the amount
	// and currency so that these aren't overridden by the form data.
	$data['item_name'] = $itemName;
	$data['amount'] = $itemAmount;
	$data['currency_code'] = 'USD';

	// Add any custom fields for the query string.
	//$data['custom'] = USERID;

	// Build the query string from the data.
	$queryString = http_build_query($data);
	// var_dump('location:' . $paypalUrl . '?' . $queryString);

	// Redirect to paypal IPN
	header('location:' . $paypalUrl . '?' . $queryString);
	// addPayment($data);
	exit();
} else {
	// Handle the PayPal response.

	// Assign posted variables to local data array.
	$data = [
		'item_name' => $_POST['item_name'],
		'item_number' => $_POST['item_number'],
		'payment_status' => $_POST['payment_status'],
		'payment_amount' => $_POST['mc_gross'],
		'payment_currency' => $_POST['mc_currency'],
		'txn_id' => $_POST['txn_id'],
		'receiver_email' => $_POST['receiver_email'],
		'email' => $_POST['email'],
		'custom' => $_POST['custom'],
		'id_order' => $_POST['id_order'],
	];

	// We need to verify the transaction comes from PayPal and check we've not
	// already processed the transaction before adding the payment to our
	// database.
	if (verifyTransaction($_POST)) {
		if (addPayment($data) !== false) {
			// Payment successfully added.
		}
	}
}
