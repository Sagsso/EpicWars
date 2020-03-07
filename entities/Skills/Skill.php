<?php

class Skill
{
    private $name;
    private $description;
    private $type;
    private $subType;
    private $boost = [];
    private $dmg = [];

    public function __construct($name, String $type, String $subType, String $description, array $boost, array $dmg)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->subType = $subType;
        $this->boost = $boost;
        $this->dmg = $dmg;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
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
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of subtype
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Set the value of subtype
     *
     * @return  self
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get the value of getBoost
     */
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * Set the value of setBoost
     *
     * @return  self
     */
    public function setBoost(array $boost)
    {
        $this->boost = $boost;
    }

    /**
     * Get the value of getDmg
     */
    public function getDmg()
    {
        return $this->dmg;
    }

    /**
     * Set the value of setDmg
     *
     * @return  self
     */
    public function setDmg(array $dmg)
    {
        $this->dmg = $dmg;
    }
}
