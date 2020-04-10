<?php

require_once('../inc/functions.php');
require_once('../inc/bdd.php');

\Stripe\Stripe::setApiKey(getSetting('stripe_pubKey'));
$endpoint_secret = getSetting('stripe_whooks', 'value');

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    exit();
}
// Handle the event
switch ($event->type) {
    case 'checkout.session.completed':
        $session = $event->data->object;

        $session->client_reference_id;
        $currency = strtoupper($session->display_items[0]->currency);
        $txn_id = $session->payment_intent;

        $price = $price / 100;

        if ($type == 'license') {
            
        }

        if ($type == 'renew') {
            
        }

        break;
    default:
        http_response_code(400);
        exit();
}

http_response_code(200);
