<?php
session_start();
if(isset($_SESSION['username']) && ($_SESSION['role'])&& $_SESSION['role']==="Administrator")
{

?>
<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$res=mysqli_query($link,"delete from user_registration where id=$id");
?>
<script type="text/javascript">
window.location("add_new_user.php");
</script>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Delete  User </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>First Name </th>
                            <th>Last Name </th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Edite</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $res=mysqli_query($link,"select * from user_registration");
                        while ($row=mysqli_fetch_array($res)){
                            ?>
                            <tr >
                                <td><?php echo $row["firstname"]?></td>
                                <td><?php echo $row["lastname"]?></td>
                                <td><?php echo $row["username"]?></td>
                                <td ><?php echo $row["role"]?></td>
                                <td><?php echo $row["status"]?></td>
                                <td><a href="edit_user.php?id=<?php echo $row["id"];?>"> Edite </a> </td>
                                <td><a href="delete_user.php?id=<?php echo $row["id"];?>"> Delete </a> </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if(isset($_POST["submit1"]))
            {

                $count = 0;
                $res =mysqli_query($link,"select * from user_registration where username= '$_POST[username]'");
                $count =mysqli_num_rows($res);
                if($count>0){
                    ?>
                    <script type="text/javascript">
                        document.getElementById("success").style.display="none";
                        document.getElementById("error").style.display="block";
                        setTimeout(function () {
                            window.location.href=window.location.href;
                        },3000);
                    </script>
                <?php
                }else
                {
                $res =mysqli_query($link,"insert into user_registration values (NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[role]','$_POST[status]')");
                ?>
                    <script type="text/javascript">
                        document.getElementById("error").style.display="none";
                        document.getElementById("success").style.display="block";
                        setTimeout(function () {
                            window.location.href=window.location.href;
                        },3000);
                    </script>
                    <?php
                }

            }
            ?>
            <?php
            include "footer.php";
            ?>
            <?php  } else
            {
                header("Location:index.php");
            }
            ?>
