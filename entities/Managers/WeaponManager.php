<?php

class WeaponManager {

    public static function create(string $name,float $damage, int $hands) {
        if($hands == 1 || $hands == 2) {
            echo "Se ha creado el arma ".$name."<br>";
            return new Weapon($name, $damage, $hands);
        }
    }

    public static function assignWeapon(Weapon $weapon, Character $character) {

        $support1Weapon = ['picaro', 'mago', 'guerrero'];
        $support2Weapons = ['mago', 'guerrero'];

        $weaponsSupport = array('1' => $support1Weapon, '2' => $support2Weapons );
    
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