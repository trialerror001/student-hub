<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
//session_start();
if (isset($_POST['btnLogin'])) {

    include 'Koneksi/koneksi.php';
    include 'fungsi/fungsi.php';
    $fungsi = new DB_Functions();
    
    $user = $_POST['user'];
    $pass = $_POST['pwd'];

    //cek user
    $result= $fungsi->validasi($user, $pass);
    if (mysql_num_rows($result)) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['level'] = $row['level'];
        $_SESSION['namaOrganisasi'] = $row['nama_organisasi'];
        $_SESSION['fakultas'] = $row['fakultas'];
        
        if ($_SESSION['level'] == "admin") {
            ?>
            <script>
                document.location = "?page=HomePage";
            </script>
            <?php
        } else if ($_SESSION['level'] == "himpunan") {
            $_SESSION['organisasi'] = $row['nama_organisasi'];
            ?>
            <script>
                document.location = "?page=HomePage";
            </script>
            <?php
        } else if ($_SESSION['level'] == "kabid") {
            ?>
            <script>
                document.location = "?page=HomePage";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            swal("Gagal!", "Pastikan Semua Data Sudah Terisi Dengan Benar dan Account Anda Sudah Teraktivasi", "error");
            setTimeout(function () {
                window.location = "?page=Login"
            }, 4000);
        </script>
        <?php
    }
}
?>
