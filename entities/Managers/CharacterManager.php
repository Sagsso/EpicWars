<?php

// namespace entities\Managers;


class CharacterManager{
    
    public static function create($name, $sex, $bodyType, $race, $playableClass){
        
        $classes = ['mago', 'picaro', 'guerrero'];
        $bodyTypes = ['Atlético', 'Delgado', 'Llenito de amor'];
        $sexos = ['Femenino', 'Masculino', 'Otro'];

        [$maxHealtPoints, $str,$intl,$agi,$pDef,$mDef] = $race::getStats();
        
        $xp = 1;
        // Al ser creado el personaje tiene tantos puntos de vida actuales
        // como el máximo que puede tener
        $healtPoints = $maxHealtPoints;
        $level = 1;
        
        $character = new Character($name, $sexos[$sex], $bodyTypes[$bodyType], $race, $classes[$playableClass], $str, $intl ,$agi ,$pDef ,
                $mDef ,$xp, $healtPoints,$maxHealtPoints, $level);
        
        GameAnnouncer::presentCharacter($character);
        return  $character;
    }


}
