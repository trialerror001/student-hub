<html>
    <head>
        <title></title>
        <?php
        require "./admin/partials/header.php";
        include "./library/inc.seslogin.php";
        include './fungsi/fungsi.php';
        $fungsi = new DB_Functions();
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
                        <form method="POST" action="?page=ResetPassword">		
                            <div class="form-row">		
                                <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Nama Himpunan</label> 
                                    <?php $fungsi->namaHimpunan(); ?>
                                </div>

                                <div class="form-group col-md-12" style="font-size: 1vw">
                                    <label for="inputCity">Alasan Pelaporan</label> 
                                    <textarea name="reportReason" class="form-control" id="inputCity" rows="10"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" name="resetPass">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END CODE -->
        </div>
    </main>
</html>
