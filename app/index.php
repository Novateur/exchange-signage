<?php
	require("includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Exchange Rate</title>
  <meta name="description" content="exchange rate, values, money rate" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
  <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk col-sm-6">
        <a href="index.php" class="navbar-brand">
          <img src="images/access-bank-logo.png" class="" alt="Exchange Rates Board">
        </a>
      </div>
    
        <div class="">
            <span style="color:#033b7f;font-size: 45px;font-weight: 600; text-transform: uppercase;">Exchange Rate - 
                <?php 
                $day = date("l");
                $date = date("d/m/Y");
                $time = date("h:i");
                echo $day.", ".$date." ".$time;  
                
                ?>
            </span>
        
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
                    
                    <div class="row">
                        <div class="col-md-4 padder text-center"style="font-size: 45px;font-weight: 600;color: #f44336;">
                            <span>CURRENCY</span>
                        </div>
                          
                        <div class="col-md-4 padder text-center"style="font-size: 45px;font-weight: 600;color: #f44336;">
                            <span>BUY</span>
                        </div> 
                          
                        <div class="col-md-4 padder text-center"style="font-size: 45px;font-weight: 600;color: #f44336;">
                            <span>SELL</span>
                        </div> 

                          
                    </div>
                    <?php
                    	show_rates();
                    ?>
                    <div class="row">
                    	<div class="col-md-12">
							<?php
								if(isset($_SESSION['bank']))
								{
									echo "<button class='btn btn-success pull-right' onclick=\"location.reload(true)\">Force refresh</button>";
								}
							?>
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