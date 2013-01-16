<?php

namespace TwilioAuth;

class Model
{
    /**
     * Properties of the current model
     * @var array
     */
    protected $properties = array();

    /**
     * Values for the current model
     * @var array
     */
    protected $values = array();

    public function __construct($data = null)
    {
        if ($data !== null) {
            $this->load($data);
        }
    }

    /**
     * Set properties for the model
     *
     * @param array $properties Properties to set
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get the current model's properties
     *
     * @return array Current properties
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Load the given data into the current object
     *
     * @param array $data Data to load
     * @return boolean True on finish
     */
    public function load($data)
    {
        // if it's an object, get the values as an array
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        foreach ($data as $index => $value) {
            // see what the type is
            if (array_key_exists($index, $this->properties)) {
                $config = $this->properties[$index];
                if ($config['type'] == 'array') {

                    // see if we have a type to try to cast
                    if (isset($config['map'])) {
                        $tmp = array();
                        $className = $config['map'];
                        foreach ($value as $mapData) {
                            $tmp[] = new $className($mapData);
                        }
                        $this->values[$index] = $tmp;

                    } else {
                        $this->values[$index] = $value;
                    }
                } else {
                    $this->values[$index] = $value;
                }
            }
        }
        return true;
    }

    /**
     * Magic "get" method
     *
     * @param string $property Property name
     * @return mixed|null Property value if it exists, null if not
     */
    public function __get($property)
    {
        return (array_key_exists($property, $this->values))
            ? $this->values[$property] : null;
    }

    /**
     * Magic "set" method
     *
     * @param string $property Property name
     * @param mixed $value Property value
     */
    public function __set($property, $value)
    {
        $this->values[$property] = $value;
    }

    /**
     * Output the values of the object as an array
     *
     * @return array Current object values
     */
    public function toArray()
    {
        return $this->values;
    }

    public function save()
    {
        echo 'saving';
    }
}