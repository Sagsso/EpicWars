<?php

class GameAnnouncer {
    
    public static function presentCharacter(Character $character){ 
        echo $character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "Sex: ".$character->getSex()."</br>";
        echo "HP Max: ".$character->getMaxHealtPoints()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br>";
        echo "BodyType: ".$character->getBodyType()."</br>";
        echo "Class: ".$character->getClase()::getClaseName()."</br></br>";

    }
}
