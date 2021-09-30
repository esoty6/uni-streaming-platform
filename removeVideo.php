<?php
session_start();
$key = key($_POST);
$id = $_POST[$key];

require('Database.php');

    $query = "begin
    :a := usun_film_func($id);
    end;";
    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    $s = oci_parse($c, $query);

    oci_bind_by_name($s, ":a", $result);

    $r = oci_execute($s);
    header("Location: adminPanel.php");
?>