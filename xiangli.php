<?php
$meet_account="";

$cry=$_POST['cry'];
echo $cry;
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
$sql_meet ="insert into leaved(user_account,say)
values('$meet_account','$cry');" ;
if(mysqli_query($mysqli,$sql_meet)){
    header("content-type:text/html;charset=utf-8");
    header('location:person.php');
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>
