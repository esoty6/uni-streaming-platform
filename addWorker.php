<?php
preg_match("/^[a-zA-Z0-9]*/", $_POST['login'], $login);
$login = $login[0]."@widezo.pl";

require('Database.php');

print_r($_POST);

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$stanowisko = $_POST['stanowisko'];
$numer = $_POST['numer'];
$haslo = $_POST['haslo'];

$query = "BEGIN
        :pracownik := dodaj_pracownika_func(
            '$imie', '$nazwisko', '$stanowisko', '$numer', '$login', '$haslo'
        );
        END;";
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        
        oci_bind_by_name($s, ':pracownik', $pracownik);

        $r = oci_execute($s);

        if ($pracownik == 0) {
            echo "<script> alert('Pomyślnie dodano pracownika')</script>";
        }
        else { 
            echo "<script> alert('Nie udało się dodać pracownika')</script>";
        }
        header("Location: zarzadzaniePracownikami.php");
?>