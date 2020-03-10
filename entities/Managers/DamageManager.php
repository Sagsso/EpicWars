<?php

class DamageManager{
        public static function die(Character $character) {
                echo $character->getName().' ha muerto.<br>';
        }
        
        public static function revive(Character $character) {
                echo $character->getName().' ha revivido. <br>';
                $character->setHealtPoints($character->getMaxHealtPoints()*0.1);
                echo 'HP:'.$character->getHealtPoints();
        }

        public static function buff(Character $character, Skill $skill) {

                $actualStats = CharacterManager::getStatsArray($character);
                $newStats = [];

                $characterSkills = $character->getSkills();
                $skillBoost = $skill->getBoost();


                if (in_array($skill, $characterSkills)) {
                        foreach ($skillBoost as $key => $value) {
                                $newStats[$key] = $actualStats[$key]*$value;
                        }
                }

                CharacterManager::setStats($newStats, $character);

                        
        }
        
        public static function attack(Character $owner,Skill $skill, Character $victim) {
                
                $finalDamage = 0;
                $statsToAttack = CharacterManager::getStatsToAttack($owner);
                $statsSkill = array_keys($skill->getDmg());
                //añadimos los daños de Weapons al $statsToAttack
                $characterSkills = $owner->getSkills();

                if(in_array($skill, $characterSkills)) {
                        foreach ($statsToAttack as $key => $value) {
                                if(in_array($key, $statsSkill)) {
                                        $finalDamage += $value*$skill->getDmg()[$key];
                                }
                        }
                } else {
                        echo $owner->getName()." no tiene la skill que desea utilizar.<br>";
                        return 0;
                }

                if($finalDamage != 0) {
                        //Cálculo del daño final y el incremento del daño crítico según el tipo de skill.
                        $toAttack = self::boostPerType($finalDamage, $skill, $owner);

                        $probability = mt_rand(1, 100);
                        if ($probability <= $toAttack['criticalImpact'] * 100) {
                                $finalDamage = $toAttack['finalDamage'] * 1.5;
                                // echo "Probabilidad caída ".$probability. " - CriticalProbability: " . $toAttack['criticalImpact']."<br>";
                                echo $owner->getName() . " ataca con daño crítico a: " . $victim->getName() . "<br>";
                                self::takeDamage($finalDamage, $skill->getType(), $victim, $owner);
                        } else {
                                $finalDamage = $toAttack['finalDamage'];
                                // echo "Probabilidad caída " . $probability . " - CriticalProbability: " . $toAttack['criticalImpact'] . "<br>";
                                echo $owner->getName() . " ataca a: " . $victim->getName() . "<br>";
                                self::takeDamage($finalDamage, $skill->getType(), $victim, $owner);
                        }
                }
                echo "<br>";
        }
        
        public static function takeDamage(float $damage, string $type, Character $victim, Character $owner) {
                //$damage es el daño total sin defensa aplicada
                if($type == 'Fisico') {
                        $finalDamage = $damage - ($damage*0.01)*($victim->getPDef()/10);
                } else if ('Magico') {
                        $finalDamage = $damage - ($damage * 0.01) * ($victim->getMDef()/10);
                }
                
                //Daño total con defensa aplicada
                $finalDamage = round($finalDamage,1, PHP_ROUND_HALF_UP);


                $victim->setHealtPoints($victim->getHealtPoints()-$finalDamage);
                echo $victim->getName()." ha perdido ".$finalDamage." HP.<br>";
                echo $victim->getName()." ahora tiene ".$victim->getHealtPoints()." HP.<br>";
                if($victim->getHealtPoints()==0) {
                        self::die($victim);
                        LevelManager::addExp($owner);
                }
        }

        private function boostPerType (float $finalDamage, Skill $skill, Character $character) {
                $criticalImpact = 0.05;
                
                if($skill->getType() == 'Fisico') {

                        $finalDamage = $finalDamage + ($finalDamage * 0.02)*($character->getStr()/10);
                        $criticalImpact = $criticalImpact + ($criticalImpact * 0.01)*($character->getAgi()/10);

                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);

                } else if ($skill->getType() == 'Magico') {
                        $finalDamage = $finalDamage + ($finalDamage * 0.02) * ($character->getIntl() / 10);
                        $criticalImpact = $criticalImpact + ($criticalImpact * 0.01) * ($character->getAgi() / 10);

                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);

                }
        }
        
}
