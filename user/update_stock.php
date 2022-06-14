<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head") or(isset($_SESSION['username']) && $_SESSION['role']==="Store_Keeper") )
{
?>
<?php
include "../user/header.php";
include "../user/connection.php";
$id = $_GET['id'];
$catagoryid = "";
$supplierid  = "";
$productname = "";
$measurmrnt = "";
$description = "";
$manufacturing_date ="";
$expire_date = "";
$quantity="";
$res=mysqli_query($link,"select * from stock_registration where id =$id ");

while ($row=mysqli_fetch_array($res))
{
  echo $catagoryid=$row["catagoryid"];
  $supplierid=$row["supplierid"];
  $productname=$row["productname"];
  $measurmrnt=$row["measurmrnt"];
  $description=$row["description"];
  $manufacturing_date=$row["manufacturing_date"];
  $expire_date=$row["expire_date"];
  $quantity=$row["quantity"];

}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
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
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"> Product Category </label>
                                <div class="controls">
                                    <select name="catagoryid" class="span11" id="sell">
                                        <option value="">-- Select Category -- </option>
                                        <?php
                                        $res =mysqli_query($link,"select * from add_catagory_type ");
                                        while ($row=mysqli_fetch_array($res)){

                                            echo "<option >";
                                            echo $row['category_name'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Suplier Id </label>
                                <div class="controls">
                                    <select name="supplierid" class="span11">
                                        <option value="">-- Select Supplier Name -- </option>
                                        <?php
                                        $res =mysqli_query($link,"select * from  add_suplier_type ");
                                        while ($row=mysqli_fetch_array($res)){

                                            echo "<option >";
                                            echo $row['supplier_name'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <select name="productname" class="span11" ">
                                    <option value="">-- Select Product Name -- </option>
                                    <?php
                                    $res =mysqli_query($link,"select * from add_product_type ");
                                    while ($row=mysqli_fetch_array($res)){

                                        echo "<option >";
                                        echo $row['product_name'];
                                        echo "</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Measurmrnt </label>
                                <div class="controls">
                                    <select name="measurmrnt" class="span11" >
                                        <option value="">-- Select Measurement Name -- </option>
                                        <option <?php if($measurmrnt=="milligram"){echo "Selected";} ?> >milligram</option>

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
                                <label class="control-label"> Manufacturing Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Description " name="manufacturing_date"  value="<?php echo $manufacturing_date;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expire_date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Description " name="expire_date"  value="<?php echo $expire_date;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="quantity"  value="<?php echo $quantity;?>"/>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    Update Not Performed Pleas Try Again! .
                                </center>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success"  value ="update">Update</button>
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
    mysqli_query($link,"update stock_registration set catagoryid='$_POST[catagoryid]',supplierid='$_POST[supplierid]',productname='$_POST[productname]',measurmrnt ='$_POST[measurmrnt]',description='$_POST[description]',manufacturing_date ='$_POST[manufacturing_date]',expire_date='$_POST[expire_date]',quantity='$_POST[quantity]'where id =$id")or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function () {
            window.location.href="product_list.php";
        },1000);
    </script>
    <?php
}
?>
<?php
include "footer.php";
?>
<?php  } else
{
    header("Location:index.php");
}
?>
