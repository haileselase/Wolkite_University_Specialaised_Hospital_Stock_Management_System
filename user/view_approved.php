<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head") or(isset($_SESSION['username']) && $_SESSION['role']==="Store_Keeper") )
{
    ?>
<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Approved List </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Approved List  </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> aproved_id </th>
                                <th> request_id  </th>
                                <th> product_name </th>
                                <th> product_category </th>
                                <th> supplier  </th>
                                <th> approved_quantity </th>
                                <th> approved_date </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from approved_list ");
                            while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td><?php echo $row["aproved_id"]?></td>
                                    <td><?php echo $row["request_id"]?></td>
                                    <td><?php echo $row["product_name"]?></td>
                                    <td><?php echo $row["product_category"]?></td>
                                    <td><?php echo $row["supplier"]?></td>
                                    <td><?php echo $row["approved_quantity"]?></td>
                                    <td><?php echo $row["approved_date"]?></td>
                                </tr>
                                <?php
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
