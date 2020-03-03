<?php

// namespace entities;

class Weapon {
    private $name;
    private $damage;
    private $hands;

    public function __construct($name, $damage, $hands) {
        $this->name = $name;
        $this->damage = $damage;
        $this->hands = $hands;
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
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of damage
     */ 
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set the value of damage
     *
     * @return  self
     */ 
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get the value of hands
     */ 
    public function getHands()
    {
        return $this->hands;
    }

    /**
     * Set the value of hands
     *
     * @return  self
     */ 
    public function setHands($hands)
    {
        $this->hands = $hands;

        return $this;
    }
}
