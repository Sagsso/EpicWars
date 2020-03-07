<?php

class SkillManager {

    public static function create(String $name, String $type, String $subtype, String $description, array $boost, array $dmg)
    {
        $validation = Type::getInstance()->getSubTypesOf($type);
        if (!$validation) {
            echo "El tipo " . $type . " no existe <br>";
            return null;
        } else {
            for ($i = 0; $i < sizeof($validation); $i++) {
                if ($validation[$i] == $subtype) {
                    echo "Se ha creado la skill " . $name . "<br>";
                    $skill = new Skill($name, $type, $subtype, $description, $boost, $dmg);
                    return  $skill;
                }
            }
            echo "No se ha podido crear la skill " . $name . "<br>";
            echo "El subtipo " . $subtype . " no es valido <br>";
            return null;
        }
    }
    public static function canLearn(String $playableClass, Skill $skill)
    {
        //Por defecto, designar esta acción a otra función que pueda editar las reestricciones
        $Capacities_Types = array(
            CLASSES[0] => [TYPES1[0], TYPES1[1]],
            CLASSES[1] => [TYPES1[0], TYPES1[1]],
            CLASSES[2] => [TYPES1[0]]
        );
        $Capacities_SubTypes = array(
            CLASSES[0] => [TYPES2[0], TYPES2[3]],
            CLASSES[1] => [TYPES2[0], TYPES2[1]],
            CLASSES[2] => [TYPES2[0], TYPES2[2]]
        );

        $type1 = $skill->getType();
        $type2 = $skill->getSubType();

        // Coincidencia de tipo 1
        for ($j = 0; $j < sizeof($Capacities_Types[$playableClass]); $j++) {
            if ($Capacities_Types[$playableClass][$j] == $type1) {
                for ($k = 0; $k < sizeof($Capacities_SubTypes[$playableClass]); $k++) {
                    if ($Capacities_SubTypes[$playableClass][$k] == $type2) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
    public static function learnSkill(Skill $skill, Character $character)
    {
        if (self::canLearn($character->getPlayableClass(), $skill)) {
            $character->setSkills($skill);
            echo "El personaje " . $character->getName() . " aprendió la skill " . $skill->getName() . " <br>";
        } else {
            echo "El personaje " . $character->getName() . " NO puede aprender la skill " . $skill->getName() . " porque es de clase " . $character->getPlayableClass() . " <br>";
        }
    }
    public static function forgetSkill(Skill $skill, Character $character)
    {
        if ($character->removeSkills($skill->getName())) {
            echo "El personaje " . $character->getName() . " ha olvidado la skill " . $skill->getName() . " <br>";
        } else {
            echo "El personaje " . $character->getName() . " no tiene la skill " . $skill->getName() . " <br>";
        }
    }
}
