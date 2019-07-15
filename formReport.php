<html>
    <head>
        <title></title>
        <script src="lib/sweetalert.min.js"></script>
        <?php
        require "./admin/partials/header.php";
        include "./library/inc.seslogin.php";
        include './fungsi/fungsi.php';
        include 'library/inc.library.php';
        
        $fungsi = new DB_Functions();

        if (isset($_POST['btnSubmit'])) {
            $idReport = buatKode("tb_report", "RPT");
            $namaOrganisasi = $_POST['cmbHimpunan'];
            $aksi = $_POST['cmbAksi'];
            $keterangan = $_POST['reportReason'];
            //echo $namaOrganisasi."<br>".$aksi."<br>".$keterangan;
            
            $result = $fungsi->updateKeterangan($namaOrganisasi, $aksi, $keterangan);
            $result2 = $fungsi->insertReport($idReport, $namaOrganisasi, $aksi, $keterangan);
            if ($result && $result2) {
                ?>
                <script>
                    swal("Berhasil", "Status Berhasil Diubah", "success");
                    setTimeout(function () {
                        window.location = "?page=FormReport"
                    }, 4000);
                </script>
                <?php
            }
        }
        ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <!-- CODE HERE -->
            <div class="form_style">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">Halaman Laporan Organisasi Bermasalah</h4>
                    <div class="mT-30">
                        <form method="POST" action="?page=FormReport">		
                            <div class="form-row">		
                                <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Nama Himpunan</label> 
                                    <?php $fungsi->namaHimpunan(); ?>
                                </div>

                                <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Aksi</label> 
                                    <select name="cmbAksi" class="form-control">
                                        <option value="Clear">Clear</option>
                                        <option value="Block">Block</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12" style="font-size: 1vw">
                                    <label for="inputCity">Alasan Pelaporan</label> 
                                    <textarea name="reportReason" class="form-control" id="inputCity" rows="10"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END CODE -->
        </div>
    </main>
</html>
