<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head") or(isset($_SESSION['username']) && $_SESSION['role']==="Store_Keeper") )
{
?>
<?php
include "../user/header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add New Stock</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add New Stock </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal" >
                            <div class="control-group">
                                <label class="control-label">Product Category </label>
                                <div class="controls">
                                    <select name="catagoryid" class="span11" id="sell">
                                        <option value="">-- Select Category Name -- </option>
                                        <?php
                                        $res =mysqli_query($link,"select * from add_catagory_type  ");
                                        while ($row=mysqli_fetch_array($res)){

                                            echo "<option >";
                                            echo $row['category_name'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <div class="controls">
                                        <select name="productname" class="span11" ">
                                        <option value="">-- Select Product Name -- </option>
                                        <?php
                                            $res = mysqli_query($link, "select * from add_product_type  ");
                                            while ($row = mysqli_fetch_array($res)) {

                                                echo "<option >";
                                                echo $row['product_name'];
                                                echo "</option>";
                                        }
                                        ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">  Supplier  </label>
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
                                    <label class="control-label">Measurmrnt </label>
                                    <div class="controls">
                                        <select name="measurmrnt" class="span11">
                                            <option value="">-- Select Measurement  Name -- </option>
                                            <option >milligram</option>
                                            <option >microgram</option>
                                            <option >gram</option>
                                            <option >kilogram</option>
                                            <option >cubic centimetre</option>
                                            <option >millilitre</option>
                                            <option >mole</option>
                                            <option >millimole</option>
                                            <option >litre</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label"> Manufacturing Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Manufacturing Date " name="manufacturing_date"  required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expired Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Expired Date " name="expire_date"  required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Quantity  " name="quantity" required />
                                </div>
                            </div>
                                <div class="control-group">
                                    <label class="control-label"> Description </label>
                                    <div class="controls">
                                        <input type="text"  class="span11" placeholder=" Description " name="description"  required/>
                                    </div>
                                </div>

                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    This Product  Is Already Registered! .
                                </center>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success" >Add</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none" >
                                <center>
                                    Reccord Inserted Succesfully!
                                </center>
                            </div>
                                <div class="alert alert-danger" id="rejected" style="display:none" >
                                    <center>
                                        product Near To Expire Date! .
                                    </center>
                                </div>

                                <div class="alert alert-success" id="accepted" style="display:none" >
                                    <center>
                                        Reccord Inserted Succesfully!
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
           $temp =365;
           $d1=strtotime($_POST[expire_date]);
           $d2=strtotime($_POST[manufacturing_date]);
           $d3 =ceil(($d1-$d2)/60/60/24);
           if($d3<$temp)
           {
               ?>
               <script type="text/javascript">
                   document.getElementById("rejected").style.display="block";
                   setTimeout(function () {
                       window.location.href=window.location.href;
                   },30000);
               </script>
               <?php
               exit();
           }else{
               ?>
               <script type="text/javascript">
                   document.getElementById("accepted").style.display="none";
                   setTimeout(function () {
                       window.location.href=window.location.href;
                   },3000);
               </script>
               <?php

           }
    $count = 0;
    $res =mysqli_query($link,"select * from stock_registration where productname = '$_POST[productname]'");
    $count =mysqli_num_rows($res);
    if($count>0){
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("error").style.display="block";
            setTimeout(function () {
                window.location.href=window.location.href;
            },3000);
        </script>
        <?php
    }else
    {
        $res =mysqli_query($link,"insert into stock_registration values (NULL,'$_POST[catagoryid]','$_POST[supplierid]','$_POST[productname]','$_POST[measurmrnt]','$_POST[description]','$_POST[manufacturing_date]','$_POST[expire_date]','$_POST[quantity]')");
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display="none";
            document.getElementById("success").style.display="block";
            setTimeout(function () {
                window.location.href=window.location.href;
            },3000);
        </script>
        <?php
    }

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