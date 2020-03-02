<?php
spl_autoload_register(function($class){
    if(file_exists("entities/".$class.".php")){
        include "entities/".$class.".php";
    }
    if(file_exists("interfaces/".$class.".php")){
        include "interfaces/".$class.".php";
    }

    if(file_exists("entities/Managers/".$class.".php")){
        include "entities/Managers/".$class.".php";
    }

    if(file_exists("entities/Races/".$class.".php")){
        include "entities/Races/".$class.".php";
    }

    if(file_exists("entities/Skills/".$class.".php")){
        include "entities/Skills/".$class.".php";
    }
 });
