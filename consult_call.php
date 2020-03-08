<?php 
  require_once "utils/session_validator.php";
$archive = fopen('calls/calls.txt', 'r');

while(!feof($archive)){
  $register[] = fgets($archive);
}

fclose($archive);

  
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <a class="navbar-brand" href="utils/logoff.php">Logout</a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consult call
            </div>
            
            <div class="card-body">
            <? foreach($register as $call){?>
            <?php $call_data = explode('#',$call);
            if($_SESSION['credentials'] != 1){
              if ($_SESSION['id'] != $call_data[0]){
                continue;
              }
          }
            if(count($call_data)<4){
              continue;
              }
            ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$call_data[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$call_data[2]?></h6>
                  <p class="card-text"><?=$call_data[3]?></p>

                </div>
              </div>
              <?}?>
             

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>