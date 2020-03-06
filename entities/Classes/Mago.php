<?php

class Mage implements ICanUse {

    private static $instance;
    private $types = [];
    private $subTypes = [];
    
    private function __construct()
    {
        
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    public function allowedTypes()
    {
        return $this->types;
    }
    public function allowedSubTypes()
    {
        return $this->subTypes;
    }
    public function allowedWeapons()
    {
        return 0;
    }

}
