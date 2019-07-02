<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include "./admin/partials/header.php";
        
        ?>

        <?php
        include "./admin/partials/footer.php";
        ?>
    </head>
    <body class="app">
        <div class="page-container">
            <?php
             require './admin/partials/navbar.php';
            ?>
            <?php include './Page/page.php' ?>
            
        </div>
    </body>
</html>