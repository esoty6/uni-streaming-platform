<?php
    require('Database.php');

    $query = "select img from filmy";
        
    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $s = oci_parse($c, $query);
    
    $r = oci_execute($s);

    oci_fetch_all($s, $array);
    $_SESSION["IMG"] = $array;

    $query = "select id_filmu from filmy";
        
    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $s = oci_parse($c, $query);
    
    $r = oci_execute($s);

    oci_fetch_all($s, $array);

    $_SESSION["ID_FILMOW"] = $array;
    $_SESSION["LICZBA_FILMOW"] = oci_num_rows($s);
    
    $query2 = "select tytul from filmy";

    $s = oci_parse($c, $query2);

    $r = oci_execute($s);

    oci_fetch_all($s, $twoarray);

    $_SESSION["TYTULY_FILMOW"] = $twoarray;
?>