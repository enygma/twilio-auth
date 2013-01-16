<?php

namespace TwilioAuth\Connect;

class Sms extends \TwilioAuth\Connect
{
    protected $properties = array(
        'sid' => array(
            'type' => 'string'
        ),
        'dateCreated' => array(
            'type' => 'string'
        ),
        'dateUpdated' => array(
            'type' => 'string'
        ),
        'dateSent' => array(
            'type' => 'string'
        ),
        'accountSid' => array(
            'type' => 'string'
        ),
        'from' => array(
            'type' => 'string'
        ),
        'to' => array(
            'type' => 'string'
        ),
        'body' => array(
            'type' => 'string'
        ),
        'status' => array(
            'type' => 'string',
            'allowed' => array(
                'queued', 'sending', 'sent',
                'failed', 'received'
            )
        ),
        'direction' => array(
            'type' => 'string'
        ),
        'price' => array(
            'type' => 'string'
        ),
        'apiVersion' => array(
            'type' => 'string'
        ),
        'uri' => array(
            'type' => 'string'
        )
    );
}