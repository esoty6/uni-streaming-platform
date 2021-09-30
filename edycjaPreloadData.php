<?php
    require('Database.php');

    $key = key($_POST);

    $id_filmu = $_POST[$key];

    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $query = "BEGIN
        wczytaj_film($id_filmu);
        END;";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    $row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS);

    $_SESSION["FILM_DATA"] = $row;

    $query = "select id_gatunku, nazwa_gatunku from gatunki";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    oci_fetch_all($s, $row);

    $_SESSION["GATUNKI"] = $row;

    $query = "select * from wytwornie";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    oci_fetch_all($s, $row);

    $_SESSION["WYTWORNIE"] = $row;

    $query = "select * from rezyserzy";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    oci_fetch_all($s, $row);

    $_SESSION["REZYSERZY"] = $row;
?>