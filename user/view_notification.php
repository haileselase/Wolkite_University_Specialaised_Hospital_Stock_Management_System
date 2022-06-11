<?php
include "header.php";
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <div class="alert alert-danger" id="error" style="display:none" >
        <center>
            This User Name Already Exist Pleas Try Another! .
        </center>
    </div>
    <!--End-breadcrumbs-->

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th> Sender Store Keeper </th>
            <th>  Subject  </th>
            <th>  Notification </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $res=mysqli_query($link,"select * from notification ");
        while ($row=mysqli_fetch_array($res)){
            ?>
            <tr >
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["subject"]?></td>
                <td><?php echo $row["notific"]?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

        </div>

    </div>
</div>



<?php
include "footer.php";
?>
