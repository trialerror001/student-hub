<?php

include 'library/database.inc.php';
include 'fungsi/fungsi.php';
$fungsi = new DB_Functions();

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable

    $result = $fungsi->searchVerificationAccount($email, $hash);
    if (mysql_num_rows($result) >= 1) {
        $result = $fungsi->updateActiveAccount($email, $hash);
        echo "<main class='main-content bgc-grey-100'>";
        echo "<div id='mainContent'>";
        echo '<div>Your account has been activated, you can now login</div>';
        echo $email."<br>".$hash;
        echo "</div>";
        echo "</main>";
    } else {
        echo "<main class='main-content bgc-grey-100'>";
        echo "<div id='mainContent'>";
        echo '<div>The url is either invalid or you already have activated your account</div>';
        echo $email."<br>".$hash;
        echo "</div>";
        echo "</main>";
    }
} else {
    echo "<main class='main-content bgc-grey-100'>";
    echo "<div id='mainContent'>";
    echo '<div>Invalid approach, please use the link that has been send to your email.</div>';
    echo $email."<br>".$hash;
    echo "</div>";
    echo "</main>";
}
?>

