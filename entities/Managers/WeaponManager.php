<?php

class WeaponManager {

    public static function create(string $name,float $damage, int $hands) {
        if($hands == 1 || $hands == 2) {
            echo "Se ha creado el arma ".$name."<br>";
            return new Weapon($name, $damage, $hands);
        }
    }

    public static function assignWeapon(Weapon $weapon, Character $character) {

        $weaponsSupport = array(
            1 => [CLASSES[0], CLASSES[1], CLASSES[2]],
            2 => [CLASSES[0], CLASSES[2]]
        );
    
        $clase = $character->getPlayableClass();

        foreach ($weaponsSupport[strval($weapon->getHands())] as $supportClass ) {
            if($clase == $supportClass) {
                echo $character->setWeapons($weapon);
                // echo "El arma ".$weapon->getName()." ha sido asignada al jugador ".$character->getName()."<br>";
                return 0;
            }
        }

        echo "El jugador ".$character->getName()." no es apto para el arma ".$weapon->getName()." porque es de ".$weapon->getHands()." manos.<br>";



    }

}