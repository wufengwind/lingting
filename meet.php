<?php
$meet_time=$_POST['time'] ;
$meet_place=$_POST['place'];
$meet_story=$_POST['story'];
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
echo        $meet_time ,
$meet_place,
$meet_story,
$meet_account;
include "conn.php";
$sql_meet ="insert into meet(meet_time,meet_place,meet_story,user_account)
values('$meet_time','$meet_place','$meet_story','$meet_account');" ;
if(mysqli_query($mysqli,$sql_meet)){
    header("content-type:text/html;charset=utf-8");
    header('location:lingting.html');
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>
