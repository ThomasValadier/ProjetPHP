<?php
session_start();
require('ControllerRequette.php');
?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <title>A la croisée des sapins</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</header>

<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>

            <div class="navbar-brand"> <?php requette::bonjour();
                ?>
                <div class="rech">

                    <form action="requette.php">
                        <input type="text" placeholder="Recherche" name="br" size="8">
                        <button type="submit" name="rechercher">
                            <div class="glyphicon glyphicon-search"></div>
                        </button>
                    </form>

                </div>
            </div>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="connexion.php">Déposer produit</a></li>
                <li><a href="deconnexion.php">Déconnexion</a>

                </li>

            </ul>

            </ul>
        </div>
    </div>
</nav>


<div id="box" class="col-md-offset-2 col-md-8">

    </br><b><?php test::ecritresul($BDD) ?></b>
    <br>
    <br>
    <br>


    <?php
    test::rechercher($BDD);


    ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>