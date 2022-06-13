<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Purchase Order List </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Purchase Order List </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> Purchase Id </th>
                                <th> product Category  </th>
                                <th> Product Name One  </th>
                                <th> Product Name Two </th>
                                <th> Supplier One </th>
                                <th> supplier Two </th>
                                <th> Measurement </th>
                                <th> Quantity </th>
                                <th> Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from  purchase_order ");
                            while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td><?php echo $row["id"]?></td>
                                    <td><?php echo $row["product_category"]?></td>
                                    <td><?php echo $row["product_name_one"]?></td>
                                    <td><?php echo $row["product_name_two"]?></td>
                                    <td><?php echo $row["supplier_one"]?></td>
                                    <td><?php echo $row["supplier_two"]?></td>
                                    <td><?php echo $row["measurement"]?></td>
                                    <td><?php echo $row["quantity"]?></td>
                                    <td ><?php echo $row["description"]?></td>
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

