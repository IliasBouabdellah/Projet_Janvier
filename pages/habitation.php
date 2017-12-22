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
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_location">  

        <div class="row">
            <div class="col-sm-1">
                <span class="txtGras">Votre choix</span>
            </div>
            <div class="col-sm-3">
                <select name="id_th" id="id_th">
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
                </select>
            </div>
            <div class="col-sm-2">
                <input type="submit" name="choix_type" value="Choisir" id="choisir_type"/>
            </div>

        </div>
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
                <div class="row">
                    <div class="col-sm-3">
                        <img src="admin/images/<?php print $liste[$i]['PHOTO']; ?>" alt="maison"/>
                    </div>
                    <div class="col-sm-4 text-center">                        
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-danger txtRouge">
                                <span class="txt150">
                                    <?php
                                    print utf8_decode($liste[$i]['CARATERISTIQUE']);
                                    ?>
                                </span>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <?php
                                print utf8_decode($liste[$i]['PRIX']);
                                ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <a href="index.php?page=location&id=<?php print $liste[$i]['ID_HABITATION']; ?>">
                                    Louer
                                </a>
                                <br/>
                            </div>                             
                        </div>
                    </div>
                    <?php
                } //fin for $i
                ?>
            </div>
            
            <?php
        }//fin if nbrCakes > 0
        else {
            ?>
            <div class="col-sm-12">Aucune habition disponible pour ce choix.</div>
            <?php
        }
    }//fin if isset $liste
    ?>
</div>

