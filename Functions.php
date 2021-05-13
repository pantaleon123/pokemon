<?php
require_once 'Pokemon.php';
session_start();

$player = $_SESSION['playerPokemon'];
$comp = $_SESSION['computerPokemon'];

if (isset($_POST['round'])) {
    $_SESSION['playerPokemon']->setHealth(20);
    $_SESSION['playerPokemon']->setMana(10);
    $_SESSION['computerPokemon']->setHealth(20);
    $_SESSION['computerPokemon']->setMana(10);
    $_SESSION['playerHP'] = ($_SESSION['playerPokemon']->getHealth() /  $_SESSION['playerPokemon']->getHealth()) * 100;
    $_SESSION['playerMP'] = ($_SESSION['playerPokemon']->getMana() /  $_SESSION['playerPokemon']->getMana()) * 100;
    $_SESSION['compHP'] = ($_SESSION['computerPokemon']->getHealth() / $_SESSION['computerPokemon']->getHealth()) * 100;
    $_SESSION['compMP'] = ($_SESSION['computerPokemon']->getMana() / $_SESSION['computerPokemon']->getMana()) * 100;
    
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}



if (isset($_POST['tackle']) && $comp->getHealth() > 0) {
    $cHP = $comp->getHealth() - $player->getTackle();
    $comp->setHealth($cHP);
    $cHP = ($cHP / 20) * 100;
    $_SESSION['compHP'] = $cHP;

    if ($comp->getHealth() > 0) {
        $_SESSION['used'] = rand(1, 4);
        if ($comp->getMana() < 4 && $_SESSION['used'] == 4 && $comp->getHealth() > 3) {
            if ($comp->getMana() < 3)
                $_SESSION['used'] = 1;
            else
                $_SESSION['used'] = rand(1, 3);
        }
        switch ($_SESSION['used']) {
            case 1:
                $pHP = $player->getHealth() - $comp->getTackle();
                $player->setHealth($pHP);
                $pHP = ($pHP / 20) * 100;
                $_SESSION['playerHP'] = $pHP;
                break;
            case 2:
                if ($comp->getMana() < 10 && $comp->getHealth() > 3) {
                    $cMP = $comp->getMana() + 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                    $cHP = $comp->getHealth() - 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                }
                break;
            case 3:
                if ($comp->getHealth() < 20 && $comp->getMana() > 0) {
                    $cHP = $comp->getHealth() + 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                    $cMP = $comp->getMana() - 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
            case 4:
                if ($player->getName() == $comp->getStrength()) {
                    $pHP = $player->getHealth() - ($comp->getTackle() * 2);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } elseif ($comp->getName() == $player->getWeakness()) {
                    $pHP = $player->getHealth() - ($comp->getTackle * 0);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } else {
                    $pHP = $player->getHealth() - 6;
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
        }
    }

    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}

if (isset($_POST['skill']) && $comp->getHealth() > 0) {
    if ($comp->getName() == $player->getStrength()) {
        $cHP = $comp->getHealth() - ($player->getTackle() * 2);
        $comp->setHealth($cHP);
        $cHP = ($cHP / 20) * 100;
        $_SESSION['compHP'] = $cHP;
        $pMP = $player->getMana() - 4;
        $player->setMana($pMP);
        $pMP = ($pMP / 10) * 100;
        $_SESSION['playerMP'] = $pMP;
    } elseif ($comp->getName() == $player->getWeakness()) {
        $cHP = $comp->getHealth() - ($player->getTackle() * 0);
        $comp->setHealth($cHP);
        $cHP = ($cHP / 20) * 100;
        $_SESSION['compHP'] = $cHP;
        $pMP = $player->getMana() - 4;
        $player->setMana($pMP);
        $pMP = ($pMP / 10) * 100;
        $_SESSION['playerMP'] = $pMP;
    } else {
        $cHP = $comp->getHealth() - 6;
        $comp->setHealth($cHP);
        $cHP = ($cHP / 20) * 100;
        $_SESSION['compHP'] = $cHP;
        $pMP = $player->getMana() - 4;
        $player->setMana($pMP);
        $pMP = ($pMP / 10) * 100;
        $_SESSION['playerMP'] = $pMP;
    }
    if ($comp->getHealth() > 0) {
        $_SESSION['used'] = rand(1, 4);
        if ($comp->getMana() < 4 && $_SESSION['used'] == 4 && $comp->getHealth() > 3) {
            if ($comp->getMana() < 3)
                $_SESSION['used'] = 1;
            else
                $_SESSION['used'] = rand(1, 3);
        }
        switch ($_SESSION['used']) {
            case 1:
                $pHP = $player->getHealth() - $comp->getTackle();
                $player->setHealth($pHP);
                $pHP = ($pHP / 20) * 100;
                $_SESSION['playerHP'] = $pHP;
                break;
            case 2:
                if ($comp->getMana() < 10 && $comp->getHealth() > 3) {
                    $cMP = $comp->getMana() + 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                    $cHP = $comp->getHealth() - 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                }
                break;
            case 3:
                if ($comp->getHealth() < 20 && $comp->getMana() > 0) {
                    $cHP = $comp->getHealth() + 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                    $cMP = $comp->getMana() - 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
            case 4:
                if ($player->getName() == $comp->getStrength()) {
                    $pHP = $player->getHealth() - ($comp->getTackle() * 2);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } elseif ($comp->getName() == $player->getWeakness()) {
                    $pHP = $player->getHealth() - ($comp->getTackle * 0);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } else {
                    $pHP = $player->getHealth() - 6;
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
        }
    }
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}

if (isset($_POST['regenHp']) && $comp->getHealth() > 0) {
    if ($player->getHealth() < 20 && $player->getMana() > 0) {
        $pHP = $player->getHealth() + 3;
        $player->setHealth($pHP);
        $pHP = ($pHP / 20) * 100;
        $_SESSION['playerHP'] = $pHP;
        $pMP = $player->getMana() - 3;
        $player->setMana($pMP);
        $pMP = ($pMP / 10) * 100;
        $_SESSION['playerMP'] = $pMP;
    }
    if ($comp->getHealth() > 0) {
        $_SESSION['used'] = rand(1, 4);
        if ($comp->getMana() < 4 && $_SESSION['used'] == 4 && $comp->getHealth() > 3) {
            if ($comp->getMana() < 3)
                $_SESSION['used'] = 1;
            else
                $_SESSION['used'] = rand(1, 3);
        }

        switch ($_SESSION['used']) {
            case 1:
                $pHP = $player->getHealth() - $comp->getTackle();
                $player->setHealth($pHP);
                $pHP = ($pHP / 20) * 100;
                $_SESSION['playerHP'] = $pHP;
                break;
            case 2:
                if ($comp->getMana() < 10 && $comp->getHealth() > 3) {
                    $cMP = $comp->getMana() + 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                    $cHP = $comp->getHealth() - 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                }
                break;
            case 3:
                if ($comp->getHealth() < 20 && $comp->getMana() > 0) {
                    $cHP = $comp->getHealth() + 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                    $cMP = $comp->getMana() - 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
            case 4:
                if ($player->getName() == $comp->getStrength()) {
                    $pHP = $player->getHealth() - ($comp->getTackle() * 2);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } elseif ($comp->getName() == $player->getWeakness()) {
                    $pHP = $player->getHealth() - ($comp->getTackle * 0);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } else {
                    $pHP = $player->getHealth() - 6;
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
        }
    }
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}

if (isset($_POST['regenMp']) && $comp->getHealth() > 0) {
    if ($player->getMana() < 10 && $player->getHealth() > 0) {
        $pMP = $player->getMana() + 3;
        $player->setMana($pMP);
        $pMP = ($pMP / 10) * 100;
        $_SESSION['playerMP'] = $pMP;
        $pHP = $player->getHealth() - 3;
        $player->setHealth($pHP);
        $pHP = ($pHP / 20) * 100;
        $_SESSION['playerHP'] = $pHP;
    }
    if ($comp->getHealth() > 0) {
        $_SESSION['used'] = rand(1, 4);
        if ($comp->getMana() < 4 && $_SESSION['used'] == 4 && $comp->getHealth() > 3) {
            if ($comp->getMana() < 3)
                $_SESSION['used'] = 1;
            else
                $_SESSION['used'] = rand(1, 3);
        }

        switch ($_SESSION['used']) {
            case 1:
                $pHP = $player->getHealth() - $comp->getTackle();
                $player->setHealth($pHP);
                $pHP = ($pHP / 20) * 100;
                $_SESSION['playerHP'] = $pHP;
                break;
            case 2:
                if ($comp->getMana() < 10 && $comp->getHealth() > 3) {
                    $cMP = $comp->getMana() + 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                    $cHP = $comp->getHealth() - 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                }
                break;
            case 3:
                if ($comp->getHealth() < 20 && $comp->getMana() > 0) {
                    $cHP = $comp->getHealth() + 3;
                    $comp->setHealth($cHP);
                    $cHP = ($cHP / 20) * 100;
                    $_SESSION['compHP'] = $cHP;
                    $cMP = $comp->getMana() - 3;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
            case 4:
                if ($player->getName() == $comp->getStrength()) {
                    $pHP = $player->getHealth() - ($comp->getTackle() * 2);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } elseif ($comp->getName() == $player->getWeakness()) {
                    $pHP = $player->getHealth() - ($comp->getTackle * 0);
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                } else {
                    $pHP = $player->getHealth() - 6;
                    $player->setHealth($pHP);
                    $pHP = ($pHP / 20) * 100;
                    $_SESSION['playerHP'] = $pHP;
                    $cMP = $comp->getMana() - 4;
                    $comp->setMana($cMP);
                    $cMP = ($cMP / 10) * 100;
                    $_SESSION['compMP'] = $cMP;
                }
                break;
        }
    }
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}


if (isset($_POST['selectNew'])) {
    session_destroy();
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonUI.php");
}

