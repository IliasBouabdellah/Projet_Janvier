<?php
//traitement formulaire
if (isset($_GET['inscription'])) {
    //extrait les champs du tableau $_GET pour simplifier
    //ecriture
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);
    if (empty($email1) || empty($email2) || empty($password) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($pseudo)) {
        print "Veuilliez remlire tout ls champs ";
    }
    //$erreur = "Veuillez remplir tous les champs";
    
   
    
    elseif ((preg_match('/^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/', $telephone)) & ($email1 == $email2)) {
        //$erreur="";
        $client = new ClientDB($cnx);
        $client->addClient($_GET);
        ?>
           <meta http-equiv="refresh": content="0;url=index.php?page=accueil">
        <?php
    }
    else{
        print "une erreur est suvenue ";
        print $telephone;
        print $email1;
        print $email2;
                
        
    }
    ?> 
    <?php
}
?>


<div class="container">
    <div class="row">
        <div class="col-sm-4 erreur">
            <?php
//si formulaire pas complet
            if (isset($erreur)) {
                //&& $erreur!=""

                print $erreur;
            }
            ?>

        </div>
    </div>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">

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
            <div class="col-sm-3"><label for="pasword">Password</label></div>
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
            <div class="col-sm-3"><label for="adresse">Adresse</label></div>
            <div class="col-sm-4">
                <input type="text" name="adresse" id="adresse" />
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
                <input type="submit" name="inscription" id="inscription" value="Confirmer l'inscription" class="pull-right"/>&nbsp;           
                <input type="reset" id="reset" value="Annuler" class="pull-left"/>
            </div>
        </div>
    </form>
</div>