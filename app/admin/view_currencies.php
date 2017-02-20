<?php
  require("../includes/functions.php");
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
                            <div align="center" style="font-size: 28px">Available Currencies</div>
                            <div id="paste_response"></div>
                            <div id="paste_table"></div>
                            <?php
                              get_currencies();
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

  <div id="delete_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" style='width:400px;margin-top:50px'>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='ion-trash-b'></i> Delete Currency</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Currency?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span id='paste_proceed'></span>
      </div>
    </div>

  </div>
</div>
  <script src="../js/jquery.min.js"></script>

  <script src="../js/bootstrap.js"></script>
  <!-- Bootstrap -->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script>
  <script>
      var table = $("#grid-basic").DataTable();

      function delete_currencies(id)
      {
        $('#paste_proceed').html("<button type='button' class='btn btn-danger' onclick=\"cont_del_currency("+id+")\">Ok</button>");
        $('#delete_modal').modal('show');
      }

      function cont_del_currency(id)
      {
        $.post("handler/delete_currency.php",{id:id},function(response){
          if(response=="deleted")
          {
            // Hide the delete modal
            $('#delete_modal').modal('hide');
            // Remove the deleted row
            $("#"+id).remove();
          }
          else
          {
            // Dispaly error server response
            $('#paste_response').html("<div class='alert alert-danger'>Unable to delete currency</div>");
          }
        })
      }
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