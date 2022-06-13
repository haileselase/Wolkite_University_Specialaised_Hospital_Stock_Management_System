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
$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";
?>
