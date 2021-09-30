<?php
session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            require('Database.php');

            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $query = "BEGIN
            zaloguj_uzytkownika(
                '$email'
                ,'$pass');
            END;";
                
            $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

            $s = oci_parse($c, $query);

            $r = oci_execute($s);

            $row = oci_fetch_array($s);

            $_SESSION["ARRAY"] = $row;
            $_SESSION["ZALOGOWANY"] = false;

            if(is_bool($_SESSION["ARRAY"])){

                $query = "BEGIN
                zaloguj_pracownika(
                '$email'
                ,'$pass');
                END;";

                $c = oci_pconnect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

                $s = oci_parse($c, $query);

                $r = oci_execute($s);
                $x = oci_get_implicit_resultset($s);
                $row = oci_fetch_array($x, OCI_ASSOC);
                
                $_SESSION["ARRAY"] = $row;
                $_SESSION["ZALOGOWANY"] = false;

                if(is_bool($_SESSION["ARRAY"])){
                    $_SESSION["ZALOGOWANY"] = false;
                    header("Location: logowanie.php");
                }
                else {
                    $_SESSION["ZALOGOWANY"] = true;
                    $_SESSION["ZALOGOWANY_PRACOWNIK"] = true;
                    $_SESSION["ARRAY"]["STANOWISKO"] = $row["ID_STANOWISKA"];
                    header("Location: logowanie.php");
                }
            }
            else {
                $_SESSION["ZALOGOWANY"] = true;
                header("Location: logowanie.php");
            }
        }
        session_write_close();
    ?>