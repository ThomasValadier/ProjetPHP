<?php
require('../layout/include/header.php');
require('../voiture.php');






?>
    <div id="box" class="col-md-offset-2 col-md-8">

        </br><b><?php test::ecriture($BDD, $log) ?></b>
        <br>
        <br>
        <br>


        <?php
        $req = $BDD->query("SELECT * FROM voiture WHERE login = '$log' ");
        voiture::aff($req,$BDD)
        ?>
    </div>

<?php require '../layout/include/footer.php';

