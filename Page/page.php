<?php
if ($_GET) {
    // Jika mendapatkan variabel URL ?page
    switch ($_GET['page']) {

        case 'Validasi' :
            if (!file_exists("validasi.php"))
                die("Sorry Empty Page!");
            include "validasi.php";
            break;

        case 'FormRegistrasi' :
            if (!file_exists("form_regis.php"))
                die("Sorry Empty Page!");
            include "form_regis.php";
            break;

        case 'HalamanAdmin' :
            if (!file_exists("client_home.php"))
                die("Sorry Empty Page!");
            include "client_home.php";
            break;

        case 'LoginAdmin' :
            if (!file_exists("admin/index.php"))
                die("Sorry Empty Page!");
            include "admin/index.php";
            break;


        default:
            if (!file_exists("client_home.php"))
                die("Sorry Empty Page!");
            include "client_home.php";
    }
} else {
    if (!file_exists("client_home.php"))
        die("Empty Main Page!");
    
    include "client_home.php";
}
?>