<html>
    <head>
        <title></title>
        <?php
        //require "./admin/partials/header.php";
        include "./library/inc.library.php";
        include "./library/inc.seslogin.php"; //wajib di setiap file
        include "./fungsi/fungsi.php";
        $fungsi = new DB_Functions();
        ?>
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').DataTable();
            });
        </script>
    </head>

    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <!-- CODE HERE -->

            <table class="display table table-striped table-bordered" id="datatable">
                <thead>
                <th>Nama</th>
                <th>Email</th>
                </thead>

                <tbody>
                    <?php
                    $myQry = $fungsi->getDataHimpunan();
                    while ($kolomData = mysql_fetch_array($myQry)) {
                        ?>

                        <tr>
                            <td><?php echo $kolomData['nama_organisasi']; ?></td>
                            <td><?php echo $kolomData['email_organisasi']; ?></td>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</html>