<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Physician")or
    (isset($_SESSION['username']) && $_SESSION['role']==="Dispensing_Unit"))
{
?>
<?php
include "header.php";
include "connection.php";
$id =0;
$id =$_POST['search'];
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                View Prescription </a></div>
    </div>
    <!--End-breadcrumbs-->
    <form name="form1" action="" method="post" class="form-inline" >
        <center> <input type="search" name="search" id="id" placeholder=" search " ><span> <button type="submit" name="submit1" class="btn btn-success"  value ="update">Search</button>
            </span><span> <button type="submit" name="submit2" class="btn btn-warning"  value ="all" >View All </button></span>  </center>

    </form>

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> View Prescription  </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> id </th>
                                <th> firstname  </th>
                                <th> lastname </th>
                                <th> age </th>
                                <th> address  </th>
                                <th> catagoryid </th>
                                <th> productname </th>
                                <th> supplierid </th>
                                <th> measurmrnt  </th>
                                <th> quantity </th>
                                <th> description </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from prescription  where id =$id ");
                            while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td><?php echo $row["id"]?></td>
                                    <td><?php echo $row["firstname"]?></td>
                                    <td><?php echo $row["lastname"]?></td>
                                    <td><?php echo $row["age"]?></td>
                                    <td><?php echo $row["address"]?></td>
                                    <td><?php echo $row["catagoryid"]?></td>
                                    <td><?php echo $row["productname"]?></td>
                                    <td><?php echo $row["supplierid"]?></td>
                                    <td><?php echo $row["measurmrnt"]?></td>
                                    <td><?php echo $row["quantity"]?></td>
                                    <td><?php echo $row["description"]?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                            if(isset($_POST["submit2"])){

                                $res=mysqli_query($link,"select * from prescription  ");
                                while ($row=mysqli_fetch_array($res)){
                                    ?>
                                    <tr >
                                        <td><?php echo $row["id"]?></td>
                                        <td><?php echo $row["firstname"]?></td>
                                        <td><?php echo $row["lastname"]?></td>
                                        <td><?php echo $row["age"]?></td>
                                        <td><?php echo $row["address"]?></td>
                                        <td><?php echo $row["catagoryid"]?></td>
                                        <td><?php echo $row["productname"]?></td>
                                        <td><?php echo $row["supplierid"]?></td>
                                        <td><?php echo $row["measurmrnt"]?></td>
                                        <td><?php echo $row["quantity"]?></td>
                                        <td><?php echo $row["description"]?></td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
<!--end-main-container-part-->
<?php  } else
{
    header("Location:index.php");
}
?>
