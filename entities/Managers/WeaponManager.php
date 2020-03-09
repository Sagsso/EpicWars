<?php

class WeaponManager {

    public static function create(string $name,float $damage, int $hands) {
        if($hands == 1 || $hands == 2) {
            echo "Se ha creado el arma ".$name."<br>";
            return new Weapon($name, $damage, $hands);
        }
    }

    public static function assignWeapon(Weapon $weapon, Character $character) {

        $clase = $character->getClase();
        $weapons = $character->getWeapons();
        $weaponsSupport = $clase->allowedWeapons();

        if(in_array($weapon, $weaponsSupport)) {
            
            if($weapon->getHands()==1) {
                if ($weapons['r'] == null) {
                    $weapons['r'] = $weapon;       
                    echo "El arma " . $weapon->getName() . " ha sido asignada al jugador " . $character->getName() . " en la mano derecha.<br>";
                    $character->setWeapons($weapons);
                    return 0;
                }
                if ($weapons['l'] == null){
                    $weapons['l'] = $weapon;
                    echo "El arma " . $weapon->getName() . " ha sido asignada al jugador " . $character->getName() . " en la mano izquierda.<br>";
                    $character->setWeapons($weapons);
                    return 0;
                }
                echo "El jugador no puede tener más de dos armas.<br>";
                $character->setWeapons($weapons);
                return 0;
                
            } else {
                $weapons['rl'] = $weapon;
                $weapons['r'] = null;
                $weapons['l'] = null;
                echo "El arma de dos manos " . $weapon->getName() . " ha sido asignada al jugador " . $character->getName() . ".<br>";
                $character->setWeapons($weapons);
                return 0;
            }
            
            
        }else{
            echo "El jugador ".$character->getName()." no es apto para el arma ".$weapon->getName()." porque es de clase ".$clase::getClaseName()."<br>";
        }

    }

    public static function isAWeapon(array $weapons) {
        for ($i=0; $i < sizeof($weapons); $i++) { 
            if (get_class($weapons[$i])!=='Weapon') {
                echo $weapons[$i]." no es de tipo Weapon";
                return false;
            }
        }
        return true;
    }

}