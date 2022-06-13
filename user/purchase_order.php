
<?php
include "../user/header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Purchase Order </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Purchase Order  </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal" >
                            <div class="control-group">
                                <label class="control-label"> Product Category </label>
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
                                <div class="control-group">
                                    <label class="control-label">Product Name First Alternative </label>
                                    <div class="controls">
                                        <select name="product_name_one" class="span11" ">
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
                                    <label class="control-label"> Product Name Second Alternative </label>
                                    <div class="controls">
                                        <select name="product_name_two" class="span11" ">
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
                                    <label class="control-label">  Supplier Name First Alternative  </label>
                                    <div class="controls">
                                        <select name="supplier_one" class="span11">
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
                                    <label class="control-label">  Supplier Name Second Alternative  </label>
                                    <div class="controls">
                                        <select name="supplier_two" class="span11">
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
                                        <select name="measurement" class="span11">
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
                                <label class="control-label"> Quantity </label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder=" Quantity  " name="quantity" required />
                                </div>
                            </div>

                                <div class="control-group">
                                    <label class="control-label"> Order Date </label>
                                    <div class="controls">
                                        <input type="datetime-local"  class="span11" placeholder=" Description " name="order_date"  required/>
                                    </div>
                                </div>

                            <div class="alert alert-danger" id="error" style="display:none" >
                                <div style="text-align: center;">
                                    Purchase Ordered Already Exist Pleas Try Another! .
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success" >Add</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none" >
                                <div style="text-align: center;">
                                    Purchase Ordered Successfully!
                                </div>
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

    $count = 0;
    $res =mysqli_query($link,"select * from  purchase_order where product_name_one = '$_POST[product_name_one]' or product_name_two = '$_POST[product_name_two]'");
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
        $res =mysqli_query($link,"insert into  purchase_order values (NULL,'$_POST[product_category]','$_POST[product_name_one]','$_POST[product_name_two]','$_POST[supplier_one]','$_POST[supplier_two]','$_POST[measurement]','$_POST[quantity]','$_POST[description]')");
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
