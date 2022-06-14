<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['role']==="Dispensing_Unit")
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
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Request Stock</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Request Stock </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <label class="control-label">Product Category </label>
                            <div class="controls">
                                <select name="product_category" class="span11" >
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
                            <div class="control-group">
                                <label class="control-label">  Supplier  </label>
                                <div class="controls">
                                    <select name="supplier" class="span11">
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
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <select name="product_name" class="span11">
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
                                <label class="control-label"> Quantity  :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder=" Request Quantity " name="quantity" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Date  :</label>
                                <div class="controls">
                                    <input type="datetime-local" class="span11" placeholder=" Request Date " name="date" value="datetime-local" disabled/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"> Priority </label>
                                <div class="controls">
                                    <select name="priority" class="span11">
                                        <option >High</option>
                                        <option >mid</option>
                                        <option >low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"> Description </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Description " name="discription" />
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    Requast Not Sent Try Again! .
                                </center>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success" >Add</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none" >
                                <center>
                                    Requast  Sent  Succesfully!
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
                $res =mysqli_query($link,"select * from requast_master where productname = '$_POST[productname]'");
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
                $res =mysqli_query($link,"insert into requast_master values (NULL,'$_POST[request_id]','$_POST[product_name]','$_POST[product_category]','$_POST[supplier]','$_POST[quantity]','$_POST[date]','$_POST[priority]','$_POST[discription]')");
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

