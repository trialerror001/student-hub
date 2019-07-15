<?php

class DB_Functions {

    function __construct() {
        include '/Koneksi/koneksi.php';
    }

    function validasi($user, $pass){
        $result = mysql_query("SELECT * FROM tb_organisasi WHERE username='" . $user . "' and password = '" . md5($pass) . "' and active='1'");
        return $result;
        
    }
    
    function namaHimpunanDetail($namaOrganisasi){
        $result = mysql_query("Select nama_organisasi from tb_organisasi where nama_organisasi = '$namaOrganisasi'");
        while($data = mysql_fetch_array($result)){
            echo $data['nama_organisasi'];
        }
        
    }
    
    function namaHimpunan() {
        echo "
         <select name='cmbHimpunan' class='form-control'>";
        $sql = mysql_query("Select nama_organisasi from tb_organisasi where level = 'himpunan'");
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
    
     function durasiWaktu() {
        echo   "<option value='30 minutes'>30 Menit</option>
		<option value='60 minutes'>60 Menit</option>
		<option value='90 minutes'>90 Menit</option>
		<option value='120 minutes'>120 Menit</option>";
		
    }

    function insertRequest($IdRequest, $Himpunan, $Ruangan, $Keperluan, $TanggalPinjam, $DurasiWaktu, $WaktuMulai, $WaktuSelesai, $InsertedBy, $Action, $Keterangan) {
        $result = mysql_query("INSERT into tb_request (id_request, nama_organisasi, kd_ruangan, "
                . "keperluan, tanggal_permohonan, tanggal_pinjam, durasiWaktu, waktu_mulai, "
                . "waktu_selesai, insertedBy, action, keterangan) Values ('$IdRequest', '$Himpunan', '$Ruangan', '$Keperluan', "
                . "date(curdate()), '$TanggalPinjam', '$DurasiWaktu', '$WaktuMulai', "
                . "'$WaktuSelesai','$InsertedBy','$Action','$Keterangan')");
        return $result;
    }

    function getDataRequest() {
        $result = mysql_query("SELECT a.*, b.* FROM tb_request as a JOIN tb_organisasi as b where a.action='Pending' and b.pic='Fakultas' and a.nama_organisasi = b.nama_organisasi Order By a.id_request ASC ");
        return $result;
    }
    
    function searchVerificationAccount($Email, $Hash) {
        $result = mysql_query("Select * From tb_organisasi where email_organisasi = '$Email' and password='$Hash' and active='0'");
        return $result;
    }
    
    function updateActiveAccount($email, $hash){
        $result = mysql_query("Update tb_organisasi SET active='1' where email_organisasi='$email' and password='$hash' and active='0'");
        return $result;
    }
    
     function checkStatus($namaOrganisasi) {
        $result = mysql_query("Select status from tb_organisasi where nama_organisasi = '$namaOrganisasi' and status='Block' ");
        return $result;
    }
    
    function getDataReservedForAdmin() {
        $result = mysql_query("SELECT a.kd_peminjaman, b.nama_organisasi, a.kd_ruangan, b.keperluan, a.tanggal_pinjam, a.waktu_pinjam, a.waktu_selesai FROM tb_observasi as a JOIN tb_request as b where a.id_request = b.id_request AND status_peminjaman='Reserved' Order By kd_peminjaman ASC ");
        return $result;
    }
    
    function getDataRequestByHimpunan($Organisasi) {
        $result = mysql_query("SELECT * FROM tb_request where nama_organisasi = '$Organisasi' Order By tanggal_permohonan ASC ");
        return $result;
    }
    
    function getRequestById($IdRequest) {
        $result = mysql_query("SELECT * FROM tb_request where md5(id_request) = '$IdRequest' Order By tanggal_permohonan ASC ");
        return $result;
    }
    
    function getObservasi($KdPeminjaman) {
        $result = mysql_query("SELECT * FROM tb_observasi where md5(kd_peminjaman) = '$KdPeminjaman'");
        return $result;
    }
        
    function cekWaktuPinjam($TanggalPinjam, $Ruangan, $WaktuPinjam) {
        // $result = mysql_query("SELECT * FROM tb_observasi WHERE kd_ruangan = '$Ruangan' AND '$TanggalSelesai' "
        //         . "BETWEEN `tanggal_pinjam` AND `tanggal_selesai` AND '$WaktuSelesai' BETWEEN `waktu_pinjam` AND `waktu_selesai`");

        //$result = mysql_query("SELECT * FROM (SELECT * FROM tb_observasi WHERE kd_ruangan='$Ruangan' AND '$TanggalSelesai' BETWEEN tanggal_pinjam AND tanggal_selesai) t1 LEFT JOIN
//(SELECT * FROM tb_observasi WHERE kd_ruangan='$Ruangan' AND '$WaktuSelesai' BETWEEN waktu_pinjam AND waktu_selesai) t2 ON (t1.`kd_peminjaman` = t2.`kd_peminjaman`);");
        
        $result = mysql_query("SELECT * FROM tb_observasi WHERE tanggal_pinjam='$TanggalPinjam' AND kd_ruangan='$Ruangan' AND '$WaktuPinjam' >= waktu_pinjam AND '$WaktuPinjam' < waktu_selesai");

        return $result;
    }
    
    function cekWaktuSelesai($TanggalPinjam, $Ruangan, $WaktuSelesai) {
        // $result = mysql_query("SELECT * FROM tb_observasi WHERE kd_ruangan = '$Ruangan' AND '$TanggalSelesai' "
        //         . "BETWEEN `tanggal_pinjam` AND `tanggal_selesai` AND '$WaktuSelesai' BETWEEN `waktu_pinjam` AND `waktu_selesai`");

        //$result = mysql_query("SELECT * FROM (SELECT * FROM tb_observasi WHERE kd_ruangan='$Ruangan' AND '$TanggalSelesai' BETWEEN tanggal_pinjam AND tanggal_selesai) t1 LEFT JOIN
//(SELECT * FROM tb_observasi WHERE kd_ruangan='$Ruangan' AND '$WaktuSelesai' BETWEEN waktu_pinjam AND waktu_selesai) t2 ON (t1.`kd_peminjaman` = t2.`kd_peminjaman`);");
        
        $result = mysql_query("SELECT * FROM tb_observasi WHERE tanggal_pinjam='$TanggalPinjam' AND kd_ruangan='$Ruangan' AND '$WaktuSelesai' >= waktu_pinjam AND '$WaktuSelesai' < waktu_selesai");

        return $result;
    }

    function insertObservasi($KdPinjam, $IdRequest, $Ruangan, $TanggalMulai, $WaktuMulai, $WaktuSelesai, $Action) {
        $result = mysql_query("INSERT into tb_observasi (kd_peminjaman, id_request, kd_ruangan, tanggal_pinjam, waktu_pinjam, waktu_selesai, status_peminjaman) Values ('$KdPinjam', '$IdRequest', '$Ruangan', '$TanggalMulai', '$WaktuMulai', '$WaktuSelesai','$Action')");
        return $result;
    }
    
     function insertOrganisasi($NamaOrganisasi, $Username, $Password, $Email, $Level, $Divisi, $Status) {
        $result = mysql_query("INSERT into tb_organisasi (nama_organisasi, username, password, email_organisasi, level, pic, status, active) Values "
                . "('$NamaOrganisasi', '$Username', md5('$Password'), '$Email', '$Level', '$Divisi','$Status', '0')");
        return $result;
    }
    
    function updateAction($idRequest, $action){
        $result = mysql_query("Update tb_request SET action = '$action' where md5(id_request) = '$idRequest'");
        return $result;
    }
    
    function updateStatusPeminjaman($kdPeminjaman, $action){
        $result = mysql_query("Update tb_observasi SET status_peminjaman = '$action' where md5(kd_peminjaman) = '$kdPeminjaman'");
        return $result;
    }
    
    function updateKeterangan($namaOrganisasi, $aksi, $keterangan){
        $result = mysql_query("Update tb_organisasi SET status = '$aksi', keterangan='$keterangan' where nama_organisasi = '$namaOrganisasi'");
        return $result;
    }
    
     function deleteDataObservasi($KodePeminjaman){
        $result = mysql_query("Delete From tb_observasi where md5(kd_peminjaman)='$KodePeminjaman'");
        
        return $result;
    }
    
    function getAllDataReserved() {
        $result = mysql_query("SELECT a.kd_peminjaman, b.nama_organisasi, a.kd_ruangan, a.tanggal_pinjam, time_format(a.waktu_pinjam, '%H:%i') as waktu_pinjam, time_format(a.waktu_selesai, '%H:%i') as waktu_selesai, b.keperluan, a.status_peminjaman FROM tb_observasi as a JOIN tb_request as b WHERE a.id_request = b.id_request AND a.status_peminjaman = 'Approved' Order By kd_peminjaman ASC ");
        return $result;
    }
    
    function getDataReserved() {
        $result = mysql_query("SELECT a.kd_peminjaman, b.nama_organisasi, a.kd_ruangan, a.tanggal_pinjam, "
                . "time_format(a.waktu_pinjam, '%H:%i') as waktu_pinjam, "
                . "time_format(a.waktu_selesai, '%H:%i') as waktu_selesai, b.keperluan, a.status_peminjaman "
                . "FROM tb_observasi as a JOIN tb_request as b WHERE a.id_request = b.id_request "
                . "Order By kd_peminjaman ASC ");
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
        $result = mysql_query("SELECT * FROM tb_ruangan where md5(kd_ruangan) = '$Kode'");
        return $result;
    }
    
    function insertRuangan($kdRuangan, $namaRuangan, $keterangan){
        $result = mysql_query("INSERT into tb_ruangan (kd_ruangan, nama_ruangan, keterangan) Values ('$kdRuangan', '$namaRuangan', '$keterangan')");
        
        return $result;
    }
    
    function updateDataRuangan($Kode,$NamaRuangan,$Keterangan){
        $result = mysql_query("Update tb_ruangan SET nama_ruangan='$NamaRuangan', keterangan='$Keterangan' where md5(kd_ruangan)='$Kode'");
        
        return $result;
    }
    
    function deleteDataRuangan($Id){
        $result = mysql_query("Delete From tb_ruangan where md5(kd_ruangan)='$Id'");
        
        return $result;
    }
    
    function resetPassword($Himpunan,$Pass){
        $result = mysql_query("Update tb_organisasi SET password=md5('$Pass') where nama_organisasi='$Himpunan'");
        
        return $result;
    }
}
?>