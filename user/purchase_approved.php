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
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
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
                                <label class="control-label"> request_id </label>
                                <div class="controls">
                                    <input type="number"  class="span11" placeholder=" request_id " name="request_id"  value="<?php echo $request_id;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> product_name </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" product_name " name="product_name" value="<?php echo $product_name;?> "/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> product_category </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" product_category " name="product_category" value="<?php echo $product_category;?> "/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> supplier </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" supplier " name="supplier" value="<?php echo $supplier;?> "/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"> approved_quantity </label>
                                <div class="controls">
                                    <input type="number"  class="span11" placeholder=" approved_quantity " name="approved_quantity" "/>
                                </div>
                            </div>

                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    Update Not Performed Pleas Try Again! .
                                </center>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-warning"  value ="Approve">Update</button>
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
    echo "if is  working properly";
    $approved_Date = time();
    $res =mysqli_query($link,"insert into  approved_list values (NULL,'$_POST[request_id]','$_POST[product_name]','$_POST[product_category]','$_POST[supplier]','$_POST[approved_quantity]',$approved_Date)");die(mysqli_error($link));

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
