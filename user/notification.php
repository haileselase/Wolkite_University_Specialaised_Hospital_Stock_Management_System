<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Notification </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="container">
                <form method="post" id="comment_form">

                    <div class="form-group">
                        <label>Enter Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Enter Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="6" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="post" id="post" class="btn btn-info"  />
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
</div>

<?php
if(isset($_POST["post"]))
{
        $res =mysqli_query($link,"insert into notification values (NULL,'$_POST[subject]','$_POST[comment]')");
        ?>
         <script type="text/javascript">
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
