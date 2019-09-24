<?php
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
if(!file_exists($meet_account)){
	mkdir($meet_account,0777,true);
	echo "成功为你创建文件夹<br><br>";
}else{
	echo "需要创建的文件夹已经存在<br><br>";
}
if($_FILES["file"]["error"]>0)
{
	echo "错误：".$_FILES["file"]["error"]."<br/>";
}

else
{
	
		move_uploaded_file($_FILES["file"]["tmp_name"], $meet_account."/x".$_FILES["file"]["name"]);
	
//$p='upfiles/'.$email."_".$_FILES["file"]["name"];
$photo1=$meet_account.'/x'.$_FILES["file"]["name"];	
}
if($_FILES["file_1"]["error"]>0)
{
	echo "错误：".$_FILES["file_1"]["error"]."<br/>";
}

else
{
	
		move_uploaded_file($_FILES["file_1"]["tmp_name"], $meet_account."/x".$_FILES["file_1"]["name"]);
$photo2=$meet_account.'/x'.$_FILES["file_1"]["name"];
//$p='upfiles/'.$email."_".$_FILES["file"]["name"];	
}
$x=shell_exec('python3.5 face_1.py '.$photo1);
$y=shell_exec('python3.5 face_1.py '.$photo2);
//echo $x."<br>";
//echo $y."<br>";
if($x==1 && $y!=1){
echo "第二张照片不符合规范，请上传个人独照";
}
else if($x!=1 && $y==1){
echo "第一张照片不规范，请上传个人独照";
}
else if($x!=1 && $y !=1){
echo "两张照片都不规范，请上传个人独照";
}
else if($x==1 && $y==1){

echo "夫妻相得分：".mt_rand(75,100)."！";
}
//shell_exec('rm -rf '.$meet_account);
//echo $x;
?>
