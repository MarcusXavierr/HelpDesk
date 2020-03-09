<?php
    session_start();
    require_once "db_connection.php";

    $title = str_replace("'", "''", $_POST['title']);
    $category = str_replace("'", "''",$_POST['category']);
    $description = str_replace("'", "''", $_POST['description']);
    $id = $_POST['id'];


    if($title == '' || $category == ''  || $description == '' ||$id == ''){
        header('Location:../open_call.php?error');
        exit;
    }
    try{
        $sql = "
        insert into calls (title,category,description,user_id) 
        values ('$title','$category','$description','$id')
         ";
        
         echo "
        insert into calls (title,category,description,user_id) 
        values ('$title','$category','$description','$id')
         ";
       $connection->exec($sql);
    

       header('Location:../home.php?call=created');
    }catch(PDOException $e){
        echo "<pre>";
        print_r($e);
        echo "</pre>";
    }

    $connection = null;
    

?>