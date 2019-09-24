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
$sql_repetition="select count(*) from attention where attention='$attention' and user_account='$meet_account';";
if($rp=mysqli_query($mysqli,$sql_repetition)){
	if($row=$rp->fetch_assoc()){
		//echo "不能重复关注";
		if($row["count(*)"]>0){
			echo "不能重复关注";
		}else{
			$sql_str = "insert into attention values('$meet_account','$attention');";
if($result=mysqli_query($mysqli,$sql_str)){
	echo "关注成功！";
	echo "<script type='text/javascript'>";
	echo "window.location.href='see.php'";
	echo "</script>";
	echo $row['count(*)'];
}
else{
	echo "遇见未知错误，请联系管理员：<br>fwu582579@gmail.com";
}
	
		}
	}
}
?>