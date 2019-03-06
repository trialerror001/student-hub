
<html>
    <head>
        <title></title>
        <?php
        include "./fungsi/fungsi.php";
        $fungsi = new DB_Functions();
        ?>
        <link rel='stylesheet' href='fullcalendar/dist/fullcalendar.css' />
        <script src='lib/jquery.min.js'></script>
        <script src='lib/moment.min.js'></script>
        <script src='fullcalendar/dist/fullcalendar.js'></script>
        
    </head>
    <main class="main-content bgc-grey-100">
        
        <div id="mainContent">
            <!-- CODE HERE -->
            <div class="row">
                <div id="calendar" class="col-md-12 " style="min-height: 20%!important; max-height: 50%!important">
                    <script>
                        $(function () {
                        $('#calendar').fullCalendar({
                    eventClick: function(event){
                              if(event){
                                return false;
                            }
                            },
                            eventLimit: true, // for all non-agenda views
                            views: {
                                agenda: {
                                    eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
                                }
                            },
                        events: [
                        <?php
                        $myQry = $fungsi->getAllDataReserved();
                        while ($kolomData = mysql_fetch_array($myQry)) {
                            ?>

                            {
                            title: '<?php echo $kolomData['waktu_pinjam'] . "-" . $kolomData['waktu_selesai'] . " / " . $kolomData['kd_ruangan'] ?>\n\<?php echo $kolomData['keperluan'] ?>',
                                        start: '<?php echo $kolomData['tanggal_pinjam'] ?>',
                                        end: '<?php echo $kolomData['tanggal_selesai'] ?>'
                                },
    <?php
}
?>
                            ],
                            
                            })
                                   
                            });
                    </script>

                </div>
            </div>
        </div>
    </main>

    
</body>
</html>