<?php
session_start();
require('Database.php');

    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $url = $_POST['url'];
    $gatunek = $_POST['gatunek'];
    $wytwornia = $_POST['wytwornia'];
    $opis_edycji = $_POST['opis-edycji'];
    $img = $_POST["img"];

    if (isset($_POST['imie-nazwisko'])){
        $imie_nazwisko = $_POST['imie-nazwisko'];
        $imie = explode(' ', $imie_nazwisko);
        $query = "BEGIN
        aktualizuj_film(
            '$tytul','$opis','$url', '$imie[0]','$imie[1]','$gatunek','$wytwornia', '$img'
        );
        END;";
    }
    else {
        $imie = $_POST["imie-rezysera"];
        $nazwisko = $_POST["nazwisko-rezysera"];
        $query = "BEGIN
        aktualizuj_film(
            '$tytul','$opis','$url', '$imie','$nazwisko','$gatunek','$wytwornia', '$img'
        );
        END;";
    }

    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);


    $id_pracownika = $_SESSION["ARRAY"]["ID_PRACOWNIKA"];


    $query = "select id_filmu from filmy where tytul = '$tytul'";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    $id_filmu = oci_fetch($s);


    $query = "select id_filmu from filmy where tytul = '$tytul'";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    $id_filmu = oci_fetch($s);

    $query = "begin
    dodaj_edycje($id_filmu, $id_pracownika, '$opis_edycji');
    end;";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    header("Location: adminPanel.php");
?>
