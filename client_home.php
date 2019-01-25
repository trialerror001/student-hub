<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./admin/partials/header.php";
	?>
</head>
<body class="app">
	<div class="page-container">
		<?php require './partials/client_navbar.php'; ?>
		<main class="main-content bgc-grey-100">
			<div id="mainContent">
				<div class="row">
					<div class="col-md-8">
						<div id="full-calendar" class="fc fc-unthemed fc-ltr" style="max-width:
						 ">
						</div>
					</div> 	
					<div class="col-md-2">
						<div style="background-color:#5f5f5f; height:12em; width:12em;">
						</div>
					<br>
				
						<div style="background-color:#123f12; height:12em; width:12em;">
						</div>
					
					<br>
						<div style="background-color:#5f361f; height:12em; width:12em;">
						</div>
					<br>				
						<div style="background-color:#ff3f12; height:12em; width:12em;">
						</div>
					<br>
				</div>
				<div class="col-md-2">
						<div style="background-color:#5f5f5f; height:12em; width:12em;">
						</div>
					<br>
				
						<div style="background-color:#123f12; height:12em; width:12em;">
						</div>
					
					<br>
						<div style="background-color:#5f361f; height:12em; width:12em;">
						</div>
					<br>				
						<div style="background-color:#ff3f12; height:12em; width:12em;">
						</div>
					</div>
				<div class="row col-md-12" style="padding:0.5em; display: flex; align-items:center; justify-content: center;">
					<button class="btn btn-primary" style="color: #fff"><a href="?page=FormRegistrasi">book now</button>
				</div>
					</div>
					</div>
				</div>

			</div>
		</main>
	</div>
<?php
require "./admin/partials/footer.php";
?>
<script>
	$('#full-calendar').fullCalendar('option', 'height', 300);
</script>

</body>
</html>
