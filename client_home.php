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
					</div> 	
					<div class="col-md-4">
						<div class="row">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut erat nec mauris finibus elementum. Proin sit amet tempus tortor, sed ornare neque. Etiam diam leo, tristique vitae quam ut, sagittis semper odio. Suspendisse quis sem arcu. Ut ultrices euismod tellus, id congue felis ullamcorper eu. Proin ex ante, porta et ex sed, venenatis suscipit justo. Nullam cursus aliquet lorem ut vulputate. In a lorem convallis, rhoncus leo ut, finibus tellus. Nulla nec egestas ante.

Suspendisse placerat mollis convallis. Donec congue bibendum lorem. Cras aliquam, nulla in pellentesque suscipit, ante purus volutpat velit, non semper nibh metus ac ligula. Nullam eu blandit tellus. Duis ut libero felis. Nunc rutrum iaculis viverra. Sed scelerisque nulla id purus pulvinar eleifend. Suspendisse non euismod est. Aenean consectetur nulla nisi, nec vestibulum enim fringilla tempor. Phasellus aliquam tincidunt est, ut egestas nisl bibendum id. Sed interdum gravida pellentesque. Nullam at fermentum nisi, a convallis orci. Donec ornare aliquet magna, vitae feugiat lectus lacinia eget. Aliquam ac ullamcorper lectus. Nulla non neque euismod, pellentesque elit sit amet, finibus enim.

Sed venenatis ipsum rutrum eleifend ultrices. Nam eget arcu id tortor pulvinar blandit. Etiam ut tincidunt lectus. Cras molestie feugiat maximus. Aliquam in porttitor sem. Sed quis erat quam. Morbi nec gravida turpis. Nulla id libero eu mauris imperdiet accumsan vel eget felis. Curabitur ut est efficitur, tincidunt quam iaculis, tincidunt ante. Duis ornare commodo lectus, eu lacinia augue varius pulvinar. Integer mollis elementum nisl tempor hendrerit. Morbi consequat sem elit, ut lobortis massa eleifend id.

Nullam risus tellus, sagittis venenatis vestibulum quis, bibendum et felis. Etiam pulvinar diam vel nulla bibendum, vitae laoreet turpis pulvinar. Mauris venenatis nisi vitae diam vehicula, eget tincidunt quam eleifend. Suspendisse eget pretium justo, vitae scelerisque tellus. Nulla aliquet eros tempor nisi congue vestibulum. Sed consequat est ut est rutrum bibendum. Vivamus mollis, lectus sit amet rutrum faucibus, leo neque consectetur enim, ac scelerisque lorem elit vitae quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut vestibulum mauris sed eleifend maximus. Integer nec orci porttitor, auctor lacus dapibus, porttitor elit. Duis vel neque at nisi euismod accumsan et eget mi. Quisque facilisis mi sit amet sem posuere, eu sagittis diam dignissim. Pellentesque vitae feugiat dolor. Fusce sed euismod dui.
				</div>
				<div class="row" style="display: flex; align-items:center; justify-content: center;">
					<button class="btn btn-primary" style="color: #fff">book now</button>
				</div>
					</div>
					</div>
				</div>

				<div class ="row">
					<div class="col-md-2">
						<div style="background-color:#5f5f5f; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#123f12; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#5f361f; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#ff3f12; height:150px; width:185px;">
						</div>
					</div>
				</div>
				<br>
			<div class ="row">
					<div class="col-md-2">
						<div style="background-color:#5f5f5f; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#123f12; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#5f361f; height:150px; width:185px;">
						</div>
					</div>
					<div class="col-md-2">
						<div style="background-color:#ff3f12; height:150px; width:185px;">
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
