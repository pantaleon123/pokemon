<?php

require_once "Pokemon.php";

class Bulbasaur extends Pokemon{
    
    public function __construct($name, $health, $mana, $strength, $weakness, $skill, $tackle, $regenHP, $regenMP)
    {
        parent::__construct($name, $health, $mana, $strength, $weakness, $tackle, $regenHP, $regenMP);
        $this->skill = $skill;
    }

    public function addSkill($skill){
        $this->skill = $skill;
    }

    public function getBsSkill(){
        return $this->skill;
    }
}