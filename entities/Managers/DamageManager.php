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
                        // echo "Tiene la skill.<br>";

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
                                        case 'intl':
                                                if(in_array('atck', $newBoostKeys)) {
                                                        $finalDamage = $owner->getIntl()*0.4;
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
                                        // echo "Probabilidad caída ".$probability. " - CriticalProbability: " . $toAttack['criticalImpact']."<br>";
                                        echo $owner->getName()." ataca con daño crítico a: ".$victim->getName()."<br>";
                                        self::takeDamage($finalDamage,$skill->getSkillType(), $victim);
                                } else {
                                        $finalDamage = $toAttack['finalDamage'];
                                        // echo "Probabilidad caída " . $probability . " - CriticalProbability: " . $toAttack['criticalImpact'] . "<br>";
                                        echo $owner->getName()." ataca a: ".$victim->getName()."<br>";
                                        self::takeDamage($finalDamage, $skill->getSkillType(), $victim);
                                }

                        } else {
                                foreach ($newBoostKeys as $key) {
                                        switch ($key) {
                                                case 'intl':
                                                        $owner->setIntl($owner->getIntl()*$skill->getBoost()[$key]);
                                                        echo "La INTL de ".$owner->getName()." ahora es: ".$owner->getIntl()."<br>";
                                                        break;
                                                case 'agi':
                                                        $owner->setAgi($owner->getIntl() * $skill->getBoost()[$key]);
                                                        echo "La AGI de ".$owner->getName()." ahora es: ".$owner->getAgi()."<br>";
                                                        break;
                                                case 'str':
                                                        $owner->setStr($owner->getIntl() * $skill->getBoost()[$key]);
                                                        echo "La STR de " . $owner->getName() . " ahora es: " . $owner->getAgi() . "<br>";
                                                        break;
                                                
                                                default:
                                                        # code...
                                                        break;
                                        }
                                }
                        }

                } else {
                        echo $owner->getName()."no tiene la skill que desea utilizar.<br>";
                }
                echo "<br>";
        }
        
        public static function takeDamage(float $damage, string $type, Character $victim) {
                if($type == 'fisico') {
                        $finalDamage = $damage - ($damage*0.01)*($victim->getPDef()/10);
                } else if ('magico') {
                        $finalDamage = $damage - ($damage * 0.01) * ($victim->getMDef()/10);
                }

                $finalDamage = round($finalDamage,1, PHP_ROUND_HALF_UP);

                $victim->setHealtPoints($victim->getHealtPoints()-$finalDamage);
                echo $victim->getName()." ha perdido ".$finalDamage." HP.<br>";
                echo $victim->getName()." ahora tiene ".$victim->getHealtPoints()." HP.<br>";
                if($victim->getHealtPoints()<=0) {
                        self::die($victim);
                }
        }

        private function boostPerType (float $finalDamage, Skill $skill, Character $character) {
                $criticalImpact = 0.05;
                
                if($skill->getSkillType() == 'fisico') {

                        $finalDamage = $finalDamage + ($finalDamage * 0.02)*($character->getStr()/10);
                        $criticalImpact = $criticalImpact + ($criticalImpact * 0.01)*($character->getAgi()/10);

                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);

                } else if ($skill->getSkillType() == 'magico') {
                        $finalDamage = $finalDamage + ($finalDamage * 0.02) * ($character->getIntl() / 10);
                        $criticalImpact = $criticalImpact + ($criticalImpact * 0.01) * ($character->getAgi() / 10);

                        return array('finalDamage' => $finalDamage, 'criticalImpact' => $criticalImpact);

                }
        }
        
}
