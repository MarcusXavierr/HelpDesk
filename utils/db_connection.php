<?php
$dsn = 'mysql:host=host:3306/;dbname=db_name';
$db_username = 'username';
$db_password = 'your_pass';

try
{
    $connection = new PDO($dsn,$db_username,$db_password);
}
catch(PDOException $e)
{
    print_r($e);
}


?>