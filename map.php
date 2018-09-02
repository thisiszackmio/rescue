<?php
  include('navigation.php');
  include('data/db.php');

  $name = $_GET['name'];
  $long = $_GET['long'];
  $lat = $_GET['lat'];
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> Full View Map </h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="container">
			<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="table-responsive">
					<div id="map" style="width:100%;height:400px;"></div> <br />
					<a href="<?php echo $name; ?>.php" class="btn btn-primary btn-sm"> Back</a>
					<script>
					function initMap() {
				        var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
				        var map = new google.maps.Map(document.getElementById('map'), {
				          zoom: 4,
				          center: uluru
				        });
				        var marker = new google.maps.Marker({
				          position: uluru,
				          map: map
				        });
				      }
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAWAL3EotBpVwogNrDTOoTPe55HUbErpk&callback=initMap"></script>
				</div>
			</div>
		</div>

	</div>
</div>
<?php
include('footer.php');
?>