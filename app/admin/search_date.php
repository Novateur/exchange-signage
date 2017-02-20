<?php
  require("../includes/functions.php");

  if(isset($_GET['from']) && isset($_GET['to']))
  {
    $from = sanitize($_GET['from']);
    $to = sanitize($_GET['to']);
  }
  else
  {
    header("location:view_rates.php");
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
  <link rel="stylesheet" href="../js/datepicker/datepicker.css" type="text/css" />
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
                            <div align="center" style="font-size: 28px">Exchange rates</div>
                            <div class="col-md-12">
                              <div id="paste_response"></div>
                            </div><br/><br/>
                            <div class="col-md-12">
                              <button id=/"update_rate" class="btn btn-success" onclick="$('#update').modal('show');"><i class='ion-edit'></i> Update rates</button>
                            </div><br/><br/><br/>
                            <div class="col-md-12">
                              <form method="get" action="search_date.php" class="form-inline">
                                <div class="form-group">
                                  <input class="input-s datepicker-input form-control" type="text" name="from" id="from" placeholder="From" value="01/01/2017" data-date-format="dd/mm/yyyy"/>
                                </div>
                                <div class="form-group">
                                  <input class="input-s datepicker-input form-control" type="text" name="to" id="to" placeholder="To" value="01/01/2017" data-date-format="dd/mm/yyyy"/>
                                </div> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                              </form>
                            </div><br/><br/><br/>

                            <?php
                              get_search($from,$to);
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
        <h4 class="modal-title"><i class='ion-trash-b'></i> Delete Rate</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this rate?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span id='paste_proceed'></span>
      </div>
    </div>

  </div>
</div>
  <div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog" style='margin-top:50px'>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class='ion-edit'></i> Update Rate</h4>
      </div>
      <div class="modal-body">
          <form method="post" action="" id="update_form">
            <b style="font-size: 16px">Currency</b><br/>
            <select class="form-control" name="currency" id="currency">
              <?php
                get_all_currencies();
              ?>
            </select><br/>
            <b style="font-size: 16px">Buying at</b><br/>
            <input type="text" name="buy" id="buy" class="form-control" placeholder="Buying at"/><br/>
            <b style="font-size: 16px">Selling at</b><br/>
            <input type="text" name="sell" id="sell" class="form-control" placeholder="Selling at"/><br/> 
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>
  <script src="../js/jquery.min.js"></script>

  <script src="../js/bootstrap.js"></script>
    <script src="../js/datepicker/bootstrap-datepicker.js"></script>
    <script src="../js/app.js"></script> 
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script>
  <script>
      var table = $("#grid-basic").DataTable();

      function delete_rates(id)
      {
        $('#paste_proceed').html("<button type='button' class='btn btn-danger' onclick=\"cont_del_rate("+id+")\">Ok</button>");
        $('#delete_modal').modal('show');
      }

      function cont_del_rate(id)
      {
        $.post("handler/delete_rate.php",{id:id},function(response){
          if(response=="deleted")
          {
            $('#delete_modal').modal('hide');
            //$("#grid-basic").DataTable();
              /*table.row( $(this).parents('tr') )
              .remove()
              .draw();*/
              //location.reload(true);
              $("#"+id).remove();
          }
          else
          {
            $('#paste_response').html("<div class='alert alert-danger'>Unable to delete rate</div>");
          }
        })
      }
            $('#update_form').submit(function(e){
        e.preventDefault();
        var currency,buy,sell;
        currency = $('#currency').val();
        buy = $('#buy').val();
        sell = $('#sell').val();
        if(currency=="" || buy=="" || sell=="")
        {
          if(currency=="")
          {
            document.getElementById("currency").style.border="1px solid red";
          }
          if(buy=="")
          {
            document.getElementById("buy").style.border="1px solid red";
          }
          if(sell=="")
          {
            document.getElementById("sell").style.border="1px solid red";
          }
        }
        else
        {
          $.ajax({
            url:"handler/update_exchange.php",
            type:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(data)
            {
              if(data=="inserted")
              {
                $('#currency').val("");
                $('#buy').val("");
                $('#sell').val("");
                $('#update').modal('hide');
                $('#paste_response').html("<div class='alert alert-success alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>Your exchange rate has been been updated successfully</b></div>");
              }
              else
              {
                $('#paste_response').html("<div class='alert alert-danger alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>"+data+"</b></div>");
              }
            }
          })
        }
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

  <script src="js/sortable/jquery.sortable.js"></script>-->
  <script src="../js/app.plugin.js"></script>
</body>
</html>