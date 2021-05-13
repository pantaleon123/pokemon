<?php

Class Pokemon{
    private $name;
    private $health;
    private $mana;
    private $weakness;
    private $strength;
    private $tackle;
    private $skills;
    private $regenMP;
    private $regenHP;

    public function __construct($name, $health, $mana, $strength, $weakness, $tackle, $regenHP, $regenMP)
    {
        $this->name = $name;
        $this->health = $health;
        $this->mana = $mana;
        $this->strength = $strength;
        $this->weakness = $weakness;
        $this->tackle =  $tackle;
        $this->regenHP = $regenHP;
        $this->regenMP = $regenMP;
    }

    public function setSkills($skills){
        $this->skills = $skills;
    }

    public function getSkills(){
       return $this->skills;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setHealth($health){
        $this->health = $health;
    }

    public function getHealth(){
        return $this->health;
    }

    public function setMana($mana){
        $this->mana = $mana;
    }

    public function getMana(){
        return $this->mana;
    }

    public function setWeakness($weakness){
        $this->weakness = $weakness;
    }

    public function getWeakness(){
        return $this->weakness;
    }

    public function setStrength($strength){
        $this->strength = $strength;
    }

    public function getStrength(){
        return $this->strength;
    }

    public function setRegenMP($regenMP){
        $this->regenMP = $regenMP;
    }

    public function getRegenMP(){
        return $this->regenMP;
    }

    public function setTackle($tackle){
        $this->tackle = $tackle;
    }

    public function getTackle(){
        return $this->tackle;
    }

    public function setRegenHP($regenHP){
        $this->regenHP = $regenHP;
    }

    public function getRegenHP(){
        return $this->regenHP;
    }
}