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
$WaktuSelesai = date('H:i:s', strtotime($DurasiWaktu, strtotime($WaktuMulai)));
$Action = "Approved";

$result = $fungsi->cekWaktuPinjam($TanggalPinjam, $Ruangan, $WaktuMulai);
$result2 = $fungsi->cekWaktuSelesai($TanggalPinjam, $Ruangan, $WaktuSelesai);
if (mysql_num_rows($result) || mysql_num_rows($result2) >= 1) {
    $pesanError = array();
    $pesanError[] = "Maaf, Ruangan $Ruangan Pada Jadwal Tersebut Sedang Digunakan";

    if (count($pesanError) >= 1) {
        echo "<main class='main-content bgc-grey-100'>";
            echo " <div id='mainContent'>";
            echo "<div class='mssgBox'>";
            echo "<img src='images/attention.png' width='50px'> <br><hr>";
            $noPesan = 0;
            foreach ($pesanError as $indeks => $pesan_tampil) {
                $noPesan++;
                echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
            }
            echo "</div> <br>";
            echo "<a href=?page=FormRequest>Kembali Ke Form</a>";
              
            echo "</div>";
            echo "</main>";
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


