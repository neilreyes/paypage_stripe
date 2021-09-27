<?php

require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('config/stripe.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey(SECRET_KEY);

if (empty($POST)) {
    header('Location: index.php');
}
// Sanitise POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create Customer in Stripe
/**
 *  Todo
    * [ ] Email
    * [ ] Address - City, Country, Line1, Line2, Postal Code, State
    * [ ] Shipping Address
    * [ ] Phone
**/
$customer = \Stripe\Customer::create([
    "email" => $email,
    "source" => $token
]);

/**
* Charge Customer
* @link https://github.com/stripe/stripe-php
* @link https://stripe.com/docs/development/quickstart#test-api-request

**/
$charge = \Stripe\Charge::create([
    "amount" => 5000,
    "currency" => "usd",
    "description" => "Intro to React course",
    "customer" => $customer->id
]);

// Instantiate customer
$customer_obj = new Customer();

// Add Customer to DB
$customer_obj->createCustomer([
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
]);

// Instantiate transaction
$transaction_obj = new Transaction();

// Add Transaction to DB
$transaction_obj->createTransaction([
    'id' => $charge->id,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'status' => $charge->status,
]);

// redirect to success
header('Location: success.php?tid=' . $charge->id . '&product=' . $charge->description);

// Comment in Production
// echo '<pre>';
// print_r($charge);
// echo '</pre>';

/* $customer = $stripe->customers->create([
    'description' => 'example customer',
    'email' => 'email@example.com',
    'payment_method' => 'pm_card_visa',
]);

echo $customer;
 */
