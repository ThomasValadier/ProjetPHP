<?php
session_start();
require('test.php');

if (isset($_POST['connecter']))
    test::connect();
elseif (isset($_POST['inscrire']))
    test::inscrire();

if (isset($_POST['reinit']) && !empty($_POST['send'])) {
    try {
        $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
    } catch (PDOException $e) {
        echo 'connexion impossible : ' . $e->getMessage();
    }

    $send = htmlspecialchars($_POST['send']);
    $req = $BDD->query("SELECT email FROM utilisateurs WHERE email = '$send' ");
    $choix = $req->fetchAll();
    if (count($choix) == 0) {
        echo '<script>alert(\'aucun compte ne correspond. \')</script>  ';
    } else {
        echo '<script>alert(\'un mail vous à été envoyé\')</script>';
        $init = md5(microtime(TRUE) / 5);
        $BDD->query("UPDATE utilisateurs SET reinit = '$init' WHERE email = '$send' ");
        $destinataire = $send;
        $sujet = "Réinitialisation mot de passe";
        $entete = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'From: thomas.valadier.2@gmail.com' . "\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'Content-Transfer-Encoding: 8bit';
        $message = '<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
</header>
<body>
<p>Bonjour,</p>
</br>
</br>
<p>Vous avez demandez la réinitialisation de votre mot de passe. Veuillez cliquez sur le lien. </p>
</br>
</br>

<a href="localhost/projetPHP/mdp.php?reinit=' . urlencode($init) . '">Cliquez ici pour définir un nouveau mot de passe.</a>

<p>--------------------------------------------------------</p>
<p>Ceci est un mail automatique, Merci de ne pas y répondre.</p>

</body>
</html>
';
        mail($destinataire, $sujet, $message, $entete); // Envoi du mail
    }


}

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
        <form method="POST">
            <button type="submit" name="forget">Mot de passe oublié</button>
            <br>
            <?php
            if (isset($_POST['forget'])) {
                echo '<input type="email" name="send" placeholder="adresse email"><br>
 <button type="submit" name="reinit">Envoyer email de rinitialisation</button>';

            }; ?>

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


