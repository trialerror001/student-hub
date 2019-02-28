<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./admin/partials/header.php";
	include "./library/inc.library.php";
        include "./library/inc.seslogin.php";
	include "./fungsi/fungsi.php";
        $fungsi = new DB_Functions();
	?>
	<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
    <?php
    $fungsi->updateDoneStatus(date("Y/m/d"));
    ?>
</head>
		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				<table class="display table table-striped table-bordered" id="datatable">
                    <thead>
                    	<th>Kode Request</th>
                    	<th>Organisasi</th>
                    	<th>Ruangan</th>
                    	<th>Tanggal & Waktu Pinjam</th>
                    	<th>Tanggal & Waktu Selesai</th>
                    	<th>Kegiatan</th>
                    	<th>Status</th>
                    	
                    </thead>
                    <tbody>
                    	<?php
                                //$myQry = $fungsi->getAllDataReserved();
                                $myQry = $fungsi->getDataReserved(date("Y/m/d"));
                                while ($kolomData = mysql_fetch_array($myQry)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $kolomData['kd_peminjaman']; ?></td>
                                        <td><?php echo $kolomData['nama_organisasi']; ?></td>
                                        <td><?php echo $kolomData['kd_ruangan']; ?></td>
                                        <td><?php echo IndonesiaTgl($kolomData['tanggal_pinjam'])." [".$kolomData['waktu_pinjam']."]" ?></td>
                                        <td><?php echo IndonesiaTgl($kolomData['tanggal_selesai'])." [".$kolomData['waktu_selesai']."]" ?></td>
                                        <td><?php echo $kolomData['keperluan']; ?></td>
                                        <td><?php echo $kolomData['status_peminjaman']; ?></td>
                                        
                                       
                                    </tr>

                                <?php } ?>
                    </tbody>
                </table>

			<!-- END CODE -->
			</div>
		</main>
		

</html>
