

<div class="vignette col-sm-12 col-md-12">
    <div class="row">
        <div class="photo col-md-offset-1 col-md-1 col-sm-offset-1  col-xs-5 col-sm-3"><img src="../assets/images/pageclient_dashboard/portrait.jpg" alt="">
        </div>
        <div class="col-md-5 col-xs-offset-1"><p>
            <h2>LEROUX</h2></p><p>
            <h3>Jean</h3></p>
            <div class="age"><p>18ans</p></div>
        </div>
    </div>
</div>
<div class="to_top">
    <a href="#top">
        <div class="glyphicon glyphicon-arrow-up"></div>
    </a></div>
<div class="col-md-offset-1 col-sm-offset-1 col-sm-10 col-md-10" id="contenaire">
    <div class="boxgauche  col-md-7">
        <h3>Profil</h3>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="descr">
                    <p>
                    <h2>Adresse:</h2></p>
                    <div class="adresse">
                        <p>5 rue du petit cheval</p>
                        <p>75002 Paris</p>
                    </div>

                    <h2>Genre:</h2>

                    <div class="sexe">
                        <p>Homme</p>
                    </div>
                    <h2>Spécialité:</h2>
                    <div class="spec"><p>Bricolage</p></div>
                </div>

            </div>
            <div class=" video col-md-6">
                <video src="video.mp4" controls></video>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Description:</h2>
                    <div class="descri">
                        <p>Bonjour,<br>J'aime rendre service, et j'aspire à réduire mes coûts sur les tâches du
                            quotidiens.<br>
                            N'hésitez
                            pas si vous avez des questions.<br>Au plaisir de vous rencontrer</p>
                    </div>
                </div>
            </div>


            <form method="" action="#">
                <button type="submit">Modifier mon profil</button>
            </form>

        </div>
        <div class="row">

        </div>
        <div class="commandcomm">
            <a href="#downClick" id="toggler">
                <div class="glyphicon glyphicon-chevron-down"></div>
                Afficher les commentaires</a>
            <a href="#upClick" id="togglerup">
                <div class="glyphicon glyphicon-chevron-up"></div>
                Masquer les commentaires</a>
        </div>
        <div id="toggle">
            <div class="commentaire"><a href=""><h1>Jean</h1></a><!--amenera sur le profil de jean: box gauche identique
        sauf qu'à la place de pouvoir modifier le profil le visiteur pourra juste contacter jean,
        box droit: une liste de profil, la recherche pourra encore se faire en bas dans le footer-->
                <p>Bonjour, très Julie à c'est très bien occupé de ma fille, je le recommande!</p></div>
            <div class="commentaire"><a href=""><h1>Martin</h1></a><!--amenera sur le profil de jean: box gauche identique
        sauf qu'à la place de pouvoir modifier le profil le visiteur pourra juste contacter jean,
        box droit: une liste de profil, la recherche pourra encore se faire en bas dans le footer-->
                <p>Bonjour, très Julie à c'est très bien occupé de ma fille, je le recommande!</p></div>

        </div>


    </div>


    <div class="boxdroite  col-md-5">
        <h3>Annonce</h3>
        <form>

            <p>
                <span class="radio">
                    <label for="rech">Recherche service</label>
                </span>
                <input type="radio" id="rech"
                       name="choix">

        <span class="radio">
            <label for="demand">Propose service</label>
            </span>
                <input type="radio" id="demand" name="choix">
            </p>

            <div class="baform">
                <select name="categorie">
                    <option value='10' style="background-color:#dcdcc3" disabled selected>Choisissez la
                        catégorie
                    </option>
                    <option value='1'>Bricolage</option>
                    <option value='2'>Assistanat</option>
                    <option value='3'>Informatique</option>
                    <option value='4'>Pet-sitting</option>
                    <option value='5'>Baby-sitting</option>
                </select><br>
                <p><input type="text" placeholder="Titre"></p>
                <p><input type="text" placeholder="Ville"></p>
                <p><input type="Prix" placeholder="Prix"></p>
                <p><textarea name="desc" cols="30" rows="10" placeholder="Description"></textarea></p>
                <button type="submit">Confirmer</button>
            </div>

        </form>
    </div>
</div>
