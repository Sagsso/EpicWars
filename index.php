<?php

require './config.php';

//Creacion de los tipos

Type::getInstance()->addType('Fisico');
Type::getInstance()->addType('Magico');
Type::getInstance()->addSubType('Fisico','Basico');
Type::getInstance()->addSubType('Fisico','Picaro');
Type::getInstance()->addSubType('Fisico','Guerrero');
Type::getInstance()->addSubType('Magico','Basico');
Type::getInstance()->addSubType('Magico','Mago');

$types = Type::getInstance()->getTypes();
$subtypes;
for ($i=0; $i < sizeof($types); $i++) { 
    echo 'El tipo '.$types[$i].' tiene los siguientes subtipos: <br>';
    $subtypes = Type::getInstance()->getSubTypesOf($types[$i]);
    for ($j=0; $j < sizeof($subtypes); $j++) { 
        echo $subtypes[$j]."<br>";
    }
    
}

echo "<br>";

// Creamos los skills

$golpeConArma =  SkillManager::create('Golpe con Arma', 'Fisico', 'Basico', 'El personaje ataca inflingiendo 
el 100% del daño de arma si esta es de mano derecha o dos manos, pero de ser de mano izquierda inflingirá 70%', 
array(), array("rl" => 1,"r" => 1, "l"=>0.7));
$golpeTrampero =  SkillManager::create('Golpe Trampero', 'Fisico', 'Picaro', 'El personaje distrae a su oponente 
con un movimiento malintencionado asestando un golpe con arma que inflije 150% de daño con ambas armas', 
array(), array("rl" => 1.5,"r"=>1.5, "l"=>1.5));
$tajoMortal =  SkillManager::create('Tajo Mortal', 'Fisico', 'Guerrero', 'El personaje salta con intenciones 
despiadadas y raja a su enemigo inflingiendo 200% de daño con armas.', array(),
array("rl" => 2,"r" => 2, "l" => 2));
$meditacion =  SkillManager::create('Meditacion', 'Magico', 'Basico', 'El personaje medita un momento incrementando 
su agilidad e intelecto en 5%.', array("agi" => 1.05, "intl" => 1.05), array());
$calcinacion =  SkillManager::create('Calcinación', 'Magico', 'Mago', 'El personaje invoca el poder arcano y el elemento 
del fuego para quemar a su enemigo inflingiendo 40% de su intelecto como daño mágico.', array(), array("intl" => 0.4));

echo "<br>";

// Si el tipo o subtipo no existe, no se creará la skill

$tacticasCombate =  SkillManager::create('Tacticas de Combate', 'Fisico', 'Avanzado', 'El personaje repasa el campo de 
batalla preparando su siguiente golpe, esto incrementa su fuerza y agilidad en un 5%.', array("str"=>1.05, "agi"=>1.05), 
array());

//---

Type::getInstance()->addSubType('Fisico','Avanzado');
$tacticasCombate =  SkillManager::create('Tacticas de Combate', 'Fisico', 'Avanzado', 'El personaje repasa el campo de 
batalla preparando su siguiente golpe, esto incrementa su fuerza y agilidad en un 5%.', array("str"=>1.05, "agi"=>1.05), 
array());

echo "<br>";

//Creacion de armas

$baston = WeaponManager::create('Bastón de los reyes', 25, 2);
$hacha = WeaponManager::create('Hacha del Leñador Oscuro', 28, 2);
$daga1 = WeaponManager::create('God Rod', 14.5, 1);
$daga2 = WeaponManager::create('Daga de los bandidos', 17, 1);

echo "<br>";

//Asignamos las tipos y las armas que pueden aceptar cada clase

Mage::getInstance()->setAllowedTypes(array('Fisico'=>['Basico'], 'Magico'=>['Basico','Mago']));
Mage::getInstance()->setAllowedWeapons(array($baston));
Rogue::getInstance()->setAllowedTypes(array('Fisico'=>['Basico','Picaro'], 'Magico'=>['Basico']));
Rogue::getInstance()->setAllowedWeapons(array($daga1,$daga2));
Warrior::getInstance()->setAllowedTypes(array('Fisico'=>['Basico','Avanzado','Guerrero']));
Warrior::getInstance()->setAllowedWeapons(array($hacha));

echo "<br>";

//Creamos los personajes

$gerald = CharacterManager::create("Gerald",0,1,Human::class,Mage::getInstance());
$garrosh = CharacterManager::create("Garrosh",1,0,Orc::class,Rogue::getInstance());
$orc2 = CharacterManager::create("Thrum",1,0,Orc::class,Warrior::getInstance());
$tyrion = CharacterManager::create("Tyrion",2,2,Dwarf::class,Warrior::getInstance());
$dobby = CharacterManager::create("Dobby",1,1,Elf::class,Rogue::getInstance());

echo "<br>";

//Asignamos skills para los personajes

SkillManager::learnSkill($golpeTrampero, $garrosh);
SkillManager::learnSkill($golpeConArma, $garrosh);
SkillManager::learnSkill($golpeConArma, $gerald);
SkillManager::learnSkill($tajoMortal, $garrosh);
SkillManager::learnSkill($tajoMortal, $gerald);
SkillManager::learnSkill($tajoMortal, $tyrion);
SkillManager::learnSkill($golpeConArma, $tyrion);
SkillManager::learnSkill($calcinacion, $gerald);
SkillManager::learnSkill($meditacion, $gerald);

echo "<br>";

//Validamos que se puedan olvidar sólo si ya conocen la skill

SkillManager::forgetSkill($tacticasCombate, $gerald);

//Asignamos armas a los personajes

WeaponManager::assignWeapon($baston, $garrosh);
WeaponManager::assignWeapon($baston, $gerald);
WeaponManager::assignWeapon($daga1, $garrosh);
WeaponManager::assignWeapon($daga2, $garrosh);
WeaponManager::assignWeapon($hacha, $tyrion);

//Validamos que solo se pueden asignar armas dependiendo de la clase

WeaponManager::assignWeapon($hacha, $garrosh);

//Ataques
DamageManager::attack($garrosh, $golpeConArma, $gerald);
DamageManager::attack($gerald, $golpeConArma, $garrosh);
DamageManager::attack($gerald, $tajoMortal, $garrosh);
DamageManager::attack($garrosh, $tajoMortal, $gerald);
DamageManager::attack($tyrion, $tajoMortal, $gerald);
DamageManager::attack($tyrion, $golpeConArma, $gerald);
DamageManager::attack($tyrion, $tajoMortal, $garrosh);

//Buffos
DamageManager::buff($gerald, $meditacion);
DamageManager::buff($gerald, $meditacion);

DamageManager::attack($tyrion, $golpeConArma, $garrosh);


