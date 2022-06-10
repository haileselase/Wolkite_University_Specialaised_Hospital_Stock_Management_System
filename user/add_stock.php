
<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
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
                        <form name="form1" action="" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Product Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Product Name " name="productname" "/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Catgorye </label>
                                    <div class="controls">
                                        <select name="catagoryid" class="span11">
                                            <option >tablet</option>
                                            <option >shrop</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Supplier Id </label>
                                    <div class="controls">
                                        <select name="supplierid" class="span11">
                                            <option >farma</option>
                                            <option >salma</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Measurmrnt </label>
                                    <div class="controls">
                                        <select name="measurmrnt" class="span11">
                                            <option >mg</option>
                                            <option >litter</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"> Description </label>
                                    <div class="controls">
                                        <input type="text"  class="span11" placeholder=" Description " name="description" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> Prescription </label>
                                    <div class="controls">
                                        <input type="text"  class="span11" placeholder=" Description " name="prescription"  />
                                    </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label"> Manufacturing Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Manufacturing Date " name="manufacturing_date"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expired Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Expired Date " name="expire_date"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Quantity  " name="quantity"  />
                                </div>
                            </div>

                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    This User Name Already Exist Pleas Try Another! .
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

                        </form>
                    </div>

                </div>
            </div>
            <?php
            if(isset($_POST["submit1"]))
            {

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
                $res =mysqli_query($link,"insert into stock_registration values (NULL,'$_POST[catagoryid]','$_POST[supplierid]','$_POST[productname]','$_POST[measurmrnt]','$_POST[description]','$_POST[prescription]','$_POST[manufacturing_date]','$_POST[expire_date]','$_POST[quantity]')");
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
            include "footer.php";
            ?>


