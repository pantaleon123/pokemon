<?php
require_once 'init.php';
session_start();

if (isset($_POST['tackle'])) {
    $ch = $_SESSION['computerPokemon']->getHealth() - $_SESSION['playerPokemon']->getTackle();
    $_SESSION['computerPokemon']->setHealth($ch);
    echo $_SESSION['computerPokemon']->getHealth();
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonField.php");
}