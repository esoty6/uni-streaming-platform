<!doctype html>
<?php
session_start();
?>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/loginStylesMod.css"></link>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <?php 
    if(!$_SESSION["ZALOGOWANY"]) {
        header("Location: logowanie.php");
    }
    include "loadVideos.php";
    ?>

        <header>
            <nav class="navbar fixed-top navbar-expand-md">

                <a class="navbar-brand mx-3" href="#powitanie">
                    <span><img src="images/brand-ico.png" width="32" height="32"></span>
                    <span>Widezo</span>
                </a>

                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="this.blur();">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item link mx-5"><a class="nav-link" href="./adminPanel.php">Zmień na widok pracownika</a></li>
                    </ul>
                </div>
                
            </nav>

        </header>
        <br id="powitanie">

        <div class="container mt-5 proposition" id="videos"></div> 
        <script src="./script/loadImages.js"></script>

        <script src="./script/checkSubscription.js"></script>

        <?php
            $nb = $_SESSION["LICZBA_FILMOW"];
            $img = $_SESSION["IMG"];
            $ids = $_SESSION["ID_FILMOW"]["ID_FILMU"];
            for($i = 0; $i < $nb; $i++){
                $title = $_SESSION["TYTULY_FILMOW"]['TYTUL'][$i];
                echo "<script>loadTitles('$title')</script>";
            }
        ?>

        <script type="text/javascript">
            let id_filmow = <?php echo json_encode($ids); ?>;
            let img = <?php echo json_encode($img); ?>;
            loadVideos(id_filmow, img);
        </script>

        <script>
        let buy = () => {
            window.location.href = "wykupDostep.php";
        }
        </script>

        <?php
        echo "<script src='./script/changeView.js'></script>";
        session_write_close();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>

