<?php

class Mage extends Clase {

    private static $instance;
    private $types = [];
    private $weapons = [];
    
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
    
    public function allowedTypes(): Array
    {
        return $this->types;
    }
    public function allowedWeapons(): Array
    {
        return $this->weapons;
    }
    public function setAllowedTypes(array $types)
    {
        if (SkillManager::typesExists($types)) {
            echo "Se han creado los tipos para Mago exitosamente <br>";
            $this->types = $types;
        }
    }
    public function setAllowedWeapons(array $weapons)
    {
        if (WeaponManager::isAWeapon($weapons)) {
            echo "Se han creado las armas para Mago exitosamente <br>";
            $this->weapons = $weapons;
        }
    }

}
