<?php
//on a besoin des classe Type_gateauDB et Type_gateau
$types = new TypeHabitationDB($cnx);
$tabTypes = $types->getTypeHabitation();
$nbrTypes = count($tabTypes);

//traitement du formulaire de choix du type
if (isset($_GET['choix_type'])) {
    $cake = new Vue_HabitationDB($cnx);
    $liste = $cake->getVue_habitationType($_GET['id_th']);


    $nbrCakes = count($liste);
    //var_dump($liste);
    // print $nbrCakes; 
}
?>
<div class="container">   
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_location" name="from_loc">        
  <table class="table table-hover">
    <thead>
      <tr>
        <th> <span class="txtGras">Le type d'habitation : </span></th>
        <th> <select name="id_th" id="id_th">
                    <option value=""></option>
                    <?php
                    for ($i = 0; $i < $nbrTypes; $i++) {
                        ?>
                        <option value="<?php print $tabTypes[$i]->ID_TH; ?>">
                            <?php print utf8_decode($tabTypes[$i]->NOM_TYPE); ?>
                        </option>
                        <?php
                    }
                    ?>
                </select></th>
        <th><input type="submit" name="choix_type" value="Choisir" id="choisir_type" onclick="document.form_loc.choix_type.style.visibility='hidden';" /></th>
      </tr>
    </thead>
  </table>
   </form>
</div>
<br/>


<div class="container">
    <?php
    if (isset($liste)) {
        //  print "affiche";
        if ($nbrCakes > 0) {
            ?>
            <div class="row">
                <div class="col-sm-12 txtGras txt180">
                    <?php
                    print utf8_decode($liste[0]['NOM_TYPE']);
                    ?>
                </div>                             
            </div>
            <?php
            for ($i = 0; $i < $nbrCakes; $i++) {
                ?>  


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>PHOTO</th>
                            <th>CARATERISTIQUE</th>
                            <th>PRIX</th>
                            <th>CONFIRMER</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td> <img src="../admin/images/<?php print $liste[$i]['PHOTO']; ?>" alt="maison"/></td>
                            <td> <?php print utf8_decode($liste[$i]['CARATERISTIQUE']); ?> </td>
                            <td> <?php print utf8_decode($liste[$i]['PRIX'] . "/mois"); ?> </td>
                            <td> <a href="index.php?page=location&id=<?php print $liste[$i]['ID_HABITATION']; ?>">Louer</a></td>
                        </tr>
                    </tbody>
                </table>

                <?php
            } //fin for $i
            ?>            
            <?php
        } else {

            print "Aucune habitation dispoblie";
        }
        ?>

        <?php
    }
    ?>

</div>


