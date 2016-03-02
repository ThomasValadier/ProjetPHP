<?php
session_start();
require('test.php');

if (isset($_POST['connecter']))
    test::connect();
elseif (isset($_POST['inscrire']))
    test::inscrire();

?>
<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
    <title>index</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
</header>
<body>



<div id="connexion" class="row">
    <div class="col-xs-offset-5 col-md-offset-5">
        <form action='#' method='post'>
            <input type="text" placeholder="login" name="login"
                   value=<?= (!empty($_POST['login'])) ? $_POST['login'] : '' ?>></br>
            <input type="password" name="mdp" placeholder="password"></p>
            <button type="submit" name="connecter">Connexion</button>
        </form>
        </br>
        <form action='#' method='post'>
            <input type="text" placeholder="login" name="inslogin"
                   value=<?= (!empty($_POST['inslogin'])) ? $_POST['inslogin'] : '' ?>></br>
            <input type="password" name="insMdp" placeholder="password"></br>
            <input type="email" name="email" placeholder="email"
                   value=<?= (!empty($_POST['email'])) ? $_POST['email'] : '' ?>></p>
            <button type="submit" name="inscrire">S'inscrire</button>
        </form>
    </div>
</div>

</body>
</html>


