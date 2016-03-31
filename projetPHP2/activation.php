<?php
try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}
$login = urldecode($_GET['log']);
$cle = $_GET['cle'];

$requeser = $BDD->prepare("SELECT * FROM utilisateurs WHERE login = ? AND cle = ?");
$requeser->execute(array($login, $cle));
$userExist = $requeser->rowCount();
if ($userExist == 1) {
    $user = $requeser->fetch();
    if ($user['actif'] == 0) {
        $maj = $BDD->prepare("UPDATE utilisateurs SET actif = 1 WHERE login = ? AND cle = ?");
        $maj->execute(array($login, $cle));
        echo "Felicitation votre compte a bien ete active !!!!</br>";
        echo '<a href="NoLogged/index.php">Cliquez ici pour vous connecter!</a>';
    } else
        echo "votre compte a deja ete valide";
} else
    echo " l'utilisateur nexiste pas";


