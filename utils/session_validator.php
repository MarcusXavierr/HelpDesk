<?php
    session_start();
    if(!isset($_SESSION['access']) || $_SESSION['access'] != 'accepted'){
        header('Location:index.php?access=denied');
      }
?>