<head>
    <script src="lib/sweetalert.min.js"></script>
</head>
<?php
//session_start();
if (isset($_POST['btnLogin'])) {

    include 'library/database.inc.php';

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pwd']);

    //cek user
    $sql = "SELECT * FROM tb_organisasi WHERE username='" . $user . "' and password = '" . md5($pass) . "' and active='1'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['level'] = $row['level'];
        $_SESSION['namaOrganisasi'] = $row['nama_organisasi'];

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
