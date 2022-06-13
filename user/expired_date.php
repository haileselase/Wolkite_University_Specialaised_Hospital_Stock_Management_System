
<?php
include "header.php";
include "connection.php";
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                View Stock Report </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="col-sm-4 col-sm-offset-4">

                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th> Product Id </th>
                            <th> Category Id</th>
                            <th> Suplier ID</th>
                            <th> productname</th>
                            <th> Measurmrnt</th>
                            <th> Description</th>
                            <th> Manufacturing_date</th>
                            <th> Expire_date</th>
                            <th> Quantity</th>
                            <th> Remain Days</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $today = date('Y-m-d');
                        $res=mysqli_query($link,"select * from stock_registration");
                        while ($row=mysqli_fetch_array($res)){
                            ?>
                            <tr >
                                <td><?php echo $row["id"]?></td>
                                <td><?php echo $row["catagoryid"]?></td>
                                <td><?php echo $row["supplierid"]?></td>
                                <td ><?php echo $row["productname"]?></td>
                                <td><?php echo $row["measurmrnt"]?></td>
                                <td><?php echo $row["description"]?></td>
                                <td><?php echo $row["manufacturing_date"]?></td>
                                <td ><?php echo $row["expire_date"]?></td>
                                <td><?php echo $row["quantity"]?></td>
                                <td><?php $today = time();
                                    $exp_date = $row["expire_date"];
                                    $today =strtotime($today);
                                    $exp =strtotime($row["expire_date"]);
                                    if($today>$exp){
                                        $diff=$exp-$today;
                                        $x = abs(floor($diff/(60*60*24)/365));
                                        echo 'product Expired';
                                        echo  "</br> Days :".$x;
                                    }else {
                                        $diff=$exp-$today;
                                        $x = abs(floor($diff/(60*60*24)/365));
                                        echo 'product Expired';
                                        echo  "</br> Days :".$x;
                                    }
                                    ?></td><
                            </tr>

                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            include "footer.php";
            ?>



