<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style/index.css">
    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <a class="navbar-brand" href="index.php">Log in</a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Create Account
            </div>
            <div class="card-body">
              <form action="utils/register.php" method="post">
              <div class="form-group">
                  <input name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control" placeholder="Password">
                  
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Enter</button>
              </form>
              <div class="error-message">
                <?php
                  if(isset($_GET['user-exists'])){
                    echo "This email is already in use";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    <footer class="page-footer font-small blue pt-4">
        <div class="footer-copyright text-center py-3 font-weight-bold"> Created By Marcus Xavier</div>
    </footer>
  </body>
</html>