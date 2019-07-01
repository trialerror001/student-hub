<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php

include 'fungsi/fungsi.php';
$fungsi = new DB_Functions();
include 'library/inc.library.php';

if (isset($_POST['submitRequest'])) {
    $IdRequest = buatKode("tb_request", "REQ");
    //echo $IdRequest;
    $Himpunan = $_POST['cmbHimpunan'];
    $Ruangan = $_POST['cmbKodeRuangan'];
    $Keperluan = $_POST['keperluan'];
    $TanggalPinjam = InggrisTgl($_POST['tanggalMulai']);
    $WaktuMulai = $_POST['cmbWaktuMulai'];
    $DurasiWaktu = $_POST['cmbDurasiWaktu'];
    //$WaktuSelesai = $_POST['cmbWaktuSelesai'];
    $WaktuSelesai = strtotime($DurasiWaktu, strtotime($WaktuMulai));
    $Action = "Pending";
    
    $result = $fungsi->insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalPinjam, $DurasiWaktu, $WaktuMulai, date('h:i:s', $WaktuSelesai), $Action);
    
    if ($result) {
        ?>
          <script>
                swal("Terima Kasih!", "Permohonan Anda Telah Terkirim", "success");
                setTimeout(function () {
                        window.location = "?page=HomePage"
                    }, 3000);
        
          </script>
      

        <?php

    }else{
        echo mysql_error();
    }
}
?>
