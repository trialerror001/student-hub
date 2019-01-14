<?php
if ($_GET) {
    // Jika mendapatkan variabel URL ?page
    switch ($_GET['page']) {

        case 'Validasi' :
            if (!file_exists("validasi.php"))
                die("Sorry Empty Page!");
            include "validasi.php";
            break;
    }
} else {
    if (!file_exists("HalamanLogin/login.php"))
        die("Empty Main Page!");
    
    include "HalamanLogin/login.php";
}
?>