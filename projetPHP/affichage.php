<?php
session_start();
require('test.php');
if (test::autorise()) {
    echo "<div></div>";
} else
    header('location:index.php');


try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}

?>


<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <title>A la croisée des sapins</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
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

            <p class="navbar-brand"> <?php $log = $_SESSION['session']['login'];

            if (test::autorise()) {
                echo "<div class=\"bonjour \">" . $_SESSION['session']['login']." Shop</div>";
            } else
                header('location:index.php');
            ?></p>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="connexion.php">Déposer produit</a>
                <li><a href="deconnexion.php">Déconnexion</a>
                    <li><form action="requette.php">
                        <input type="text" placeholder="Recherche" name="br">
                        <button type="submit" name="rechercher">Rechercher</button>

                    </form></li>


                </li>
                </li>

            </ul>

            </ul>
        </div>
    </div>
</nav>




<div id="box" class="col-md-offset-2 col-md-8">

    </br><b><?php test::ecriture($BDD,$log)?></b>
    <br>
    <br>
    <br>


    <?php
    test::affichage($BDD,$log);




    ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>