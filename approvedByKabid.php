<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include "./library/inc.library.php";
include "./fungsi/fungsi.php";
$fungsi = new DB_Functions();


$action = isset($_GET['Action']) ? $_GET['Action'] : '';
$REQ = isset($_GET['REQ']) ? $_GET['REQ'] : '';
$Keterangan = isset($_GET['Keterangan']) ? $_GET['Keterangan'] : '';
$KodePinjam = buatKode("tb_observasi", "OBS");

$myQry = $fungsi->getRequestById($REQ);
$kolomData = mysql_fetch_array($myQry);

$KodePinjam = buatKode("tb_observasi", "OBS");
$idRequest = $kolomData['id_request'];
$ruangan = $kolomData['kd_ruangan'];
$tanggalPinjam = $kolomData['tanggal_pinjam'];
$waktuMulai = $kolomData['waktu_mulai'];
$waktuSelesai = $kolomData['waktu_selesai'];
$status = "Approved";

if ($action == 'Approved') {
    $result = $fungsi->cekWaktuPinjam($tanggalPinjam, $ruangan, $waktuMulai);
    $result2 = $fungsi->cekWaktuSelesai($tanggalPinjam, $ruangan, $waktuSelesai);
    if (mysql_num_rows($result) || mysql_num_rows($result2) >= 1) {
        $pesanError = array();
        $pesanError[] = "Maaf, Ruangan $ruangan Pada Jadwal Tersebut Sedang Digunakan";

        if (count($pesanError) >= 1) {
            echo "<div class='mssgBox'>";
            echo "<img src='images/attention.png' width='50px'> <br><hr>";
            $noPesan = 0;
            foreach ($pesanError as $indeks => $pesan_tampil) {
                $noPesan++;
                echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
            }
            echo "</div> <br>";
            echo "<a href=?page=DataRequest>Kembali Ke Halaman Request</a>";
        }
    } else {
        $fungsi->insertObservasi($KodePinjam, $idRequest, $ruangan, $tanggalPinjam, $waktuMulai, $waktuSelesai, $status);
        $result = $fungsi->updateAction($REQ, "Approved");
        if ($result) {
            ?>
            <script>
                swal("Terima Kasih!", "Permohonan Akan Segera Diproses", "success");
                setTimeout(function () {
                    window.location = "?page=DataRequest"
                }, 3000);

            </script>
            <?php
        }
    }
} else if ($action == 'Declined') {
    $result= $fungsi->declineRequestTicket($action, $Keterangan, $REQ);
    //echo $action."<br>".$Keterangan."<br>".$REQ;
    if($result){
    ?>
    <script>
         swal("Terima Kasih!", "Respon Anda Sudah Dikirim", "success");
                setTimeout(function () {
                    window.location = "?page=DataRequest"
                }, 3000);
    </script>
    <?php
    }
}

?>
