<?php
include "header.php";
include "connection.php";
$id =$_POST['id'];

$expire_date = "";
$res=mysqli_query($link,"select * from stock_registration where productid = $id ");
while ($row=mysqli_fetch_array($res))
{
    $expire_date=$row["expire_date"];
    $today = date('Y-m-d');
    $diff = date_diff(date_create($today),date_create($expire_date));
}
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
                    <form method="POST">
                        <center>
                            <div class="form-group" >
                                <label>Expire Date:</label>
                                <input type="date" name="expire" class="form-control" >
                                <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
                            </div>
                        </center>
                    </form >

                    <?php
                    if(isset($_POST['id'])){
                        $exp = $_POST['expire'];
                        $today = date('Y-m-d');
                        $diff = date_diff(date_create($today),date_create($expire_date));
                        ?>
                        <div align="center" style="margin-top:10px;" >
                            <?php echo 'Product will be Expired Date <b>'.$diff->format('%y').'</b>'; ?>
                        </div>
                        <?php
                    }

                    ?>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th> Category Id</th>
                            <th> Suplier ID</th>
                            <th> productname</th>
                            <th> Measurmrnt</th>
                            <th> Description</th>
                            <th> Prescription</th>
                            <th> Manufacturing_date</th>
                            <th> Expire_date</th>
                            <th> Quantity</th>
                            <th> calculate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $res=mysqli_query($link,"select * from stock_registration");
                        while ($row=mysqli_fetch_array($res)){
                            ?>
                            <tr >
                                <td><?php echo $row["catagoryid"]?></td>
                                <td><?php echo $row["supplierid"]?></td>
                                <td ><?php echo $row["productname"]?></td>
                                <td><?php echo $row["measurmrnt"]?></td>
                                <td><?php echo $row["description"]?></td>
                                <td><?php echo $row["prescription"]?></td>
                                <td><?php echo $row["manufacturing_date"]?></td>
                                <td ><?php echo $row["expire_date"]?></td>
                                <td><?php echo $row["quantity"]?></td>
                                <td><a href="expired_date.php?id=<?php echo $row["id"];?>" name="id1"> Calculate </a> </td>
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



