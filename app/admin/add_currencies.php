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
                    
                    <div class="row" style="margin-top:60px"> 
                    </div>
                    <div class="container">
                      <div class="row">
                          <div class="col-md-2">
                          </div> 
                          
                          <div class="panel col-md-7" style="padding: 20px">
                            <div align="center" style="font-size: 28px">Add a currency</div>
                            <div id="paste_response"></div>
                            <form method="post" action="" id="addcurrency_form">
                                <b>Currency Name</b><br/>
                                <input type="text" name="cur_name" id="cur_name" class="form-control" placeholder="Currency Name"/><br/>
                                <b>Currency Abbreviation</b><br/>
                                <input type="text" name="cur_ab" id="cur_ab" class="form-control" placeholder="Currency Abbreviation"/><br/>
                                <b>Upload currency logo</b><br/>
                                <input type="file" name="file" id="file" class="form-control" placeholder="Upload a logo"/><br/>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                          
                          <div class="col-md-3">
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
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
   <script src="../js/custom.js"></script>
   <script>
      $('#addcurrency_form').submit(function(e){
        e.preventDefault();
        var cur_name,cur_ab,file;
        cur_name = $('#cur_name').val();
        cur_ab = $('#cur_ab').val();
        file = $('#file').val();
        if(cur_name=="" || cur_ab=="" || file=="")
        {
          if(cur_name=="")
          {
            document.getElementById("cur_name").style.border="1px solid red";
          }
          if(cur_ab=="")
          {
            document.getElementById("cur_ab").style.border="1px solid red";
          }
          if(file=="")
          {
            document.getElementById("file").style.border="1px solid red";
          }
        }
        else
        {
          $.ajax({
            url:"handler/add_currencies.php",
            type:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(data)
            {
              if(data=="inserted")
              {
                $('#paste_response').html("<div class='alert alert-success alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>A new currency has been added successfully</b></div>");
                $('#cur_name').val("");
                $('#cur_ab').val("");
                $('#file').val("");
              }
              else
              {
                $('#paste_response').html("<div class='alert alert-danger alert-dismissable' data-dismiss='alert'><a href='#' class='close' data-dismiss='alert'aria-label='close'>&times;</a><b>"+data+"</b></div>");
              }
            }
          })
        }
      });
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