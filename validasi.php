<?php

session_start();

if (isset($_POST['btnLogin'])) {

    include 'library/database.inc.php';

    $user = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pwd']);

    //cek user
    $sql = "SELECT * FROM tb_login WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);


		if ($resultCheck < 1) {
				header ("Location: ../student-hub/index.php?login=error");
				exit();
		} else {

        if ($row = mysqli_fetch_assoc($result)) {
        //Cek Password
        $pwdCheck = password_verify($pass, $row['password']);
            if ($pwdCheck == false) {
                header ("Location: ../student-hub/index.php?login=error");
                exit();
            } elseif ($pwdCheck == true) {
                $_SESSION['email'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['level'] = $row['level'];
            		if ($_SESSION['level'] == "admin") {
                		?>
                		<script>
                        <?php
                            header("Location: ../student-hub/reservasi_ruangan.php?login=admin");
                            exit();
                         ?>
                		</script>
                		<?php

            		} elseif ($_SESSION['level'] == "bidang1" || $_SESSION['level'] == "bidang2" || $_SESSION['level'] == "bidang3" ||
                    		$_SESSION['level'] == "bidang4" || $_SESSION['level'] == "bidang5") {
                		?>
                		<script>
                    		document.location = "?page=Data-Bidang";
                		</script>
                		<?php

            		}elseif($_SESSION['level']=="pegawai"){
                		?>
                 		<script>
                    <?php
                        header("Location: ../student-hub/index.php?login=success");
                        exit();
                     ?>
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
}
?>
