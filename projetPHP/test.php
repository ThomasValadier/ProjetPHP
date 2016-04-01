<?php

class test
{


    static function autorise()
    {
        if (isset($_SESSION['session']) && isset($_SESSION['session']['login']) && isset($_SESSION['session']['password'])) {

            return true;
        } else
            return false;

    }


    static function connect()
    {
        if (isset ($_POST) && !empty ($_POST['login']) && !empty ($_POST['mdp'])) {
            try {
                $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
            } catch (PDOException $e) {
                echo 'connexion impossible : ' . $e->getMessage();
            }

            extract($_POST);
            $req = $BDD->query("SELECT id_utilisateur FROM utilisateurs where login = '$login' AND password = '$mdp' AND actif = 1 ");
            $result = $req->fetchAll();

            if (count($result) > 0) {
                $_SESSION['session'] = array(
                    'login' => $login,
                    'password' => $mdp
                );
                header('location:connexion.php');
            } else
                echo '<script>alert(" identifiants inconnus")</script>';
        }
    }

    static function inscrire()
    {
        if (isset ($_POST) && !empty ($_POST['inslogin']) && !empty ($_POST['insMdp']) && !empty ($_POST['email'])) {

            try {
                $log = htmlspecialchars($_POST['inslogin']);
                $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
            } catch (PDOException $e) {
                echo 'connexion impossible : ' . $e->getMessage();
            }
            extract($_POST);
            $req = $BDD->query("SELECT id_utilisateur FROM utilisateurs where login = '$log' OR password = '$insMdp' ");
            $raq = $BDD->query("SELECT id_utilisateur FROM utilisateurs where email = '$email' ");
            $result = $req->fetchAll();
            $result1 = $raq->fetchAll();
            if (count($result) > 0) {
                echo '<script>alert("mot de passe ou login deja utilises")</script>';
            } elseif (count($result1) > 0) {
                echo '<script>alert("Votre adresse email est deja utilise")</script>';
            } else {
                echo "<script>alert('Vous allez recevoir un mail pour confirmer votre adresse email.')</script>";
                $cle = md5(microtime(TRUE) * 3);
                $log = htmlspecialchars($_POST['inslogin']);
                $pass = htmlspecialchars($_POST['insMdp']);
                $mail = htmlspecialchars($_POST['email']);
                $BDD->query("INSERT INTO utilisateurs VALUES ('','$log', '$pass', '$cle', '', '$mail') ");
                $destinataire = $email;
                $sujet = "Activer votre compte";
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
<p>Bienvenue sur le site de toto,</p>
</br>
</br>
<p>Pour confirmer la création de votre compte veuillez cliquer sur le lien ci dessous.</p>
</br>
</br>

<a href="localhost/projetPHP/activation.php?log=' . urlencode($log) . '&cle=' . $cle . '">Cliquez ici pour activer votre compte!</a>


<p>------------------------------------------------------------------------------------------------------------------------------------</p>
<p>Ceci est un mail automatique, Merci de ne pas y répondre.</p>

</body>
</html>
';
                mail($destinataire, $sujet, $message, $entete); // Envoi du mail
            }
        } else echo '<script>alert("Veuillez remplir tous les champs")</script>';
    }

    static function affichage($BDD, $log)
    {


        $req = $BDD->query("SELECT * FROM voiture WHERE login = '$log' ");
        while ($raq = $req->fetch()) {
            $id = $raq['id_voiture'];
            echo '<b>' . $raq['modele'] . '</b></br></br>';
            echo '<img src = "upload/' . $raq['image'] . ' " ><br>';
            echo '<a href="prodvendeur.php?id=' . urlencode($id) . '"><button>Voir produit</button></a><br><br>';
            echo '<form action="" method="post">
<button name="effacer" type="submit" onclick="if(!confirm(\'Etes vous sûr de vouloir supprimer cette annonce ?\')) return false;">Effacer</button></form>';


            if (isset ($_POST['effacer'])) {

                $id = $raq['id_voiture'];
                $BDD->query("DELETE  FROM voiture WHERE id_voiture = '$id' ");
                $fichier = 'upload/' . $raq['image'];


                if (file_exists($fichier))
                    unlink($fichier);
                header('location:affichage.php');
                break;
            }


        }
    }

    static function compte($BDD, $log)
    {

        $req = $BDD->query("SELECT * FROM voiture WHERE login = '$log' ");
        $res = $req->fetchAll();
        $resultat = count($res);
        echo $resultat;
    }

    static function ecriture($BDD, $log)
    {
        $req = $BDD->query("SELECT * FROM voiture WHERE login = '$log' ");
        $res = $req->fetchAll();
        $resultat = count($res);
        if ($resultat == 0)
            echo "Vous n'avez pas encore déposé d'article!";
        elseif ($resultat == 1)
            echo "Vous avez déposé 1 annonce:";
        else
            echo "Vous avez déposé " . $resultat . " annonces:";
    }

    static function rechercher($BDD)
    {

        if (isset($_GET['rechercher'])) {
            if (!empty($_GET['br'])) {
                $rech = addslashes(htmlspecialchars($_GET['br']));

                $req = $BDD->query("SELECT  * FROM voiture WHERE description like '%$rech%' or modele like '%$rech%' OR marque like '%$rech%'");

                while ($raq = $req->fetch()) {
                    echo '<b>' . $raq['modele'] . '</b></br></br>';
                    echo '<img src = "upload/' . $raq['image'] . ' " ><br>';
                    $id = $raq['id_voiture'];

                    if ($_SESSION['session']['login'] == $raq['login']) {
                        echo '<a href="prodvendeur.php?id=' . urlencode($id) . '"><button>Modifier</button></a><br><br>';

                    } else
                        echo '<a href="produit.php?id=' . urlencode($id) . '"><button>Voir produit</button></a><br><br>';
                }

            }
        }
    }

    static function ecritresul($BDD)
    {
        $rech = addslashes(htmlspecialchars($_GET['br']));
        $req = $BDD->query("SELECT  * FROM voiture WHERE description like '%$rech%' or modele like '%$rech%' OR marque like '%$rech%'");
        $res = $req->fetchAll();
        $resultat = count($res);
        if (!empty($_GET['br'])) {
            if ($resultat == 0)
                echo "Aucun résultat ne correspond à votre recherche.";
            elseif ($resultat == 1)
                echo "1 résultat correspond à votre recherche:";
            else
                echo $resultat . " résulats correspondent à votre recherche:";

        } else
            echo "Si vous ne remplissez pas la barre de recherche... ça ne risque pas de marcher ;)";

    }

    static function captch(){
        //clé publique:6Le0BRsTAAAAAOg19nqHj0QS3E0DgrR24QjZoD67
        //clé privé:6Le0BRsTAAAAAGQguQlf0FMdNaMLoYV4sMkbG6Cy
    }


}


