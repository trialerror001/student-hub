
<?php
try {
    if (empty($_SESSION['level'])) {
       header("Location: http://localhost/student-hub/");
        exit;
    }
} catch (Exception $ex) {
    
}
?>



