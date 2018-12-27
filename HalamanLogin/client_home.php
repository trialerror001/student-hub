<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./partials/header.php";
	?>
</head>
<body class="app">
	<div class="page-container">
		<?php require './partials/client_navbar.php'; ?>
		<main class="main-content bgc-grey-100">
			<div id="mainContent">
				<div class="row">
					<div class="col-md-8">
						<div id="full-calendar" class="fc fc-unthemed fc-ltr" >
						</div>
					<div class="col-md-4">
					</div>
					</div>
				</div>
			</div>
		</main>
	</div>
<?php
require "./partials/footer.php";
?>
<script>
	$('#full-calendar').fullCalendar('option', 'height', 300);
</script>
</body>
</html>
