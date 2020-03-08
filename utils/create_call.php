<?php
    session_start();
    require_once "db_connection.php";
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    print_r($connection)

    // $title = str_replace('#','-',$_POST['title']);
    // $category = str_replace('#','-',$_POST['category']);
    // $description = str_replace('#','-',$_POST['description']);

    // $text =  $_SESSION['id'] ."#$title#$category#$description" . PHP_EOL; 
    // $call = fopen('../calls/calls.txt', 'a');
    // fwrite($call, $text);
    // fclose($call);

   // header('Location:../home.php?call=created');
?>