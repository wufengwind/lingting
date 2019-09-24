<?php

//header("content-type:text/html;charset=gbk");
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['Email'];
$status=$_POST['yes'];
$sex=$_POST['gender'];
header("Content-type:text/html;charset=UTF-8");
//echo "<h1>上传的文件信息:</h1>";
if($_FILES["file"]["error"]>0)
{
	echo "错误：".$_FILES["file"]["error"]."<br/>";
}
else
{
	
		move_uploaded_file($_FILES["file"]["tmp_name"], "upfiles/x".$_FILES["file"]["name"]);
	
$p='upfiles/x'.$_FILES["file"]["name"];	
}

include "conn.php";
$sql_test_repeat="select count(*) from user_info where user_name='$username';";

$sql_test_account="select count(*) from user_info where user_account='$email';";

$sql_insert ="insert into user_info(user_name,user_account,user_pwd,user_status,user_sex,user_photo) 
values('$username','$email','$password','$status','$sex','$p')" ;

$result_repeat=mysqli_query($mysqli,$sql_test_repeat);
$count=0;
if($result_repeat->num_rows>0){
	while ($row_count=$result_repeat->fetch_assoc()) {
		# code...
		$count=$row_count["count(*)"];
	}
}

$result_account=mysqli_query($mysqli,$sql_test_account);
$count_account=0;
if($result_account->num_rows>0){
	while ($row_account=$result_account->fetch_assoc()) {
		# code...
		$count_account=$row_account["count(*)"];
	}
}
if($count_account!=0){
	echo "<script>alert('该邮箱已被注册')</script>";
}
else{
if($count!=0){
	echo "<script>alert('该用户名已被注册')</script>";
}else{
if(mysqli_query($mysqli,$sql_insert)){
    echo "<script>";
    echo "window.location.href='zhucecg.html'";
    echo "</script>";
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
}
}
?>
