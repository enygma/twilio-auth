<?php

namespace TwilioAuth;

class Response
{
    private $response = null;

    public function __construct($response)
    {
        $this->setResponse($response);
    }

    public function __call($method, $args)
    {
        if (method_exists($this->getResponse(), $method)) {
            return call_user_func_array($this->getResponse()->$method, $args);
        }
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }
    public function getResponse()
    {
        return $this->response;
    }

    public function getBody()
    {
        return $this->getResponse()->getBody(true);
    }

    public function __get($property)
    {
        $method = 'get'.ucwords($property);

        // see if we have it first
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        // if not, check the response object
        return (method_exists($this->getResponse(), $method)) 
            ? $this->getResponse()->$method() : null;
    }
        
}