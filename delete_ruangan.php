<head>
      <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include 'fungsi/fungsi.php';
$fungsi = new DB_Functions();

if(empty($_GET['Kode'])){
	echo "<b>Data yang dihapus tidak ada</b>";
}else{
	$result = $fungsi->deleteDataRuangan($_GET['Kode']);
         if ($result) {
            ?>
            <script>
                swal("Done!", "Data Ruangan Berhasil Dihapus", "success");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=DataRuangan";
                }, 3000);
            </script>
            <?php
        }
        
}

?>