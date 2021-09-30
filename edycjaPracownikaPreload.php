<?php
    require('Database.php');

    $key = key($_POST);

    $id_pracownika = $_POST[$key];

    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $query = "BEGIN
        wczytaj_pracownika($id_pracownika);
        END;";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    $row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS);

    preg_match("/^[a-zA-Z0-9]*/", $row['EMAIL'], $row['EMAIL']);

    $_SESSION['WORKER_DATA'] = $row;
    $_SESSION['ID_PRACOWNIKA_EDYCJA'] = $id_pracownika;

    $query = "select nazwa_stanowiska from stanowiska";

    $s = oci_parse($c, $query);
                
    $r = oci_execute($s);

    oci_fetch_all($s, $row);

    $_SESSION["STANOWISKA"] = $row;
?>