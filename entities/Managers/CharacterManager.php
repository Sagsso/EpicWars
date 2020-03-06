<?php

// namespace entities\Managers;


class CharacterManager{

    public static function create($name, $sex, $bodyType, $race, $playableClass){

        [$maxHealtPoints, $str, $intl, $agi, $pDef, $mDef] = $race::getStats();
        $xp = 1;
        $healtPoints = $maxHealtPoints;
        $level = 1;
        $character = new Character(
            $name,
            SEX[$sex],
            BODY_TYPES[$bodyType],
            $race,
            CLASSES[$playableClass],
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
            "str" => $character->getStr(),
            "hp" => $character->getHealtPoints()
        );
    }


}
