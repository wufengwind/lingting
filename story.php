<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>我的故事</title>
</head>
<body>
<?php
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
$sql="select * from user_info where user_account='$meet_account';";
$sql_str = "select* from user_info order where user_account='$meet_account';";
$sql_ever="select count(*) from ever where user_account='$meet_account';";
$sql_meet="select count(*) from meet where user_account='$meet_account';";
$sql_leaved="select count(*) from leaved where user_account='$meet_account';";
$result_ever=mysqli_query($mysqli,$sql_ever);
$result_meet=mysqli_query($mysqli,$sql_meet);
$result_leaved=mysqli_query($mysqli,$sql_leaved);
$num_ever=0;
$num_meet=0;
$num_leaved=0;
if($result_ever->num_rows>0){
    while($row=$result_ever->fetch_assoc()){
        //echo $row["count(*)"];
        $num_ever=$row["count(*)"];
    }
}
if($result_meet->num_rows>0){
    while($row=$result_meet->fetch_assoc()){
        //echo $row["count(*)"];
        $num_meet=$row["count(*)"];
    }
}
if($result_leaved->num_rows>0){
    while($row=$result_leaved->fetch_assoc()){
        //echo $row["count(*)"];
        $num_leaved=$row["count(*)"];
    }
}
if($num_leaved==1){
	$sql_str = "select* from leaved where user_account='$meet_account';";
if($rs = mysqli_query($mysqli,$sql_str)){
    //echo '成功';
    if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
        
        echo $row["say"]."<br>";
    }
}
}else{
    echo "出现未知错误，请联系技术人员：\nfwu582579@gmail.com";
}
}

if($num_meet==1){
	$sql_str = "select* from meet where user_account='$meet_account';";
if($rs = mysqli_query($mysqli,$sql_str)){
    //echo '成功';
    if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
    	echo "TA的名字<br>：<br><br>";
        echo "相遇时间：<br>".$row["meet_time"]."<br><br>";
        echo "相遇地点：<br>".$row["meet_place"]."<br><br>";
        echo "我们之间：<br>".$row["meet_story"]."<br><br>";
    }
}
}else{
    echo "出现未知错误，请联系技术人员：\nfwu582579@gmail.com";
}
}

if($num_ever==1){
	$sql_str = "select* from ever where user_account='$meet_account';";
if($rs = mysqli_query($mysqli,$sql_str)){
    //echo '成功';
    if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
        
        //echo "想对她说:".$row["say"]."<br>";
        echo "TA的名字：<br>".$row["itsname"]."<br><br>";
        $wy=$row["itsphoto"];
        echo "TA的容颜：<br>"."<img src='".$wy."' height='60px' width='60px' border='1px solid red'>"."<br><br>";
        echo "心动瞬间：<br>".$row["move"]."<br><br>";
        echo "后来我们如何错过？<br>".$row["miss"]."<br><br>";
        echo "最想对TA说的话：<br>".$row["words"]."<br><br>";

    }
}
}else{
    echo "出现未知错误，请联系技术人员：\nfwu582579@gmail.com";
}
}
?>
<label>想看看你与TA的<a href="fuqixiang.html">夫妻相</a>吗？</label>
</body>
</html>
