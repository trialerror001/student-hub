<?php 
    include 'fungsi/fungsi.php';  
    $fungsi = new DB_Functions();
    include 'library/inc.library.php';
    
    if(isset($_POST['submitRequest'])){
        $IdRequest = buatKode("tb_request","REQ");
        //echo $IdRequest;
        $Himpunan = $_POST['cmbHimpunan'];
        $Ruangan = $_POST['cmbKodeRuangan'];
        $Keperluan = $_POST['keperluan'];
        $TanggalMulai = InggrisTgl($_POST['tanggalMulai']);
        $WaktuMulai = $_POST['cmbWaktuMulai'];
        $TanggalSelesai = InggrisTgl($_POST['tanggalSelesai']);
        $WaktuSelesai = $_POST['cmbWaktuSelesai'];

        $fungsi->insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalMulai, $WaktuMulai, $TanggalSelesai, $WaktuSelesai);


        
    }
    ?>
