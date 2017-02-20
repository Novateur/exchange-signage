<?php
  ob_start();
  require("../includes/functions.php");

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
  <link rel="stylesheet" href="../css/jquery.bootgrid.min.css" type="text/css" />
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
                    
                    <div class="row" style="margin-top:30px"> 
                    </div>
                    <div class="container">
                      <div class="row">
                          <div class="panel col-md-12" style="padding: 20px">
                            <div align="center" style="font-size: 28px">Add Currencies to list</div>
                            <div id="paste_response"></div>
                            <div id="paste_table"></div>
                            <?php
                              get_currencies_to_list();
                            ?>
                          </div>    
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

  <script src="../js/jquery.min.js"></script>

  <script src="../js/bootstrap.js"></script>
  <!-- Bootstrap -->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script>
  <script>
      function mark_all(self)
      {
        if(self.checked)
        {
          $('input:checkbox').prop('checked',true);
          $('#submit_btn').slideDown('fast');
        }
        else
        {
          $('input:checkbox').removeAttr('checked');
          $('#submit_btn').slideUp('fast');
        }
      }

      function mark_ind(self)
      {

        if($('input[type=checkbox]:checked').length > 0)
        {
          $('#submit_btn').slideDown('fast');
        }
        else
        {
          $('#submit_btn').slideUp('fast');
        }

      }

      $('#mark_all_form').submit(function(e){
        e.preventDefault();
          $.ajax({
            url:"handler/add_cur_list.php",
            type:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(data)
            {
              //$('#paste_response').html(data);
              if(data=="inserted")
              {
                //$('#paste_response').html("<div class='alert alert-success alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>Your exchange rate has been been updated successfully</b></div>");
                location.reload(true);
              }
              else
              {
                $('#paste_response').html("<div class='alert alert-danger alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>"+data+"</b></div>");
              }
            }
          })
      })
  </script>
  <!-- App -->
  <!--<script src="js/app.js"></script>  
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
  <script src="js/app.plugin.js"></script>-->
</body>
</html>