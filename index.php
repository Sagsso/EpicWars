<?php
//  include "interfaces/Managers/"

require './config.php';

// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
$human = CharacterManager::create("Gerald",0,1,Human::class,0);
$orc = CharacterManager::create("Garrosh",1,0,Orc::class,1);

$dwarf = CharacterManager::create("Tyrion",2,2,Dwarf::class,2);
$elf = CharacterManager::create("Dobby",1,1,Elf::class,1);


DamageManager::die($human);
DamageManager::revive($human);



