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
    if (isset($_POST['submitRuangan'])) {
        $KodeRuangan = $_POST['kodeRuangan'];
        $NamaRuangan = $_POST['namaRuangan'];
        $Keterangan = $_POST['keterangan'];

        $result = $fungsi->insertRuangan($KodeRuangan, $NamaRuangan, $Keterangan);
        if ($result) {
            ?>
            <script>
                swal("Terima Kasih!", "Ruangan Berhasil Ditambahkan", "success");
                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');
                setTimeout(function () {
                    window.location = "?page=DataRuangan";
                }, 3000);
            </script>
            <?php
        }
    }
    ?>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <!-- CODE HERE -->
            <div class="form_style">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Formulir Penambahan Ruangan</h6>
                    <div class="mT-30">
                        <form method="POST" action="?page=TambahRuangan">		
                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Kode Ruangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="kodeRuangan">
                            </div>

                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Nama Ruangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="namaRuangan">
                            </div>

                            <div class="form-group col-md-12" style="font-size: 1vw">
                                <label for="inputCity">Keterangan</label> 
                                <input type="text" class="form-control" id="inputCity" name="keterangan">
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitRuangan">Tambah</button>
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
