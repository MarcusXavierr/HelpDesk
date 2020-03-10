<?php

    require_once "db_connection.php";

    if( $_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] == ''){
        header('Location:../create_account.php?register=error');
        exit;
    }
    if (isset($_POST['name'])){
        echo "Existe <br>";
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $name . "<br>";
    echo $_POST['name'] . "<br>";

    try{
        //Firts, verify if the user 
        $verify = "select email from users";
        $stmt = $connection->query($verify);
        $email_list = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if($stmt->rowCount()>0){
            foreach ($email_list as $test) {
                if ($email==$test->email){
                    header('Location:../create_account.php?user-exists');
                }
                else {
                    $sql = "
                        insert into users (name,email,password)
                        values ('$name','$email','$password')
                        ";
    
                    $connection->exec($sql);
                    $query = "Select email,id,name from users order by id desc limit 1";
                    $stmt = $connection->query($query);
                    $user_information = $stmt->fetch(PDO::FETCH_OBJ);
                    print_r($user_information);
                    $username = $user_information->name;
                    $userid = $user_information->id;
                    $useremail = $user_information->email;
                    $connection = null;
                    header("Location:send_verification_mail.php?name=". $username."&email=".$useremail."&id=".$userid);
                    
                   // header('Location:../index.php?created');
                }
            }
        } else{
            $sql = "
                        insert into users (name,email,password)
                        values ('$name','$email','$password')
                        ";
    
                    //$connection->exec($sql);
                    $query = "Select email,id,name from users order by id desc limit 1";
                    $stmt = $connection->query($query);
                    $user_information = $stmt->fetch(PDO::FETCH_OBJ);
                    print_r($user_information);
                    $username = $user_information->name;
                    $userid = $user_information->id;
                    $useremail = $user_information->email;
                    $connection = null;
                    header("Location:send_verification_mail.php?name=". $username."&email=".$useremail."&id=".$userid);

                   
        }
        
        
        

        $connection = null;

    }catch(PDOException $e){
        print_r($e);
    }
?>