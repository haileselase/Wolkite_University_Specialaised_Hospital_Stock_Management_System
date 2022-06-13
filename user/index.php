<?php
session_start();
include "connection.php";
"../user/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - php inventory management system</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form name="form1" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Login Page</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Username" name="username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                                                                                      placeholder="Password" name="password" required/>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <center>
                <input type="submit" name="submit1" value="Login" class="btn btn-success"/>
            </center>

        </div>
    </form>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>

<?php
if(isset($_POST["submit1"]))
{
    $username =$_POST["username"];
    $password =$_POST["password"];

    $res =mysqli_query($link,"select * from user_registration where username='$username' && password='$password' && status ='Active'");


    if(mysqli_num_rows($res) === 1){
        $row = mysqli_fetch_assoc($res);
        if($row['username'] === $username && $row['password'] === $password ){
            $_SESSION['username']=$row["username"];
            $_SESSION['role']=$row["role"];

            switch ($_SESSION['role']){
                case "Administrator":
                    header("Location:../admin/add_new_user.php");
                    break;
                case "Pharmacy_head":
                    header("Location:add_stock.php");
                    break;
                case "Dispensing_Unit":
                    header("Location:request_stock.php");
                    break;
                case "Auditor":
                    header("Location:inventory_report.php");
                    break;
                case "Store_Keeper":
                    header("Location:search_stock.php");
                    break;
            }

        }else{
            ?>
            <div class="alert alert-danger">

                <center>
                    Incorrect User Name Or Password");
                </center>
            </div>
            <?php
            ?>
            <script type="text/javascript">
                setTimeout(function () {
                    window.location.href=window.location.href;
                },1000);
            </script>
            <?php

        }
    }else{
        ?>
        <div class="alert alert-danger">

            <center>
                Incorrect User Name Or Password");
            </center>
        </div>
        <?php
        ?>
        <script type="text/javascript">
            setTimeout(function () {
                window.location.href=window.location.href;
            },1000);
        </script>
        <?php
    }

}
?>

<?php
include "footer.php";
?>




