<?php
  include('navigation.php');
  include('data/db.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        <h3> Assign Team </h3>
      </div>
    </div> <!-- Page Title !-->

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2> Register  <small> Responder Information </small></h2>

						<div class="clearfix"></div>

					</div>

           <?php
              if(isset($_POST['save'])){

                $fname = ucfirst($_POST['fname']);
                $mname = strtoupper($_POST['mname']);
                $lname = ucfirst($_POST['lname']);
                $pos = strtoupper($_POST['pos']);
                $team = $_POST['team'];
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $retype = $_POST['retype'];

                $verify = "SELECT username FROM responders where username='$username'";
                $exists = $conn->query($verify);
   

                if($exists->num_rows >= 1)
                {
                     $error_message = "Username is already exists";
                }
                else 
                  {
                      if($_POST['password'] == $_POST['retype'])
                      {

                  $assign = "INSERT INTO responders(responder_firstname, responder_middlename, responder_lastname, position, Team_Number, username, password)
                                  VALUES ('$fname', '$mname', '$lname', '$pos', '$team', '$username', '$pass')";

                  if($conn->query($assign))
                  {
                    $success_message = "This responder is successful added to the database";   
                  }
                  else
                  {
                    $error_message = "It cannot be added to the database";
                  }
                      }
              
                else{
                   $error_message = "Two Passwords are not the same";
                    }
                  }

                }
              

            ?>

					<div class="x_content">
						<form class="form form-horizontal form-label-left" action="all_responder.php" enctype="multipart/form-data" method="post" autocomplete="off">

							<span class="section">Personal Info</span>

              <?php
                if(!empty($success_message)){
                  echo '<div class="alert alert-success">'; 
                  if(isset($success_message)){
                    echo $success_message;
                    } 
                  echo '</div>';
                }
                if(!empty($error_message)){
                  echo '<div class="alert alert-info">'; 
                  if(isset($error_message)){
                    echo $error_message;
                  }  
                  echo '</div>'; 
                }
              ?>
                              
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name :</label>
								  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input class="demoInputBox form-control col-md-7 col-xs-12" name="fname" placeholder="First Name" type="text" required>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-12">
                    <input class="demoInputBox form-control col-md-7 col-xs-12" name="mname" placeholder="M.I." style="text-transform: uppercase;"  type="text" required>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input class="demoInputBox form-control col-md-7 col-xs-12" name="lname" placeholder="Last Name" type="text" required>
                  </div>	
							</div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Position">Position:</label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                      <input class="demoInputBox form-control col-md-7 col-xs-12" name="pos" style="text-transform: uppercase;"  type="text" required>
                  </div>
              </div>

              <div class="item form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Team Number :</label>
		              <div class="col-md-7 col-sm-7 col-xs-12">
		                <select class="form-control" name="team">
		                  <option value="-">Choose option</option>
		                  <option value="1">Team 1</option>
		                  <option value="2">Team 2</option>
		                  <option value="3">Team 3</option>
		                  <option value="4"> Team 4</option>
		                </select>
		              </div>
		          </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username :</label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="username" name="username"  class="demoInputBox form-control col-md-7 col-xs-12" required>
                  </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password :</label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" name="password"  class="demoInputBox form-control col-md-7 col-xs-12" required>
                  </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Retype Password :</label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" name="retype"  class="demoInputBox form-control col-md-7 col-xs-12" required>
                  </div>
              </div>

              <div class="form-group">
		            <div class="col-md-6 col-md-offset-3">
		              <input type="submit" name="save" value="Submit" class="btn btn-success">
		            </div>
		          </div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- Div row --> 
	</div> <!-- Second Div -->
</div> <!-- First Div -->

<!-- footer content -->
  <footer>
    <div class="pull-right">
      Developer: Zack-Mio Sermon || Kharen Tompong - <strong> Capstone Project SY 2017-2018 </strong>
    </div>
    <div class="clearfix"></div>
  </footer>
<!-- /footer content -->
<?php
include('footer.php');
?>