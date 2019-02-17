<?php
if (isset($_GET['page'])) {
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
            if (!file_exists("admins_home.php"))
                die("Sorry Empty Page!");
            include "admins_home.php";
            break;

        case 'LoginAdmin' :
            if (!file_exists("admin/index.php"))
                die("Sorry Empty Page!");
            include "admin/index.php";
            break;

        case 'Logout' :
            if (!file_exists("logout.php"))
                die("Sorry Empty Page!");
            include "logout.php";
            break;

        case 'FormRequest' :
            if (!file_exists("form_request.php"))
                die("Sorry Empty Page!");
            include "form_request.php";
            break;

        case 'RequestRuangan' :
            if (!file_exists("insert_request.php"))
                die("Sorry Empty Page!");
            include "insert_request.php";
            break;

        case 'DataRequest' :
            if (!file_exists("show_request.php"))
                die("Sorry Empty Page!");
            include "show_request.php";
            break;

        case 'AcceptRequest' :
            if (!file_exists("observasi.php"))
                die("Sorry Empty Page!");
            include "observasi.php";
            break;

        case 'DataReserved' :
            if (!file_exists("show_reserved.php"))
                die("Sorry Empty Page!");
            include "show_reserved.php";
            break;

        case 'DataRuangan' :
            if (!file_exists("show_ruangan.php"))
                die("Sorry Empty Page!");
            include "show_ruangan.php";
            break;

        default:
            if (!file_exists("clients_home.php"))
                die("Sorry Empty Page!");
            include "clients_home.php";
    }
} else {
    if (!file_exists("clients_home.php"))
        die("Empty Main Page!");
    
    include "clients_home.php";
}
?>