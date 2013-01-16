<?php

namespace TwilioAuth;

class User extends \TwilioAuth\Model
{
    protected $properties = array(
    );

    /**
     * Send the SMS message with the configuration information given
     * 
     * @param  \TwilioAuth\Config  $config     Configuration object
     * @param  \TwilioAuth\Connect $connection SMS connection object
     * @return \TwilioAuth\Response Response object
     */
    public function sendSms(\TwilioAuth\Config $config, \TwilioAuth\Connect $connection)
    {
        $smsParams = array(
            'To' => $connection->to,
            'From' => $connection->from,
            'Body' => $connection->body
        );

        $request = new \TwilioAuth\Request();
        $request->setPath('/Accounts/'.$config->accountSid.'/SMS/Messages')
            ->setMethod('POST')
            ->setParams($smsParams)
            ->setAuth($config->accountSid, $config->authToken);

        $response = new \TwilioAuth\Response($request->execute());
        
        return $response;
    }
}