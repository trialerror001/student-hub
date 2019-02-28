<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include "./admin/partials/header.php";
        
        ?>
    </head>
    <body>

    </body>
    <body class="app">
        <div class="page-container">
            <?php
            require './admin/partials/navbar.php';
            ?>
            <?php include './Page/page.php' ?>
            
        </div>
        <?php
        include "./admin/partials/footer.php";
        ?>
    </body>
</html>