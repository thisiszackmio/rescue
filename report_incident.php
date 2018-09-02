<?php
  include('navigation.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Log in First </h3>
      		</div>
    	</div> <!-- Page Title !-->

    	<div class="clearfix"></div>

    	<div class="row">
    		<div class="col-md-12 col-sm-12 col-xs-12">
    			<div class="x_panel">
    				<div class="clearfix"></div>
    				<div class="x_content">
	    				<form method="POST">
	    					<div class="item form-group">
				                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username :</label>
				                  <div class="col-md-7 col-sm-7 col-xs-12">
				                   <input type="username" name="username"  class="demoInputBox form-control col-md-7 col-xs-12" required>
				                </div>
				                <div class="clearfix"></div>	
				            </div>

				            <div class="item form-group">
				                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password :</label>
				                  <div class="col-md-7 col-sm-7 col-xs-12">
				                  <input type="password" name="password"  class="demoInputBox form-control col-md-7 col-xs-12" required>
				                </div>
				                <div class="clearfix"></div>
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
				            	<div class="clearfix"></div>
				            </div>


				            <div class="form-group">
				            	<div class="col-md-6 col-md-offset-3">
				              		<input type="submit" name="save" value="Submit" class="btn btn-success">
				            	</div>
				          	</div>
	    				</form>
	    				<?php
	    					if(isset($_POST['save'])){
	    						$user = $_POST['username'];
	    						$pass = $_POST['password'];
	    						$team = $_POST['team'];

	    						$qry = "SELECT * FROM responders WHERE username='$user' AND password='$pass' AND Team_Number='$team' AND status=2";
	    						$ok = $conn->query($qry);

	    						if($ok->num_rows > 0){
	    							$row = mysqli_fetch_array($ok);
	    							?>
	    							<script>window.open('report_rescuer.php?user=<?php echo $row["responder_id"]?>','_self');</script>
	    							<?php
	    						}else{
	    							echo"<script>alert('Invalid')</script>";
	    						}
	    					}
	    				?>
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