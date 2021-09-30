<!doctype html>
<?php
session_start();
$_SESSION["ZMIENIONO"] = 0;
?>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/loginStyles.css"></link>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <?php 
    if(!$_SESSION["ZALOGOWANY"]) {
        header("Location: logowanie.php");
    }
    include "updateUserData.php";
    ?>

        <header>
            <nav class="navbar fixed-top navbar-expand-md">

                <a class="navbar-brand mx-3" href="indexLogin.php">
                    <span><img src="images/brand-ico.png" width="32" height="32"></span>
                    <span>Widezo</span>
                </a>

                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="this.blur();">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item link mx-5"><a class="nav-link" href="./wykupDostep.php">Subskrypcja</a></li>
                        <li class="nav-item link mx-5"><a class="nav-link" href="./konto.php">Konto</a></li>
                        <li class="nav-item link mx-5"><a class="nav-link" href="./logout.php">Wyloguj się</a></li>
                    </ul>
                </div>
                
            </nav>

        </header>

        
        <script src="./script/infoUpdate.js"></script>
        <br><br>
        <main id="zmiana">
            <div class="container d-flex justify-content-center align-items-center my-5">
                <div class="flex-row">

                    <div class="flex-column">
                        <button class="btn change" onclick="appendPassForm()">Zmiana hasła</button>
                    </div>
            
                </div>
                <div class="flex-row">

                    <div class="flex-column mx-3">
                        <button class="btn change" onclick="appendEmailForm()">Zmiana email</button>
                    </div>
            
                </div>
                <div class="flex-row">

                    <div class="flex-column">
                        <button class="btn error" type="button" onclick="deleteAccount()">Usuń konto</button>
                    </div>
            
                </div>
            </div>
        </main>
        
        <footer class="footer mt-auto py-2">
            <div class="container-fluid">
    <div class="row">
                <div class="col-sm-12 col-md-4">

                    <div class="col-sm-12 py-2">
                        Kontakt
                    </div>

                    <div class="col">
                        <div class="col-sm-12">
                            kontakt@widezo.pl
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-4 mt-2">

                    <div class="col-sm-12 py-2">
                        Newsletter
                    </div>

                    <div class="col">
                        <div class="col-sm-12">
                            <span class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Zapisz się do newslettera!" aria-describedby="button-addon2"/>
                                <button class="btn-outline-primary" type="button" id="button-addon2" mdbRipple rippleColor="danger" >
                                    Zapisz się!</button>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-md-4 mt-2">

                    <div class="col-sm-12 py-2">
                        Polityka prywatności
                    </div>

                    <div class="col">
                        <div class="col-sm-12">
                            <a class="a" target="_blank" href="https://holding.wp.pl/poufnosc">Link</a>
                        </div>
                    </div>

                </div>

                </div>
            </div>
        </footer>

        <script src="./script/succes.js"></script>

        <?php
            $result = $_SESSION["ZMIENIONO"];
            echo "<script>display($result)</script>"
        ?>

        <?php
        session_write_close();
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>

