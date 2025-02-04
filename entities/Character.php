<?php

class Character {
    private $name = "";
    private $sex;
    private $bodyType;
    private $healtPoints;
    private $maxHealtPoints;
    private $level;
    private $str;
    private $intl;
    private $agi;
    private $pDef;
    private $mDef;
    private $xp;
    private $race;
    private $clase;
    private $skills=[];
    private $weapons=["r" => null, "l" => null];

    public function __construct( $name, $sex, $bodyType, $race, $clase, $str, $intl ,$agi ,$pDef ,$mDef ,$xp, $healtPoints,$maxHealtPoints, $level){
        $this->name = $name;
        $this->sex = $sex;
        $this->bodyType = $bodyType;
        $this->healtPoints = $healtPoints;
        $this->maxHealtPoints = $maxHealtPoints;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->pDef = $pDef;
        $this->mDef = $mDef;
        $this->xp = $xp;
        $this->race = $race;
        $this->clase = $clase;
    }
    
    /**
     * Get the value of name
     */ 
    public function getName(){
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name){
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex(){
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex){
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of bodyType
     */ 
    public function getBodyType(){
        return $this->bodyType;
    }

    /**
     * Set the value of bodyType
     *
     * @return  self
     */ 
    public function setBodyType($bodyType){
        $this->bodyType = $bodyType;

        return $this;
    }

    /**
     * Get the value of healtPoints
     */ 
    public function getHealtPoints(){
        return $this->healtPoints;
    }

    /**
     * Set the value of healtPoints
     *
     * @return  self
     */ 
    public function setHealtPoints(float $healtPoints){
        if($healtPoints <= 0) {
            $this->healtPoints =0;
        } else {
            $this->healtPoints = round($healtPoints,1, PHP_ROUND_HALF_UP);
        }

        return $this;
    }

    /**
     * Get the value of maxHealtPoints
     */ 
    public function getMaxHealtPoints(){
        return $this->maxHealtPoints;
    }

    /**
     * Set the value of maxHealtPoints
     *
     * @return  self
     */ 
    public function setMaxHealtPoints($maxHealtPoints){
        $this->maxHealtPoints = $maxHealtPoints;

        return $this;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel(){
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */ 
    public function setLevel($level){
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of str
     */ 
    public function getStr(){
        return $this->str;
    }

    /**
     * Set the value of str
     *
     * @return  self
     */ 
    public function setStr($str){
        $this->str = $str;

        return $this;
    }

    /**
     * Get the value of intl
     */ 
    public function getIntl(){
        return $this->intl;
    }

    /**
     * Set the value of intl
     *
     * @return  self
     */ 
    public function setIntl($intl){
        $this->intl = $intl;

        return $this;
    }

    /**
     * Get the value of agi
     */ 
    public function getAgi(){
        return $this->agi;
    }

    /**
     * Set the value of agi
     *
     * @return  self
     */ 
    public function setAgi($agi){
        $this->agi = $agi;

        return $this;
    }

    /**
     * Get the value of pDef
     */ 
    public function getPDef(){
        return $this->pDef;
    }

    /**
     * Set the value of pDef
     *
     * @return  self
     */ 
    public function setPDef($pDef){
        $this->pDef = $pDef;

        return $this;
    }

    /**
     * Get the value of mDef
     */ 
    public function getMDef(){
        return $this->mDef;
    }

    /**
     * Set the value of mDef
     *
     * @return  self
     */ 
    public function setMDef($mDef){
        $this->mDef = $mDef;

        return $this;
    }

    /**
     * Get the value of xp
     */ 
    public function getXp(){
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @return  self
     */ 
    public function setXp($xp){
        $this->xp = $xp;
        return $this;
    }

    /**
     * Get the value of race
     */ 
    public function getRace(){
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */ 
    public function setRace($race){
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of clase
     */ 
    public function getClase(){
        return $this->clase;
    }

    /**
     * Set the value of clase
     *
     * @return  self
     */ 
    public function setClase($clase){
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get the value of skills
     */ 
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set the value of skills
     *
     * @return  self
     */ 
    public function addSkills($skills)
    {
        array_push($this->skills, $skills);

        return $this;
    }

    public function removeSkills(int $index)
    {
        array_splice($this->skills, $index, 1);
    }

    /**
     * Get the value of weapons
     */ 
    public function getWeapons()
    {
        return $this->weapons;
    }

    /**
     * Set the value of weapons & return info.
     *
     * @return  self
     */ 
    public function setWeapons($weapon)
    {
            $this->weapons = $weapon;
    }
}
