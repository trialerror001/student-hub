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
            
        case 'FormReport' :
            if (!file_exists("formReport.php"))
                die("Sorry Empty Page!");
            include "formReport.php";
            break;

        case 'HomePage' :
            if (!file_exists("home_page.php"))
                die("Sorry Empty Page!");
            include "home_page.php";
            break;
        
        case 'HalamanKabid' :
            if (!file_exists("kabid_home.php"))
                die("Sorry Empty Page!");
            include "kabid_home.php";
            break;
            
        case 'HalamanClient' :
            if (!file_exists("clients_home.php"))
                die("Sorry Empty Page!");
            include "clients_home.php";
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

        case 'Login' :
            if (!file_exists("login.php"))
                die("Sorry Empty Page!");
            include "login.php";
            break;

        case 'TambahRuangan' :
            if (!file_exists("tambah_ruangan.php"))
                die("Sorry Empty Page!");
            include "tambah_ruangan.php";
            break;

        case 'UpdateRuangan' :
            if (!file_exists("update_ruangan.php"))
                die("Sorry Empty Page!");
            include "update_ruangan.php";
            break;

        case 'DeleteRuangan' :
            if (!file_exists("delete_ruangan.php"))
                die("Sorry Empty Page!");
            include "delete_ruangan.php";
            break;

        case 'DataHimpunan' :
            if (!file_exists("show_himpunan.php"))
                die("Sorry Empty Page!");
            include "show_himpunan.php";
            break;

        case 'ResetPassword' :
            if (!file_exists("reset_pass.php"))
                die("Sorry Empty Page!");
            include "reset_pass.php";
            break;
            
        case 'KabidApproval' :
            if (!file_exists("approvedByKabid.php"))
                die("Sorry Empty Page!");
            include "approvedByKabid.php";
            break;
            
        case 'ObserveByAdmin' :
            if (!file_exists("observasiByAdmin.php"))
                die("Sorry Empty Page!");
            include "observasiByAdmin.php";
            break;
            
        case 'Register' :
            if (!file_exists("register.php"))
                die("Sorry Empty Page!");
            include "register.php";
            break;
    }
} else {
    if (!file_exists("home_page.php"))
        die("Empty Main Page!");

    include "home_page.php";
}
?>