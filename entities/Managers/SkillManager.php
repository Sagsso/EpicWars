<?php

class SkillManager {

    public static function create(String $name, String $type, String $subtype, String $description, array $boost, array $dmg)
    {
        $types = array($type=>[$subtype]);
        if (self::typesExists($types)) {
            echo "Se ha creado la skill " . $name . "<br>";
            $skill = new Skill($name, $type, $subtype, $description, $boost, $dmg);
            return  $skill;
        }else{
            echo "No se ha podido crear la skill " . $name . "<br>";
            return null;
        }
    }

    public static function typesExists(array $types)
    {
        $keys = array_keys($types);
        foreach ($keys as $type) {
            $validation = Type::getInstance()->getSubTypesOf($type);
            if (!$validation) {
                echo "El tipo " . $type . " no existe <br>";
                return false;
            } else {
                $subtype = $types[$type];
                for ($i = 0; $i < sizeof($subtype); $i++) {
                    if (!in_array($subtype[$i],$validation)) {
                        echo "El subtipo " . $subtype[$i] . " no es valido <br>";
                        return  false;
                    }
                }
            }
        }
        return true;
    }

    public static function canLearn(Clase $clase, Skill $skill)
    {
        $typesSupport = $clase->allowedTypes();
        $type = $skill->getType();
        $subtype = $skill->getSubType();

        $keys = array_keys($typesSupport);
        if (!in_array($type, $keys)) {
            echo "La clase " . $clase::getClaseName() . " no soporta el tipo".$type." <br>";
            return false;
        } else {
            if (!in_array($subtype,$typesSupport[$type])) {
                echo "La clase " . $clase::getClaseName() . " no soporta el subtipo".$subtype." <br>";
                return  false;
            }
        }
        return true;
    }

    public static function learnSkill(Skill $skill, Character $character)
    {
        if (self::canLearn($character->getClase(), $skill)) {
            $character->addSkills($skill);
            echo "El personaje " . $character->getName() . " aprendió la skill " . $skill->getName() . " <br>";
        } else {
            echo "El personaje " . $character->getName() . " NO puede aprender la skill " . $skill->getName() . " porque es de clase " . $character->getclase() . " <br>";
        }
    }

    public static function forgetSkill(Skill $skill, Character $character)
    {
        $characterSkills = $character->getSkills();

        for ($i = 0; $i < sizeof($characterSkills); $i++) {
            if (($characterSkills[$i]->getName()) == $skill->getName()) {
                $character->removeSkills($i);
                echo "El personaje ".$character->getName()." ha olvidado la skill ".$skill->getName()."<br>";
                return 0;
            }
        }
        echo "El personaje ".$character->getName()." no puede olvidar la skill ".$skill->getName()." porque no la posee e-e grr<br>";
    }
}
