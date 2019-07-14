<html>
    <head>
        <title>Atma Student Hub</title>
        <script src="lib/sweetalert.min.js"></script>
    </head>
    <?php
    require "admin/partials/loader.php";
    include 'fungsi/fungsi.php';
    $fungsi = new DB_Functions();
    include 'library/inc.library.php';

    if (isset($_POST['btnRegis'])) {
        $namaOrganisasi = $_POST['namaOrganisasi'];
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $divisi = $_POST['divisi'];
        $level = 'himpunan';
        $status = 'Clear';

        $result = $fungsi->insertOrganisasi($namaOrganisasi, $username, $password, $email, $level, $divisi, $status);
        if ($result) {
            ?>
            <script>
                swal("Terima Kasih!", "Link Konfirmasi Sudah Dikirim. Silahkan Cek Email Anda Untuk Melakukan Konfirmasi", "success");
                setTimeout(function () {
                    window.location = "?page=Login"
                }, 4000);

            </script>
            <?php
            $to = $email;
            $subject = 'Registration Verification';
            $message = 'Thank you for signing up! Your account has been created, you can login with the following credentials after you have activated your account.'
                    . '</br>'
                    . '--------------------------------------<br>'
                    . 'Username : '.$username.'<br>'
                    . 'Password : '.$password.'<br>'
                    . '--------------------------------------<br>'
                    . '<br>'
                    . 'Please click this link to activate your account:<br><br>'
                    . 'http://studenthub.website/?page=Verify?email='.$email.'&hash='. md5(($password)).''
                    . '';
            
            $headers = 'From:noreply@studenthub.atmajaya.ac.id';
            mail($to, $subject, $message, $headers);
        }
    }
    ?>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/bg.jpg)">
            <div class="pos-a centerXY">

            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">

            <form method="POST" action="?page=Register">
                <div class="form-group">
                    <label class="text-normal text-dark"><h2>Registration Form</h2></label>
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Nama Organisasi/Panitia</label>
                    <input type="text" class="form-control" name="namaOrganisasi" placeholder="Nama Organisasi/Panitia">

                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" onchange="validationEmail()" required>
                    <script>
                        function validationEmail() {
                            $email = document.getElementById("email").value;

                            if (/@atmajaya.ac.id\s*$/.test($email) == false) {
                                swal("Gagal!", "Maaf, Email Tidak Sesuai Dengan Format", "error");
                                //alert('Permohonan Pemi    njaman Ruangan Sudah Tersimpan');

                            }
                        }
                    </script>
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input type="text" class="form-control" name="user" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Penanggung Jawab</label>
                    <select name='divisi' class='form-control'>
                        <option value='Warek 3'>Wakil Rektor 3</option>
                        <option value='Fakultas'>Kabid Kemahasiswaan</option>
                        <option value='Universitas'>BKAK</option>
                    </select>

                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <div class="peer"><button class="btn btn-primary" name="btnRegis">Register</button>
                        </div>
                    </div>
                </div>
            </form>';
        </div>
    </div>


</html>


