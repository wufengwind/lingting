<?php 
$attention = $_GET['id'];
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
$sql_repetition="delete from attention where attention='$attention' and user_account='$meet_account';";

if($result=mysqli_query($mysqli,$sql_repetition)){
	echo "取关成功！";
	echo "<script type='text/javascript'>";
	echo "window.location.href='see.php'";
	echo "</script>";
	echo $row['count(*)'];
}
else{
	echo "遇见未知错误，请联系管理员：<br>fwu582579@gmail.com";
}
?>