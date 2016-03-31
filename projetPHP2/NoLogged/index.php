<?php require('../layout/include/header_no_logged.php');
require('../voiture.php');


echo '<div id="box" class="col-md-offset-2 col-md-8">';
echo '
    <div col-md-12>
        <form action="#"  enctype="multipart/form-data">
            <select name="order">
                <option value="0" style=\'background-color:#dcdcc3\' selected disabled>Trié par</option>
                <option  value="date">Date</option>
              <option   value="prixasc">Prix croissant</option>
               <option value="prixdesc">Prix Décroissant</option>
               <option value="view">Les plus vues</option>
            </select>
            <button type="submit" name="ok">OK</button>
            </form>
    </div>';

if (isset($_GET['ok'])) {
    if ($_GET['order'] == 'date') {
        $req = $BDD->query("SELECT  * FROM voiture ORDER BY quand DESC ");
        voiture::affNoLogged($req, $BDD);
    } elseif ($_GET['order'] == 'prixasc') {
        $req = $BDD->query("SELECT  * FROM voiture ORDER BY prix ASC ");
        voiture::affNoLogged($req, $BDD);
    } elseif ($_GET['order'] == 'prixdesc') {
        $req = $BDD->query("SELECT  * FROM voiture ORDER BY prix DESC ");
        voiture::affNoLogged($req,$BDD);
    }
    elseif ($_GET['order'] == 'view') {
        $req = $BDD->query("SELECT  * FROM voiture ORDER BY compteurclic DESC ");
        voiture::affNoLogged($req,$BDD);
    }
} else {
    $req = $BDD->query("SELECT  * FROM voiture ORDER BY quand DESC LIMIT 5");
    echo '<div class="der"><h1>Dernière annonces:</h1></div>';
    voiture::affNoLogged($req,$BDD);
}


echo "</div>";

require('../layout/include/footer.php');