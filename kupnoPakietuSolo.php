<?php
session_start();
if($_SESSION["ZALOGOWANY"]){
        $email = $_SESSION["ARRAY"]["EMAIL"];

        require('Database.php');

        $query = "BEGIN
        wykup_subskrypcje(
            '$email'
            ,1);
        END;";
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);
        if($r = oci_execute($s)){
            $_SESSION["ARRAY"]["ID_SUBSKRYPCJI"] = 1;
        };

        $query2 = "select data_zakupu_subskrypcji from uzytkownicy where email = '$email'";
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);
        $s = oci_parse($c, $query2);

        oci_define_by_name($s, "DATA_ZAKUPU_SUBSKRYPCJI", $dataNew);

        oci_execute($s);
        oci_fetch($s);
        $_SESSION["ARRAY"]["DATA_ZAKUPU_SUBSKRYPCJI"] = $dataNew;
    }
session_write_close();
header("Location: wykupDostep.php");

?>