<?php

class Type {

    private static $instance;
    private $types = [];
    
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

    //Para ontener solo los tipos

    public function getTypes()
    {
        $typesArray = [];
        $keysTypes = array_keys($this->types);
        foreach ($keysTypes as $value) {
            array_push($typesArray,$value);
        }
        return $typesArray;
    }

    //Para obtener el arreglo completo

    public function getAllTypes()
    {
        return $this->types;
    }

    //Para obtener los subtipos de un tipo en específico

    public function getSubTypesOf(String $type)
    {
        $keysTypes = array_keys($this->types);
        if (in_array($type,$keysTypes)) {
            return $this->types[$type];
        }
        return null;
    }

    public function addType(String $name)
    {
        $this->types[$name]=[];
    }

    //$t1 es el tipo al que se le va asignar el subtipo, es decir, $t2

    public function addSubType(String $t1, String $t2)
    {
        $keysTypes = array_keys($this->types);
        if (in_array($t1,$keysTypes)) {
            array_push($this->types[$t1],$t2);
        }else{
            echo 'El tipo de nombre '.$t1.' no existe';
        }
    }
}