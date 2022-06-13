
    <?php
    include "../user/header.php";
    include "../user/connection.php";
    ?>
    <!--main-container-part-->
    <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add New Category Type </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

    <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Add New Category Type </h5>
            </div>
            <div class="widget-content nopadding">
                <form name="form1" action="" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label"> Category Name :</label>
                        <div class="controls">
                            <input type="text" class="span11" placeholder="Category Name " name="category_name"  required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Description </label>
                        <div class="controls">
                            <input type="text"  class="span11" placeholder=" description  " name="description" required />
                        </div>
                    </div>

                    <div class="alert alert-danger" id="error" style="display:none" >
                        <center>
                            This Category Name Already Exist Pleas Try Another! .
                        </center>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submit1" class="btn btn-success" >Add</button>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none" >
                        <center>
                            Record Inserted Successfully!
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
$res =mysqli_query($link,"select * from add_catagory_type where category_name = '$_POST[category_name]'");
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
$res =mysqli_query($link,"insert into add_catagory_type values (NULL,'$_POST[category_name]','$_POST[description]')");
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