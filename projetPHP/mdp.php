<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
</header>
<body>

<?php
try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}
$reinit = urldecode($_GET['reinit']);
$riq = $BDD->query("SELECT reinit FROM utilisateurs WHERE reinit = '$reinit'");
$rq = $riq->fetchAll();

if (count($rq) == 1) {
    echo '  <form action="" method="post">
    <input type="password" name="pass" id="pass"> <label for="pass">Votre nouveau mot de passe</label>
    <button type="submit" name="submit">Changer mot de passe</button>
</form>';
    if (isset($_POST['submit'])) {
        if (!empty($_POST['pass'])) {

            $pass = htmlspecialchars($_POST['pass']);
            $BDD->query("UPDATE utilisateurs SET password = '$pass', reinit = '0' WHERE reinit = '$reinit' ");
            echo '<script> info = confirm("Votre nouveau mot de passe à bien été mis à jour, vous allez etre redirigé vers la page d\'accueil ");
if (info) document.location = "index.php" </script>';


        } else
            echo '<script> alert (\'veuillez remplir tous les champs\') </script>';
    }
}
if (count($rq) == 0)
    echo 'Votre mot de passe à déjà été modifié, cette page n\'est plus valide! Veuillez retourner à la
page d\'accueil <br> <br>  <a href="index.php">page d\'accueil</a>';


?>


</body>