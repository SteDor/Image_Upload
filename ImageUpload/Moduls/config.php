<?php 
    require_once('../ImageUpload/Database.php');

    $servername = 'localhost';
    $username = "Sepax";
    $password = '123';
    $databasename = 'picturefiles';

    //define('servername', 'localhost');
    //define('$username', 'Sepax');
    //define('password ', '123');
    //define('$databasename', 'picturefiles');
    
    $db = new Database($servername , $username, $password, $databasename);

?>