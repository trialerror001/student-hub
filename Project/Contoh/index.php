<!DOCTYPE html>
<html lang="en">

    <head>


        <?php
        session_start();
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dinas Kesehatan Provinsi Kalimantan Bara</title>

        <!-- Bootstrap Core CSS -->
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">

                    <div class="col-lg-4 col-sm-4 col-xs-4">
                        <a class="img-responsive" href="#">
                            <img src="images/Logo Dinkes.png" 
                                 style="width: 350px; padding-top: 20px" 
                                 >
                        </a>
                    </div>
                </div>
                <!-- /.navbar-header -->


                <!-- /.navbar-top-links -->

                <!--<div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav"></ul>-->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <?php
                            if (empty($_SESSION['level'])) {
                                ?>
                                <li><a href="?page=Login"><i class="fa fa-fw fa-bar-chart-o"></i>Admin</a></li>
                                <li><a href="?page=Login"><i class="fa fa-fw fa-table"></i>Pegawai</a></li>
                                <li><a href="?page=Bantuan"><i class="fa fa-fw fa-question"></i>Bantuan</a></li>

                                <?php
                            } else if ($_SESSION['level'] == "admin") {
                                ?>
                                <li><a href="?page=Dashboard"><i class="fa fa-fw fa-bar-chart-o"></i>Dashboard</a></li>
                                <li><a href="?page=Data-Pegawai"><i class="fa fa-fw fa-table"></i>Data Pegawai</a></li>
                                <li>
                                    <a href="?page=Tambah-Pegawai"><i class="fa fa-fw fa-edit"></i> Tambah Pegawai</a>
                                </li>
                                <li><a href="?page=Data-Surat"><i class="fa fa-fw fa-table"></i>Data Surat</a></li>
                                <li>
                                    <a href="?page=Grafik-Dinkes"><i class="fa fa-fw fa-bar-chart-o"></i> Grafik</a>
                                </li>
                                <li><a href="?page=Laporan-Tugas"><i class="fa fa-fw fa-table"></i>Laporan Penugasan</a></li>
                                <li><a href="?page=Logout"><i class="fa fa-fw fa-close"></i>Logout</a></li>

                                <?php
                            } else if ($_SESSION['level'] == "bidang1" || $_SESSION['level'] == "bidang2" || $_SESSION['level'] == "bidang3" ||
                                    $_SESSION['level'] == "bidang4" || $_SESSION['level'] == "bidang5") {
                                ?>
                                <li><a href="?page=Data-Pegawai"><i class="fa fa-fw fa-table"></i>Data Pegawai</a></li>
                                <li><a href="?page=Logout"><i class="fa fa-fw fa-table"></i>Logout</a></li>

                                <?php
                            } else if ($_SESSION['level'] == "pegawai") {
                                ?>
                                <li><a href="?page=Data-Pegawai"><i class="fa fa-fw fa-table"></i>Data Pegawai</a></li>
                                <li>
                                    <a href="?page=Tambah-Pegawai"><i class="fa fa-fw fa-edit"></i> Tambah Pegawai</a>
                                </li>
                                <li><a href="?page=Data-Surat"><i class="fa fa-fw fa-table"></i>Data Surat</a></li>
                                <li><a href="?page=Logout"><i class="fa fa-fw fa-table"></i>Logout</a></li>

                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php include './Page/page.php' ?>

                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->



    </body>

</html>