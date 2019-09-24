<?php
$user_account="";
if(!empty($_COOKIE["ccount"])){
    $user_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
$start=$_POST["start"];
$one=$_POST["one"];
$two=$_POST["two"];
$three=$_POST["three"];

include "conn.php";
//include "conn.php";
$sql_meet ="insert into xianglian(user_account,start,one,two,theree)
values('$user_account','$start','$one','$two','$three');" ;
if(mysqli_query($mysqli,$sql_meet)){
   echo $start,$one,$two,$three;
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>