<?php
$meet_account="";
$name=$_POST['name'];
$move=$_POST['move'];
$miss=$_POST['miss'];
$words=$_POST['words'];
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
header("Content-type:text/html;charset=UTF-8");
//echo "<h1>上传的文件信息:</h1>";
if($_FILES["file"]["error"]>0)
{
	echo "错误：".$_FILES["file"]["error"]."<br/>";
}
else
{
	
		move_uploaded_file($_FILES["file"]["tmp_name"], "updown/x".$_FILES["file"]["name"]);
	
$p='updown/x'.$_FILES["file"]["name"];	
}

echo $meet_account,
$name,
$move,
$miss,
$words;
include "conn.php";
$sql_meet ="insert into ever(user_account,miss,move,words,itsname,itsphoto)
values('$meet_account','$miss','$move','$words','$name','$p');" ;
if(mysqli_query($mysqli,$sql_meet)){
    header("content-type:text/html;charset=utf-8");
    header('location:person.php');
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}
?>
