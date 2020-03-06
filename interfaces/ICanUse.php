<?php


interface ICanUse{

    public function allowedTypes(): Array;
    public function allowedSubTypes(): Array;
    public function allowedWeapons(): Array;

}