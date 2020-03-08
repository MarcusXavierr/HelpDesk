<?php

session_start();



$dsn = 'mysql:host=localhost;dbname=help_desk';
$db_username = 'root';
$db_password = '';
$autentication = false;
$_SESSION['access'] = 'denied';

try{
    $connection = new PDO($dsn,$db_username,$db_password);

    $query = "Select * from users";
    $stmt = $connection->query($query);
    $users_list = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($users_list as $user){
        if($_POST['email'] == $user->email && $_POST['password'] == $user->password){
            $user_id = $user->id;
            $user_credentials = $user->admin;
            $autentication = true;
        }

        if($autentication){
            $_SESSION['access'] = 'accepted';
            $_SESSION['id'] = $user_id;
            $_SESSION['credentials'] = $user_perfil_id;
            header('Location:../home.php');
        
        } else{
            header('Location:../index.php?login=error');
        }
    }

}catch(PDOException $e){
    echo "Error: {$e->getCode()}; Message: {$e->getMessage()}";

}







?>