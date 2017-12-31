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



                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> NOM</th>
                            <th> NUMERO</th>
                            <th> ADRRSSE MAIL</th>
                            <th> CONTACTER </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php print utf8_decode($liste[$i]['NOM_PRO']) ?></td>
                            <td><?php print $liste[$i]['NUM_PRO']; ?></td>
                            <td><?php print utf8_decode($liste[$i]['MAIL_PRO']); ?></td>
                            <td> <a href="index.php?page=conctacte_pro&mail=<?php print $liste[$i]['MAIL_PRO']; ?>"> Contacter </a> </td>
                        </tr>
                    </tbody>
                </table>

                <?php
            }//fin if nbrCakes > 0
        } else {
            ?>
            <div class="col-sm-12">Aucune proprio disponible</div>
            <?php
        }
    }//fin if isset $liste
    ?>


</div>



