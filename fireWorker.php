<html id="html-error" lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oglądaj filmy online</title>
        <link rel="shortcut icon" href="images/brand-ico.png"/>
        <link rel="stylesheet" type="text/css" href="styles/loginStyles.css"></link>
    </head>
<body id="body-error">
<script src="./script/succes.js"></script>
<?php
session_start();
require('Database.php');

$key = key($_POST);
$id = $_POST[$key];
$id_aktualne = $_SESSION['ARRAY']['ID_PRACOWNIKA'];

if ($id == $id_aktualne) {
    echo '<script>alert("Nie możesz zwolnić sam siebie")</script>';
    
    echo '<script>printW()</script>';
}
else {
    $query = "BEGIN
            :pracownik := usun_pracownika_func(
                $id
            );
            END;";
                
            $c = oci_connect($username, $password, $database, 'AL32UTF8', OCI_SYSDBA);
    
            $s = oci_parse($c, $query);
            
            oci_bind_by_name($s, ':pracownik', $pracownik);
    
            $r = oci_execute($s);
            header("Location: zarzadzaniePracownikami.php");
        }

session_write_close();
?>
</body>
</html>