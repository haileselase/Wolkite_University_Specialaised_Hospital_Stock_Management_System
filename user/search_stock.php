<?php
include "header.php";
include "connection.php";
$id =$_POST['search'];

?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Search </a></div>

    </div>
    <!--End-breadcrumbs-->
  <form name="form1" action="" method="post" class="form-horizontal" >
      <center> <input type="search" name="search" id="id" placeholder=" search " >  </center>


  </form>
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
                    <th> Prescription</th>
                    <th> Manufacturing Date</th>
                    <th> Expire Date</th>
                    <th> Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $res=mysqli_query($link,"select * from stock_registration  where productid =$id ");
                while ($row=mysqli_fetch_array($res)){
                    ?>
                    <tr >
                        <td><?php echo $row["productid"]?></td>
                        <td><?php echo $row["catagoryid"]?></td>
                        <td><?php echo $row["supplierid"]?></td>
                        <td><?php echo $row["productname"]?></td>
                        <td ><?php echo $row["measurmrnt"]?></td>
                        <td><?php echo $row["description"]?></td>
                        <td ><?php echo $row["prescription"]?></td>
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


