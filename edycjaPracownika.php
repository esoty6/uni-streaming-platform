<!doctype html>

<?php
session_start();
include "edycjaPracownikaPreload.php";
?>

<html lang="pl">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <?php 
        if(!$_SESSION["ZALOGOWANY_PRACOWNIK"]) {
            header("Location: logowanie.php");
        }
        $rola = $_SESSION["ARRAY"]["STANOWISKO"];
        if ($rola == 1) $rola = 'Kierownik';
        else $rola = 'Pracownik';
        ?>

        <header>
            <nav class="navbar fixed-top navbar-expand-md">

                <a class="navbar-brand mx-3" href="adminPanel.php">
                    <span><img src="images/brand-ico.png" width="32" height="32"></span>
                    <span>Widezo</span>
                </a>

                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="this.blur();">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                    <li class="nav-item link mx-5"><a class="nav-link" href="./adminPanel.php">Lista filmów</a></li>
                
                        <?php if ($rola == 'Kierownik') { ?>
                            <li class="nav-item link mx-5"><a class="nav-link" href="./zarzadzaniePracownikami.php">Zarządzanie pracownikami</a></li>
                        <?php } ?>
                        
                        <li class="nav-item link mx-5"><a class="nav-link" href="./logout.php">Wyloguj się</a></li>
                    </ul>
                </div>
                
            </nav>

        </header>

    <div class="register"><bR><bR>
        <div class="container-fluid d-flex justify-content-center my-3">
            <div class="flex-row w-50">
                <form class="col-12" name="edycja" method="post" action="updateWorker.php">
                        <label>Imie:</label>

                        <div>
                        <input type="text" id="imie" name="imie" maxlength="64" required><hr>
                        </div>

                        <label>Nazwisko:</label>

                        <div>
                        <input type="text" id="nazwisko" name="nazwisko" maxlength="64" required><hr>
                        </div>

                        <label>Stanowisko:</label>


                        <div id="stanowisko-div">
                        <select class="form-select" id="stanowisko" name="stanowisko">
                            <option disabled selected value> -- wybierz -- </option>
                        </select>
                        </div>
                        <hr>

                        <label>Numer telefonu:</label>

                        <div>
                        <input type="tel" id="numer" name="numer" pattern="[0-9]{9}" maxlength="9" required><hr>
                        </div>

                        <label>Login:</label>

                        <div>
                        <input class="col-8" type="text" id="login" name="login" maxlength="245" required>
                        <label class="col-3">@widezo.pl</label>
                        <hr>
                        </div>

                        <label>Hasło:</label>

                        <div>
                        <input type="password" id="haslo" name="haslo" maxlength="24" required><hr>
                        </div>


                    <div class="przycisk">
                        <button class="btn" id="dodajbutton" name="submit" type="submit">Zakończ edycję</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="./script/printError.js"></script>
    <script src="./script/fillEditionForm.js"></script>
    <script type="text/javascript">
            let pracownik = <?php echo json_encode($_SESSION['WORKER_DATA']); ?>;
            let stanowiska = <?php echo json_encode($_SESSION['STANOWISKA']); ?>;
            loadStanowiska(stanowiska);
            fillForm(pracownik);
    </script>

    <?php
        unset($_SESSION['STANOWISKA']);
        unset($_SESSION["WORKER_DATA"]);
        session_write_close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </body>
</html>

