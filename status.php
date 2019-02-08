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
		<?php require './admin/partials/client_navbar.php'; ?>

		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
			<div class="form_style">
				<div class="bgc-white p-20 bd">
					<h6 class="c-grey-900">Formulir Peminjaman Ruangan</h6>
					<div class="mT-30"><form>
						<div class="form-group" style="font-size: 1vw"><label for="inputAddress">Kode Ruangan</label> <input type="text" class="form-control" id="inputAddress" placeholder="">
							</div>
						<div class="form-row">
							<div class="form-group col-md-6" style="font-size: 1vw"><label for="inputEmail4">First name</label> <input type="name" class="form-control" id="inputEmail4">
							</div>
							<div class="form-group col-md-6" style="font-size: 1vw"><label for="inputPassword4">Last name</label> <input type="name" class="form-control" id="inputPassword4">
							</div>
						</div>
							<div class="form-group" style="font-size: 1vw"><label for="inputAddress">NIM</label> <input type="text" class="form-control" id="inputAddress" placeholder="20xx-xxxx-xxxx">
							</div>
							<div class="form-group" style="font-size: 1vw"><label for="inputAddress2">Nomor</label> <input type="text" class="form-control" id="inputAddress2" placeholder="">
							</div>
								<div class="form-group" style="font-size: 1vw"><label for="inputAddress2">Tanggal</label> <input type="text" class="form-control" id="inputAddress2" placeholder="">
							</div>
								<div class="form-group" style="font-size: 1vw"><label for="inputAddress2">Acara</label> <input type="text" class="form-control" id="inputAddress2" placeholder="">
							</div>

							<div class="form-row">
								<div class="form-group col-md-4" style="font-size: 1vw"><label for="inputCity"> Ruang yang dipinjam</label> <input type="text" class="form-control" id="inputCity">
								</div>
								<!--<div class="form-group col-md-2"><label for="inputState">Untuk keperluan</label> <select id="inputState" class="form-control"><option selected="selected">.....</option><option>...</option></select>
								</div>--->
								
								<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputZip">Pada Tanggal</label> <input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker">
								</div>
								<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> <input type="text" class="form-control" id="inputCity">
								</div>
								<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputZip">Sampai Tanggal</label> <input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker">
								</div>
								<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> <input type="text" class="form-control" id="inputCity">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputCity">Untuk Keperluan</label> <input type="text" class="form-control" id="inputCity">
								</div>
							</div>
							<!--<div class="form-row"><div class="form-group col-md-6"><label class="fw-500">Time and date</label><div class="timepicker-input input-icon form-group">
									<div class="input-group">
										<div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i>
										</div>
										<input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker">
									</div>
								</div>
							</div>
						</div>-->
						<div class="form-group"><div class="checkbox checkbox-circle checkbox-info peers ai-c" style="font-size: 1vw"><input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer"> <label for="inputCall2" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Kami akan bertanggung jawab atas pengunaan fasilitas yang diberikan dan bersedia mengembalikan fasilitas yang dipinjamkan dengan keadaan baik</span></label>
						</div>
						<div class="form-group" style="font-size: 1vw"><label for="inputAddress">Status Peminjaman</label> <input type="text" class="form-control" id="inputAddress" placeholder="">
							</div>
			
			<!-- END CODE -->
			</div>
		</main>
		
	</div>
<?php
require "./admin/partials/footer.php";
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
