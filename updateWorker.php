<?php
session_start();
preg_match("/^[a-zA-Z0-9]*/", $_POST['login'], $login);
$login = $login[0]."@widezo.pl";

require('Database.php');

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$stanowisko = $_POST['stanowisko'];
$numer = $_POST['numer'];
$haslo = $_POST['haslo'];
$id = $_SESSION['ID_PRACOWNIKA_EDYCJA'];

unset($_SESSION['ID_PRACOWNIKA_EDYCJA']);

$query = "BEGIN
        :pracownik := aktualizuj_pracownika_func(
            $id, '$imie', '$nazwisko', '$stanowisko', '$numer', '$login', '$haslo'
        );
        END;";
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        oci_bind_by_name($s, ':pracownik', $pracownik);

        $r = oci_execute($s);

        if ($pracownik == 0) {
            echo "<script> alert('Pomyślnie dokonano edycji pracownika')</script>";
        }
        else { 
            echo "<script> alert('Nie udało się dokonać edycji pracownika')</script>";
        }
        header("Location: zarzadzaniePracownikami.php");

session_write_close();
?>