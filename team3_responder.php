<?php
	include('navigation.php');
	include('data/team3_data.php');
?>
<?php
  	if(isset($_POST['remove'])){
  		$num = $_POST['num'];

  		$del = "DELETE FROM responders WHERE responder_id='$num'";

  		?>
  		<script>
  			var x = confirm("Are You Sure?");
  			if(x == true){
  				<?php
  				if($conn->query($del) === true){
  					$success_message = "This responder has been successful remove";
  				}
  				else{
  					$success_message = "There was a problem on removing";
  				}
  				?>
  				window.open("team3_responder.php","_self");
  			}else{
  				alert("Keep Going");
  			}
  		</script>
  		<?php
  		
  	}
?>
<div class="right_col" role="main">
	<div class="">
    <div class="x_panel">
		<div class="x_title">
			<div class="title_left">
        		<h3> Team 3 List </h3>
        		<?php
        		if(!empty($success_message))
        		{
        			echo '<div class="alert alert-info alert-dismissable">';
        			echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        			if(isset($success_message)){
        				echo $success_message;
        			}
        			echo '</div>';
        		}
        		else
        		?>
      		</div>
    	</div>

    	<div class="clearfix"></div>

    	<div class="container">
    		<div class="col-md-5 col-sm-5 col-xs-12">
    			<div class="table-responsive">
    				<table class="table table-striped table-bordered">
    					<tr>
			              <th> Name </th>
			              <th> Position </th>
			            </tr>
			            <?php while($row = mysqli_fetch_array($result)): ?>
		              	<tr>
			                <td> <a href="team3_edit.php?responderid=<?php echo $row['responder_id'];?>"> <?php echo $row['responder_firstname']." ".$row['responder_middlename']." ".$row['responder_lastname']; ?> </a> </td>
			                <td> <?php echo $row['position']; ?></td>
		              	</tr> 
		            	<?php endwhile; ?> 
    				</table>
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
