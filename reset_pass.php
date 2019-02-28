<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
include './fungsi/fungsi.php';
$fungsi = new DB_Functions();

if (isset($_POST['resetPass'])) {
    $Himpunan = $_POST['cmbHimpunan'];
    $newPass = $_POST['newPass'];
    $conPass = $_POST['conPass'];

    if ($newPass == $conPass) {
        $fungsi->resetPassword($Himpunan, $newPass);
        ?>
        <script>
            swal("Berhasil!", "Password Berhasil Diubah", "success");
            //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
            setTimeout(function () {
                window.location = "?page=HalamanAdmin"
            }, 2000);
        </script>
        <?php
    }else{
        ?>
        <script>
            swal("Gagal!", "Password Tidak Sesuai", "error");
            //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
            setTimeout(function () {
                window.location = "?page=HalamanAdmin"
            }, 2000);
        </script>
        <?php
    }
}
?>