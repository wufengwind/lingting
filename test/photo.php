<?php
$Picture = $_POST['photo'];  

if($Picture != "none") {   

$PSize = filesize($Picture);   

$mysqlPicture = addslashes(fread(fopen($Picture, "r"), $PSize));   
include "conn.php";
//mysql_connect($host,$username,$password2003) or die("Unable to connect to SQL server");  

//@mysql_select_db($db) or die("Unable to select database");   

$sql_meet ="insert into user_info(user_photo)
values('$mysqlPicture');" ;
if(mysqli_query($mysqli,$sql_meet)){
    header("content-type:text/html;charset=utf-8");
    header('location:lianaiguoma.html');
}else{
    echo "遇见未知错误,请联系技术人员:fwu582579@gmail.com";
}



?>