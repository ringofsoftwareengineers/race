<?php
include_once './config.php';
include './classes/User.php';
$user= new User();
if(!$user->validate_user_page_access())
{
    header("location: log-out.php");
}



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CleverCherry Race Management System</title>
        <?php include './header-links.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php
            include './header.php';
            ?>
            <div style="min-height: 460px;">
                
            </div>

        </div>
    </body>
</html>

