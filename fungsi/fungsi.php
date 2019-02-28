<?php

class DB_Functions {

    function __construct() {
        include 'Koneksi/koneksi.php';
    }

    function namaHimpunan() {
        echo "
         <select name='cmbHimpunan' class='form-control'>";
        $sql = mysql_query("Select nama_organisasi from tb_organisasi");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['nama_organisasi'];
            if ($data['nama_organisasi'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[nama_organisasi]'>$data[nama_organisasi]</option>";
        }

        echo "
         </select>
         ";
    }

    function kodeRuangan() {
        echo "
        <select name='cmbKodeRuangan' class='form-control'>";
        $sql = mysql_query("Select kd_ruangan from tb_ruangan");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['kd_ruangan'];
            if ($data['kd_ruangan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[kd_ruangan]'>$data[kd_ruangan]</option>";
        }

        echo "
         </select>
         ";
    }

    function waktuPeminjaman() {
        echo"<option value='08:00:00'>08.00</option>
		<option value='08:30:00'>08.30</option>
		<option value='09:00:00'>09.00</option>
		<option value='09:30:00'>09.30</option>
		<option value='10:00:00'>10.00</option>
		<option value='10:30:00'>10.30</option>
		<option value='11:00:00'>11.00</option>
		<option value='11:30:00'>11.30</option>
		<option value='12:00:00'>12.00</option>
		<option value='12:30:00'>12.30</option>
		<option value='13:00:00'>13.00</option>
		<option value='13:30:00'>13.30</option>
		<option value='14:00:00'>14.00</option>
		<option value='14:30:00'>14.30</option>
		<option value='15:00:00'>15.00</option>
		<option value='15:30:00'>15.30</option>
		<option value='16:00:00'>16.00</option>";
    }

    function insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalMulai, $WaktuMulai, $TanggalSelesai, $WaktuSelesai) {
        $result = mysql_query("INSERT into tb_request (id_request, nama_organisasi, kd_ruangan, "
                . "keperluan, tanggal_permohonan, tanggal_pinjam, tanggal_selesai, waktu_mulai, "
                . "waktu_selesai, action) Values ('$IdRequest', '$Himpunan', '$Ruangan', '$Keperluan', "
                . "date(curdate()), '$TanggalMulai', '$TanggalSelesai', '$WaktuMulai', "
                . "'$WaktuSelesai','')");
        return $result;
    }

    function getDataRequest() {
        $result = mysql_query("SELECT * FROM tb_request where action='' Order By tanggal_permohonan ASC ");
        return $result;
    }

    function getRequestById($IdRequest) {
        $result = mysql_query("SELECT * FROM tb_request where md5(id_request) = '$IdRequest' Order By tanggal_permohonan ASC ");
        return $result;
    }

    function cekTanggal($Ruangan, $TanggalSelesai, $WaktuSelesai) {
        $result = mysql_query("SELECT * FROM tb_observasi WHERE kd_ruangan = '$Ruangan' AND '$TanggalSelesai' "
                . "BETWEEN `tanggal_pinjam` AND `tanggal_selesai` AND '$WaktuSelesai' BETWEEN `waktu_pinjam` AND `waktu_selesai`");

        return $result;
    }

    function insertObservasi($KdPinjam, $IdRequest, $Ruangan, $TanggalMulai, $WaktuMulai, $TanggalSelesai, $WaktuSelesai) {
        $result = mysql_query("INSERT into tb_observasi (kd_peminjaman, id_request, kd_ruangan, tanggal_pinjam, tanggal_selesai, waktu_pinjam, waktu_selesai, status_peminjaman) Values ('$KdPinjam', '$IdRequest', '$Ruangan', '$TanggalMulai', '$TanggalSelesai', '$WaktuMulai', '$WaktuSelesai','Reserved')");
        return $result;
    }

    function updateAction($idRequest, $action){
        $result = mysql_query("Update tb_request SET action = '$action' where id_request = '$idRequest'");
    }
    
    function getAllDataReserved() {
        $result = mysql_query("SELECT a.kd_peminjaman, b.nama_organisasi, a.kd_ruangan, a.tanggal_pinjam, a.tanggal_selesai, time_format(a.waktu_pinjam, '%H:%i') as waktu_pinjam, time_format(a.waktu_selesai, '%H:%i') as waktu_selesai, b.keperluan, a.status_peminjaman FROM tb_observasi as a JOIN tb_request as b WHERE a.id_request = b.id_request Order By kd_peminjaman ASC ");
        return $result;
    }
    
    function getDataReserved($today) {
        $result = mysql_query("SELECT a.*, b.nama_organisasi, a.kd_ruangan, a.tanggal_pinjam, "
                . "a.tanggal_selesai, time_format(a.waktu_pinjam, '%H:%i') as waktu_pinjam, "
                . "time_format(a.waktu_selesai, '%H:%i') as waktu_selesai, b.keperluan, a.status_peminjaman "
                . "FROM tb_observasi as a JOIN tb_request as b WHERE a.id_request = b.id_request "
                . "AND a.tanggal_selesai >= '$today' Order By kd_peminjaman ASC ");
        return $result;
    }

    function updateDoneStatus($tanggal){
        $result = mysql_query("Update tb_observasi SET status_peminjaman='Done' where tanggal_selesai < '$tanggal'");
        
        return $result;
    }
    
    function getDataRuangan() {
        $result = mysql_query("SELECT * FROM tb_ruangan");
        return $result;
    }
    
    function getDataRuanganByKode($Kode) {
        $result = mysql_query("SELECT * FROM tb_ruangan where md5(id) = '$Kode'");
        return $result;
    }
    
    function insertRuangan($kdRuangan, $namaRuangan, $keterangan){
        $result = mysql_query("INSERT into tb_ruangan (kd_ruangan, nama_ruangan, keterangan) Values ('$kdRuangan', '$namaRuangan', '$keterangan')");
        
        return $result;
    }
    
    function updateDataRuangan($Id,$Kode,$NamaRuangan,$Keterangan){
        $result = mysql_query("Update tb_ruangan SET kd_ruangan='$Kode', nama_ruangan='$NamaRuangan', keterangan='$Keterangan' where md5(id)='$Id'");
        
        return $result;
    }
    
    function deleteDataRuangan($Id){
        $result = mysql_query("Delete From tb_ruangan where md5(id)='$Id'");
        
        return $result;
    }
    
    function resetPassword($Himpunan,$Pass){
        $result = mysql_query("Update tb_organisasi SET password=md5('$Pass') where nama_organisasi='$Himpunan'");
        
        return $result;
    }
}
?>