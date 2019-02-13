<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./admin/partials/header.php";
	include "./library/inc.library.php";
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
</head>
<body class="app">
	<div class="page-container"> 
		<?php require './admin/partials/admin_navbar.php'; ?>

		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				<table class="display table table-striped table-bordered" id="datatable">
                    <thead>
                    	<th>Kode Ruangan</th>
                    	<th>Nama Ruangan</th>
                    	<th>Keterangan</th>
                    	<th>Update</th>
                    	<th>Delete</th>
                    	
                    	
                    </thead>
                    <tbody>
                    	<?php
                                $myQry = $fungsi->getDataRuangan();
                                while ($kolomData = mysql_fetch_array($myQry)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $kolomData['kd_ruangan']; ?></td>
                                        <td><?php echo $kolomData['nama_ruangan']; ?></td>
                                        <td><?php echo $kolomData['keterangan']; ?></td>
                                        <td><img src="images/update.png" width="50" height="50"></td>
                                        <td><img src="images/delete.png" width="50" height="50"></td>
                                    </tr>

                                <?php } ?>
                    </tbody>
                </table>

			<!-- END CODE -->
			</div>
		</main>
		
	</div>
<?php
require "./admin/partials/footer.php";
?>
</body>
</html>
