
<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Available Product List </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Available Product List </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="border-color: #57a957 "> Product Id </th>
                                <th style="border-color: #57a957 "> Category Id </th>
                                <th style="border-color: #57a957 "> Supplier Id </th>
                                <th style="border-color: #57a957 "> Product Name</th>
                                <th style="border-color: #57a957 "> Measurmrnt </th>
                                <th style="border-color: #57a957 "> Description</th>
                                <th style="border-color: #57a957 "> Manufacturing Date</th>
                                <th style="border-color: #57a957 "> Expire Date</th>
                                <th style="border-color: #57a957 "> Quantity</th>
                                <th style="border-color: #57a957 "> Update </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from stock_registration ");
                            while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td style="border-color: #57a957 "><?php echo $row["id"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["catagoryid"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["supplierid"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["productname"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["measurmrnt"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["description"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["manufacturing_date"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["expire_date"]?></td>
                                    <td style="border-color: #57a957 "><?php echo $row["quantity"]?></td>
                                    <td style="border-color: #57a957 "><a href="update_stock.php?id=<?php echo $row["id"];?>"> Update </a> </td>
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
