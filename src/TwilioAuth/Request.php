<?php

namespace TwilioAuth;

class Request
{
    private $client = null;

    private $path = null;

    private $params = array();

    private $method = 'GET';

    private $base = 'https://api.twilio.com/2010-04-01';

    private $accountSid = null;

    private $authToken = null;

    public function __construct($client = null)
    {
        if ($client == null) {
            $this->setClient(new \Guzzle\Http\Client());
        }
    }

    public function __call($method, $args)
    {
        $client = $this->getClient();
        if (method_exists($client, $method)) {
            return call_user_func_array(array($client, $method), $args);
        }
    }

    public function execute()
    {
        $method = strtolower($this->getMethod());
        $client = $this->getClient();
        $params = $this->getParams();
        $path   = $this->base.$this->getPath();

        $request = $client->$method($path, array('Date' => date('r')), $params)
            ->setAuth($this->accountSid, $this->authToken);

        try {
            $result = $request->send();
            return $result;
        } catch(\Exception $e) {
            echo 'ERROR: '.$e->getMessage()."\n\n";
        }
    }

    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
    public function getClient()
    {
        return $this->client;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    public function getPath()
    {
        return $this->path;
    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }
    public function getParams()
    {
        return $this->params;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
    public function getMethod()
    {
        return $this->method;
    }

    public function setAuth($accountSid, $authToken)
    {
        $this->accountSid = $accountSid;
        $this->authToken = $authToken;
    }
}
