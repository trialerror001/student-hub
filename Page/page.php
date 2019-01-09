<?php
if (isset($_SESSION['username'])) {
    include 'validasi.php';
} else {
    include_once "HalamanLogin/login.php";
}
?>
