<?php

class DB_Functions {

    //private $db;
    //put your code here
    // constructor
    function __construct() {
        include 'Koneksi/koneksi.php';
    }

    public function getPegawai() {
        $result = mysql_query("SELECT * FROM tb_pegawai");
        return $result;
    }

    public function getDataSurat() {
            $result = mysql_query("SELECT * FROM `tb_surat` WHERE year(`tanggal_berangkat`) = year(curdate()) AND year(`tanggal_pulang`)= year(curdate()) Order By no_surat DESC ");
        return $result;
    }

    public function getDataSuratByNoSurat($no_surat) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE md5(no_surat) = '$no_surat'");
        return $result;
    }

    public function getDataSuratByNipBlank($nip) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$nip' and month(tanggal_berangkat) = month(curdate()) and "
                . "tahun_pembuatan = year(curdate()) Order By no_surat ASC");

        return $result;
    }

    public function getDataSuratByNipBulan($nip, $bulan) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$nip' and month(tanggal_berangkat) = '$bulan' and "
                . "tahun_pembuatan = year(curdate()) Order By no_surat ASC");

        return $result;
    }

    public function getDataSuratByNipTahun($nip, $tahun) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$nip' and "
                . "tahun_pembuatan = '$tahun' Order By no_surat ASC");

        return $result;
    }

    public function getDataSuratByNipBulanTahun($nip, $bulan, $tahun) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$nip' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = '$tahun' Order By no_surat ASC");

        return $result;
    }

    public function getPegawaiJabatan() {
        $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b "
                . "where a.jabatan = b.jabatan Order By no_urut ASC");
        return $result;
    }

    public function getPegawaiBidang() {
        if ($_SESSION['level'] == 'bidang1') {
            $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b where b.bidang = 'Bidang 1' and a.jabatan = b.jabatan Order By b.no_urut ASC");
        } else if ($_SESSION['level'] == 'bidang2') {
            $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b where b.bidang = 'Bidang 2' and a.jabatan = b.jabatan Order By b.no_urut ASC");
        } else if ($_SESSION['level'] == 'bidang3') {
            $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b where b.bidang = 'Bidang 3' and a.jabatan = b.jabatan Order By b.no_urut ASC");
        } else if ($_SESSION['level'] == 'bidang4') {
            $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b where b.bidang = 'Bidang 4' and a.jabatan = b.jabatan Order By b.no_urut ASC");
        } else if ($_SESSION['level'] == 'bidang5') {
            $result = mysql_query("SELECT a.*, b.no_urut FROM tb_pegawai as a JOIN tb_jabatan as b where b.bidang = 'Bidang 5' and a.jabatan = b.jabatan Order By b.no_urut ASC");
        }
        return $result;
    }

    function comboboxJabatan() {
        echo "
         <select name='cmbJabatan' class='form-control'>";
        $sql = mysql_query("Select jabatan from tb_jabatan ORDER by no_urut ASC");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['jabatan'];
            if ($data['jabatan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[jabatan]'>$data[jabatan]</option>";
        }
        echo "
         </select>
         ";
    }

    function comboboxTahun() {
        echo "
         <select name='cmbTahun'>";
        $sql = mysql_query("Select Distinct(tahun_pembuatan) from tb_surat Order By tahun_pembuatan ASC");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['tahun_pembuatan'];
            if ($data['tahun_pembuatan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[tahun_pembuatan]'>$data[tahun_pembuatan]</option>";
        }
        echo "
         </select>
         ";
    }

    function comboboxTahunReport() {
        echo "
         <select name='cmbTahun'>
         <option value='BLANK'> ... </option>
         ";
        $sql = mysql_query("Select Distinct(tahun_pembuatan) from tb_surat Order By tahun_pembuatan ASC");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['tahun_pembuatan'];
            if ($data['tahun_pembuatan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[tahun_pembuatan]'>$data[tahun_pembuatan]</option>";
        }
        echo "
         </select>
         ";
    }

    function getJabatan($valueAwal) {
        echo "
         <select name='cmbJabatan'>";
        echo "<option value='$valueAwal'>$valueAwal</option>";
        $sql = mysql_query("Select jabatan from tb_jabatan ORDER by no_urut ASC");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['jabatan'];
            if ($data['jabatan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[jabatan]'>$data[jabatan]</option>";
        }
        echo "
         </select>
         ";
    }

    function getJabatanByNoSurat($valueAwal) {
        echo "
         <select name='cmbJabatan'>
         <option value='$valueAwal'>$valueAwal</option>";
        $sql = mysql_query("Select jabatan from tb_jabatan ORDER by no_urut ASC");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['jabatan'];
            if ($data['jabatan'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[jabatan]'>$data[jabatan]</option>";
        }
        echo "
         </select>
         ";
    }

    function comboboxPangkat() {
        echo "
         <select name='cmbPangkat' class='form-control'>";
        $sql = mysql_query("Select pangkat from tb_pangkat");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['pangkat'];
            if ($data['pangkat'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[pangkat]'>$data[pangkat]</option>";
        }

        echo "
         </select>
         ";
    }

    function getPangkat($valueAwal) {
        echo "
         <select name='cmbPangkat' >";
        echo "<option value='$valueAwal'>$valueAwal</option>";
        $sql = mysql_query("Select pangkat from tb_pangkat");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['pangkat'];
            if ($data['pangkat'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[pangkat]'>$data[pangkat]</option>";
        }
        echo "
         </select>
         ";
    }

    function getPangkatByNoSurat($valueAwal) {
        echo "
         <select name='cmbPangkat'>
         <option value='$valueAwal'>$valueAwal</option>";
        $sql = mysql_query("Select pangkat from tb_pangkat");
        while ($data = mysql_fetch_array($sql)) {
            $nilai = $data['pangkat'];
            if ($data['pangkat'] == $nilai)
                $cek = "selected";
            else
                $cek = "";
            echo "<option value='$data[pangkat]'>$data[pangkat]</option>";
        }
        echo "
         </select>
         ";
    }

    function insertPegawai($NIK, $nama, $jabatan, $pangkat) {
        $result = mysql_query("INSERT into tb_pegawai (nip, nama, jabatan, pangkat) Values ('$NIK', '$nama', '$jabatan', '$pangkat')");
        if ($result) {
            ?>

            <script type="text/javascript"> alert('Data Pegawai Baru Berhasil di tambahkan');
                document.location = "?page=Data-Pegawai";

            </script>

            <?php

        }

        return $result;
    }

    function updatePegawai($nama, $jabatan, $pangkat, $getNIK) {
        $result = mysql_query("Update tb_pegawai SET nama = '$nama' , jabatan='$jabatan', pangkat = '$pangkat' where md5(nip) = '$getNIK'");
        if ($result) {
            ?>
            <script language="javascript"> alert('Berita Berhasil Di Perbaharui');
                            document.location = '?page=Data-Pegawai'</script>
            <?php

        }
    }

    function deletePegawai($nip) {
        $result = mysql_query("DELETE FROM tb_pegawai WHERE nip = '$nip'");
        if ($result) {
            ?>
            <script language="javascript">
                alert('Data Berhasil Di Hapus');
                document.location = '?page=Data-Pegawai';
            </script>
            <?php

        }
        return $result;
    }

    function getPegawaibyNIP($nip) {
        $result = mysql_query("SELECT * FROM tb_pegawai WHERE md5(nip) = '$nip' ");
        return $result;
    }

    function insertDataSurat($nomorSurat, $NIP, $Nama, $Jabatan, $Pangkat, 
            $Kegiatan, $Asal, $Tujuan, $KecamatanDesa, $TanggalBerangkat, $TanggalPulang, 
            $lamaHari, $Anggaran, $KeteranganKegiatan, $Kendaraan) {

        $result = mysql_query("INSERT into tb_surat (no_surat, nip, nama,jabatan, pangkat, "
                . "kegiatan ,asal  , tujuan, kecamatanDesa, tanggal_berangkat ,tanggal_pulang , "
                . "lama_hari , anggaran, keterangan, kendaraan, tahun_pembuatan, created)"
                . " VALUES ('$nomorSurat', '$NIP' ,'$Nama' ,'$Jabatan' ,'$Pangkat' ,"
                . "'$Kegiatan' ,'$Asal' ,'$Tujuan' , '$KecamatanDesa', '$TanggalBerangkat' ,"
                . "'$TanggalPulang' ,'$lamaHari' , '$Anggaran', '$KeteranganKegiatan', "
                . "'$Kendaraan', year(curdate()),date(curdate()))");

        if ($result) {
            ?>
            <script type="text/javascript"> alert('Surat Tugas Berhasi DiBuat');
                document.location = "?page=Data-Pegawai";
            </script>
            <?php

        }
    }

    function cekTanggalSurat($NIP, $TanggalBerangkat, $TanggalPulang) {
            $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$NIP' AND "
                    . "'$TanggalBerangkat' Between tanggal_berangkat and tanggal_pulang OR "
                    . "'$TanggalPulang' Between tanggal_berangkat and tanggal_pulang AND nip = '$NIP'");
        return $result;
    }
    
    function cekTanggalSuratKedua($NIP, $TanggalBerangkat, $TanggalPulang) {
            $result = mysql_query("SELECT * FROM tb_surat WHERE nip = '$NIP' AND tanggal_berangkat "
                    . "Between '$TanggalBerangkat' and '$TanggalPulang' OR tanggal_pulang "
                    . "Between '$TanggalBerangkat' and '$TanggalPulang' AND nip = '$NIP'");
        return $result;
    }

    function cekNamaPegawai($nama) {
        $result = mysql_query("SELECT nama from tb_pegawai where nama LIKE '%$nama%'");
        return $result;
    }

    function getSuratTugasByNomorSurat($nomorSurat) {
        $result = mysql_query("SELECT * FROM tb_surat WHERE md5(no_surat) = '$nomorSurat'");
        return $result;
    }

    function updateSuratTugas($nomorSurat, $NIP, $Nama, $Jabatan, $Pangkat, $Kegiatan, $Asal, $Tujuan, $kecamatanDesa, $TanggalBerangkat, $TanggalPulang, $lamaHari, $Kendaraan) {
        $result = mysql_query("Update tb_surat SET nip='$NIP', nama='$Nama',jabatan='$Jabatan', pangkat='$Pangkat', "
                . "kegiatan='$Kegiatan' ,asal='$Asal'  , tujuan='$Tujuan', kecamatanDesa = '$kecamatanDesa', tanggal_berangkat='$TanggalBerangkat' ,"
                . "tanggal_pulang='$TanggalPulang' , lama_hari='$lamaHari' , kendaraan='$Kendaraan'"
                . "WHERE no_surat = '$nomorSurat'");


        if ($result) {
            ?>
            <script type="text/javascript"> alert('Surat Tugas Berhasi DiUpdate');
                document.location = "?page=Data-Surat";
            </script>
            <?php

        }
    }

    function deleteDataSurat($nomorSurat) {
        $result = mysql_query("DELETE FROM tb_surat WHERE md5(no_surat) = '$nomorSurat'");
        if ($result) {
            ?>
            <script language="javascript">
                alert('Data Berhasil Di Hapus');
                document.location = '?page=Data-Surat';
            </script>
            <?php

        }
        return $result;
    }

    //BY Tujuan dan KABID 1

    function detailTujuanKabid1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabid1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 1'];
    }

    /*
      tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
      . "and tujuan != 'Jakarta' and tahun_pembuatan = year(curdate())");
     */

    //=============================================
    function detailTujuanKabidLuar1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' and "
                . "a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabidLuar1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 1'];
    }

    //BY Tujuan KABID 2

    function detailTujuanKabid2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabid2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 2'];
    }
    
    //==================================================
     function detailTujuanKabidLuar2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabidLuar2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 2'];
    }

    //By Tujuan KABID 3
    function detailTujuanKabid3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabid3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 3'];
    }
    
    //==========================================
     function detailTujuanKabidLuar3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabidLuar3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 3'];
    }

    //By Tujuan KABID 4
    function detailTujuanKabid4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabid4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 4'];
    }

    //=======================================================
    function detailTujuanKabidLuar4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabidLuar4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 4'];
    }
    
    //By Tujuan KABID 5
    function detailTujuanKabid5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabid5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 5'];
    }
    
    //===========================================================
     function detailTujuanKabidLuar5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKabidLuar5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 5'];
    }

    //==================================================================================================================
    //BY Tujuan dan KASIE 1

    function detailTujuanKasie1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasie1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 1'];
    }
    //============================================================
    function detailTujuanKasieLuar1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasieLuar1($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 1'];
    }
    
    
    //BY Tujuan KASIE 2

    function detailTujuanKasie2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasie2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 2'];
    }
    //==================================================
    function detailTujuanKasieLuar2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasieLuar2($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 2'];
    }
    
    //By Tujuan KASIE 3
    function detailTujuanKasie3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasie3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 3'];
    }
    //==============================================================
    function detailTujuanKasieLuar3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasieLuar3($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 3'];
    }
    //By Tujuan KASIE 4
    function detailTujuanKasie4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasie4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 4'];
    }
    //================================================================
    function detailTujuanKasieLuar4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasieLuar4($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 4'];
    }
    //By Tujuan KASIE 5
    function detailTujuanKasie5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasie5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan like '%$tujuan%' and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 5'];
    }
    //========================================================
    function detailTujuanKasieLuar5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanKasieLuar5($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 5'];
    }
    //==================================================================================================================
    //By Name
    function showDetailPertanggalByName($dariTanggal, $sampaiTanggal, $nama) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalByName($dariTanggal, $sampaiTanggal, $nama) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Nama' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Nama'];
    }

    //==================================================================================================================
    //Tujuan dan Nama
    function detailTujuanNama($dariTanggal, $sampaiTanggal, $nama, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan LIKE '%$tujuan%' and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanNama($dariTanggal, $sampaiTanggal, $nama, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Nama' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan LIKE '%$tujuan%' and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Nama'];
    }
    
    //============================================
    function detailTujuanNamaLuar($dariTanggal, $sampaiTanggal, $nama, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalTujuanNamaLuar($dariTanggal, $sampaiTanggal, $nama, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Nama' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Nama'];
    }

    //===============================================================================================================
    //By Bidang 1
    function showDetailPertanggalBidang1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 1'];
    }

    //By Tujuan Bidang 1
    function showDetailPertanggalBidang1ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang1ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 1'];
    }
    //=========================================================
    function showDetailPertanggalBidang1ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang1ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 1' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 1'];
    }

    //By Bidang 2
    function showDetailPertanggalBidang2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 2'];
    }
    
    //By Tujuan Bidang 2
    function showDetailPertanggalBidang2ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang2ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 2'];
    }
    
    //==========================================================
    function showDetailPertanggalBidang2ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang2ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 2' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 2'];
    }

    //By Bidang 3
    function showDetailPertanggalBidang3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT Count(*) as 'Total Bidang 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 3'];
    }

    //By Tujuan Bidang 3
    function showDetailPertanggalBidang3ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang3ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 3'];
    }
    //================================================
    function showDetailPertanggalBidang3ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang3ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 3' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 3'];
    }

    //Bidang 4
    function showDetailPertanggalBidang4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT Count(*) as 'Total Bidang 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 4'];
    }

    //By Tujuan Bidang 4
    function showDetailPertanggalBidang4ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang4ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 4'];
    }
    //=====================================================================
    function showDetailPertanggalBidang4ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang4ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 4' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 4'];
    }

    //Bidang 5
    function showDetailPertanggalBidang5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) 'Total Bidang 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and b.jabatan Like 'Staf%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 5'];
    }

    //By Tujuan Bidang 5
    function showDetailPertanggalBidang5ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang5ByTujuan($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and tujuan LIKE '%$tujuan%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 5'];
    }
    //==================================================================
     function showDetailPertanggalBidang5ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalBidang5ByTujuanLuar($dariTanggal, $sampaiTanggal, $tujuan) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Bidang 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = 'Bidang 5' and tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota%' and tujuan != 'Jakarta' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Bidang 5'];
    }

    //===============================================================================
    //By KABID 1
    function showDetailPertanggalKabid1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKabid1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%SEKERTARIS%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 1'];
    }

    //By Kabid 2
    function showDetailPertanggalKabid2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKabid2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 2'];
    }

    //By Kabid 3
    function showDetailPertanggalKabid3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKabid3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 3'];
    }

    //By Kabid 4
    function showDetailPertanggalKabid4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKabid4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 4'];
    }

    //By Kabid 5
    function showDetailPertanggalKabid5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKabid5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kabid 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KABID%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kabid 5'];
    }

    //====================================================================================
    //By KASIE 1
    function showDetailPertanggalKasie1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKasie1($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 1' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 1' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 1'];
    }

    //By Kasie 2

    function showDetailPertanggalKasie2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKasie2($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 2' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 2' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 2'];
    }

    //By Kasie 3
    function showDetailPertanggalKasie3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKasie3($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 3' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 3' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 3'];
    }

    //By Kasie 4
    function showDetailPertanggalKasie4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKasie4($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 4' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 4' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 4'];
    }

    //By Kasie 5
    function showDetailPertanggalKasie5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT a.* from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        return $result;
    }

    function totalDetailPertanggalKasie5($dariTanggal, $sampaiTanggal) {
        $result = mysql_query("SELECT COUNT(*) as 'Total Kasie 5' from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.jabatan LIKE '%KASIE%' and b.bidang = 'Bidang 5' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");

        $data = mysql_fetch_array($result);
        return $data['Total Kasie 5'];
    }

    //===============================================================================
    function showReportPerBidang($bidang) {
        $result = mysql_query("Select a.no_surat, a.nip, a.nama, a.jabatan, a.pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat as a "
                . "JOIN tb_jabatan as b where a.jabatan = b.jabatan and b.bidang = '$bidang' and month(a.tanggal_berangkat) = month(curdate()) and tahun_pembuatan = year(curdate()) group by a.nama ");

        return $result;
    }

    function showReportPerBidangBulan($bidang, $bulan) {
        $result = mysql_query("Select a.no_surat, a.nip, a.nama, a.jabatan, a.pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat as a "
                . "JOIN tb_jabatan as b where a.jabatan = b.jabatan and b.bidang = '$bidang' and month(a.tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by a.nama ");

        return $result;
    }

    function showReportPerBidangTahun($bidang, $tahun) {
        $result = mysql_query("Select a.no_surat, a.nip, a.nama, a.jabatan, a.pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat as a "
                . "JOIN tb_jabatan as b where a.jabatan = b.jabatan and b.bidang = '$bidang' and tahun_pembuatan = '$tahun' group by a.nama ");

        return $result;
    }

    function showReportPerBidangBulanTahun($bidang, $bulan, $tahun) {
        $result = mysql_query("Select a.no_surat, a.nip, a.nama, a.jabatan, a.pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat as a "
                . "JOIN tb_jabatan as b where a.jabatan = b.jabatan and b.bidang = '$bidang' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = '$tahun' group by a.nama ");

        return $result;
    }

    //=================================


    function showReportKelompokBidang() {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = month(curdate()) and tahun_pembuatan = year(curdate()) "
                . "or jabatan LIKE 'KABID%' and month(tanggal_berangkat) = month(curdate()) and tahun_pembuatan = year(curdate()) "
                . "group by jabatan");

        return $result;
    }

    function showReportKelompokKasie() {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = month(curdate()) and tahun_pembuatan = year(curdate()) group by jabatan");

        return $result;
    }

    function showReportKelompokBidangBulan($bulan) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) "
                . "or jabatan LIKE 'KABID%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) "
                . "group by jabatan ");

        return $result;
    }

    function showReportKelompokKasieBulan($bulan) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by jabatan");

        return $result;
    }

    function showReportKelompokBidangTahun($tahun) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan = 'Sekertaris' and tahun_pembuatan = '$tahun' "
                . "or jabatan LIKE 'KABID%' and tahun_pembuatan = '$tahun' "
                . "group by jabatan ");

        return $result;
    }

    function showReportKelompokKasieTahun($tahun) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan Like 'KASIE%' and tahun_pembuatan = '$tahun' group by jabatan");

        return $result;
    }

    function showReportKelompokBidangBulanTahun($bulan, $tahun) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = '$tahun' "
                . "or jabatan LIKE 'KABID%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = '$tahun' "
                . "group by jabatan ");

        return $result;
    }

    function showReportKelompokKasieBulanTahun($bulan, $tahun) {
        $result = mysql_query("Select no_surat, nip, nama, jabatan, pangkat, Count(*) as Total_Tugas, SUM(lama_hari) as Lama_Hari from tb_surat where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = '$tahun' group by jabatan ");

        return $result;
    }
    
    function showChartBidangPerBulanan($bulan) {
        $result = mysql_query("Select Count(*) as value from tb_surat Where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) or "
                . "jabatan LIKE 'KABID%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartBidangBulanan($bulan) {
        $result = mysql_query("Select jabatan as label, Count(*) as value from tb_surat where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = '09' and tahun_pembuatan = year(curdate()) or "
                . "jabatan LIKE 'KABID%' and month(tanggal_berangkat) = '09' and tahun_pembuatan = year(curdate()) group by jabatan");
        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    function showChartKasiePerBulanan($bulan) {
        $result = mysql_query("Select Count(*) as value from tb_surat Where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartKasieBulanan($bulan) {
        $result = mysql_query("Select jabatan as label, Count(*) as value from tb_surat where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by jabatan");
        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    function showChartWilayah($wilayah, $bulan) {
        $result = mysql_query("SELECT jabatan as label, Count(*) as value from tb_surat where "
                . "tujuan = '$wilayah' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by jabatan");

        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    function showChartWilayahJakarta($wilayah, $bulan) {
        $result = mysql_query("SELECT jabatan as label, Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' and "
                . "tujuan = '$wilayah' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by jabatan");



        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    function showChartWilayahLuarJakarta($wilayah, $bulan) {
        $result = mysql_query("SELECT jabatan as label, Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' and "
                . "tujuan != '$wilayah' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by jabatan");



        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    function showChartWilayahTahunan($wilayah) {
        $result = mysql_query("SELECT jabatan as label, Count(*) as value from tb_surat where "
                . "tujuan = '$wilayah' and tahun_pembuatan = year(curdate()) group by jabatan");

        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }
    
    function showChartKabKota($KabKota) {
        $result = mysql_query("SELECT Count(*) as value from tb_surat where "
                . "tujuan = '$KabKota' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    

    

    /* function showChartLuarKota(){
      $result = mysql_query("SELECT tujuan as label, Count(*) as value from tb_surat where "
      . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
      . "and tujuan != 'Jakarta' and tahun_pembuatan = year(curdate()) group by tujuan");

      $data = array();
      while ($r = mysql_fetch_assoc($result)){
      $r['link'] = "?page=MenuGrafikLuarKota&wilayah=$r[label]";

      $data[] = $r;
      }
      return print_r(json_encode($data));


      } */

    function ChartWilayahBulanan($tujuan,$bulan) {
        $result = mysql_query("Select Count(*) as value from tb_surat "
                . "where tujuan = '$tujuan' and month(tanggal_berangkat) = '$bulan' and "
                . "tahun_pembuatan = year(curdate())");
        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function ChartJakartaBulanan($bulan) {
        $result = mysql_query("SELECT tujuan as label, Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan = 'Jakarta' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by tujuan");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    
    
    
    function ChartApbdBulanan($bulan) {
        $result = mysql_query("SELECT Count(*) as value from tb_surat where "
                . "month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) "
                . "and anggaran = 'APBD' ");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }

    function showChartLuarKota() {
        $result = mysql_query("SELECT Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan != 'Jakarta' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }

    function showChartLuarKotaBulanan($bulan) {
        $result = mysql_query("SELECT Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan != 'Jakarta' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }

    function showChartJakarta() {
        $result = mysql_query("SELECT tujuan as label, Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan = 'Jakarta' and tahun_pembuatan = year(curdate()) group by tujuan");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartAPBD() {
        $result = mysql_query("Select Count(*) as value from tb_surat where "
                . "anggaran='APBD' and tahun_pembuatan = year(curdate()) ");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartAPBN() {
        $result = mysql_query("Select Count(*) as value from tb_surat where "
                . "anggaran='APBN' and tahun_pembuatan = year(curdate()) ");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartLokasiLuarGedung() {
        $result = mysql_query("Select Count(*) as value from tb_surat where "
                . "keterangan='Luar Gedung' and tahun_pembuatan = year(curdate()) ");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showChartLokasiDalamGedung() {
        $result = mysql_query("Select Count(*) as value from tb_surat where "
                . "keterangan='Dalam Gedung' and tahun_pembuatan = year(curdate()) ");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
     function ChartLuarJakartaBulanan($bulan) {
        $result = mysql_query("SELECT tujuan as label, Count(*) as value from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan != 'Jakarta' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
 
    function totalSuratPerBidang() {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan = 'Sekertaris' and tahun_pembuatan = year(curdate()) "
                . "or jabatan LIKE 'KABID%' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }

    function totalSuratPerBidangBulanan($bulan) {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan = 'Sekertaris' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) "
                . "or jabatan LIKE 'KABID%' and tahun_pembuatan = year(curdate()) and month(tanggal_berangkat) = '$bulan'");

        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }

    function totalSuratStaf() {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan LIKE 'STAF%' and tahun_pembuatan = year(curdate()) ");


        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }
    
    /*function totalPerjalananStaf($tglBerangkat, $tglPulang) {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan LIKE 'STAF%' and tanggal_berangkat between '$tglBerangkat' and '$tglPulang' "
                . "and tahun_pembuatan = year(curdate()) ");


        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }*/

    function totalSuratStafBulanan($bulan) {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan LIKE 'STAF%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) ");


        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }

    function totalSuratPerKasie() {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan LIKE 'KASIE%' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }

    function totalSuratPerKasieBulanan($bulan) {
        $result = mysql_query("Select Count(*) as Total_Tugas from tb_surat where "
                . "jabatan LIKE 'KASIE%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);

        return $data['Total_Tugas'];
    }

    function totalSuratKabupatenKota() {
        $result = mysql_query("SELECT Count(*) as Total_Tugas from tb_surat where "
                . "tujuan = 'Kota Pontianak' and tahun_pembuatan = year(curdate()) OR "
                . "tujuan = 'Kota Singkawang' and tahun_pembuatan = year(curdate()) OR "
                . "tujuan LIKE 'Kab%' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        return $data['Total_Tugas'];
    }

    function totalSuratKabupatenKotaTujuan($tujuan) {
        $result = mysql_query("SELECT Count(*) as Total_Tugas from tb_surat where "
                . "tujuan = '$tujuan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        return $data['Total_Tugas'];
    }

    function totalSuratKabupatenKotaTujuanBulanan($tujuan, $bulan) {
        $result = mysql_query("SELECT Count(*) as Total_Tugas from tb_surat where "
                . "tujuan = '$tujuan' and month(tanggal_berangkat)='$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        return $data['Total_Tugas'];
    }

    function totalSuratLuarKabupaten() {
        $result = mysql_query("SELECT Count(*) as Total_Tugas from tb_surat where "
                . "tujuan NOT LIKE 'Kab%' and tujuan NOT LIKE 'Kota Singkawang' and tujuan NOT LIKE 'Kota Pontianak' "
                . "and tujuan != 'Jakarta' OR tujuan = 'Jakarta' and tahun_pembuatan = year(curdate())");
        $data = mysql_fetch_array($result);
        return $data['Total_Tugas'];
    }

    //detail staffnya
    function showDetailChartStaff($bulan) {
        $result = mysql_query("Select b.bidang as label, Count(*) as value from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.bidang");

        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }

    //Keterangan staff Bidang 1
    function showDetailKeteranganStaffBidang1($bulan) {
        $result = mysql_query("Select b.jabatan  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 1' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    function showDetailKeteranganTotalStaffBidang1($bulan) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 1' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    //Keterangan Staff Bidang 2
    function showDetailKeteranganStaffBidang2($bulan) {
        $result = mysql_query("Select b.jabatan  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 2' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    function showDetailKeteranganTotalStaffBidang2($bulan) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 2' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    //Keterangan Staff Bidang 3
    function showDetailKeteranganStaffBidang3($bulan) {
        $result = mysql_query("Select b.jabatan  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 3' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    function showDetailKeteranganTotalStaffBidang3($bulan) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 3' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    //Keterangan Staff Bidang 4
    function showDetailKeteranganStaffBidang4($bulan) {
        $result = mysql_query("Select b.jabatan  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 4' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    function showDetailKeteranganTotalStaffBidang4($bulan) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 4' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    //Keterangan Staff 5
    function showDetailKeteranganStaffBidang5($bulan) {
        $result = mysql_query("Select b.jabatan  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 5' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    function showDetailKeteranganTotalStaffBidang5($bulan) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.jabatan LIKE 'STAF%' and b.bidang = 'Bidang 5' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }

    //============================================================================================================

    function showchartStaffPerBulanan($bulan) {
        $result = mysql_query("Select Count(*) as value from tb_surat Where "
                . "jabatan  LIKE 'STAF%' and month(tanggal_berangkat) = '$bulan' and tahun_pembuatan = year(curdate())");

        $data = mysql_fetch_array($result);
        if ($data['value'] == "")
            return "0";
        else
            return $data['value'];
    }
    
    function showDetailChartDalamGedung() {
        $result = mysql_query("Select b.bidang as label, Count(*) as value from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Dalam Gedung' and tahun_pembuatan = year(curdate()) group by b.bidang");

        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }
    
    function showDetailChartLuarGedung() {
        $result = mysql_query("Select b.bidang as label, Count(*) as value from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Luar Gedung' and tahun_pembuatan = year(curdate()) group by b.bidang");

        $data = array();
        while ($r = mysql_fetch_assoc($result)) {
            $data[] = $r;
        }
        return print_r(json_encode($data));
    }
    
    function showDetailChartStaffDalamGedung($bidang) {
        $result = mysql_query("Select b.jabatan from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Dalam Gedung' and b.bidang = '$bidang' and tahun_pembuatan = year(curdate()) group by b.jabatan");

        
        return $result;
    }

    function showDetailChartTotalStaffDalamGedung($bidang) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Dalam Gedung' and b.bidang = '$bidang' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }
    
    function showDetailChartStaffLuarGedung($bidang) {
        $result = mysql_query("Select b.jabatan from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Luar Gedung' and b.bidang = '$bidang' and tahun_pembuatan = year(curdate()) group by b.jabatan");

        
        return $result;
    }

    function showDetailChartTotalStaffLuarGedung($bidang) {
        $result = mysql_query("Select count(*) as 'Total Tugas'  from tb_surat as a JOIN tb_jabatan as b Where "
                . "a.jabatan = b.jabatan and a.keterangan='Luar Gedung' and b.bidang = '$bidang' and tahun_pembuatan = year(curdate()) group by b.jabatan");
        return $result;
    }
    
    function totalLamaHariLaporanSekertaris($bidang,$dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = '$bidang' and b.jabatan Like 'SEKERTARIS%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
     function totalLamaHariLaporanSekertarisLuarJakarta($bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' "
                . "and a.tujuan != 'Jakarta' and b.jabatan Like 'SEKERTARIS%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalLamaHariLaporanKabidLuarJakarta($bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' "
                . "and a.tujuan != 'Jakarta' and b.jabatan Like 'KABID%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalLamaHariLaporanKasieLuarJakarta($bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' "
                . "and a.tujuan != 'Jakarta' and b.jabatan Like 'KASIE%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    
    function totalLamaHariLaporanKabid($bidang,$dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = '$bidang' and b.jabatan Like 'KABID%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
     function totalLamaHariLaporanSekertarisKabKota($tujuan,$bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan like '%$tujuan%' and b.jabatan Like 'SEKERTARIS%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalLamaHariLaporanKabidKabKota($tujuan,$bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan like '%$tujuan%' and b.jabatan Like 'KABID%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    //==================
    function totalLamaHariLaporanKasieKabKota($tujuan,$bidang, $dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang='$bidang' and a.tujuan like '%$tujuan%' and b.jabatan Like 'KASIE%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    
     function totalLamaHariLaporanKasie($bidang,$dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = '$bidang' and b.jabatan Like 'KASIE%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalLamaHariLaporanStaf($bidang,$dariTanggal, $sampaiTanggal){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and b.bidang = '$bidang' and b.jabatan Like 'STAF%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalNamaStaf($dariTanggal, $sampaiTanggal, $nama){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.nama LIKE '%$nama%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalNamaStafTujuan($dariTanggal, $sampaiTanggal, $nama, $tujuan){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan LIKE '%$tujuan%' and a.nama LIKE '%$nama%' "
                . "and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
    
    function totalNamaStafTujuanLuarJakarta($dariTanggal, $sampaiTanggal, $nama){
        $result = mysql_query("SELECT SUM(a.lama_hari) as Total_Lama_Hari from tb_surat as a join tb_jabatan as b "
                . "where a.jabatan = b.jabatan and a.tujuan NOT LIKE 'Kab%' and a.tujuan NOT LIKE 'Kota%' and a.tujuan != 'Jakarta' "
                . "and a.nama LIKE '%$nama%' and a.tanggal_berangkat BETWEEN '$dariTanggal' AND '$sampaiTanggal' ");
        
        $data= mysql_fetch_array($result);
        if ($data['Total_Lama_Hari'] == "")
            return "0";
        else
            return $data['Total_Lama_Hari'];
    }
   

}