<?php
include "header.php";
include "connection.php";
$id =$_GET["id"];
$res=mysqli_query($link,"select * from requast_master where id=$id");
$request_id  = "";
$product_name  = "";
$product_category = "";
$quantity  = "";
$date = "";
$priority = "";
$description ="";
while ($row=mysqli_fetch_array($res))
{
    $request_id=$row["request_id"];
    $product_name=$row["product_name"];
    $product_category=$row["product_category"];
    $quantity=$row["quantity"];
    $date=$row["date"];
    $priority=$row["priority"];
    $description=$row["description"];
}
?>
<script type="text/javascript">
    window.location("add_stock.php");
</script>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Approve Request  </a></div>
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
                            <th>Requester Name </th>
                            <th> Product Name </th>
                            <th> Company Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Priority</th>
                            <th>Description</th>
                            <th>Approve</th>
                            <th>Delete Request</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $res=mysqli_query($link,"select * from requast_master");
                        while ($row=mysqli_fetch_array($res)){
                            ?>
                            <tr >
                                <td><?php echo $row["request_id"]?></td>
                                <td><?php echo $row["product_name"]?></td>
                                <td><?php echo $row["product_category"]?></td>
                                <td ><?php echo $row["quantity"]?></td>
                                <td><?php echo $row["date"]?></td>
                                <td ><?php echo $row["priority"]?></td>
                                <td><?php echo $row["description"]?></td>
                                <td><a href="approve_request.php?id=<?php echo $row["id"];?>"> Approve </a> </td>
                                <td><a href="delete_request.php?id=<?php echo $row["id"];?>"> Delete Request </a> </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if(isset($_GET["id"]))
            {
                $count = 0;
                $res =mysqli_query($link,"select * from  approved_list ");
                $count =mysqli_num_rows($res);
                if($count<0){
                    ?>
                    <script type="text/javascript">
                        document.getElementById("success").style.display="none";
                        document.getElementById("error").style.display="block";
                        setTimeout(function () {
                            window.location.href="approve_request.php";
                        },3000);
                    </script>
                <?php
                }else
                {
                $res =mysqli_query($link,"insert into approved_list values (NULL,'$request_id','$product_name','$product_category','$quantity','$date'");
                ?>
                    <script type="text/javascript">
                        document.getElementById("error").style.display="none";
                        document.getElementById("success").style.display="block";
                        setTimeout(function () {
                            window.location.href="add_stock.php";
                        },3000);
                    </script>
                    <?php
                }

            }
            ?>
            <?php
            include "footer.php";
            ?>

