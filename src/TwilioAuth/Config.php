<?php

namespace TwilioAuth;

class Config
{
    /**
     * SID for the current account
     * @var string
     */
    private $accountSid = null;

    /**
     * Authorization token for the account
     * @var string
     */
    private $authToken = null;

    private $db = null;

    /**
     * Initialize the object and set SID and token
     * 
     * @param string $accountSid Account SID
     * @param string $authToken  Account auth token
     */
    public function __construct($accountSid = null, $authToken = null)
    {
        if ($accountSid !== null) {
            $this->setAccountSid($accountSid);
        }
        if ($authToken !== null) {
            $this->setAuthToken($authToken);
        }
    }

    /**
     * Get properties using "get" methods if they exist
     * 
     * @param string $property Property to find
     * @return mixed "Get" return value
     */
    public function __get($property)
    {
        $method = 'get'.ucwords($property);
        return (method_exists($this, $method)) ? $this->$method() : null;
    }

    /**
     * Set the SID for the current object
     * 
     * @param string $sid Account SID
     * @return \TwilioAuth\Config
     */
    public function setAccountSid($sid)
    {
        $this->accountSid = $sid;
        return $this;
    }

    /**
     * Get the current SID value
     * 
     * @return string SID value
     */
    public function getAccountSid()
    {
        return $this->accountSid;
    }

    /**
     * Set the current object's auth token
     * 
     * @param string $token Authorization token value
     * @return \TwilioAuth\Config
     */
    public function setAuthToken($token)
    {
        $this->authToken = $token;
        return $this;
    }

    /**
     * Get the current authorization token value
     * 
     * @return string Auth token
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }
}

?>