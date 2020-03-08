<?php


interface ICanUse{

    public function allowedTypes(): Array;
    public function allowedWeapons(): Array;
    public function setAllowedTypes(array $types);
    public function setAllowedWeapons(array $weapons);

}
