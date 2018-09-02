<?php
include('navigation.php');
include('data/db.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Edit Responder </h3>
      		</div>
    	</div>

    	<div class="clearfix"></div>

    	<div class="row">
    		<div class="col-md-12 col-sm-12 col-xs-12">
    			<div class="x_panel">
    				<div class="x_title">
						<h2> Fill up Here </h2>

						<div class="clearfix"></div>

					</div>

					<div class="x_content">
            <?php
                $id = $_GET['responderid'];
                $sql1 = "SELECT * FROM responders WHERE responder_id='$id'";
                $check = $conn->query($sql1);

                while($row1 = mysqli_fetch_array($check)): ?>

						<form class="form-horizontal form-label-left" action="team1_edit.php?responderid=<?php echo $id; ?>" method="post" >
								<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name :</label>
								  	<div class="col-md-3 col-sm-3 col-xs-12">
                    					<input class="form-control col-md-7 col-xs-12" name="fname" value="<?php echo $row1['responder_firstname']; ?>"  type="text">
                  					</div>
			                  		<div class="col-md-1 col-sm-1 col-xs-12">
			                    		<input class="form-control col-md-7 col-xs-12" name="mname" value="<?php echo $row1['responder_middlename']; ?>"  type="text">
			                  		</div>
                  					<div class="col-md-3 col-sm-3 col-xs-12">
                    					<input class="form-control col-md-7 col-xs-12" name="lname" value="<?php echo $row1['responder_lastname']; ?>"  type="text">
                  					</div>	
								</div>

								<div class="item form-group">
                					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Position">Position:</label>
                  					<div class="col-md-7 col-sm-7 col-xs-12">
                      					<input class="form-control col-md-7 col-xs-12" value="<?php echo $row1['position']; ?>" name="pos" type="text">
                  					</div>
              					</div>

              					<div class="item form-group">
		            				<label class="control-label col-md-3 col-sm-3 col-xs-12"> Team Number :</label>
		              				<div class="col-md-7 col-sm-7 col-xs-12">
		                				<select class="form-control" name="team">
		                  					<option value="<?php echo $row1['Team_Number']; ?>">Current Team</option>
		                  					<option value="1">Team 1</option>
		                  					<option value="2">Team 2</option>
		                  					<option value="3">Team 3</option>
		                  					<option value="4">Team 4</option>
		                				</select>
		              				</div>
		          				</div>

		          				<div class="item form-group">
                					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username :</label>
                  					<div class="col-md-7 col-sm-7 col-xs-12">
                    					<input type="username" name="username" value="<?php echo $row1['username']; ?>" class="form-control col-md-7 col-xs-12">
                  					</div>
              					</div>

                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="save" value="Save" class="btn btn-success">
                            <a href="team1_responder.php" class="btn btn-success"> Cancel </a>
                            <a href="team1_cp.php?responderid=<?php echo $id; ?>" class="btn btn-success"> Change Password </a>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Delete</button>
                          </div>
						
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog modal-sm">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Remove Responder</h4>
							  </div>
							  <div class="modal-body">
								<p>Are You Sure?.</p>
							  </div>
							  <div class="modal-footer">
								<a href="team1_delete.php?responderid=<?php echo $id; ?>" class="btn btn-success"> Yes </a>
								<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
							  </div>
							</div>

						  </div>
						</div>

                        <?php
                          if(isset($_POST['save'])){
                            $fname = ucfirst($_POST['fname']);
                            $mname = strtoupper($_POST['mname']);
                            $lname = ucfirst($_POST['lname']);
                            $pos = strtoupper($_POST['pos']);
                            $team = $_POST['team'];
                            $username = $_POST['username'];

                            $done = "UPDATE responders SET responder_firstname='$fname', responder_middlename='$mname', responder_lastname='$lname', position='$pos', Team_Number='$team', username='$username' WHERE responder_id='$id'"; 
                              if($conn->query($done) === true){
                                echo '<script> alert("Responder is successful updated") </script>';
								                echo '<script> window.open("team1_responder.php", "_self") </script>';								
                            }
                            else{
                              echo '<script> alert("There was a problem on updating."); </script>';
                            }
                          }
						  
						  
                        ?>
							<?php endwhile; ?>
						</form>
					</div>
    			</div>
    		</div>
    	</div>
	</div>
</div>

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