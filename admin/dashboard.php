<?php
session_start();
if(isset($_SESSION['username']) && ($_SESSION['role'])&& $_SESSION['role']==="Administrator")
{
?>
<?php
include "header.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Dashboard </a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

            Dashboard In progress!
        </div>

    </div>
</div>
<?php
include "footer.php";
?>
<!--end-main-container-part-->
<?php  } else
{
    header("Location:index.php");
}
?>