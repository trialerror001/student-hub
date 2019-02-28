<html>
    <head>
        <script src="lib/sweetalert.min.js"></script>
    </head>
    <?php
    session_unset();
    session_destroy();
    ?>
    <script>
        //swal("Terima Kasih!", "Ruangan sudah direserve", "success");
        //alert('Permohonan Peminjaman Ruangan Sudah Tersimpan');
        swal({
            title: "Anda Sudah Logout",
        });
        setTimeout(function () {
            window.location = "http://localhost/student-hub/"
        }, 2000);
    </script>
    <?php
    exit;
    ?>
</div>

</html>


