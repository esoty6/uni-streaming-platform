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
        <br><br><br>



<table id="adminTable">
                <tr>
                    <th>Imie pracownika</th>
                    <th>Nazwisko pracownika</th>
                    <th>Stanowisko</th>
                    <th>Tytul filmu</th>
                    <th>Opis edycji</th>
                    <th>Data edycji</th>
                </tr>
                <?php
                    $key = key($_POST);
                    
                    $idFilmu = $_POST[$key];

                    require('Database.php');

                    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

                    $query = "begin
                    wczytaj_edycje($idFilmu);
                    end;";
                
                    $s = oci_parse($c, $query);
                
                    $r = oci_execute($s);
                        
                    $i = 1;
                    while ($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) {
                ?>
                    <tr class="column">
                        <?php
                            foreach ($row as $item) {
                        ?>
                                <td>     
                                    <?php
                                        echo $item!==null? $item :"Brak danych";
                                    ?>
                                </td>
                        <?php
                            }
                        ?>
                    </tr>
                <?php
                        $i++;
                    }
                ?>
</table>


<?php
        session_write_close();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>