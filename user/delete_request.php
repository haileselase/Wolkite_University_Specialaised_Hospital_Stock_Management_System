<?php
include "../user/header.php";
include "../user/connection.php";
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Request Deleted  </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Request Deleted </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"> Category Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="description " name="description"  required/>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display:none" >
                                <center>
                                    Request Not Deleted  Try Again! .
                                </center>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="submit1" class="btn btn-success" >Confirm</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none" >
                                <center>
                                    Request Deleted Successfully!
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
    $id=$_GET["id"];
    $res =mysqli_query($link,"insert into deleted_response_list values (NULL,'$id'");die(mysqli_error($link));
    $res=mysqli_query($link,"delete from requast_master where id=$id");
    ?>
    <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
    </script>
    <?php
}
?>
<?php
include "../user/footer.php";
?>

