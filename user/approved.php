<?php

include "header.php";
include "connection.php";
$id = $_GET['id'];
$request_id="";
$product_name="";
$productname="";
$product_category="";
$supplier="";
$quantity="";
$description="";
$res=mysqli_query($link,"select * from  requast_master where id =$id ");

while ($row=mysqli_fetch_array($res))
{
    $request_id=$row["request_id"];
    $product_name=$row["product_name"];
    $product_category=$row["product_category"];
    $supplier=$row["supplier"];
    $quantity=$row["quantity"];
    $description=$row["description"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Request Approve Form  </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>  Request Approve Form    </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"> Requast ID </label>
                                <div class="controls">
                                    <select name="request_id" class="span11" ">
                                    <option <?php if($request_id=="In Pestiont Pharmacy"){echo "Selected";} ?> >In Pestiont Pharmacy</option>
                                    <option <?php if($request_id=="Out Pestiont Pharmacy"){echo "Selected";} ?> >Out Pestiont Pharmacy</option>
                                    <option <?php if($request_id=="Emergency Pharmacy"){echo "Selected";} ?> >Emergency Pharmacy</option>
                                    <option <?php if($request_id=="AOPD pharmacy"){echo "Selected";} ?> >OPD pharmacy </option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name </label>
                                <div class="controls">
                                    <select name="product_name" class="span11" id="sell">
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
                                <label class="control-label">Product Category </label>
                                <div class="controls">
                                    <select name="product_category" class="span11" id="sell">
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
                            </div

                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <select name="supplier" class="span11" ">
                                        <?php
                                        $res =mysqli_query($link,"select * from add_suplier_type ");
                                        while ($row=mysqli_fetch_array($res)){

                                            echo "<option >";
                                            echo $row['supplier_name'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            <div class="control-group">
                                <label class="control-label"> Approved Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Approved_quantity " name="approved_quantity"  "/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Approved Date </label>
                                <div class="controls">
                                    <input type="datetime-local"  class="span11" placeholder=" Description " name="approved_date"  "/>
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
    $res =mysqli_query($link,"insert into  approved_list values (NULL,'$_POST[request_id]','$_POST[product_name]','$_POST[product_category]','$_POST[supplier]','$_POST[approved_quantity]','$_POST[approved_date]'"); die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        setTimeout(function () {
            window.location.href="approve_request.php";
        },1000);
    </script>
    <?php
}else
{
    echo "if is Not working properly";
}
?>
<?php
include "footer.php";
?>
