
<?php
session_start();
require('test.php');
if (test::autorise()){

}
else
    header('location:index.php');


echo "<div></div>";

require 'uploadFile.php';
$upload = new uploadFile();
if (isset($_POST['ENVOYER']) && !empty($_POST['ENVOYER'])) {
    $tmp_name = $_FILES['upload']['tmp_name'];
    $name = $_FILES['upload']['name'];
    $upload->upload($tmp_name, $name);
}
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
        <title>Connexion</title>
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
                        echo "<div class=\"bonjour\">" . $_SESSION['session']['login'] . " Shop</div>";
                    } else
                        header('location:index.php');
                    ?></p>
            </div>

            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="affichage.php">Mes annonces ( <?php test::compte($BDD, $log);?> )</a>
                    <li><a href="deconnexion.php">Déconnexion</a>


                    </li>
                    </li>

                </ul>

                </ul>
            </div>
        </div>
    </nav>
    <div id="box" class="col-md-offset-2 col-md-8">
    <p>Produits à deposer</p>
       <?php if (isset($_POST['ENVOYER'])) {

        if (!empty ($_POST['type']) && !empty ($_POST['marque']) && !empty ($_POST['annee']) && !empty ($_POST['kilometrage']) && !empty ($_POST['modele'])) {
        $type = $_POST['type'];
        $marque = $_POST['marque'];
        $annee = $_POST['annee'];
        $nom = $_SESSION['session']['login'];
        $kilo = htmlspecialchars(trim($_POST['kilometrage']));
        $modele = htmlspecialchars($_POST['modele']);
        $description = nl2br(addslashes(htmlspecialchars($_POST['description'])));
        $req = $BDD->query("INSERT INTO voiture VALUES ('','$type','$marque','$kilo','$annee','$modele','$description','$nom','$name')");
        header('location:affichage.php');
        } else
        echo '<br><br><div id="err"><p>merci de remplir tous les champs</p></div>';
       }
       ?>
    <form action="connexion.php" method="post">
        <select name="categorie">
            <option value='0'>Choisissez la catégorie</option>
            <option value='10' style='background-color:#dcdcc3' disabled>Véhicules</option>
            <option value='1'>Voiture</option>
            <option value='2'>Moto</option>
            <option value='3'>Camping Car</option>
            <option value='10' style='background-color:#dcdcc3' disabled>Sport</option>
            <option value='1'>Vélo</option>
            <option value='2'>Roller</option>
            <option value='2'>Raquette</option>
            <option value='2'>ballon</option>
            <option value='10' style='background-color:#dcdcc3' disabled id='10'>Multimédia</option>
            <option value='1'>Ordinateur</option>
            <option value='2'>Musique</option>
            <option value='2'>Vidéo</option>
            <option value='2'>Jeux vidéos</option>
        </select>
        <button type="submit" name="val">Valider</button>


    </form>

    </body>
    </html>

<?php
if (isset($_POST['val'])) {
    if ($_POST['categorie'] == 1)
        echo '
<b>VOITURE</b></br></br>
 <form action="connexion.php" method="post" enctype="multipart/form-data">
 <select name="type">
        <option value ="0" style=\'background-color:#dcdcc3\' selected disabled>Choisissez la catégorie</option>
        <option value="berline">Berline</option>
        <option value="coupe">Coupé</option>
        <option value="Break_">Break</option>
        <option value="suv">SUV/4x4</option>
        <option value="cabriolet">Cabriolet</option>
        <option value="monospace">Monospace</option>
        <option value="citadine">Citadine</option>
 </select>
 </br>
 </br>
     <p>
     <select name="marque">
        <option value ="0" style=\'background-color:#dcdcc3\' selected disabled>Choisissez la marque</option>
        <option value="renault">Renault</option>
        <option value="peugeot">Peugeot</option>
        <option value="citroen">Citroën</option>
        <option value="bmw">BMW</option>
        <option value="volkswagen">Volkswagen</option>
        <option value="audi">Audi</option>
        <option disabled >----------</option>
        <option value="abarth">ABARTH</option>
        <option value="ac">AC</option>
    </select>
    </p>
    <p><input type="text" name = "modele" placeholder="modèle"></p>
    <p><input type="text" name = "kilometrage" placeholder="kilométrage"></p>
    <p> <select name="annee">
        <option value ="0" style=\'background-color:#dcdcc3\' selected disabled>Annee de mise en circulation</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
    </select>
    </p>


    <textarea name="description"  cols="30" rows="10"></textarea></br>
    <input  name="upload" type="file"></br>
    <input  class="bouton" type="submit" value="Envoyer" name="ENVOYER">

</form>

';
    else
        echo "bonsoir";
}
echo "</div>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
