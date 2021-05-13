<?php
require_once 'launcher.php';

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
    .picture {
        background-size: cover;
        background-color: green;
    }

    img {
        width: 20vw;
        height: 18vw;
    }

    html {
        background: url(asset/background2.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .bs {
        background-color: lightgreen;
        padding-top: 1.8vw;
    }
    .sq {
        background-color: lightblue;
        padding-top: 1.8vw;
    }
    .ch {
        background-color: pink;
        padding-top: 1.8vw;
    }
</style>

<body>
    <h1 style="text-align: center;">
        Choose Your Pokeballs!
    </h1>
    <center>
        <div style="border: solid; width: 71vw; height: 30vw; margin-bottom: 2vw;">
            <div style="border: solid; width: 20vw; height: 26.5vw; float: left; margin: 1.5vw;">
                <div class='picture' style="height: 18vw; background-size: cover">
                    <img src="asset/bulbasaur.jpg">
                </div>
                <div class="bs" style="height: 6.7vw;">
                    <h1><?php echo $bs->getName() ?></h1>
                </div>
            </div>

            <div style="border: solid; width: 20vw; height: 26.5vw; float: left; margin: 1.5vw">
                <div class='picture' style="height: 18vw">
                    <img src="asset/charmander.jpg">
                </div>
                <div class="ch" style="height: 6.7vw">
                    <h1><?php echo $ch->getName() ?></h1>
                </div>
            </div>

            <div style="border: solid; width: 20vw; height: 26.5vw; float: left; margin: 1.5vw">
                <div class='picture' style="height: 18vw">
                    <img src="asset/squirtle.jpeg">
                </div>
                <div class="sq" style="height: 6.7vw">
                    <h1><?php echo $sq->getName() ?></h1>
                </div>
            </div>

        </div>
        <div>
            <form action="PokemonField.php" method="POST">
                <button type="submit" name="bulbasaur">Choose!</button>
                <button style="margin-left: 19vw;" type="submit" name="charmander">Choose!</button>
                <button style="margin-left: 19vw;" type="submit" name="squirtle">Choose!</button>
            </form>
        </div>
    </center>

</body>

</html>