<?php

abstract class Clase implements ICanUse{
    
    public static function getClaseName() {
        $nameArray = explode('\\',get_called_class());
        return $nameArray[sizeof($nameArray) - 1];
    }

    public abstract function allowedTypes(): Array;
    public abstract function allowedWeapons(): Array;
    public abstract function setAllowedTypes(array $types);
    public abstract function setAllowedWeapons(array $weapons);

}