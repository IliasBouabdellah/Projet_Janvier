<?php
$cake = new Liste_proprioDB($cnx);
$liste = $cake->getProprio();
 $nbrCakes = count($liste);
?>


<div class="container">
    <?php
    if (isset($liste)) {
      //  print "affiche";
        if ($nbrCakes > 0) {
            ?>
            <div class="row">
                <div class="col-sm-12 txtGras txt180">
                    <?php
                    print "Liste des proprietaires";
                    ?>
                </div>                             
            </div>
            <?php
            for ($i = 0; $i < $nbrCakes; $i++) {
                ?>
                <div class="row">
                    <div class="col-sm-3">
                       <?php print $liste[$i]['NOM_PRO']; ?>
                    </div>
                    <div class="col-sm-4 text-center">                        
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-danger txtRouge">
                                <span class="txt150">
                                    <?php
                                    print utf8_decode($liste[$i]['NUM_PRO']);
                                    ?>
                                </span>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <?php
                                print utf8_decode($liste[$i]['MAIL_PRO']);
                                ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <a href="index.php?page=conctacte_pro&mail=<?php print $liste[$i]['MAIL_PRO']; ?>">
                                    Contacter
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
            <div class="col-sm-12">Aucune proprio disponible</div>
            <?php
        }
    }//fin if isset $liste
    ?>
</div>


