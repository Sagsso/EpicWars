<?php

// namespace entities\Managers;

class DamageManager{
        public static function die(Character $character) {
                echo $character->getName().' ha muerto.<br>';
        }
        
        public static function revive(Character $character) {
                echo $character->getName().' ha revivido. <br>';
                $character->setHealtPoints($character->getMaxHealtPoints()*0.1);
                echo 'HP:'.$character->getHealtPoints();
        }
        
        public static function attack() {

        }
        
        public static function takeDamage() {

        }
        
}
