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
