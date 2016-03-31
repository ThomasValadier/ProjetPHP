<?php
session_start();
require('test.php');

try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>A la croisée des sapins</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/stylesheets/stylesheets.css">


</head>
<body>
<header>
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

                <div class="navbar-brand"> <?php
                    if (test::autorise()) {
                        $log = $_SESSION['session']['login'];
                        echo "<div class=\"bonjour \">" . $_SESSION['session']['login'] . " Shop</div>";
                    } else
                        echo "ProjetPHP";
                    ?>
                    <div class="rech">

                        <form action="requette.php">
                            <input type="text" placeholder="Recherche" name="br" size="8">
                            <button type="submit" name="rechercher">
                                <div class="glyphicon glyphicon-search"></div>
                            </button>
                        </form>
                        <?php if (isset($_GET['rechercher']) && !empty($_GET['br'])) {/* permet de comptabiliser les recherches pour la rubrique top recherche. Ne marque ssi on est
 coonecté et que l'on a pas déjà fait cette recherche */
                            $rech = htmlspecialchars(trim($_GET['br']));
                            if (test::autorise()) {
                                $log = $_SESSION['session']['login'];
                                $req = $BDD->query("SELECT * FROM recherche WHERE quoi = '$rech'");
                                $res = $req->fetchAll();
                                $resultat = count($res);
                                if ($resultat == 0) {
                                    $BDD->query("INSERT INTO recherche VALUES ('$rech', now(), 1) ");
                                    $BDD->query("INSERT INTO rechuti VALUES ('$rech', 1, '$log') ");
                                } else {

                                    $req = $BDD->query("SELECT * FROM rechuti WHERE quoi = '$rech' AND qui = '$log'");
                                    $res = $req->fetchAll();
                                    $resultat = count($res);
                                    if ($resultat == 0) {
                                        $BDD->query("INSERT INTO rechuti VALUES('$rech',1,'$log') ");
                                        $BDD->query("UPDATE recherche SET combien = combien +1  WHERE quoi = '$rech' ");

                                    } else {
                                        $BDD->query("UPDATE rechuti SET combien = combien + 1 WHERE qui = '$log' AND quoi = '$rech'");
                                    }
                                }
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>


            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (test::autorise()) {
                        echo "<li><a href=\"index.php\">Accueil</a></li>";
                        echo "<li><a href=\"../Logged/connexion.php\">Déposer annonce</a></li>";
                        echo "<li><a href=\"../Logged/affichage.php\">Mes annonces (" . test::compte($BDD, $log) . ")</a></li>";
                        echo "<li><a href=\"../Logged/deconnexion.php\">Déconnexion</a> </li>";
                    } else {
                        echo "<li><a href=\"index.php\">Accueil</a></li>";
                        echo '<li><a href="connect.php">Se connecter</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <div class="best">
        <h4>Top marques</h4>
        <?php
        $req = $BDD->query('SELECT DISTINCT marque FROM voiture ORDER BY compteurclic DESC LIMIT 3 ');

        while ($raq = $req->fetch()) {
            $marque = $raq['marque'];
            echo "<a href='../NoLogged/requette.php?br=" . $marque . "'><button>" . $marque . "</button></a>";

        }
        ?>


    </div>
    <div class="col-md-offset-10 top">
        <h4>Top Recherches</h4>
        <?php
        $req = $BDD->query('SELECT quoi FROM recherche ORDER BY combien DESC LIMIT 3 ');

        while ($raq = $req->fetch()) {
            $rech = $raq['quoi'];
            echo "<a href='../NoLogged/requette.php?br=" . $rech . "'><button>" . $rech . "</button></a>";

        }
        ?>

    </div>
</header>