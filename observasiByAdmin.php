<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include "./library/inc.library.php";
include "./fungsi/fungsi.php";
$fungsi = new DB_Functions();

//Insert Request
$IdRequest = buatKode("tb_request", "REQ");
$KodePinjam = buatKode("tb_observasi", "OBS");
//echo $IdRequest;
$Himpunan = $_POST['cmbHimpunan'];
$Ruangan = $_POST['cmbKodeRuangan'];
$Keperluan = $_POST['keperluan'];
$TanggalPinjam = InggrisTgl($_POST['tanggalMulai']);
$WaktuMulai = $_POST['cmbWaktuMulai'];
$DurasiWaktu = $_POST['cmbDurasiWaktu'];
//$WaktuSelesai = $_POST['cmbWaktuSelesai'];
$WaktuSelesai = date('h:i:s', strtotime($DurasiWaktu, strtotime($WaktuMulai)));

$Action = "Approved";

$result = $fungsi->cekTanggalByAdmin($TanggalPinjam, $Ruangan, $WaktuMulai);
if (mysql_num_rows($result) >= 1) {
    $pesanError = array();
    $pesanError[] = "Maaf, Ruangan $Ruangan Pada Jadwal Tersebut Sedang Digunakan";

    if (count($pesanError) >= 1) {
        echo "<div class='mssgBox'>";
        echo "<img src='images/attention.png' width='50px'> <br><hr>";
        $noPesan = 0;
        foreach ($pesanError as $indeks => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
        echo "<a href=?page=DataRequest>Kembali Ke Form</a>";
    }
} else {
    $result = $fungsi->insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalPinjam, $DurasiWaktu, $WaktuMulai, $WaktuSelesai, $Action);
    $result2 = $fungsi->insertObservasi($KodePinjam, $IdRequest, $Ruangan, $TanggalPinjam, $WaktuMulai, $WaktuSelesai, $Action);

    if ($result && $result2) {
        ?>
        <script>
            swal("Terima Kasih!", "Ruangan Berhasil Direserve", "success");
            setTimeout(function () {
                window.location = "?page=DataReserved"
            }, 3000);

        </script>
        <?php
    } else
        echo mysql_error();
}





//Insert Observasi
?>


