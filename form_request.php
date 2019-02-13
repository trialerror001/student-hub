<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./admin/partials/header.php";
	include './fungsi/fungsi.php';
        $fungsi = new DB_Functions();
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
					<div class="mT-30">
					<form method="POST" action="?page=RequestRuangan">		
					<div class="form-row">		
						<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Nama Himpunan</label> 
								<?php $fungsi->namaHimpunan(); ?>
							</div>
						
						<div class="form-group col-md-4" style="font-size: 1vw"><label for="inputCity"> Ruang yang dipinjam</label> 
							<?php $fungsi->kodeRuangan(); ?>
						</div>
						
						<div class="form-group col-md-12" style="font-size: 1vw"><label for="inputCity">Untuk Keperluan</label> <input type="text" class="form-control" id="inputCity" name="keperluan">
						</div>
							
							
						<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputZip">Pada Tanggal</label> <input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker" name="tanggalMulai">
						</div>

						<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> 
							<select name="cmbWaktuMulai" class="form-control">
								<?php $fungsi->waktuPeminjaman(); ?>
							</select>
						</div>

						<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputZip">Sampai Tanggal</label> <input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker" name="tanggalSelesai">
						</div>

						<div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> 
							<select name="cmbWaktuSelesai" class="form-control">
								<?php $fungsi->waktuPeminjaman(); ?>
							</select>
						</div>
						
					</div>

						
						<div class="form-group"><div class="checkbox checkbox-circle checkbox-info peers ai-c" style="font-size: 1vw"><input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer" required="true"> <label for="inputCall2" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Kami akan bertanggung jawab atas pengunaan fasilitas yang diberikan dan bersedia mengembalikan fasilitas yang dipinjamkan dengan keadaan baik</span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary" name="submitRequest">Book</button>
				</form>
			</div>
		</div>
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
