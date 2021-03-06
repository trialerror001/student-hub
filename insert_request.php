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
    $Himpunan = $_POST['namaOrganisasi'];
    $Ruangan = $_POST['cmbKodeRuangan'];
    $Keperluan = $_POST['keperluan'];
    $TanggalPinjam = InggrisTgl($_POST['tanggalMulai']);
    $WaktuMulai = $_POST['cmbWaktuMulai'];
    $DurasiWaktu = $_POST['cmbDurasiWaktu'];
    //$WaktuSelesai = $_POST['cmbWaktuSelesai'];
    $WaktuSelesai = date('H:i:s', strtotime($DurasiWaktu, strtotime($WaktuMulai)));
    $InsertedBy = $_SESSION['namaOrganisasi'];
    $Action = "Pending";
    $Keterangan = "-";

    $result = $fungsi->cekWaktuPinjam($TanggalPinjam, $Ruangan, $WaktuMulai);
    $result2 = $fungsi->cekWaktuSelesai($TanggalPinjam, $Ruangan, $WaktuSelesai);

    echo $WaktuMulai . "<br>'";
    echo $WaktuSelesai;
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
        $cekStatus = $fungsi->checkStatus($_SESSION['namaOrganisasi']);
        if (mysql_num_rows($cekStatus) >= 1) {
            ?>
            <script>
                swal("Gagal!", "Maaf, anda tidak diperbolehkan melakukan reservasi ruangan. Silahkan menghubung admin untuk informasi lebih lanjut!!", "error");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=FormRequest"
                }, 4000);
            </script>
            <?php
        } else {
            $result = $fungsi->insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalPinjam, $DurasiWaktu, $WaktuMulai, $WaktuSelesai, $InsertedBy, $Action, $Keterangan);

            if ($result) {
                ?>
                <script>
                    swal("Terima Kasih!", "Permohonan Anda Telah Terkirim", "success");
                    setTimeout(function () {
                        window.location = "?page=HomePage"
                    }, 3000);

                </script>


                <?php
            } else {
                echo mysql_error();
            }
        }
    }
}
?>
