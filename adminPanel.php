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

    <script src="./script/changeView.js"></script>

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
                        <li class="nav-item link mx-5"><a class="nav-link" href="./dodajFilm.php">Dodaj Film</a></li>
                        
                        <?php if ($rola == 'Kierownik') { ?>
                            <li class="nav-item link mx-5"><a class="nav-link" href="./zarzadzaniePracownikami.php">Zarządzanie pracownikami</a></li>
                        <?php } ?>
                        
                        <li class="nav-item link mx-5"><a class="nav-link" href="./logout.php">Wyloguj się</a></li>
                    </ul>
                </div>
                
            </nav>
        </header>


            <div class="container-fluid justify-content-center">
                <div class="movies">
                    <div class="row">
                        <div class="col-12">
                            <h1>Zalogowano jako <?php  echo $rola ?></h1><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5"></div>
                            <div class="col-2">
                                <a class="nav-link" href="./indexPreview.php">Zmień na widok użytkownika</a>
                            </div>
                        <div class="col-5"></div>
                    </div>
                </div>
            </div>

        <table id="adminTable">
                <tr>
                    <th>Id filmu</th>
                    <th>Tytuł</th>
                    <th>Imie reżysera</th>
                    <th>Nazwisko reżysera</th>
                    <th>Gatunek</th>
                    <th>Wytwórnia</th>
                    <th>Edycja</th>
                </tr>
                <?php
                    require('Database.php');

                    $query = "select id_filmu from filmy";
                        
                    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

                    $s = oci_parse($c, $query);
                    
                    $r = oci_execute($s);

                    oci_fetch_all($s, $array);
                    
                    $_SESSION["ID_FILMOW"] = $array;

                    $ids = $_SESSION["ID_FILMOW"]["ID_FILMU"];

                    $query = "begin
                    wczytaj_filmy();
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
                                        echo $item;
                                    ?>
                                </td>
                        <?php
                            }
                            if($rola == 'Kierownik'){
                                echo "<td>
                                    <form method='post' action='edycja.php'>
                                        <button class='btn edit' type='submit'>Edytuj film</button>
                                    </form>
                                    <form method='post' action='podgladEdycji.php'>
                                        <button class='btn view' type='submit'>Podgląd edycji</button>
                                    </form>
                                    <form method='post' action='removeVideo.php' id='formDelete$i'>
                                        <button class='btn delete' type='button' onclick='potwierdz($i)'>Usuń</button>
                                    </form>
                                </td>";
                            }
                            else {
                                echo "<td>
                                    <form method='post' action='edycja.php'>
                                        <button class='btn edit' type='submit'>Edytuj film</button>
                                    </form><br>
                                    <form method='post' action='podgladEdycji.php'>
                                        <button class='btn view' type='submit'>Podgląd edycji</button>
                                    </form>
                                </td>";
                            }
                        ?>
                    </tr>
                <?php
                        $i++;
                    }
                ?>
            </table>
            <div id="user">
            </div>

        <script src="./script/editFilm.js"></script>
        <script type="text/javascript">
            let id_filmow = <?php echo json_encode($ids); ?>;
            editVideo(id_filmow);
        </script>

        <?php
        unset($_SESSION['GATUNKI']);
        unset($_SESSION['ID_FILMOW']);
        unset($_SESSION['WYTWORNIE']);
        unset($_SESSION['REZYSERZY']);
        unset($_SESSION['FILM_DATA']);
        unset($_SESSION['ID_PRACOWNIKOW']);
        session_write_close();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>

