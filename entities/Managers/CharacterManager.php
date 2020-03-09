<?php

class CharacterManager{

    public static function create($name, $sex, $bodyType, $race, $clase){

        [$maxHealtPoints, $str, $intl, $agi, $pDef, $mDef] = $race::getStats();
        $xp = 1;
        $healtPoints = $maxHealtPoints;
        $level = 1;
        $character = new Character(
            $name,
            SEX[$sex],
            BODY_TYPES[$bodyType],
            $race,
            $clase,
            $str,
            $intl,
            $agi,
            $pDef,
            $mDef,
            $xp,
            $healtPoints,
            $maxHealtPoints,
            $level
        );

        GameAnnouncer::presentCharacter($character);
        return  $character;
    }

    public static function getStatsArray(Character $character) {
        return array(
            "intl" => $character->getIntl(),
            "agi" => $character->getAgi(),
            "str" => $character->getStr()
            // "hp" => $character->getHealtPoints()
        );
    }

    public static function getStatsToAttack(Character $character) {

        $statsToAttack = array(
            "intl" => $character->getIntl(),
            "agi" => $character->getAgi(),
            "str" => $character->getStr(),
        );
        foreach ($character->getWeapons() as $key => $value) {
            if($value) {
                $statsToAttack[$key] = $value->getDamage();
            }
        }

        return $statsToAttack;
    }
    public static function setStats(Array $stats, Character $character) {
        foreach ($stats as $key => $value) {
                    switch ($key) {
                        case 'intl':
                            $character->setIntl(round($value, PHP_ROUND_HALF_UP));
                            echo "La INTL de " . $character->getName() . " ahora es: " . $character->getIntl() . "<br>";
                            break;
                        case 'agi':
                            $character->setAgi(round($value, PHP_ROUND_HALF_UP));
                            echo "La AGI de " . $character->getName() . " ahora es: " . $character->getAgi() . "<br>";
                            break;
                        case 'str':
                            $character->setStr(round($value, PHP_ROUND_HALF_UP));
                            echo "La STR de " . $character->getName() . " ahora es: " . $character->getAgi() . "<br>";
                            break;

                        default:
                            # code...
                            break;
                    }
        }
                
    }


}
