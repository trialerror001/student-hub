<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include "./library/inc.library.php";
include "./fungsi/fungsi.php";

if ($_SESSION['level'] == 'admin') {
    $fungsi = new DB_Functions();

    $REQ = isset($_GET['REQ']) ? $_GET['REQ'] : '';
    $action = isset($_GET['Action']) ? $_GET['Action'] : '';
    
    $myQry = $fungsi->getObservasi($REQ);
    $kolomData = mysql_fetch_array($myQry);

    $idRequest = $kolomData['id_request'];
    $kolomData = mysql_fetch_array($myQry);
    
    //echo $idRequest;
    if ($action == 'Approved') {
        $result = $fungsi->updateStatusPeminjaman($REQ, $action);
        $fungsi->updateAction(md5($idRequest), $action);
        if ($result) {
            ?>
            <script>
                swal("Terima Kasih!", "Ruangan Berhasil Direserve", "success");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=DataRequest"
                }, 3000);
            </script>
            <?php
        }
        

        //nanti disini ditambahkan dengan pengiriman email
    } else if ($action == 'Declined') {
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
        $to = "ferdian.aditya2302@gmail.com";
        $subject = "Penolakan Peminjaman Ruangan";
        $txt = "Maaf, ruangan sedang tidak tersedia";

        //nanti disini diganti dengan pengiriman email
        //echo "<script>alert('Maaf, Peminjaman anda kami tolak')</script>";
        $fungsi->updateAction(md5($idRequest), $action);
        $fungsi->deleteDataObservasi($REQ);
        //mail($to, $subject, $txt);
        ?>

        <?php
    }
} 
?>