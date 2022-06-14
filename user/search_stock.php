<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head") or(isset($_SESSION['username']) && $_SESSION['role']==="Store_Keeper") )
{
    ?>
<?php
include "header.php";
include "connection.php";
$id =$_POST['search'];

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Search </a></div>

    </div>
    <!--End-breadcrumbs-->
    <div>
        <form name="form1" action="" method="post" class="form-inline" >
            <center> <input type="search" name="search" id="id" placeholder=" search " ><span> <button type="submit" name="submit1" class="btn btn-success"  value ="update">Search</button> </span>  </center>

        </form>
    </div>

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">


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
                </tr>
                </thead>
                <tbody>
                <?php
                $res=mysqli_query($link,"select * from stock_registration  where id =$id ");
                while ($row=mysqli_fetch_assoc($res)){
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
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
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
