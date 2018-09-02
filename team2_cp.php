<?php
include('navigation.php');
include('data/db.php');

$id = $_GET['responderid'];
?>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Change Password </h3>
      		</div>
    	</div>
		<?php
			if(isset($_POST['reset'])){
				$ne_pass = $_POST['new_pass'];
				$co_pass = $_POST['conf_pass'];
								
					if($ne_pass == $co_pass){
						$update_pass = "UPDATE responders SET password='$co_pass' WHERE responder_id='$id'";
						if($conn->query($update_pass) === TRUE){
							echo '<script> alert("Password Change") </script>';
							echo '<script> window.open("team2_responder.php","_self") </script>';
						}else{
							$success_message = "There was a problem on database";
						}
					}else{
						$success_message = "New Password and Current Password does not match";
					}
			}
		?>
		
		<div class="clearfix"></div>
		<?php
		if(!empty($success_message)){
            echo '<div class="alert alert-success">';
			echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            if(isset($success_message)){
            echo $success_message;
            } 
            echo '</div>';
        }
		?>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
					
						<form class="form-horizontal form-label-left" action="team2_cp.php?responderid=<?php echo $id; ?>" method="post" >
							
							<div class="item form-group">
                				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">Enter New Password:</label>
                  				<div class="col-md-5 col-sm-5 col-xs-12">
                    				<input type="password" name="new_pass" class="form-control col-md-7 col-xs-12" required>
                  				</div>
              				</div>
							
							<div class="item form-group">
                				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password:</label>
                  				<div class="col-md-5 col-sm-5 col-xs-12">
                    				<input type="password" name="conf_pass" class="form-control col-md-7 col-xs-12" required>
                  				</div>
              				</div>
							
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<input type="submit" name="reset" value="Save" class="btn btn-success">
									<a href="team2_edit.php?responderid=<?php echo $id; ?>" class="btn btn-success"> Cancel </a>
								</div>
							</div>
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