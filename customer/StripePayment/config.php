<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

$stripeDetails = array(
		"secretKey" => "sk_test_51OGdq8SALB7AMIv3SBZtkg7O8eTWeOThjRyyxOOdyey1ZhQfzO4RH8bsbB2h3TqvL3VM3MjTZFHTFPCzE0XcRa7J00VUB0OvWG",  //Your Stripe Secret key
		"publishableKey" => "pk_test_51OGdq8SALB7AMIv3Hs4RjQH97oVpknBtFqYO7B1MdSeP0TN0h9b3kW1PtimRB3GCSSEpAoIoKTDPDjPiWUvKKARf00S0lGnOTg"  //Your Stripe Publishable key
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);

	
?>
