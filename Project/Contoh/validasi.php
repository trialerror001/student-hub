<?php

//session_start();
include "Koneksi/koneksi.php";
//include "Page/page.php";

if (isset($_POST['btnLogin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $loginSql = "SELECT * FROM tb_login WHERE username = '" . $user . "' and password = '" . md5($pass) . "'";
    $loginQry = mysql_query($loginSql, $koneksidb) or die("Error Query :" . mysql_error());

    if ($loginQry) {
        if (mysql_num_rows($loginQry)) {
            $loginData = mysql_fetch_array($loginQry);
            $_SESSION['level'] = $loginData['level'];
            if ($_SESSION['level'] == "admin") {
                ?>
                <script>
                    document.location = "?page=Dashboard";
                </script>
                <?php

            } else if ($_SESSION['level'] == "bidang1" || $_SESSION['level'] == "bidang2" || $_SESSION['level'] == "bidang3" ||
                    $_SESSION['level'] == "bidang4" || $_SESSION['level'] == "bidang5") {
                ?>
                <script>
                    document.location = "?page=Data-Pegawai";
                </script>
                <?php

            }else if($_SESSION['level']=="pegawai"){
                ?>
                 <script>
                    document.location = "?page=Data-Pegawai";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Username atau Password Anda Salah')
                document.location = "index.php";
            </script>
            <?php

        }
    }
}
?>