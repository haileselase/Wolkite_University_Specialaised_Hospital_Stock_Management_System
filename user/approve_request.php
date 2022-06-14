<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head")
{
    ?>
<?php
    include "../user/header.php";
    include "../user/connection.php";
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
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Approve Request </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Approve Request </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="border-color: #57a957 "> Requester Id </th>
                                    <th style="border-color: #57a957 "> Product Name </th>
                                    <th style="border-color: #57a957 "> Category Name</th>
                                    <th style="border-color: #57a957 "> Amount</th>
                                    <th style="border-color: #57a957 "> Date</th>
                                    <th style="border-color: #57a957 "> Priority</th>
                                    <th style="border-color: #57a957 "> Description</th>
                                    <th style="border-color: #57a957 "> Approve</th>
                                    <th style="border-color: #57a957 "> Delete Request</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $res=mysqli_query($link,"select * from requast_master");
                                while ($row=mysqli_fetch_array($res)){
                                ?>
                                <tr >
                                    <td style="border-color: #57a957 "><?php echo $row["request_id"]?></td>
                                    <td><?php echo $row["product_name"]?></td>
                                    <td><?php echo $row["product_category"]?></td>
                                    <td ><?php echo $row["quantity"]?></td>
                                    <td><?php echo $row["date"]?></td>
                                    <td ><?php echo $row["priority"]?></td>
                                    <td><?php echo $row["description"]?></td>
                                    <td><a href="approved.php?id=<?php echo $row["id"];?>"> Approve </a> </td>
                                    <td><a href="delete_request.php?id=<?php echo $row["id"];?>"> Delete </a> </td>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["delete"])) {
    echo "if is working properly";
    $res=mysqli_query($link,"delete from requast_master where id=$id");
}else{
    echo "if is Not working properly";
    echo $id;
}


?>

<?php
include "../user/footer.php";
?>
 <?php  } else
        {
            header("Location:index.php");
        }
        ?>