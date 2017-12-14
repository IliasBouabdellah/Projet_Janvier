<h2 id="titre">Bienvenue chez Sois</h2>
<?php
$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("accueil");
//var_dump($texte);
?>

<div class="row">
    <div class="col-sm-8">
        <div id="gt_carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./images/maison11.jpg" alt="maison1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/maison1.jpg" alt="mai2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/maison2.jpg" alt="mai3">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/maison3.jpg" alt="mai4">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/app1" alt="mai5">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</div>