<?php
spl_autoload_register(function($class){
    if(file_exists('interfaces/'.$class.".php")){
        require_once 'interfaces/'.$class.".php";
        return 0;
    }
    if(file_exists('entities/'.$class.".php")){
        require_once 'entities/'.$class.".php";
        return 0;
    }
    if(file_exists('entities/Managers/'.$class.".php")){
        require_once 'entities/Managers/'.$class.".php";
        return 0;
    }
    if(file_exists('entities/Races/'.$class.".php")){
        require_once 'entities/Races/'.$class.".php";
        return 0;
    }
    if(file_exists('entities/Skills/'.$class.".php")){
        require_once 'entities/Skills/'.$class.".php";
        return 0;
    }
    if(file_exists('entities/Classes/'.$class.".php")){
        require_once 'entities/Classes/'.$class.".php";
        return 0;
    }
 });
