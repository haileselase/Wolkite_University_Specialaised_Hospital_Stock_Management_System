<?php
$options = array("cost"=>4);
$password ="take";
$hash = password_hash($password , PASSWORD_BCRYPT,$options);
echo "this is outside the if close";
echo $hash;

if(password_verify($password, $hash)){
    echo "this is inside the if close";
    echo $hash;
}
?>
<?php
echo "The time is " . date("h:i:sa");
?>
<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
?>

<?php
$d1=strtotime("July 01 2022");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";
?>
<?php

$phpdate = strtotime( $mysqldate );
$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
?>
<form name="form1" action="" method="post" class="form-horizontal" >
    <div class="control-group">
        <label class="control-label">Product Category </label>
        <div class="controls">
            <select name="catagoryid" class="span11" id="sell">
                <option value="0"> one </option>
                <option value="2"> two </option>
                <option value="3"> three</option>
            </select>
        </div>
    </div>
</form>

<?php
if(!empty($_POST["category_id"])) {
    echo " if Is Working " ;
    $res = mysqli_query($link, "select * from add_product_type  where  category ='$_POST[catagoryid]'");
    while ($row = mysqli_fetch_array($res)) {

        echo "<option >";
        echo $row['product_name'];
        echo "</option>";
    }
}else{
    echo " if NOT Working " ;
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".country").change(function()
        {
            var country_id=$(this).val();
            var post_id = 'id='+ country_id;

            $.ajax
            ({
                type: "POST",
                url: "ajax.php",
                data: post_id,
                cache: false,
                success: function(cities)
                {
                    $(".city").html(cities);
                }
            });

        });
    });
</script>

<?php

if($_POST['id']){
    $id=$_POST['id'];
    if($id==0){
        echo "<option>Select City</option>";
    }else{
        $sql = mysqli_query($con,"SELECT * FROM `city` WHERE country_id='$id'");
        while($row = mysqli_fetch_array($sql)){
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }
}
?>

