<?php
include ('./admin/lib/php/php_file_include.php');
print $dsn;
$cnx = Connexion::getinstance($dsn, $user, $pass);

session_start();
?>

<html>
    <head>

        <meta content="text/html;" charset="UTF-8" http-equiv="Content-Type">

        <title>Une maison pour tous</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src=""></script>
        <!--<link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0-beta/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/c-->

    </head>

    <body>


        <div class="container">
            <header>
                <img src="images/cropped-banniere-site.png" alt="banniere"/>
                 <link rel="stylesheet" type="text/css" href="admin/lib/css/style_masion.css"/>
            </header>

            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <nav>
                            <?php
                            if (file_exists("./lib/php/Projet_menu.php")) {
                                include("./lib/php/Projet_menu.php");
                            }
                            ?>
                        </nav>
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-11"><a href="./admin/index.php" class="float-right">Connexion</a></div>
                        </div>
                        <section>
                            <?php
                            //on arrive sur le site
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "accueil";
                            }
                            //on a cliquez sur un lien du menu
                            if (isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                            $path = "./pages/" . $_SESSION['page'] . ".php";
                            if (file_exists($path)) {
                                include ($path);
                            } else {
                                print "Oups , la  page n'existe pas";
                            }
                            ?>
                        </section>
                        <footer><?php
                            if (file_exists("./lib/php/Projet_footer.php")) {
                                include("./lib/php/Projet_footer.php");
                            }
                            ?>
                        </footer>
                    </div>
                </div>
            </div>


        </div>





    </body>


</html>