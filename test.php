<?php

$config = new \TwilioAuth\Config(
    'account-sid', 
    'auth-token'
);

$user = new \TwilioAuth\User();
$sms = new \TwilioAuth\Connect\Sms();

$sms->to = '+12145551234';
$sms->from = '+12145554321';
$sms->body = 'this is a test';

$result = $user->sendSms($config, $sms);

echo 'body: '; print_r($result->body); echo "\n\n";

?>