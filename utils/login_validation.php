<?php

session_start();

/*
To make the application more practical, 
I will use an array with the information of the registered users 
instead of taking it from a database
*/

$userbase = [
    ['email' => 'marcusxavierr123@gmail.com', 'password' => '123456', 'id' => '1', 'user_credentials' => '1'],
    ['email' => 'adm@gmail.com', 'password' => 'abcd', 'id' => '2', 'user_credentials' => '1'],
    ['email' => 'test@gmail.com', 'password' => '147258369', 'id' => '3', 'user_credentials' => '2'],
    ['email' => 'random@gmail.com', 'password' => '654321', 'id' => '4', 'user_credentials' => '2']
];
//user_credentials 1 = Admin
//user_credential 2 = simple user
$autentication = false;
$_SESSION['access'] = 'denied';

foreach ($userbase as $user){
    if($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']){
        $user_id = $user['id'];
        $user_perfil_id = $user['user_credentials']; //defines whether the user is an administrator or a simple user
        $autentication = true;
    } 
}

if($autentication){
    $_SESSION['access'] = 'accepted';
    $_SESSION['id'] = $user_id;
    $_SESSION['credentials'] = $user_perfil_id;
    header('Location:../home.php');

} else{
    header('Location:index.php?login=error');
}

?>