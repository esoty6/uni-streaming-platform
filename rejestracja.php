<!doctype html>

<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
    </head>

    <body id="body">

    <header>

        <nav class="navbar navbar-expand-md">

            <a class="navbar-brand mx-3" href="./index.php">
                <span><img src="images/brand-ico.png" width="32" height="32"></span>
                <span>Widezo</span>
            </a>

            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="this.blur();">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item link mx-5"><a class="nav-link" href="./rejestracja.php">Zarejestruj się</a></li>
                    <li class="nav-item link mx-5"><a class="nav-link" href="./logowanie.php">Zaloguj się</a></li>
                </ul>
            </div>
            
        </nav>

    </header>

    <div class="register">
        <div class="container my-3">
            <div class="row">
                <div class="col-6 registration">
                    <h1>Rejestracja nowego konta</h1><br>
                    <p>Wypełnij wszystkie pola, zatwierdź rejestrację przyciskiem</p>
                    <p>i ciesz się z dostępu do bazy filmów!</p>&nbsp;

                    <div id="result">
                    
                    <script src="./script/succes.js"></script>
                    <?php
                        session_start();
                        if(isset($_SESSION["SUCCES"])){
                            if(!$_SESSION['SUCCES']){
                                unset($_SESSION['SUCCES']);
                                echo "<script>registerSucces(false)</script>";
                            }
                            else {
                                unset($_SESSION['SUCCES']);
                                echo "<script>registerSucces(true)</script>";
                            }
                        }
                    ?>
                    </div>

                </div>
                <form class="col-6" name="registration" method="post" action="register.php">
                    <label>Imię:</label>

                    <div>
                    <input type="text" id="fname" name="fname" maxlength="64" required><hr>
                    </div>

                    <label>Nazwisko:</label>

                    <div>
                    <input type="text" id="lname" name="lname" maxlength="64" required><hr>
                    </div>

                    <label>Email:</label>

                    <div>
                    <input type="email" id="email" name="email" maxlength="255" required><hr>
                    </div>

                    <label>Hasło:</label>

                    <div>
                    <input type="password" id="pass" name="pass" maxlength="24"  onkeyup="formValidationPass()"><hr>
                    </div>

                    <label>Numer telefonu:</label>

                    <div>
                    <input type="tel" id="nrtel" name="nrtel" maxlength="9"  onkeyup="formValidationNr()"><hr>
                    </div>

                    <div class="przycisk">
                        <button class="btn" name="submit" type="submit" disabled>Zarejestruj się!</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <footer class="footer fixed-bottom mt-auto py-2">
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

    <script>
        function formValidationPass(){
            let pass = document.forms["registration"]["pass"].value;
            let btn = document.forms["registration"]["submit"];
            let nr = document.forms["registration"]["nrtel"].value;
            let reg = new RegExp('^[0-9]+$');

            if(pass.length >= 8){
                document.forms["registration"]["pass"].style.border = "2px solid green";
                if(nr.length == 9 && reg.test(nr))
                    btn.disabled = false;
            }
            else{
                document.forms["registration"]["pass"].style.border = "2px solid red";
                btn.disabled = true;
            }
        }

        function formValidationNr(){
            let pass = document.forms["registration"]["pass"].value;
            let btn = document.forms["registration"]["submit"];
            let nr = document.forms["registration"]["nrtel"].value;
            let reg = new RegExp('^[0-9]+$');
            if(nr.length == 9 && reg.test(nr)){
                document.forms["registration"]["nrtel"].style.border = "2px solid green";
                if(pass.length >= 8)
                    btn.disabled = false;
            }
            else{
                document.forms["registration"]["nrtel"].style.border = "2px solid red";
                btn.disabled = true;
            }
        } 
    </script>
    <?php 
        session_write_close();
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>

