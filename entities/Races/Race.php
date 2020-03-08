<?php

abstract class Race{
    
    public static function getRaceName() {
        $nameArray = explode('\\',get_called_class());
        return $nameArray[sizeof($nameArray) - 1];
    }

    public abstract function getStats(): Array;

}
