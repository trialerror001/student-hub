<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./HalamanLogin/partials/header.php";
	?>
</head>
<body class="app">
	<div class="page-container"> 
		<?php require './HalamanLogin/partials/client_navbar.php'; ?>

		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				<div class="form_style">
				<div class="bgc-white p-20 bd">
					<h6 class="c-grey-900"><b>Formulir Peminjaman Ruangan</b></h6>
					<div class="mT-30"><form>
						<div class="form-row">
							<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4"><b>Kode Ruangan</b></label> <input type="name" class="form-control" id="name">
							</div>
							<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4"><b>Nama Ruangan</b></label> <input type="name" class="form-control" id="name">
							</div>
							<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4"><b>Keterangan</b></label> <input type="name" class="form-control" id="name" style="height: 20em">
							</div>

							
				
					</div>
					<button type="submit" class="btn btn-primary">Book</button></form></div></div>
		</div>

			<!-- END CODE -->
			</div>
		</main>
		
	</div>
<?php
require "./HalamanLogin/partials/footer.php";
?>
<style>
#form_font
{
	font-size:1vw;
}
	.form_style
	{
		padding-left: 10em;
		padding-right:10em;
	}
</style>
</body>
</html>
