<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $haslo = $_SESSION["ARRAY"]["HASLO"];
    $email = $_SESSION["ARRAY"]["EMAIL"];

    $_SESSION["ZMIENIONO"] = 0;

    require('Database.php');
        
    $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

    if(isset($_POST["oldPass"])){
        if ($haslo == $_POST["oldPass"]){

            $newPass = $_POST["newPass"];

            $query = "begin
            zmien_dane('$email', null, '$haslo', '$newPass');
            end;";
                
            $s = oci_parse($c, $query);
            oci_execute($s);
            $_SESSION["ARRAY"]["HASLO"] = $newPass;
            $_SESSION["ZMIENIONO"] = 1;
        }
        else {
            $_SESSION["ZMIENIONO"] = -1;
        }
    }


    if(isset($_POST["oldEmail"])){
        if ($email == $_POST["oldEmail"]){

            $newEmail = $_POST["newEmail"];

            $query = "begin
            :succes := zmien_dane_func('$email', '$newEmail', null, null);
            end;";
                
            $s = oci_parse($c, $query);

            oci_bind_by_name($s, ":succes", $succes, 2);

            $r = oci_execute($s);
            if($succes == '0'){
                $_SESSION["ARRAY"]["EMAIL"] = $newEmail;
                $_SESSION["ZMIENIONO"] = 1;
            }
            else {
                $_SESSION["ZMIENIONO"] = -2;
            }
        }
        else {
            $_SESSION["ZMIENIONO"] = -1;
        }
    }

    if(isset($_POST["confirm"])){
        $query = "begin
        :result := usun_uzytkownika_func('$email');
        end;";
                
        $s = oci_parse($c, $query);

        oci_bind_by_name($s, ":result", $succes, 2);

        $r = oci_execute($s);
        if ($succes == 0)
            header("Location: logout.php");
        else{
            $_SESSION["ZMIENIONO"] = -1;
        }
    }
    
    oci_close($c);
}
?>
