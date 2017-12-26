<?php
print $_SESSION['id_user'];
$id_user = $_SESSION['id_user'];

if (isset($_GET['id'])){
$_SESSION['id_habitation']= $_GET['id'];
}

print $_SESSION['id_habitation']; 
$id_location = $_SESSION['id_habitation'];


?>



<?php
if (isset($_GET['louer'])) {
    //extrait les champs du tableau $_GET pour simplifier
    //ecriture
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);
    if (empty($id_user) || empty($id_location) || empty($date_debut_bail) || empty($date_fin_bail)) {
        print "Vide";
        print "id_user: ".$id_user;
        print " id_location: ".$id_location;
        print " date debut: ".$date_debut_bail;
        print " date fin: ".$date_fin_bail;
    }
    //$erreur = "Veuillez remplir tous les champs";
    else {
        //$erreur="";
        $location = new InsertLocDB($cnx);
        $location->addLocation($_GET);
    }
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



        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_location"/>
        <div class="row">
            <div class="col-sm-3"><label for="date_debut_bail">Début du bail</label></div>
            <div class="col-sm-4">
                <input type="date" id="dbail" name="date_debut_bail"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"><label for="date_fin_bail">Fin du bail</label></div>
            <div class="col-sm-4">
                <input type="date" id="date_fin_bail" name="date_fin_bail"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <input type="submit" name="louer" id="louer" value="Demande de location" class="pull-right"/>&nbsp;           
                <input type="reset" id="reset" value="Annuler" class="pull-left"/>
            </div>
        </div>

        </form>

    </div>









