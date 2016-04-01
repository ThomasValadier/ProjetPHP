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

            <div class="navbar-brand"> <?php $log = $_SESSION['session']['login'];
                if (test::autorise()) {
                    echo "<div class=\"bonjour \">" . $_SESSION['session']['login'] . " Shop</div>";
                } else
                    header('location:index.php');
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

    <?php
    $id = $_GET['id'];
    $req = $BDD->query("SELECT * FROM voiture WHERE id_voiture = '$id'");

    while ($raq = $req->fetch()) {

        echo $mo = $raq['modele'] . "</br>";
        echo "<img src=\"upload/" . $raq['image'] . "\"></br>";
        echo  $raq['kilometrage'] . "</br>";
        echo  "<div class='des'>" . $raq['description'] . "</div>";
        echo "<form method='post' action='modif.php?id=". $id . "' name='modif'><input name='modif' value='modifier' type='submit'></form>";
        if (isset ($_POST['modif'])) {
            echo "<form method='post' action='modif.php?id=". $id . "'><input name = 'modmod' type='text' value =' " . $raq['modele'] . "'>
          <input type ='submit' value=\"coucou\" name='modifmod'></form>";
        }





    }


    ?>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>