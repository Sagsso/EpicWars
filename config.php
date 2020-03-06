<?php
define('INTERFACES',__DIR__.'/interfaces/');
define('ENTITIES',__DIR__.'/entities/');

define('TYPES2', ["Basico", "Picaro", "Guerrero", "Mago"]);
define('TYPES1', ["Fisico", "Magico"]);
define('TYPES', array(
    TYPES1[0] => [TYPES2[0], TYPES2[1], TYPES2[2]],
    TYPES1[1] => [TYPES2[0], TYPES2[3]],
));
define('CLASSES', ["Mago", "Picaro", "Guerrero"]);
define('SEX', ["Femenino", "Masculino", "Hermafrodita"]);
define('BODY_TYPES', ["Atletico", "Delgado", "Rellenito de amor"]);

define('BASE_HP',100);
define('BASE_STR',10);
define('BASE_INTL',10);
define('BASE_AGI',10);
define('BASE_PDEF',5);
define('BASE_MDEF',2);

require "./loader.php";
