<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include "./library/inc.library.php";
include "./fungsi/fungsi.php";
$fungsi = new DB_Functions();


$action = isset($_GET['Action']) ? $_GET['Action'] : '';
$REQ = isset($_GET['REQ']) ? $_GET['REQ'] : '';
$KodePinjam = buatKode("tb_observasi", "OBS");

$myQry = $fungsi->getRequestById($REQ);
$kolomData = mysql_fetch_array($myQry);

$KodePinjam = buatKode("tb_observasi", "OBS");
$idRequest = $kolomData['id_request'];
$ruangan = $kolomData['kd_ruangan'];
$tanggalPinjam = $kolomData['tanggal_pinjam'];
$waktuMulai = $kolomData['waktu_mulai'];
$waktuSelesai = $kolomData['waktu_selesai'];
$status = "Reserved";

if ($action == 'Approved') {
    $result = $fungsi->cekTanggal($tanggalPinjam,$ruangan, $waktuMulai);
    if (mysql_num_rows($result) >= 1) {
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
            echo "<a href=?page=DataRequest>Kembali Ke Form</a>";
        }
      
    } else {
        $fungsi->insertObservasi($KodePinjam, $idRequest, $ruangan, $tanggalPinjam, $waktuMulai, $waktuSelesai, $status);
        $result = $fungsi->updateAction($REQ, "Process");
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
} else if ($action == 'Denied') {
    ?>
    <script>

        swal("Tuliskan alasan anda:", {
            content: "input",
        })
                .then((value) => {
                    //swal(`You typed: ${value}`);
                    swal('Respon anda telah dikirim');
                    setTimeout(function () {
                        window.location = "?page=DataRequest"
                    }, 2000);
                });
    </script>
    <?php
    $to="ferdian.aditya2302@gmail.com";
    $subject = "Penolakan Peminjaman Ruangan";
    $txt = "Maaf, ruangan sedang tidak tersedia";
    
    //nanti disini diganti dengan pengiriman email
    //echo "<script>alert('Maaf, Peminjaman anda kami tolak')</script>";
    $fungsi->updateAction($idRequest, $action);
    //mail($to, $subject, $txt);
    ?>

    <?php
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

