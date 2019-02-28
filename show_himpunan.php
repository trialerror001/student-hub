<!DOCTYPE html>
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
                    <h6 class="c-grey-900">Reset Password Himpunan</h6>
                    <div class="mT-30">
                        <form method="POST" action="?page=ResetPassword">		
                            <div class="form-row">		
                                <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Nama Himpunan</label> 
                                    <?php $fungsi->namaHimpunan(); ?>
                                </div>

                                <div class="form-group col-md-12" style="font-size: 1vw">
                                    <label for="inputCity">New Password</label> 
                                    <input type="password" class="form-control" id="inputCity" name="newPass">
                                </div>

                                <div class="form-group col-md-12" style="font-size: 1vw">
                                    <label for="inputCity">Confirm Password</label> 
                                    <input type="password" class="form-control" id="inputCity" name="conPass">
                                </div>
                                <button type="submit" class="btn btn-primary" name="resetPass">Reset</button>
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

