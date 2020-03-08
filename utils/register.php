<?php

    //Database informations
    $dsn = 'mysql:host=localhost;dbname=help_desk';
    $db_username = 'root';
    $db_password = '';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{

        $connection = new PDO($dsn,$db_username,$db_password);
        //Firts, verify if the user 
        $verify = "select email from users";
        $stmt = $connection->query($verify);
        $email_list = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if($stmt->rowCount()>0){
            foreach ($email_list as $test) {
                if ($email==$test->email || $test->email != null){
                    header('Location:../create_account.php?user-exists');
                }
                else {
                    $sql = "
                        insert into users (name,email,password)
                        values ('$name','$email','$password')
                        ";
    
                    $connection->exec($sql);
                    $connection = null;
                    header('Location:../index.php?created');
                }
            }
        } else{
            $sql = "
                        insert into users (name,email,password)
                        values ('$name','$email','$password')
                        ";
    
                    $connection->exec($sql);
                    $connection = null;
                    header('Location:../index.php?created');
        }
        
        
        

        $connection = null;

    }catch(PDOException $e){
        print_r($e);
    }

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
?>