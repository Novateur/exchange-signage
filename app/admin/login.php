<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Exchange Rate</title>
  <meta name="description" content="exchange rate, values, money rate" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">Exchange Rate</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Admin Login</strong>
        </header>
        <?php
          if(isset($_POST["submit"]))
          {
            if($_POST["email"]=="exchangerate@novateur.ng" && $_POST["password"]=="exchangerate")
            {
              $_SESSION['admin'] = "exchangerate@novateur.ng";
              header("location:index.php");
            }
            else
            {
              echo "<div class='alert alert-danger alert-dismissable' data-dismiss='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Incorret username/password combination</b>
              </div>";
            }
          }
        ?>
        <form action="" id="login_form" method="post">
          <div class="list-group">
            <div class="list-group-item">
              <input type="email" placeholder="Email" name="email" class="form-control no-border">
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Password" name="password" class="form-control no-border">
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #3c4144" name="submit">Sign in</button>
          <!--<div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.html" class="btn btn-lg btn-default btn-block">Create an account</a>-->
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Novateur Nigeria<br>&copy; <?php echo date("Y"); ?></small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <script src="../js/custom.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/app.plugin.js"></script>
</body>
</html>