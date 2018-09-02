<?php
include('data/db.php');
session_start();

if(isset( $_SESSION['responder_id'] )) {
      echo"<script>window.open('home.php','_self')</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval'"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="build/css/index.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="build/css/bootstrap.min.css">
        
        <link rel="icon" href="image/811.png" type="image/x-icon">
        <title>ICDRRMO | Admin</title>
</head>
<style type="text/css">
      @font-face {
          font-family: myfont;
          src: url('font/Montserrat-Regular.ttf');
      }
      body{
        font-family: myfont;
      }
      #uname,#password{
        height:60px;font-family:myfont;font-size:18px;background-color:#222;padding-left:20px;color:white;
        border-color:#222;border-right-color: white;
      }
      #login{
        background-color:#2A3F54;color:white;box-sizing: border-box;
        width:98%; height:60px; border-color:#222;font-size:18px;
      }
      .app{
        margin-top: -170px;
      }
      #register{
        margin: 10px;
        background-color: #1ABB9C;
        color: #04235F;
        border-color:#2A3F54;
      }
      .input-group-addon{
        background-color:#2A3F54;
        border-color: #222;
      }
      .container{
        width: 60% !important;
        margin-top:30px;
      }
</style>
<body>

	<div class="app">
	<div class="container">
        <img src="image/811.png"> 
            <p style="margin:20px;font-size: 15px;">Web</p>
                <div id="deviceready"> 
                  <form class="form" method="post" action="">
                      <div class="input-group" >
                        <input id="uname" type="text" class="form-control" name="uname" placeholder="Username">
                        <span class="input-group-addon"><img src="image/username.png" style="height:30px;"></img></span>
                      </div>
                      <div class="input-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        <span class="input-group-addon"><img src="image/lock.png" style="height:30px;"></img></span>
                      </div>
                        <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                  </form>

                  <?php
                    if(isset($_POST['login'])){
                      // alert("ok");
                      $user = $_POST['uname'];
                      $password = $_POST['password'];
                      
                      $get = "SELECT * FROM responders WHERE username='$user' and password='$password' and position='Admin'";
                      $ok = $conn->query($get);

                      if($ok->num_rows > 0){
                        $row = mysqli_fetch_array($ok);
                        $_SESSION['responder_id'] = $row['responder_id'];
                        //echo $_SESSION['responder_id']; 
                        echo"<script>alert('Welcome')</script>";
                        echo"<script>window.open('home.php','_self')</script>";
                      }
                      else{
                      echo"<script>alert('Invalid Password')</script>";
                      echo"<script>window.open('index.php')</script>"; 
                      }

                    }
                  ?>
	</div>
</div>
<div>
  <div style="margin:20px;">
    <footer>
      <p>&copy; Copyright2017 - Tompong & Sermon </p>
    </footer>
  </div>
</div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>


