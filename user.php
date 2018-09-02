<?php
  include('navigation.php');
  include('data/db.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
            	<h3> User </h3>
            </div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<tr>
					          <th> Name </th>
					          <th> Address </th>
					          <th> Contact Number </th>
					        </tr>
					        <?php
					        	$er = "SELECT * FROM user";
					        	$ers = $conn->query($er);
					            while($erow = mysqli_fetch_array($ers)):
					            $fname = $erow['user_firstname'];
					        	$namne = $erow['user_middlename'];
					        	$lname = $erow['user_lastname'];
					        	$add = $erow['address'];
					        	$num = $erow['contact_number'];
					        ?>
					        <tr>
					        	<td><?php echo $fname.' '.$namne.' '.$lname;?> </td>
					        	<td><?php echo $add;?> </td>
					        	<td><?php echo $num;?> </td>
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
