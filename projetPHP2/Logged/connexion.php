<?php
require('../layout/include/header.php');
require('../voiture.php');

voiture::add($BDD);


?>

    <div id="box" class="col-md-offset-2 col-md-8">
        <div id="contenaireprod">
            <h1>Voiture à déposer</h1>

            <form action="connexion.php"  method="post" enctype="multipart/form-data">
                <div  class="styleselect">
                    <select name="type">
                        <option value="0" style=\'background-color:#dcdcc3\' selected disabled>Choisissez la catégorie
                        </option>
                        <option value="Berline">Berline</option>
                        <option value="Coupé">Coupé</option>
                        <option value="Break">Break</option>
                        <option value="SUV">SUV/4x4</option>
                        <option value="Cabriolet">Cabriolet</option>
                        <option value="Monospace">Monospace</option>
                        <option value="Citadine">Citadine</option>
                    </select>
                </div>
                <p>
                    <select name="marque">
                        <option value="0" style=\'background-color:#dcdcc3\' selected disabled>Choisissez la marque
                        </option>
                        <option value="Renault">Renault</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Citroën">Citroën</option>
                        <option value="Bmw">BMW</option>
                        <option value="volkswagen">Volkswagen</option>
                        <option value="audi">Audi</option>
                        <option disabled>----------</option>
                        <option value="abarth">ABARTH</option>
                        <option value="ac">AC</option>
                    </select>
                </p>
                <p><input type="text" name="modele" placeholder="modèle"></p>
                <p><input type="number" name="kilometrage" placeholder="kilométrage"></p>
                <p><select name="annee">
                        <option value="0" style=\'background-color:#dcdcc3\' selected disabled>Annee de mise en
                            circulation
                        </option>
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
                    </select></br>
                    <input type="number" name="prix" placeholder="prix">
                </p>
                <textarea name="description" cols="120" rows="10"></textarea></br>
                <div id= "impfile">
                    <input name="upload" type="file"></div>
                <input type="submit" Value="Envoyer" name="ENVOYER">

            </form>
        </div>
    </div>
<?php require '../layout/include/footer.php';
