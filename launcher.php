<?php
require_once 'init.php';

if (!isset($_SESSION['playerPokemon'])) {
    $sq = new Squirtle("Squirtle", 20, 10, "Charmander", "Bulbasaur", "Water Gun", 4, 3, 3);
    $ch = new Charmander("Charmander", 20, 10, "Bulbasaur", "Squirtle", "Ember", 4, 3, 3);
    $bs = new Bulbasaur("Bulbasaur", 20, 10, "Squirtle", "Charmander", "Vine Whip", 4, 3, 3);
    if (isset($_POST['bulbasaur'])) {
        $pokemon1 = new Pokemon($bs->getName(), $bs->getHealth(), $bs->getMana(), $bs->getStrength(), $bs->getWeakness(), $bs->getTackle(), $bs->getRegenHP(), $bs->getRegenMP());
        $pokemon1->setSkills($bs->getBsSkill());
        $_SESSION['playerPokemon'] = $pokemon1;
        $_SESSION['playerHP'] = ($pokemon1->getHealth() / $pokemon1->getHealth()) * 100;
        $_SESSION['playerMP'] = ($pokemon1->getMana() / $pokemon1->getMana()) * 100;
    } elseif (isset($_POST['charmander'])) {
        $pokemon1 = new Pokemon($ch->getName(), $ch->getHealth(), $ch->getMana(), $ch->getStrength(), $ch->getWeakness(), $ch->getTackle(), $ch->getRegenHP(), $ch->getRegenMP());
        $pokemon1->setSkills($ch->getChSkill());
        $_SESSION['playerPokemon'] = $pokemon1;
        $_SESSION['playerHP'] = ($pokemon1->getHealth() / $pokemon1->getHealth()) * 100;
        $_SESSION['playerMP'] = ($pokemon1->getMana() / $pokemon1->getMana()) * 100;
    } elseif (isset($_POST['squirtle'])) {
        $pokemon1 = new Pokemon($sq->getName(), $sq->getHealth(), $sq->getMana(), $sq->getStrength(), $sq->getWeakness(), $sq->getTackle(), $sq->getRegenHP(), $sq->getRegenMP());
        $pokemon1->setSkills($sq->getSqSkill());
        $_SESSION['playerPokemon'] = $pokemon1;
        $_SESSION['playerHP'] = ($pokemon1->getHealth() / $pokemon1->getHealth()) * 100;
        $_SESSION['playerMP'] = ($pokemon1->getMana() / $pokemon1->getMana()) * 100;
    }
}

if (!isset($_SESSION['computer'])) {
    $_SESSION['computer'] = rand(1, 3);
    switch ($_SESSION['computer']) {
        case 1:
            $pokemon2 = new Pokemon($bs->getName(), $bs->getHealth(), $bs->getMana(), $bs->getStrength(), $bs->getWeakness(), $bs->getTackle(), $bs->getRegenHP(), $bs->getRegenMP());
            $pokemon2->setSkills($bs->getBsSkill());
            $_SESSION['computerPokemon'] = $pokemon2;
            $_SESSION['compHP'] = ($pokemon2->getHealth() / $pokemon2->getHealth()) * 100;
            $_SESSION['compMP'] = ($pokemon2->getMana() / $pokemon2->getMana()) * 100;
            break;
        case 2:
            $pokemon2 = new Pokemon($ch->getName(), $ch->getHealth(), $ch->getMana(), $ch->getStrength(), $ch->getWeakness(), $ch->getTackle(), $ch->getRegenHP(), $ch->getRegenMP());
            $pokemon2->setSkills($ch->getChSkill());
            $_SESSION['computerPokemon'] = $pokemon2;
            $_SESSION['compHP'] = ($pokemon2->getHealth() / $pokemon2->getHealth()) * 100;
            $_SESSION['compMP'] = ($pokemon2->getMana() / $pokemon2->getMana()) * 100;
            break;
        case 3:
            $pokemon2 = new Pokemon($sq->getName(), $sq->getHealth(), $sq->getMana(), $sq->getStrength(), $sq->getWeakness(), $sq->getTackle(), $sq->getRegenHP(), $sq->getRegenMP());
            $pokemon2->setSkills($sq->getSqSkill());
            $_SESSION['computerPokemon'] = $pokemon2;
            $_SESSION['compHP'] = ($pokemon2->getHealth() / $pokemon2->getHealth()) * 100;
            $_SESSION['compMP'] = ($pokemon2->getMana() / $pokemon2->getMana()) * 100;
            break;
    }
}
