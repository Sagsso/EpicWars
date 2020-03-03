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
                
                $finalDamage = 0;
                $boostStats = [];
                $numberOfWeapons = sizeof($owner->getWeapons());
                $characterSkills = $owner->getSkills();

                if(in_array($skill,$characterSkills)){
                        echo "Tiene la skill.<br>";

                        $newBoostKeys = array_keys($skill->getBoost());
                        
                        foreach ($newBoostKeys as $key) {

                                switch ($key) {
                                        case 'dmgWR':
                                                if ($numberOfWeapons == 1) {
                                                        $i = 0;
                                                } else {
                                                        $i = 'r';
                                                }
                                                $finalDamage += $owner->getWeapons()[$i]->getDamage() * $skill->getBoost()["dmgWR"];
                                                break;
                                        case 'dmgWL':
                                                if ($numberOfWeapons == 2) {
                                                        if ($owner->getWeapons()['l']) {
                                                                $finalDamage += $owner->getWeapons()['l']->getDamage() * $skill->getBoost()["dmgWL"];
                                                        }
                                                }
                                                break;
                                        
                                        default:
                                                
                                                break;
                                }

                        }
                        if($finalDamage != 0) {
                                $toAttack = self::boostPerType($finalDamage,$skill,$owner);

                                $probability = mt_rand(1, 100);
                                if($probability <= $toAttack['criticalImpact']*100){
                                        $finalDamage = $toAttack['finalDamage']*1.5;
                                        echo "Probabilidad caída ".$probability. " - CriticalProbability: " . $toAttack['criticalImpact']."<br>";
                                        echo "Daño crítico: ".$finalDamage."<br>";
                                } else {
                                        echo "Probabilidad caída " . $probability . " - CriticalProbability: " . $toAttack['criticalImpact'] . "<br>";
                                        $finalDamage = $toAttack['finalDamage'];
                                        echo "Daño: " . $finalDamage."<br>";
                                }

                        } else {

                        }

                } else {
                        echo "No tiene la skill";
                }
        }
        
        public static function takeDamage() {

        }

        private function boostPerType (float $finalDamage, Skill $skill, Character $character) {
                $criticalImpact = 0.05;
                
                if($skill->getSkillType() == 'fisico') {

                        $boostStr = ($character->getStr()/10)*1.02;
                        $finalDamage += $boostStr;

                        $boostAgi = ($character->getAgi()/10)*0.01;
                        $criticalImpact += $boostAgi;
                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);
                } else if ($skill->getSkillType() == 'magico') {

                        $boostIntl = ($character->getIntl() / 10) * 1.02;
                        $finalDamage += $boostIntl;

                        $boostAgi = ($character->getAgi() / 10) * 1.01;
                        $criticalImpact += $boostAgi;
                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);
                }
        }
        
}
