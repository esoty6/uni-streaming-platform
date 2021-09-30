<html>
<body>
<script src="./script/succes.js"></script>

<?php
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $tel = $_POST['nrtel'];

        if(!preg_match("/widezo.pl/", $_POST['email'])){

        require('Database.php');

        $query = "BEGIN
        :result := dodaj_uzytkownika_func(
            '$fname'
            ,'$lname'
            ,'$email'
            ,'$pass'
            ,$tel);
        END;";
            
        $c = oci_pconnect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);

        $s = oci_parse($c, $query);

        oci_bind_by_name($s, ":result", $result, 2);

        $r = oci_execute($s);

        if($result == 0){
            $_SESSION['SUCCES'] = true;
            header("Location: rejestracja.php");
        }
        else {
            $_SESSION['SUCCES'] = false;
            header("Location: rejestracja.php"); 
        } 
    }
    else {
        $_SESSION['SUCCES'] = false;
        header("Location: rejestracja.php"); 
    } 
};
    
session_write_close();
?>
</body>
</html>