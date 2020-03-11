<?php
$dsn = 'mysql:host=remotemysql.com:3306/;dbname=FulGmClGlR';
$db_username = 'FulGmClGlR';
$db_password = 'jPDKaq2RX6';
try{
    $connection = new PDO($dsn,$db_username,$db_password);
}catch(PDOException $e){
    print_r($e);
}


?>