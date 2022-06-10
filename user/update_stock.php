<?php
include "header.php";
include "connection.php";
$id =$_POST['search'];

$catagoryid  = "";
$supplierid  = "";
$productname = "";
$measurmrnt = "";
$description = "";
$prescription = "";
$manufacturing_date ="";
$expire_date = "";
$quantity="";
$res=mysqli_query($link,"select * from stock_registration where productid =$id ");
while ($row=mysqli_fetch_array($res))
{
    $catagoryid=$row["catagoryid"];
    $supplierid=$row["supplierid"];
    $productname=$row["productname"];
    $measurmrnt=$row["measurmrnt"];
    $description=$row["description"];
    $prescription=$row["prescription"];
    $manufacturing_date=$row["manufacturing_date"];
    $expire_date=$row["expire_date"];
    $quantity=$row["quantity"];

}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Update Stock </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>  Update Stock    </h5>
                    </div>
                    <form name="form1" action="" method="post" class="form-horizontal">
                        <input type="search" name="search" id="id" placeholder="search" >

                    </form>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product Name " name="product_name" value="<?php echo $productname ;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Product Category </label>
                                <div class="controls">
                                    <select name="category_id" class="span11">
                                        <option <?php if($catagoryid=="active"){echo "Selected";} ?>>tablet</option>
                                        <option <?php if($catagoryid=="inactive" ){echo "Selected";} ?>>shrop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Suplier Id </label>
                                <div class="controls">
                                    <select name="supplier_id" class="span11">
                                        <option <?php if($supplierid=="active"){echo "Selected";} ?>>farma</option>
                                        <option <?php if($supplierid=="inactive" ){echo "Selected";} ?>>salma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Measurmrnt </label>
                                <div class="controls">
                                    <select name="mass" class="span11">
                                        <option <?php if($measurmrnt=="active"){echo "Selected";} ?>>mg</option>
                                        <option <?php if($measurmrnt=="inactive" ){echo "Selected";} ?>>litter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"> Description </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="description"  value="<?php echo $description;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Prescription </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="prescription"  value="<?php echo $prescription;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Manufacturing Date </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="manufacturing_date"  value="<?php echo $manufacturing_date;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expire_date </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="expire_date"  value="<?php echo $expire_date;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="quantity"  value="<?php echo $quantity;?>"/>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success"  >Update</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none" >
                                <center>
                                    Reccord Updatated Succesfully!
                                </center>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<?php
if(isset($_POST["submit1"]))
{
    $id =$_POST['submit1'];
    echo $id;
    mysqli_query($link,"update stock_registration set catagoryid='$_POST[category_id]',supplierid='$_POST[supplier_id]',productname='$_POST[product_name]',measurmrnt ='$_POST[mass]',description='$_POST[description]',prescription='$_POST[prescription]',manufacturing_date ='$_POST[manufacturing_date]',expire_date='$_POST[expire_date]',quantity='$_POST[quantity]'where productid =$id")or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function () {
            window.location.href=window.location.href;
        },3000);
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>

