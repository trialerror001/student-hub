<?php
//session_start();
if (isset($_POST['btnLogin'])) {

    include 'library/database.inc.php';
<<<<<<< HEAD

    $user = mysqli_real_escape_string($conn, $_POST['user']);
=======
    
    $user = mysqli_real_escape_string($conn, $_POST['email']);
>>>>>>> 152d2284c1b6cd5fa631651c6b19db474d3742b3
    $pass = mysqli_real_escape_string($conn, $_POST['pwd']);

    //cek user
    $sql = "SELECT * FROM tb_login WHERE username='".$user."' and password = '".md5($pass)."'";
    $result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['level'] = $row['level'];

            if ($_SESSION['level'] == "admin") {
                ?>
                <script>
                   document.location = "?page=HalamanAdmin";
                </script>
    <?php

            }
        }else {
                    ?>
                    <script>
                        alert('Username atau Password Anda Salah')
                        document.location = "?page=LoginAdmin";
                    </script>
                    <?php
            }
  
}
?>
