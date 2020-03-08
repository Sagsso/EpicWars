<?php

class LevelManager {
    private static $baseExp = 100;
    private static $maxLevel = 100;
    private static $minLevel = 1;

    public static function levelUp(Character $character) {
            $character->setLevel($character->getLevel()+1);
            echo $character->getName()." subió al nivel ".$character->getLevel();
    }
    
    public static function getExpForLevel(Character $character) {
        if ($character->getXp() >= $this->baseExp * $character->getLevel()) {
            self::levelUp($character);
        }
    }
}
