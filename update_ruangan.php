<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <?php
        include "./library/inc.seslogin.php";
        include './fungsi/fungsi.php';
        $fungsi = new DB_Functions();
        ?>
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script src="lib/sweetalert.min.js"></script>

    </head>
    <?php
    if(isset($_POST['updateRuangan'])){
        
        $Id = $_POST['id'];
        $KodeRuangan = $_POST['kodeRuangan'];
        $NamaRuangan = $_POST['namaRuangan'];
        $Keterangan = $_POST['keterangan'];
        
        $result = $fungsi->updateDataRuangan($Id, $KodeRuangan, $NamaRuangan, $Keterangan);
         if ($result) {
            ?>
            <script>
                swal("Terima Kasih!", "Data Ruangan Berhasil Diperbaharui", "success");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=DataRuangan";
                }, 3000);
            </script>
            <?php
        }
    }
    
    $Kode = isset($_GET['Kode']) ? $_GET['Kode'] : '';
    echo $Kode;
    $dataShow = mysql_fetch_array($fungsi->getDataRuanganByKode($Kode));
    
    //$Id = $dataShow['id'];
    $dataKode = $dataShow['kd_ruangan'];
    $dataNama = $dataShow['nama_ruangan'];
    $dataKeterangan = $dataShow['keterangan'];
    
    ?>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <!-- CODE HERE -->
            <div class="form_style">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update Data Ruangan</h6>
                    <div class="mT-30">
                        <form method="POST" action="?page=UpdateRuangan">	
                            <input type="hidden" name="id" value="<?php echo $Kode; ?>">
                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Kode Ruangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="kodeRuangan" value="<?php echo $dataKode ?>">
                            </div>

                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Nama Ruangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="namaRuangan" value="<?php echo $dataNama ?>">
                            </div>

                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Keterangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="keterangan" value="<?php echo $dataKeterangan ?>">
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="updateRuangan">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- END CODE -->
    </div>
</main>


<style>
    #form_font
    {
        font-size:1vw;
    }
    .form_style
    {
        padding-left: 10em;
        padding-right:10em;
    }
</style>

</html>
