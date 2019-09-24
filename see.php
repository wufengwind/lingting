<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>聆听——浏览</title>
</head>
<body>
<?php
session_start();
include "conn.php";
$sql_str = "select* from meet";

$rs = mysqli_query($mysqli,$sql_str);
if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
    	$acc=$row['user_account'];
    	$sql_name="select user_name from user_info where user_account='$acc';";
    	$result_name=mysqli_query($mysqli,$sql_name);
    	if($result_name->num_rows>0){
    		while ($row_name=$result_name->fetch_assoc()) {
    			# code...
    			$na=$row_name["user_name"];
    		}
    	}
        echo "昵称:".$na." <br>";
        echo "TA的故事:".$row["meet_story"]." <br>";
        echo '<a href="seeone.php?id='.$row["user_account"].'">TA的主页</a>';
        echo "<br><br>";
    }
}

$sql_str = "select* from ever";

$rs = mysqli_query($mysqli,$sql_str);
if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
    	$acc=$row['user_account'];
    	$sql_name="select user_name from user_info where user_account='$acc';";
    	$result_name=mysqli_query($mysqli,$sql_name);
    	if($result_name->num_rows>0){
    		while ($row_name=$result_name->fetch_assoc()) {
    			# code...
    			$na=$row_name["user_name"];
    		}
    	}
        echo "昵称:".$na." <br>";
        echo "TA的故事:".$row['miss']." <br>";
        echo '<a href="seeone.php?id='.$row["user_account"].'">TA的主页</a>';
        echo "<br><br>";

 }}       
$sql_str = "select* from leaved";

$rs = mysqli_query($mysqli,$sql_str);
if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
    	$acc=$row['user_account'];
    	$sql_name="select user_name from user_info where user_account='$acc';";
    	$result_name=mysqli_query($mysqli,$sql_name);
    	if($result_name->num_rows>0){
    		while ($row_name=$result_name->fetch_assoc()) {
    			# code...
    			$na=$row_name["user_name"];
    		}
    	}
        echo "昵称:".$na." <br>";
        echo "TA的故事:".$row["say"]." <br>";
        echo '<a href="seeone.php?id='.$row["user_account"].'">TA的主页</a>';
        echo "<br><br>";
}
}
?>
</body>
</html>