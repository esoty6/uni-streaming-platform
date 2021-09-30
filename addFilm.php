<?php
session_start();
    require('Database.php');

    $idPracownika = $_SESSION["ARRAY"]["ID_PRACOWNIKA"];

    if (isset($_POST["tytul"]) &
    isset($_POST["opis"]) &
    isset($_POST["url"]) &
    isset($_POST["imie-nazwisko"]) &
    isset($_POST["gatunek"]) &
    isset($_POST["wytwornia"]) &
    isset($_POST["url-img"])
    ){
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $url = $_POST['url'];
        $imie_nazwisko = $_POST['imie-nazwisko'];
        $gatunek = $_POST['gatunek'];
        $wytwornia = $_POST['wytwornia'];
        $img = $_POST["url-img"];

        $imie = explode(' ', $imie_nazwisko);

        $query = "BEGIN
        :filmId := dodaj_film_func(
            '$tytul', '$opis', '$url', '$imie[0]', '$imie[1]', '$gatunek', '$wytwornia', '$img'
        );
        END;";
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        oci_bind_by_name($s, ':filmId', $filmId);

        $r = oci_execute($s);

        $opis = "Pracownik dodał film do bazy.";

        $query = "BEGIN
        dodaj_edycje(
            $idPracownika, $filmId, '$opis'
        );
        END;";

        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        $r = oci_execute($s);

        echo "<script>alert('Dodano film')</script>";
    }
    else if (isset($_POST["tytul"]) &
    isset($_POST["opis"]) &
    isset($_POST["url"]) &
    isset($_POST["imie-rezysera"]) &
    isset($_POST["nazwisko-rezysera"]) &
    isset($_POST["gatunek"]) &
    isset($_POST["wytwornia"]) &
    isset($_POST["url-img"])
    ){
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $url = $_POST['url'];
        $imie = $_POST['imie-rezysera'];
        $nazwisko = $_POST['nazwisko-rezysera'];
        $gatunek = $_POST['gatunek'];
        $wytwornia = $_POST['wytwornia'];
        $img = $_POST['url-img'];

        $query = "BEGIN
        :filmId := dodaj_film_func(
            '$tytul', '$opis', '$url', '$imie', '$nazwisko', '$gatunek', '$wytwornia', '$img'
        );
        END;";
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        oci_bind_by_name($s, ':filmId', $filmId);

        $r = oci_execute($s);

        $opis = "Pracownik dodał film do bazy.";

        $query = "BEGIN
        dodaj_edycje(
            $idPracownika, $filmId, '$opis'
        );
        END;";

        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        $r = oci_execute($s);
        echo "<script>alert('Dodano film')</script>";
    }
    else {
        echo "<script>alert('Nie udało się dodać filmu')</script>";
    }

    session_write_close(); 
    echo "<script>setTimeout(() => {window.location.href = 'adminPanel.php'}, 300)</script>";
?>

