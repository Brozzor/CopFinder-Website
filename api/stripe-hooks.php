<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/stripe-php/init.php');
require_once('../inc/functions.php');
require_once('../inc/bdd.php');
require_once('../inc/mail.php');

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

        
        $transaction = transactionsBy($session->client_reference_id);
        $type = $transaction['type'];

        if ($type == 'license') {
            $user = createUser($transaction['user_mail'], $transaction['pid'], $transaction['ip']);
            updateTransac($session->client_reference_id,"completed",$user['uid']);
            sendMailBuyLicense($transaction['user_mail'],$user['password'],$user['token']);
        }

        if ($type == 'renewal') {
            $id = searchUserIdby($transaction['user_mail']);
            updateTransac($session->client_reference_id,"completed",$id);
            addDayLicense($id,'365');
        }

        break;
    default:
        http_response_code(400);
        exit();
}

http_response_code(200);
