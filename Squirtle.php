<?php

require_once "Pokemon.php";

class Squirtle extends Pokemon{
    
    public function __construct($name, $health, $mana, $strength, $weakness, $skill, $tackle, $regenHP, $regenMP)
    {
        parent::__construct($name, $health, $mana, $strength, $weakness, $tackle, $regenHP, $regenMP);
        $this->skill = $skill;
    }

    public function addSkill($skill){
        $this->skill = $skill;
    }

    public function getSqSkill(){
        return $this->skill;
    }
}