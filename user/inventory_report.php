<?php
session_start();
if(isset($_SESSION['username']) && ($_SESSION['role']) && $_SESSION['role']==="Auditor")
{
?>
<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add inventory Report </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Inventory Report </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Product ID :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product Id " name="product_id" "/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">supplier Id </label>
                                <div class="controls">
                                    <select name="supplierid" class="span11">
                                        <option >tablet</option>
                                        <option >shrop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Quantity :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="quantity" name="product_id" "/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expire Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder="Expire_date " name="expire_date" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Expire_date_confirmed </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder="Expire_date_confirmed " name="expire_date_confirmed"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Update Date </label>
                                <div class="controls">
                                    <input type="date"  class="span11" placeholder=" Update_date " name="update_date"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Remark </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Expired Date " name="remark"  />
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    This Report is  Already Exist Pleas Try Another! .
                                </center>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success" >Add</button>
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
                $res =mysqli_query($link,"select * from inventory where product_id ='$_POST[product_id]'");
                $count = mysqli_num_rows($res);
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
                    $res = mysqli_query($link,"insert into inventory values (NULL,'$_POST[product_id]','$_POST[supplierid]',NULL,'$_POST[expire_date]','$_POST[expire_date_confirmed]','$_POST[update_date]','$_POST[remark]'");
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
            <?php  } else
            {
                header("Location:index.php");
            }
            ?>











