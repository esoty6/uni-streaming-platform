<?php
session_start();
if($_SESSION["ZALOGOWANY"]){
        $email = $_SESSION["ARRAY"]["EMAIL"];
        $pass = $_SESSION["ARRAY"]["HASLO"];

        require('Database.php');
            
        $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $query = "BEGIN
            wykup_subskrypcje(
                '$email'
                ,0);
            END;";

        $s = oci_parse($c, $query);
        if($r = oci_execute($s)){
            $_SESSION["ARRAY"]["ID_SUBSKRYPCJI"] = 0;
        };
        echo $_SESSION["ARRAY"]["DATA_ZAKUPU_SUBSKRYPCJI"];
    }
session_write_close();
header("Location: indexLoginNoSubscription.php");

?>