<?php

// namespace entities\Managers;

class SkillManager {

    public static function create($name, $description, $skillType, $attackType, $boost) {

        $ataquesFisicos = ['basico', 'picaro', 'guerrero', 'avanzado'];
        $ataquesMagicos = ['basico', 'mago'];

        $attackTypes = array('fisico'=>$ataquesFisicos, 'magico'=>$ataquesMagicos);

        // if(in_array($skillType, $ataquesFisicos) || in_array($skillType, $ataquesMagicos) ) {
            foreach ($attackTypes[$skillType] as $supportAttack) {
                if ($supportAttack == $attackType) {
                    echo "Skill " . $name . " ha sido creada.<br>";
                    return new Skill($name, $description, $skillType, $attackType, $boost);
                }
            }
            echo "El tipo de skill no es compatible con el tipo de ataque<br>";
        // } else {
        //     echo "El tipo de skill que quiere crear aún no es soportado por el juego.";
        //     return 0;
        // }
    }

    public static function learnSkill(Skill $skill, Character $character){
        if(self::canLearn($skill, $character)) {
            echo $character->getName() . " ha APRENDIDO la skill " . $skill->getName() . "<br>";
            $character->setSkills($skill);
        }

        echo "<br>Las skills de ".$character->getName()." son:<br> ";
        foreach ($character->getSkills() as $skillsita) {
            echo $skillsita->getName()."<br>";
        }
        echo "<br>";
    }
     public static function forgetSkill(Skill $skill, Character $character){

        foreach ($character->getSkills() as $skillsita) {
            if($skillsita->getName() == $skill->getName()) {
                $character->deleteSkill($skill);
                echo $character->getName() . " ha OLVIDADO la skill " . $skill->getName() . "<br>";
                echo "<br>Las skills de " . $character->getName() . " son:<br> ";
                foreach ($character->getSkills() as $skillsita) {
                    echo $skillsita->getName()."<br>";
                }
                echo "<br>";

                return 0;
            }
        }

        echo $character->getName()." no conoce la skill ".$skill->getName(). ", así que no puede olvidarla. Como tú a ella 😌 <br>";

    }

    private function canLearn(Skill $skill, Character $character) {

        $skills = array("picaro" => ['fisico', 'magico'], "mago" => ['fisico', 'magico'], "guerrero" => ['fisico']);

        $ataques = array("picaro" => ['basico','picaro'], "mago" => ['basico', 'mago'], "guerrero" => ['basico', 'avanzado', 'guerrero']);


        foreach ($ataques[$character->getPlayableClass()] as $attack) {
            if ($attack == $skill->getAttackType()) {
                foreach ($skills[$character->getPlayableClass()] as $sSkill) {
                    if ($sSkill == $skill->getSkillType()) {
                        echo $character->getName()." puede aprender la skill ".$skill->getName()." porque su clase es ".$character->getPlayableClass()."<br>";
                        return true;
                    }
                }
            }
        }

        echo $character->getName() . " NO puede aprender la skill ".$skill->getName()." porque su clase es " . $character->getPlayableClass()."<br>";
        return false;
    }
}
