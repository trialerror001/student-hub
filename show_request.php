<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <?php
        require "./admin/partials/header.php";
        include "./library/inc.library.php";
        include "./library/inc.seslogin.php";
        include "./fungsi/fungsi.php";
        $fungsi = new DB_Functions();
        ?>
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script src="lib/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').DataTable();
            });
            
            
        </script>
        
    </head>
        <?php 
        if($_SESSION['level']=='admin'){
        ?>    
        <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <!-- CODE HERE -->
                    <table class="display table table-striped table-bordered" id="datatable">
                        <thead>
                        <th>Kode Request</th>
                        <th>Organisasi</th>
                        <th>Ruangan</th>
                        <th>Kegiatan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Approve</th>
                        <th>Denied</th>
                        </thead>
                        <tbody>
                            <?php
                            $myQry = $fungsi->getDataReservedForAdmin();
                            while ($kolomData = mysql_fetch_array($myQry)) {
                                //print_r($kolomData);
                                ?>
                                <tr>
                                    <td><?php echo $kolomData['kd_peminjaman']; ?></td>
                                    <td><?php echo $kolomData['nama_organisasi']; ?></td>
                                    <td><?php echo $kolomData['kd_ruangan']; ?></td>
                                    <td><?php echo $kolomData['keperluan']; ?></td>
                                    <td><?php echo IndonesiaTgl($kolomData['tanggal_pinjam']) ?></td>
                                    <td><?php echo date('h:i', strtotime($kolomData['waktu_pinjam'])); ?></td>
                                    <td><?php echo date('h:i', strtotime($kolomData['waktu_selesai'])); ?></td>
                                    
                                    <td>
                                        <a href="?page=AcceptRequest&REQ=<?php echo md5($kolomData['kd_peminjaman']); ?>&Action=Approved">
                                            <img src="images/approve.png" width="50" height="50" />
                                        </a>
                                    </td>   
                                    <td>
                                        <a href="?page=AcceptRequest&REQ=<?php echo md5($kolomData['kd_peminjaman']); ?>&Action=Denied">
                                            <img src="images/denied.png" width="50" height="50" />
                                        </a>
                                    </td>
                                        
                                        

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- END CODE -->
                </div>
            </main>
        <?php 
        }else if($_SESSION['level']=='himpunan'){
        ?>
        <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <!-- CODE HERE -->
                    <table class="display table table-striped table-bordered" id="datatable">
                        <thead>
                        <th>Kode Request</th>
                        <th>Organisasi</th>
                        <th>Ruangan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Waktu</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                            $myQry = $fungsi->getDataRequestByHimpunan($_SESSION['organisasi']);
                            while ($kolomData = mysql_fetch_array($myQry)) {
                                //print_r($kolomData);
                                ?>
                                <tr>
                                    <td><?php echo $kolomData['id_request']; ?></td>
                                    <td><?php echo $kolomData['nama_organisasi']; ?></td>
                                    <td><?php echo $kolomData['kd_ruangan']; ?></td>
                                    <td><?php echo IndonesiaTgl($kolomData['tanggal_permohonan']) ?></td>
                                    <td><?php echo IndonesiaTgl($kolomData['tanggal_pinjam']) ?></td>
                                    <td><?php echo $kolomData['waktu_mulai']; ?></td>
                                    <td><?php echo $kolomData['durasiWaktu']; ?></td>
                                    <td><?php echo $kolomData['action']; ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- END CODE -->
                </div>
            </main>
        <?php 
        }else if($_SESSION['level']=='kabid'){
        ?>
        <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <!-- CODE HERE -->
                    <table class="display table table-striped table-bordered" id="datatable">
                        <thead>
                        <th>Kode Request</th>
                        <th>Organisasi</th>
                        <th>Ruangan</th>
                        <th>Kegiatan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Waktu</th>
                        <th>Durasi</th>
                        <th>Approve</th>
                        <th>Denied</th>
                        </thead>
                        <tbody>
                            <?php
                            $myQry = $fungsi->getDataRequest();
                            while ($kolomData = mysql_fetch_array($myQry)) {
                                //print_r($kolomData);
                                ?>
                                <tr>
                                   <td><?php echo $kolomData['id_request']; ?></td>
                                    <td><?php echo $kolomData['nama_organisasi']; ?></td>
                                    <td><?php echo $kolomData['kd_ruangan']; ?></td>
                                    <td><?php echo $kolomData['keperluan']; ?></td>
                                    <td><?php echo IndonesiaTgl($kolomData['tanggal_permohonan']) ?></td>
                                    <td><?php echo IndonesiaTgl($kolomData['tanggal_pinjam']) ?></td>
                                    <td><?php echo date('h:i', strtotime($kolomData['waktu_mulai'])); ?></td>
                                    <td><?php echo date('h:i', strtotime($kolomData['waktu_selesai'])); ?></td>
                                    <td>
                                        <a href="?page=KabidApproval&REQ=<?php echo md5($kolomData['id_request']); ?>&Action=Approved">
                                            <img src="images/approve.png" width="50" height="50" />
                                        </a>
                                    </td>   
                                    <td>
                                        <a href="?page=AcceptRequest&REQ=<?php echo md5($kolomData['id_request']); ?>&Action=Denied">
                                            <img src="images/denied.png" width="50" height="50" />
                                        </a>
                                    </td>
                                        
                                        

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- END CODE -->
                </div>
            </main>
        <?php
        }
        ?>
       

       
</html>
