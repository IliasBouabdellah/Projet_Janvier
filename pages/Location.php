<h2>Confirmer votre location</h2>

<?php
//si aucun id de gâteau dans l'url
if (!isset($_GET['id']) && !isset($_SESSION['id_commande'])) {
    ?>
    <p class="txtRouge">Pour faire votre location, choisissez 
        <a href="index.php?page=habitation">ici</a> 
        votre gâteau</p>
    <?php
}



else if(isset($_GET['id'])){ //on vient de la page produit
    $_SESSION['id_location'] = $_GET['id'];
}




if(isset($_SESSION['id_location'])){
    $cake = new Vue_gateauxDB($cnx);
    $liste = $cake->getVue_gateauProduit($_SESSION['id_location']);
    //var_dump($liste);
    
    
    //TRAITEMENT DU FORMULAIRE
    if(isset($_GET['location'])){
        //extrait les champs du tableau $_GET pour simplifier 
        //écriture
        extract($_GET,EXTR_OVERWRITE);
        //test des champs vides
        if(empty($email1) || empty($email2) || empty($password) 
        || empty($nom) || empty($prenom)|| empty($telephone) 
        || empty($adresse) ||empty($pseudo)){
            $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
        }
        else {
            $client = new ClientDB($cnx);
            $retour = $client->addClient($_GET);
        }
        
    }
    
?>

    <div class="row">
        <div class="col-sm-4">
            <img src="./admin/images/<?php print $liste[0]['image'];?>" alt="habitation"/>
        </div>
        <div class="col-sm-5 centrer txtGras">
            <br/><span class="txtRouge">
                <?php print $liste[0]['carateristique']; ?>
            </span>
            <br/><br/>
            <?php print $liste[0]['prix'];?> &euro;
        </div>
    </div>
    
<div class="container">
    <div class="row">
        <div class="col-sm-8 erreur">
            <?php
            //si formulaire pas complet
            if(isset($erreur)){
                print $erreur;
            }
            ?>
        </div>
    </div>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_location">

        <div class="row">
            <div class="col-sm-3"><label for="email1">Email</label></div>
            <div class="col-sm-4">
                <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"><label for="email2">Confirmez votre email</label></div>
            <div class="col-sm-4">
                <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-3"><label for="nom">Password</label></div>
            <div class="col-sm-4">
                <input type="password" name="password" id="password" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><label for="nom">Nom</label></div>
            <div class="col-sm-4">
                <input type="text" name="nom" id="nom" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><label for="prenom">Prénom</label></div>
            <div class="col-sm-4">
                <input type="text" name="prenom" id="prenom" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><label for="telephone">Téléphone</label></div>
            <div class="col-sm-4">
                <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><label for="rue">Adresse  </label></div>
            <div class="col-sm-4">
                <input type="text" name="adresse" id="adresse" />
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-3"><label for="numero">Numéro</label></div>
            <div class="col-sm-4">
                <input type="text" name="numero" id="numero" />
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-3"><label for="pseudo">Pseudo</label></div>
            <div class="col-sm-4">
                <input type="text" name="pseudo" id="pseudo" />
            </div>
        </div>
       
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <input type="submit" name="Loueur" id="commander" value="Finaliser le formulaire" class="pull-right"/>&nbsp;           
                <input type="reset" id="reset" value="Annuler" class="pull-left"/>
            </div>
        </div>
    </form>
</div>
    <?php
}//fin else on vient de la pa