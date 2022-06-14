<?php
session_start();
if((isset($_SESSION['username']) && $_SESSION['role']==="Pharmacy_head") or(isset($_SESSION['username']) && $_SESSION['role']==="Store_Keeper") or(isset($_SESSION['username']) && $_SESSION['role']==="Dispensing_Unit"))
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
                Notification </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="container">
                <form method="post" id="comment_form">

                    <div class="control-group">
                        <label class="control-label"> Subject :</label>
                        <div class="controls">
                            <input type="text" class="span11" placeholder="Subject " name="subject"  required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Notification </label>
                        <div class="controls">
                            <input type="text"  class="span11" placeholder=" description  " name="notification" required />
                        </div>
                    </div>
                    <div class="alert alert-danger" id="error" style="display:none" >
                        <center>
                          Notification Not Sent Pleas Try Another! .
                        </center>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submit1" class="btn btn-success" > Send </button>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none" >
                        <center>
                            Notification  Sent Successfully!
                        </center>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
if(isset($_POST["submit1"]))
{
        $res =mysqli_query($link,"insert into notification values (NULL,'$_POST[subject]','$_POST[notification]')");
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
?>


<?php
include "footer.php";
?>
<!--end-main-container-part-->
<?php  } else
{
    header("Location:index.php");
}
?>