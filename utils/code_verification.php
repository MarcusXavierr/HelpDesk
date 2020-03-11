<?php
    require_once "db_connection.php";
    $_GET['code'];

    $query = "select codes.code, users.email from codes join users on codes.user_id = users.id";
    $stmt = $connection->query($query);
    $codes = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($codes as $code) {
        if($_GET['code'] == $code->code && $_GET['email'] == $code->email){
            $user_email = $_GET['email'];
            $sql = "
            update users set verified = '1' where email = '$user_email' limit 1
            ";
            $connection->exec($sql);
            header('Location: ../index.php?user=verified');
        }else{
            header('Location:../index.php?user=unverified');
        }
        
    }
?>