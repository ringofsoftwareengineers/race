<?php
include_once './config.php';
include_once './classes/User.php';
global $warning_message;
$warning_message = "";
$user = new User();

if ($user->validate_user_page_access()) {
    header("location: ./home.php");
}

if (isset($_POST["btnLogin"])) {

    try {

        user_login($con, $user);
    } catch (Exception $ex) {
        
    }
}
function user_login($con, $user) {
    global $warning_message;
    $login_name = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    $wrong = false;
    if (ctype_alnum($login_name) == 1) {

        
        $user = $user->get_user_by_login($login_name,$con);
        if ($user->id == -1) {
            $wrong = true;
            //die("no user name exiss");
        } elseif (strcmp(md5($password), $user->user_password) !== 0) {
            $wrong = true;
        } else {

            $user->login_in_user();
            header("location: ./home.php");
        }

        if ($wrong) {
            $warning_message = "Incorrect User Name or Password";
        }
    } else {
        $warning_message = "Please enter alpha numeric login name";
    }

    if (!$wrong) {
        return true;
    }

    return false;
}
//end function
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Foot Race Admin Login</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid" >
            <div class="row header-heading">
                <div class="col-md-3" style="height: 105px;">
                    
                </div>
                <div class="col-md-9" style="text-align: left;">
                   Foot Race <strong>Admin Login</strong>
                </div>
            </div>

            <form  method="post">
                <div class="row" style="margin-top: 28px; min-height: 490px;">
                    <div class="col-md-4 center-aligin">
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">
                                <label style="color: white;"><strong>Username:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="txtLogin" class="form-control complete-width" ID="txtLogin" >

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label style="color: white;"><strong>Password:</strong></label>

                            </div>
                            <div class="col-md-9">
                                <input type="password" name="txtPassword" class="form-control complete-width" ID="txtPassword" >                                
                            </div>
                        </div>

                        <div class="row top-row-margin">                            
                            <div class="col-md-12">
                                <input name="btnLogin" type="submit" style="float:right; background-color:blue; color:white; width:120px; margin-top: 10px;" ID="btnLogin" class="btn btn-default right-align" value="Login" />
                            </div>
                        </div>
                        <?php
                        if (strlen($warning_message) > 0) {
                            ?>
                            <label ID="lblInCorrect"  style="color: red;"><?php echo $warning_message; ?></label>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </form>

            <?php
            //include '../footer.php';
            ?>
        </div>
    </body>
</html>
