<?php
//  include "interfaces/Managers/"

require './config.php';

// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
$human = CharacterManager::create("Gerald",1,1,Human::class,1);
$orc = CharacterManager::create("Garrosh",1,1,Orc::class,1);

$dwarf = CharacterManager::create("Tyrion",1,1,Dwarf::class,1);
$elf = CharacterManager::create("Dobby",1,1,Elf::class,1);


