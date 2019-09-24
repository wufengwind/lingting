<?php
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
$sql_meet ="select user_name,user_account from user_info where user_account in (select attention from attention where user_account='$meet_account');";
if($result=mysqli_query($mysqli,$sql_meet)){
    $css=$result->fetch_all();
    echo json_encode($css);
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>