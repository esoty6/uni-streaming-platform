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
        <link rel="stylesheet" type="text/css" href="styles/loginStyles.css"></link>
    </head>
    <body class="plans">
    <?php 
    if(!$_SESSION["ZALOGOWANY"]) {
        header("Location: logowanie.php");
    }
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
                        <li class="nav-item link mx-5"><a class="nav-link" href="./konto.php">Konto</a></li>
                        <li class="nav-item link mx-5"><a class="nav-link" href="./logout.php">Wyloguj się</a></li>
                    </ul>
                </div>
                
            </nav>

        </header>

        <div class="infoTop">

            <div class="container">

                <div class="row justify-content-sm-center">
                        <div class="col-12">
                        <h1>Wybierz jeden z dostępnych planów</h1><br>
                        <p>i ciesz się rozrywką na najwyższym poziomie</p><br><br>
                        </div>
  
                </div>

                <br><br><br><br><br><br>

                <div class="row">

                        <button class="col-sm-12 col-md-4 pack" id="solo" onclick="soloBuy()">
                            <h1>SOLO</h1><br>
                            <p>Pakiet dla jednej osoby</p>
                            <p>Cena pakietu 9,99zł/msc</p>
                        </button><br><br>
                        

                        <button class="col-sm-12 col-md-4 pack" id="duo" onclick="duoBuy()">
                            <h1>DUO</h1><br>
                            <p>Pakiet dla dwóch osób</p>
                            <p>Cena pakietu 12,99zł/msc</p>
                        </button>
                        

                        <button class="col-sm-12 col-md-4 pack" id="bundle" onclick="bundleBuy()">
                            <h1>BUNDLE</h1><br>
                            <p>Pakiet dla maksymalnie 4 osób</p>
                            <p>Cena pakietu 19,99zł/msc</p>
                        </button><br><br>
                    
                </div>
                
            </div>
            
        </div>       
        
        <br>

        <script src="./script/loginAnimation.js"></script>
        
        <?php
            if ($_SESSION["ARRAY"]["ID_SUBSKRYPCJI"] == 1)
                echo "<script>soloBought()</script>";
            else if ($_SESSION["ARRAY"]["ID_SUBSKRYPCJI"] == 2)
                echo "<script>duoBought()</script>";
            else if ($_SESSION["ARRAY"]["ID_SUBSKRYPCJI"] == 3)
                echo "<script>bundleBought()</script>";
        ?>

        <?php
        session_write_close();
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>

