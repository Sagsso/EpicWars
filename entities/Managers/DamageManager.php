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
        
        public static function attack(Character $owner,Skill $skill, Character $victim) {
      

                $characterSkills = $owner->getSkills();

                if(in_array($skill,$characterSkills)){
                        echo "Tiene la skill";
                        $damageWeapon = $owner->getWeapons()[0]->getDamage() * $skill->getBoost()["damageWeapon"];
                        $damageWeapon = $damageWeapon + ($owner->getWeapons()[1]->getDamage() * $skill->getBoost()["damageWeapon"]);

                        echo "Damage Weapon: " . $damageWeapon . "<br>";
                } else {
                        echo "No tiene la skill";
                }
        }
        
        public static function takeDamage() {

        }
        
}
