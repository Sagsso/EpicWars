<?php


class Skill {
    private $name;
    private $description;
    private $skillType;
    private $attackType;
    private $boost=[];

    public function __construct(string $name, string $description, string $skillType, string $attackType, array $boost)
    {
        $this->name = $name;
        $this->description = $description;
        $this->skillType = $skillType;
        $this->attackType = $attackType;
        $this->boost = $boost;
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
     * Get the value of skillType
     */ 
    public function getSkillType()
    {
        return $this->skillType;
    }

    /**
     * Set the value of skillType
     *
     * @return  self
     */ 
    public function setSkillType($skillType)
    {
        $this->skillType = $skillType;

        return $this;
    }

    /**
     * Get the value of attackType
     */ 
    public function getAttackType()
    {
        return $this->attackType;
    }

    /**
     * Set the value of attackType
     *
     * @return  self
     */ 
    public function setAttackType($attackType)
    {
        $this->attackType = $attackType;

        return $this;
    }

    /**
     * Get the value of boost
     */ 
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * Set the value of boost
     *
     * @return  self
     */ 
    public function setBoost($boost)
    {
        $this->boost = $boost;

        return $this;
    }
}
