<?php

namespace Portfolio\Packages;

class BaseObject {

    /**  Location for overloaded data.  */
    protected $_data = array();

    /**
     * Set a variable on a class
     *
     * @param string $property
     * @param mixed $value
     * @return $this
     */
    public function __set($property, $value) {

        $this->_data[$property] = $value;
        return $this;

    }

    /**
     * Get a variable on a class
     *
     * @param string $property
     * @return mixed
     * @throws \Exception
     */
    public function __get($property) {

        if (array_key_exists($property, $this->_data)) {
            return $this->_data[$property];
        }

        return null;

    }

    /**
     * Check if a property is set
     *
     * @param string $property
     * @return bool
     */
    public function __isset($property) {
        return isset($this->_data[$property]);
    }

    /**
     * Unset a property on a class
     *
     * @param string $property
     * @return $this
     * @throws \Exception
     */
    public function __unset($property) {

        if (array_key_exists($property, $this->_data)) {
            unset($this->_data[$property]);
            return $this;
        }

        throw new \Exception('Property '.$property.' not found on '.get_class($this));

    }

    public function toArray() {
        return $this->_data;
    }

}