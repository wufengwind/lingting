<?php
$user_account="";
if(!empty($_COOKIE["ccount"])){
    $user_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
$show=$_POST["show"];
$move=$_POST["move"];
$hand=$_POST["hand"];
$sad=$_POST["sad"];
include "conn.php";
//include "conn.php";
$sql_meet ="insert into konw(user_account,user_show,user_move,user_sad,user_hand)
values('$user_account','$show','$move','$sad','$hand');" ;
if(mysqli_query($mysqli,$sql_meet)){
    //echo "<script>";
    //echo "alert('success')";
    //echo "</script>";
    header("content-type:text/html;charset=utf-8");
    header('location:xianglian.html');
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>