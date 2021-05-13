<?php
require_once 'Pokemon.php';
session_start();
require_once 'launcher.php';

$_SESSION["round"] = 1;
if (!isset($_SESSION['pScore']) || !isset($_SESSION['cScore'])) {
    $_SESSION['pScore'] = 0;
    $_SESSION['cScore'] = 0;
}
if (!isset($_SESSION['allround'])) {
    $_SESSION['allround'] = 0;
}

if (!isset($_SESSION['playerPokemon'])) {
    header("Location:http://localhost:8000/WEB2/Prelim/PokemonUI.php");
}

switch ($_SESSION['playerPokemon']->getName()) {
    case 'Bulbasaur':
        $playerGif = 'asset/bulbasaur_back.gif';
        break;
    case 'Charmander':
        $playerGif = 'asset/charmander_back.gif';
        break;
    case 'Squirtle':
        $playerGif = 'asset/squirtle_back.gif';
        break;
}

switch ($_SESSION['computerPokemon']->getName()) {
    case 'Bulbasaur':
        $computerGif = 'asset/bulbasaur_front.gif';
        break;
    case 'Charmander':
        $computerGif = 'asset/charmander_front.gif';
        break;
    case 'Squirtle':
        $computerGif = 'asset/squirtle_front.gif';
        break;
}
if ($_SESSION['playerHP'] <= 0) {
    echo '<script language="javascript">alert("Computer Wins!")</script>';
    $_SESSION['playerHP'] = 0;
    $_SESSION['cScore'] += 1;
    $_SESSION['allround'] += 1;
}
if ($_SESSION['compHP'] <= 0) {
    echo '<script language="javascript">alert("Player Wins!")</script>';
    $_SESSION['compHP'] = 0;
    $_SESSION['pScore'] += 1;
    $_SESSION['allround'] += 1;
}
if ($_SESSION['playerMP'] <= 0) {
    $_SESSION['playerMP'] = 0;
}
if ($_SESSION['compMP'] <= 0) {
    $_SESSION['compMP'] = 0;
}

if ($_SESSION['allround'] == 5) {
    if ($_SESSION['pScore'] > $_SESSION['cScore']) {
        echo '<script language="javascript">alert("Player Wins The Battle!")</script>';
    } elseif ($_SESSION['pScore'] < $_SESSION['cScore']) {
        echo '<script language="javascript">alert("Computer Wins The Battle!")</script>';
    }
}

$player = $_SESSION['playerHP'];
$comp = $_SESSION['compHP'];
$mplayer = $_SESSION['playerMP'];
$mcomp = $_SESSION['compMP'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .background {
        background-size: cover;
        background-image: url(asset/background1.jpg);
    }

    #health {
        font-size: 20px;
        color: white;
        font-weight: bold;
        text-align: right;
        text-align: center;
    }

    .gage {
        display: inline-block;
        width: 20vw;
    }

    .bar {
        height: 2vw;
        position: relative;
        background: #555;
        border-radius: 25px;
        padding: 5px;
    }

    .bar>span {
        display: block;
        height: 100%;
        border-radius: 20px;
        background-color: rgb(43, 194, 83);
        position: relative;
        overflow: hidden;
    }

    #mana {
        font-size: 10px;
        color: white;
        font-weight: bold;
        text-align: right;
        text-align: center;
    }

    .mgage {
        display: inline-block;
        width: 20vw;
    }

    .mbar {
        height: 1vw;
        position: relative;
        background: #555;
        border-radius: 25px;
        padding: 5px;
    }

    .mbar>span {
        display: block;
        height: 100%;
        border-radius: 20px;
        background-color: rgb(0, 0, 255);
        position: relative;
        overflow: hidden;
    }

    .chealth {
        width: 13vw;
        border: solid;
        font-size: 25pt;
        font-weight: bold;
        text-align: left;
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .cName {
        margin-left: 64.7vw;
        margin-bottom: 0;
    }

    .pName {
        margin-left: 13vw;
        margin-bottom: 0;
    }

    button {
        margin: 2.5vw;
    }
</style>

<body>
    <h1 style="text-align: center; margin: 0vw">
        <?php echo 'Round ' . ($_SESSION["allround"] +1). '!' ?>
    </h1>
    <h3 style="text-align: center; margin: 0;">

        <?php
        echo $_SESSION['pScore'] . ' - ' . $_SESSION['cScore'];
        ?>
    </h3>
    <center>
        <form action="Functions.php" method="POST">
            <?php
            if ($_SESSION['allround'] == 5) {
                echo '<button disabled style="margin: 0" type="submit" name="round">New Round</button>';
            } else {
                if ($_SESSION['playerHP'] == 0 || $_SESSION['compHP'] == 0)
                    echo '<button style="margin: 0" type="submit" name="round">New Round</button>';
                else
                    echo '<button disabled style="margin: 0" type="submit" name="round">New Round</button>';
            }
            ?>
        </form>
    </center>
    <div>
        <?php echo '<h2 class="cName" style="margin-top: 0">' . $_SESSION['computerPokemon']->getName() . '</h2' ?>
    </div>
    <div>
        <div class="gage" style="margin-left: 64.5vw; margin-bottom: 1vw">
            <div class="bar">
                <?php echo '<span id="health" class="lvl" style="width:' . $comp . '%">' . $_SESSION['computerPokemon']->getHealth() . ' HP </span>' ?>
            </div>
        </div>
        <div class="mgage" style="margin-left: 44vw; margin-top: -3vw; float: left">
            <div class="mbar">
                <?php echo '<span id="mana" class="lvl" style="width:' . $mcomp . '%">' . $_SESSION['computerPokemon']->getMana() . ' MP </span>' ?>
            </div>
        </div>

    </div>

    <center>
        <div style="border: solid; width: 70vw; height: 47vw">
            <?php
            if (isset($_SESSION['used'])) {
                switch ($_SESSION['used']) {
                    case 1:
                        echo '<h3>Computer used Tackle</h3>';
                        break;
                    case 2:
                        echo '<h3>Computer used MP Regen</h3>';
                        break;
                    case 3:
                        echo '<h3>Computer used HP Regen</h3>';
                        break;
                    case 4:
                        echo '<h3>Computer used ' . $_SESSION['computerPokemon']->getSkills() . '</h3>';
                        break;
                }
            } else
                echo '<h3>Computer is preparing to attack! </h3>';
            ?>
            <div class="background" style="border: solid; width: 65vw; height: 36vw; margin-top: 1vw">
                <div class="cPokemon" style="width: 15vw; height: 15vw; float: right; margin-right: 5vw; margin-top: 2.5vw">
                    <?php echo '<img src=' . $computerGif . '>' ?>
                </div>
                <div class="pPokemon" style="width: 15vw; height: 15vw; float: left; margin-top: 16vw; margin-left: 5vw">
                    <?php echo '<img src=' . $playerGif . '>' ?>
                </div>
            </div>
            <form action="Functions.php" method="POST">
                <?php
                if ($_SESSION['allround'] < 5) {
                    echo '<button type="submit" name="tackle">Tackle</button>';
                    if ($_SESSION['playerPokemon']->getMana() > 3)
                        echo '<button type="submit" name="skill">' . $_SESSION['playerPokemon']->getSkills() . '</button>';
                    else
                        echo '<button type="submit" name="skill" disabled>' . $_SESSION['playerPokemon']->getSkills() . '</button>';
                    if ($_SESSION['playerPokemon']->getMana() > 2)
                        echo '<button type="submit" name="regenHp">Regen HP</button>';
                    else
                        echo '<button type="submit" name="regenHp" disabled>Regen HP</button>';
                    if ($_SESSION['playerPokemon']->getHealth() > 2)
                        echo '<button type="submit" name="regenMp" >Regen MP</button>';
                    else
                        echo '<button type="submit" name="regenMp" disabled>Regen MP</button>';
                } elseif ($_SESSION['allround'] == 5) {
                    echo '<button disabled type="submit" name="tackle">Tackle</button>';
                    echo '<button type="submit" name="skill" disabled>' . $_SESSION['playerPokemon']->getSkills() . '</button>';
                    echo '<button type="submit" name="regenHp" disabled>Regen HP</button>';
                    echo '<button type="submit" name="regenMp" disabled>Regen MP</button>';
                }

                echo '<button type="submit" name="selectNew">Select New Pokemon</button>';
                ?>
            </form>
        </div>
    </center>
    <div>
        <?php echo '<h2 class="pName" style="margin-top:1vw">' . $_SESSION['playerPokemon']->getName() . '</h2' ?>
    </div>
    <div class="gage" style="margin-left: 13vw;">
        <div class="bar">
            <?php echo '<span id="health" class="lvl" style="width:' . $player . '%">' . $_SESSION['playerPokemon']->getHealth() . ' HP </span>' ?>
        </div>
    </div>
    <div class="mgage">
        <div class="mbar">
            <?php echo '<span id="mana" class="lvl" style="width:' . $mplayer . '%">' . $_SESSION['playerPokemon']->getMana() . ' MP </span>' ?>
        </div>
    </div>
</body>

</html>