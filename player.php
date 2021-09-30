
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/playerStyles.css"></link>
    </head>
    <body class="d-flex flex-column min-vh-100">

    <?php
        session_start();
        if (!$_SESSION["ZALOGOWANY"]){
            header("Location: logowanie.php");
        }
        include "getVideoInfo.php";
    ?>

    <header>

            <nav class="navbar fixed-top navbar-expand-md">

                <a class="navbar-brand mx-3" href="indexLogin.php">
                    <span><img src="images/brand-ico.png" width="32" height="32" alt="Widezo"></span>
                    <span>Widezo</span>
                </a>

                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="this.blur();">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item link mx-5"><a class="nav-link" href="./wykupDostep.php">Subskrypcja</a></li>
                        <li class="nav-item link mx-5"><a class="nav-link" href="./biblioteka_filmow.php">Konto</a></li>
                        <li class="nav-item link mx-5"><a class="nav-link" href="./logout.php">Wyloguj się</a></li>
                    </ul>
                </div>
                
            </nav>

        </header>

        <div class="container">
        <div class="col-11 filmInfo">
                <br>
                    <h1> <?php echo $row["TYTUL"] ?> </h1>
                </div><hr>

        <div class="ratio ratio-16x9">
                <iframe src="<?php echo $_SESSION["url"] ?>" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div><br>
            

            <div class="row">
                
                <hr>

                <div class="col-11 filmInfo">
                    Reżyseria: <?php echo $row["IMIE"] ?>
                    <?php echo $row["NAZWISKO"] ?>
                </div>

                <div class="col-11 filmInfo">
                    Wytwórnia: <?php echo $row["NAZWA_WYTWORNI"] ?>
                </div> 

                <div class="col-11 filmInfo">
                    <?php echo $row["OPIS_FILMU"] ?>
                </div>
                
            </div>


        </div>
        <br>

        <?php
        session_write_close();
        ?>

        
        <script src="script/videosInfo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
    
</html>

