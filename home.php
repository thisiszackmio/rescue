<!DOCTYPE html>
<?php
include('data/db.php');
session_start();
if(!isset( $_SESSION['responder_id'] )) {
    echo"<script>window.open('check.php','_self')</script>";
  }
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="image/811.png" type="image/x-icon">
    <title>ICDRRMO | Admin</title>

    <!-- Bootstrap -->
    <link href="build/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="build/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="build/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="build/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- Custom css -->
    <link href="build/css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <!-- jQuery -->
    <script src="build/jquery/dist/jquery.min.js"></script>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>ICDRRMO </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="image/default.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php
                  $get = $_SESSION['responder_id'];

                  $sql = "SELECT * FROM responders WHERE responder_id = '$get'";
                  $result = $conn->query($sql);
                  $erow = mysqli_fetch_array($result);
                  $fname = $erow['responder_firstname'];
                  $mname = $erow['responder_middlename'];
                  $lname = $erow['responder_lastname'];
                ?>
                <h2><?php echo $fname .' '. $mname .' '. $lname; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Responder's List <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="all_responder.php">Assign Team </a></li>
                      <li><a href="team1_responder.php">Team 1</a></li>
                      <li><a href="team2_responder.php">Team 2</a></li>
                      <li><a href="team3_responder.php">Team 3</a></li>
                      <li><a href="team4_responder.php">Team 4</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i> Incident Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="allreport.phpdate=All">All Reports</a></li>
                      <li><a href="ereport.php">Emegency Report</a></li>
                      <li><a href="treport.php">Traffic Accident</a></li>
                      <li><a href="fireport.php">Flood Incident</a></li>
                      <li><a href="cireport.php">Crime Incident</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="user.php">User's List</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-check-square"></i>Check Availability<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="check_am.php">Ambulance</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">

              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="image/default.png" alt="">
                <?php echo $fname .' '. $mname .' '. $lname; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"> Profile</a></li>
                    <li>
                      <a href="#">
                        <span class="badge bg-red pull-right"></span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="#">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                  <!-- Envelope -->
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green count"></span>
                  </a>

                  <audio class="aud" controls hidden>
                    <source src="alert.mp3" type="audio/mpeg">
                    <source src="alert.ogg" type="audio/ogg">
                  </audio>

                  <ul id="menu1" class="dropdown-menu haha" role="menu" style="width: 350px;"> </ul>
                </li>

                <script type="text/javascript">

                  $(document).ready(function(){
                    function load_unseen_notification(view = '')
                    {
                      $.ajax({
                       url:"get.php",
                       method:"POST",
                       data:{view:view},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.haha').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.count').html(data.unseen_notification);
                         var al ='<audio autoplay=true> <source src="alert.mp3" type="audio/mpeg"> </audio>';
                         $('.count').append(al);
                        }
                       }
                      });
                    }

                    load_unseen_notification();   
                     setInterval(function(){
                      load_unseen_notification();
                     }, 5000);                 
                  });
                  setInterval(function(){
                      load_unseen_notification();
                     }, 5000);
                </script>

              </ul>

          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
          <div class="right_col" role="main">
            <div class="">

              <div class="row top_tiles">

                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                      <div class="count">
                        <script type="text/javascript" src="jsdata/usercount.js"> </script>
                        <div id="txtHint"></div>
                      </div>
                    <h3>Users</h3>
                  </div>
                </div>

                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-file-text-o"></i></div>
                      <div class="count">
                        <script type="text/javascript" src="jsdata/incidentcount.js"> </script>
                        <div id="txtHint1"></div>
                      </div>
                        <h3>Incident Reports</h3>
                  </div>
                </div>

                <!-- <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-file-text"></i></div>
                      <div class="count">
                        <script type="text/javascript" src="jsdata/rescount.js"> </script>
                        <div id="txtHint2"></div>
                      </div>
                        <h3>Responders</h3>
                  </div>
                </div> -->

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Incident Map Report</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="map" style="width:100%;height:600px;"></div>
                        <script type="text/javascript" src="jsdata/mapa.js"> </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOo-5hDcsWxU92a3786ZHZkbd7kOiB26o&callback=initMap" async defer type="text/javascript"></script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Reports</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <canvas id="myChart0" width="200" height="100"></canvas>
                      <script type="text/javascript" src="jsdata/all.js"></script>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Crime Reports</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <canvas id="myChart1" width="100%" height="100px"></canvas>
                    <script type="text/javascript" src="jsdata/cchart.js"></script>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Emergency Report</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <canvas id="myChart2" width="100%" height="100px"></canvas>
                    <script type="text/javascript" src="jsdata/erchart.js"></script>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Traffic Accident</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <canvas id="myChart3" width="100%" height="100px"></canvas>
                    <script type="text/javascript" src="jsdata/tchart.js"></script>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Flood Incident</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <canvas id="myChart4" width="100%" height="100px"></canvas>
                    <script type="text/javascript" src="jsdata/fchart.js"></script>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Developer: Zack-Mio Sermon || Kharen Tompong - <strong> Capstone Project SY 2017-2018 </strong>
          </div>
           <div class="clearfix"></div>
        </footer>
      <!-- /footer content -->
      </div>
</div>

    <!-- Bootstrap -->
    <script src="build/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="build/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="build/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="build/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="build/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="build/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>




  </body>
</html>
