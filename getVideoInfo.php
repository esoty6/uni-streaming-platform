<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $key = array_key_first($_POST);
    $id_filmu = $_POST[$key];
    
    require('Database.php');

    $query = "begin
    wczytaj_dane_filmu($id_filmu);
    end;";
        
    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $s = oci_parse($c, $query);

    $r = oci_execute($s);
         
    $x = oci_get_implicit_resultset($s);

    $row = oci_fetch_array($x, OCI_ASSOC);

    $_SESSION["url"] = $row["URL"];
}
else {
    header("Location: logowanie.php");
}
?>