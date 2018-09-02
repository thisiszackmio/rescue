<?php
include('data/db.php');
session_start();
if(!isset( $_SESSION['responder_id'] )) {
    echo"<script>window.open('check.php','_self')</script>"; 
  }
?>
<!DOCTYPE html>
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
              <a href="home.php" class="site_title"> <span>ICDRRMO </span></a>
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
                      <li><a href="allreport.php?date=All">All Reports</a></li>
                      <li><a href="ereport.php">Emergencies (Health issues, Labor etc...)</a></li>
                      <li><a href="trreport.php">Traffic Accident</a></li>
          					  <li><a href="fireport.php">Natural Disaster (Flood, Landslide, Fire etc...)</a></li>
          					  <li><a href="cireport.php">Crime Indicent (Stabbing, Kid Napping, Car Napping, Stealing,Shooting....)</a></li>
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
                      load_unseen_notification();; 
                     }, 5000);
                  });
                </script>
              </ul>
            
          </div>
        </div>
        <!-- /top navigation --> 

        
      