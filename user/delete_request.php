<?php
include "header.php";
include "connection.php";
$id=$_GET["id"];
$res=mysqli_query($link,"delete from requast_master where id=$id");

?>
<div class="alert alert-success" id="success" style="display:none" >
    <center>
        Requast  Sent  Succesfully!
    </center>
</div>
<script type="text/javascript">
    setTimeout(function () {
        document.getElementById("success").style.display="none";
        window.location.href="approve_request.php";
    },10);
</script>


