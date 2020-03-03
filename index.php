<?php
//  include "interfaces/Managers/"

require './config.php';

// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
//$classes = ['mago', 'picaro', 'guerrero'];
$human = CharacterManager::create("Gerald",0,1,Human::class,0);
$orc = CharacterManager::create("Garrosh",1,0,Orc::class,1);

$dwarf = CharacterManager::create("Tyrion",2,2,Dwarf::class,2);
$elf = CharacterManager::create("Dobby",1,1,Elf::class,1);

// $ataques = array("picaro" => ['picaro'], "mago" => ['basico', 'mago']);


// DamageManager::die($human);
// DamageManager::revive($human);


$golpeConArma =  SkillManager::create('Golpe con Arma', 'El personaje ataca inflingiendo el 100% del daño de arma si esta es de mano derecha o dos manos, pero de ser de mano izquierda inflingirá 70%', 'fisico','basico', array("dmgWR" => 1, "dmgWL"=>0.7));

$golpeTrampero =  SkillManager::create('Golpe Trampero', 'El personaje distrae a su oponente con un movimiento malintencionado asestando un golpe con arma que inflije 150% de daño con ambas armas', 'fisico','picaro', array("dmgWR"=>1.5, "dmgWL"=>1.5));

$tajoMortal =  SkillManager::create('Tajo Mortal', 'El personaje salta con intenciones despiadadas y raja a su enemigo inflingiendo 200% de daño con armas.', 'fisico','guerrero', array("dmgWR" => 2, "dmgWL" => 2));

$meditacion =  SkillManager::create('Meditacion', 'El personaje medita un momento incrementando su agilidad e intelecto en 5%.', 'magico','basico', array("agi" => 1.5, "intl" => 1.5));

$calcinacion =  SkillManager::create('Calcinación', 'El personaje invoca el poder arcano y el elemento del fuego para quemar a su enemigo inflingiendo 40% de su intelecto como daño mágico.', 'magico','mago', array("intl" => 0.4,));

$tacticasCombate =  SkillManager::create('Tacticas de Combate', 'El personaje repasa el campo de batalla preparando su siguiente golpe, esto incrementa su fuerza y agilidad en un 5%.', 'fisico','avanzado', array("str"=>1.5, "agi"=>1.5));


// SkillManager::learnSkill($calcinacion, $human);
SkillManager::learnSkill($golpeTrampero, $orc);
SkillManager::learnSkill($golpeConArma, $orc);
SkillManager::learnSkill($golpeConArma, $human);
// SkillManager::learnSkill($golpeConArma, $human);

$baston = WeaponManager::create('Bastón de los reyes', 25, 2);
$hacha = WeaponManager::create('Hacha del Leñador Oscuro', 28, 2);
$daga1 = WeaponManager::create('God Rod', 14.5, 1);
$daga2 = WeaponManager::create('Daga de los bandidos', 17, 1);

WeaponManager::assignWeapon($baston, $orc);
WeaponManager::assignWeapon($baston, $human);
WeaponManager::assignWeapon($daga1, $orc);
WeaponManager::assignWeapon($daga2, $orc);

echo $orc->getSkills()[0]->getName()."<br>";
// echo $human->getSkills()[1]->getName()."<br>";

echo $orc->getWeapons()['r']->getName()."<br>";
echo $orc->getWeapons()['l']->getName()."<br>";

DamageManager::attack($orc, $golpeConArma, $human);
DamageManager::attack($orc, $golpeTrampero, $human);
DamageManager::attack($human, $golpeConArma, $orc);
// SkillManager::canLearn($mySkill, $orc);
