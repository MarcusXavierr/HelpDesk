<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    session_start();
    $title = str_replace('#','-',$_POST['title']);
    $category = str_replace('#','-',$_POST['category']);
    $description = str_replace('#','-',$_POST['description']);

    $text =  $_SESSION['id'] ."#$title#$category#$description" . PHP_EOL; 
    $call = fopen('../calls/calls.txt', 'a');
    fwrite($call, $text);
    fclose($call);

    header('Location:../home.php?call=created');
?>