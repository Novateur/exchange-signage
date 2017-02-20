<?php
  ob_start();

  require_once("../includes/functions.php");
  if(!isset($_SESSION['bank']))
  {
    header("location:bank_login.php");
  }
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
  <link rel="stylesheet" href="../css/ionicons.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" style="font-family: verdana">
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk col-sm-6">
        <a href="index.php" class="navbar-brand">A d m i n</a>
      </div>
      <div class="">
      </div>     
    </header>
    <section>
      <section class="hbox stretch">
        
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">
                    
                    <div class="row" style="margin-top:20px"> 
                    </div>
                    <div class="container">
                      <div class="row">
                        <?php
                          if(isset($_SESSION['bank']))
                          {
                            echo "<div class='alert alert-success'><h3>Welcome back ".get_bank_name()."</h3></div>";
                          }
                        ?>
                      </div>
                      <div class="row">
                          <a href="view_rates.php"><div class="panel col-md-4">
                            <div class="padder" align="center">
                            <div style='font-size:60px'><i class='ion-stats-bars'></i></div>
                                <span style="color: black;font-size: 20px">View exchange rate</span>
                            </div>
                          </div></a> 
                          <a href="add_currencies_list.php"><div class="panel col-md-4">
                            <div class="padder" align="center">
                            <div style='font-size:60px'><i class='fa fa-list'></i></div>
                                <span style="color: black;font-size: 20px">Add to currency list</span>
                            </div>
                          </div></a>
                          <a href="view_currencies.php"><div class="panel col-md-4">
                            <div class="padder" align="center">
                            <div style='font-size:60px'><i class='ion-pie-graph'></i></div>
                                <span style="color: black;font-size: 20px">View currencies</span>
                            </div>
                          </div></a>
                          <a href="../index.php"><div class="panel col-md-4">
                            <div class="padder" align="center">
                            <div style='font-size:60px'><i class='fa fa-anchor'></i></div>
                                <span style="color: black;font-size: 20px">View page</span>
                            </div>
                          </div></a>
                          <a href="logout.php"><div class="panel col-md-4">
                            <div class="padder" align="center">
                            <div style='font-size:60px'><i class='fa fa-sign-out'></i></div>
                                <span style="color: black;font-size: 20px">Logout</span>
                            </div>
                          </div></a>    
                      </div>
                    </div>                   
    
                </section>
              </section>
            </section>
            <!-- side content -->

            <!-- / side content -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/charts/flot/jquery.flot.min.js"></script>
  <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="js/charts/flot/jquery.flot.spline.js"></script>
  <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="js/charts/flot/jquery.flot.resize.js"></script>
  <script src="js/charts/flot/jquery.flot.grow.js"></script>
  <script src="js/charts/flot/demo.js"></script>

  <script src="js/calendar/bootstrap_calendar.js"></script>
  <script src="js/calendar/demo.js"></script>

  <script src="js/sortable/jquery.sortable.js"></script>
  <script src="js/app.plugin.js"></script>
</body>
</html>