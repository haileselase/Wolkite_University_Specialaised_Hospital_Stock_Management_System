<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Avleible Product List </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Avleible Product List </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> Product Id </th>
                                <th> Category Id </th>
                                <th> Supplier Id </th>
                                <th> Product Name</th>
                                <th> Measurmrnt </th>
                                <th> Description</th>
                                <th> Manufacturing Date</th>
                                <th> Expire Date</th>
                                <th> Quantity</th>
                                <th> Update </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from stock_registration ");
                            while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td><?php echo $row["id"]?></td>
                                    <td><?php echo $row["catagoryid"]?></td>
                                    <td><?php echo $row["supplierid"]?></td>
                                    <td><?php echo $row["productname"]?></td>
                                    <td ><?php echo $row["measurmrnt"]?></td>
                                    <td><?php echo $row["description"]?></td>
                                    <td><?php echo $row["manufacturing_date"]?></td>
                                    <td ><?php echo $row["expire_date"]?></td>
                                    <td><?php echo $row["quantity"]?></td>
                                    <td><a href="update_stock.php?id=<?php echo $row["id"];?>"> Update </a> </td>
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

