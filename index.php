<?php

require './config.php';
// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
$human = \entities\Managers\CharacterManager::create("Gerald",1,1,\entities\Races\Human::class,1);
$orc = \entities\Managers\CharacterManager::create("Garrosh",1,1,\entities\Races\Orc::class,1);
