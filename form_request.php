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
        <script>
            $(function () {
                var dateFormat = "mm/dd/yy",
                        from = $("#from")
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            numberOfMonths: 1,
                            minDate: "today"
                        })
                        .on("change", function () {
                            to.datepicker("option", "minDate", getDate(this));
                        }),
                        to = $("#to").datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            numberOfMonths: 1,
                        })
                        .on("change", function () {
                            from.datepicker("option", "maxDate", getDate(this));
                        });

                function getDate(element) {
                    var date;
                    try {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error) {
                        date = null;
                    }

                    return date;
                }
            });
        </script>
    </head>
   
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <!-- CODE HERE -->
                    <div class="form_style">
                        <div class="bgc-white p-20 bd">
                            <h6 class="c-grey-900">Formulir Peminjaman Ruangan</h6>
                            <div class="mT-30">
                                <form method="POST" action="?page=RequestRuangan">		
                                    <div class="form-row">		
                                        <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputEmail4">Nama Himpunan</label> 
                                            <?php $fungsi->namaHimpunan(); ?>
                                        </div>

                                        <div class="form-group col-md-4" style="font-size: 1vw"><label for="inputCity"> Ruang yang dipinjam</label> 
                                            <?php $fungsi->kodeRuangan(); ?>
                                        </div>

                                        <div class="form-group col-md-12" style="font-size: 1vw"><label for="inputCity">Untuk Keperluan</label> <input type="text" class="form-control" id="inputCity" name="keperluan">
                                        </div>


                                        <div class="form-group col-md-2" style="font-size: 1vw">
                                            <label for="inputZip">Pada Tanggal</label> 
                                            <input type="text" id="from" class="form-control bdc-grey-200" placeholder="When?" name="tanggalMulai">
                                        </div>

                                        <div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> 
                                            <select name="cmbWaktuMulai" class="form-control">
                                                <?php $fungsi->waktuPeminjaman(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2" style="font-size: 1vw">
                                            <label for="inputZip">Sampai Tanggal</label> 
                                            <input type="text" id="to" class="form-control bdc-grey-200" placeholder="When?" name="tanggalSelesai">
                                        </div>

                                        <div class="form-group col-md-2" style="font-size: 1vw"><label for="inputCity">Jam</label> 
                                            <select name="cmbWaktuSelesai" class="form-control">
                                                <?php $fungsi->waktuPeminjaman(); ?>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group"><div class="checkbox checkbox-circle checkbox-info peers ai-c" style="font-size: 1vw"><input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer" required="true"> <label for="inputCall2" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Kami akan bertanggung jawab atas pengunaan fasilitas yang diberikan dan bersedia mengembalikan fasilitas yang dipinjamkan dengan keadaan baik</span></label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submitRequest">Book</button>
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
