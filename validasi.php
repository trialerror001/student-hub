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
        $row = mysqli_fetch_assoc($result);
        echo $row['active'];
        if ($row['active'] == 0) {
            ?>
            <script>
                swal("Gagal!", "Silahkan Lakukan Aktivasi Account Anda", "error");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=Login"
                }, 2000);
            </script>
            <?php
        }if($row['active']==1){
            ?>
            <script>
                swal("Gagal!", "Username Atau Password Salah", "error");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=Login"
                }, 2000);
            </script>
            <?php
        }
    }
}
?>
