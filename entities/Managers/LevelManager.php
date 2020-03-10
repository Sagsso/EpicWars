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
        if ($character->getXp() >= self::$baseExp * $character->getLevel()) {
            self::levelUp($character);
        }
    }
    public static function addExp(Character $character) {
        $character->setXp($character->getXp() + 25);
        echo $character->getName() . " aumenta 25 puntos de experiencia.<br>";
        LevelManager::getExpForLevel($character);
    }
}
