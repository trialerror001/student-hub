<?php

if ($_GET) {
    // Jika mendapatkan variabel URL ?page
    switch ($_GET['page']) {

        case 'Validasi' :
            if (!file_exists("validasi.php"))
                die("Sorry Empty Page!");
            include "validasi.php";
            break;

        case 'Dashboard' :
            if (!file_exists("dashboard.php"))
                die("Sorry Empty Page!");
            include "dashboard.php";
            break;

        case 'Data-Pegawai' :
            if (!file_exists("data-pegawai.php"))
                die("Sorry Empty Page!");
            include "data-pegawai.php";
            break;

        case 'Data-Surat' :
            if (!file_exists("data-surat.php"))
                die("Sorry Empty Page!");
            include "data-surat.php";
            break;

        case 'Tambah-Pegawai' :
            if (!file_exists("tambah-pegawai.php"))
                die("Sorry Empty Page!");
            include "tambah-pegawai.php";
            break;

        case 'Ubah-Pegawai' :
            if (!file_exists("ubah-pegawai.php"))
                die("Sorry Empty Page!");
            include "ubah-pegawai.php";
            break;

        case 'Insert-Data-Pegawai' :
            if (!file_exists("Operasi/insert-data-pegawai.php"))
                die("Sorry Empty Page!");
            include "Operasi/insert-data-pegawai.php";
            break;

        case 'Edit-Data-Pegawai' :
            if (!file_exists("Operasi/edit-data-pegawai.php"))
                die("Sorry Empty Page!");
            include "Operasi/edit-data-pegawai.php";
            break;

        case 'Hapus-Data-Pegawai' :
            if (!file_exists("Operasi/hapus-data-pegawai.php"))
                die("Sorry Empty Page!");
            include "Operasi/hapus-data-pegawai.php";
            break;

        case 'Buat-Surat' :
            if (!file_exists("buat-surat.php"))
                die("Sorry Empty Page!");
            include "buat-surat.php";
            break;

        case 'Detail-Laporan-Penugasan' :
            if (!file_exists("detail-laporan-tugas.php"))
                die("Sorry Empty Page!");
            include "detail-laporan-tugas.php";
            break;

        case 'Tambah-Surat-Baru' :
            if (!file_exists("Operasi/tambah-surat-baru.php"))
                die("Sorry Empty Page!");
            include "Operasi/tambah-surat-baru.php";
            break;

        case 'Grafik-Dinkes':
            if (!file_exists("grafik.php"))
                die("Sorry Empty Page!");
            include "grafik.php";
            break;

        case 'Laporan-Tugas':
            if (!file_exists("laporan-tugas.php"))
                die("Sorry Empty Page!");
            include "laporan-tugas.php";
            break;


        case 'GrafikBidangPerBulan':
            if (!file_exists("show_detail_chart_bidang.php"))
                die("Sorry Empty Page!");
            include "show_detail_chart_bidang.php";
            break;

        case 'GrafikKasiePerBulan':
            if (!file_exists("show_detail_chart_kasie.php"))
                die("Sorry Empty Page!");
            include "show_detail_chart_kasie.php";
            break;

        case 'GrafikStafPerBulan':
            if (!file_exists("show_detail_chart_staff.php"))
                die("Sorry Empty Page!");
            include "show_detail_chart_staff.php";
            break;

        case 'DetailGrafikWilayahBulanan':
            if (!file_exists("show_detail_grafik_wilayah.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_wilayah.php";
            break;

        case 'DetailGrafikWilayah' :
            if (!file_exists("show_detail_grafik_wilayah_2.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_wilayah_2.php";
            break;

        case 'MenuGrafikLuarKota' :
            if (!file_exists("show_detail_grafik_luarkota.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_luarkota.php";
            break;

        case 'MenuGrafikLuarJakarta' :
            if (!file_exists("show_detail_grafik_luarjakarta.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_luarjakarta.php";
            break;

        case 'DetailGrafikWilayahJakarta' :
            if (!file_exists("show_detail_grafik_luarkota_2.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_luarkota_2.php";
            break;

        case 'DetailGrafikWilayahLuarJakarta' :
            if (!file_exists("show_detail_grafik_luarjakarta_2.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_luarjakarta_2.php";
            break;

        case 'DetailGrafikDalamGedung' :
            if (!file_exists("show_detail_chart_dalamGedung.php"))
                die("Sorry Empty Page!");
            include "show_detail_chart_dalamGedung.php";
            break;
        
        case 'DetailGrafikLuarGedung' :
            if (!file_exists("show_detail_chart_luarGedung.php"))
                die("Sorry Empty Page!");
            include "show_detail_chart_luarGedung.php";
            break;
            
        case 'Bantuan' :
            if (!file_exists("bantuan.php"))
                die("Sorry Empty Page!");
            include "bantuan.php";
            break;

        case 'PreviewDataSurat' :
            if (!file_exists("preview_data_surat.php"))
                die("Sorry Empty Page!");
            include "preview_data_surat.php";
            break;

        case 'UbahDataSurat' :
            if (!file_exists("ubah-surat.php"))
                die("Sorry Empty Page!");
            include "ubah-surat.php";
            break;

        case 'UpdateSurat' :
            if (!file_exists("Operasi/update-surat.php"))
                die("Sorry Empty Page!");
            include "Operasi/update-surat.php";
            break;

        case 'HapusDataSurat' :
            if (!file_exists("Operasi/delete-surat.php"))
                die("Sorry Empty Page!");
            include "Operasi/delete-surat.php";
            break;

        case 'Logout' :
            if (!file_exists("logout.php"))
                die("Sorry Empty Page!");
            include "logout.php";
            break;

        case 'Login' :
            if (!file_exists("login.php"))
                die("Sorry Empty Page!");
            include "login.php";
            break;
            
        case 'MenuGrafikAPBD' :
            if (!file_exists("show_detail_grafik_apbd.php"))
                die("Sorry Empty Page!");
            include "show_detail_grafik_apbd.php";
            break;
    }
} else {
    if (!file_exists("login.php"))
        die("Empty Main Page!");
    include "login.php";
}
?>

