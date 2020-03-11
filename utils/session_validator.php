<?php
    session_start();
    if(!isset($_SESSION['access']) || $_SESSION['access'] != 'accepted'){
        header('Location:index.php?access=denied');
      } else if ($_SESSION['verified'] != 1){
        header('Location:index.php?user=unverified');
      }
?>