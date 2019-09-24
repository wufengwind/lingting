<?php
session_start();
$meet_account = $_GET['id'];
//echo $id;
//echo $row["user_account"];
$x_account="";
if(!empty($_COOKIE["ccount"])){
    $x_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";
//echo $x_account."<br>".$meet_account;
$sql_str = "select* from user_info where user_account='$meet_account';";
$sql_repetition="select count(*) from attention where attention='$meet_account' and user_account='$x_account';";
if($rp=mysqli_query($mysqli,$sql_repetition)){
	$rp_row=$rp->fetch_assoc();
	//echo $rp_row["count(*)"];
}
else
	echo "发生错误";
	//echo "不能重复关注";
		//if($row["count(*)"]>0){
$u_status="";
$u_sex="";
if($rs = mysqli_query($mysqli,$sql_str)){
    //echo '成功';
    if($rs->num_rows>0){
    while ($row=$rs->fetch_assoc()){
        if($row["user_status"]==1)
            $u_status="单身";
        else
            $u_status="恋爱中";
        if($row["user_sex"]==1)
            $u_sex="男";
        else
            $u_sex="女";
        echo "昵称:".$row["user_name"]."<br>";
        //echo "邮箱:".$row["user_account"]."<br>";
        echo "ID:".$row["user_id"]."<br>";
        echo "性别:".$u_sex."<br>";
        echo '感情状态:'.$u_status."<br>";
    
        $wy=$row['user_photo'];
        //echo $wy."<br>";
        echo "照片：<br><img src='".$wy."' height='60px' width='60px' border='1px solid red'>";
        //echo "</div>";
        echo "<br><br>";
        if($rp_row["count(*)"]==0)
        	echo '<a href="attention.php?id='.$row["user_account"].'">关注TA</a>';
        else
        	echo '<a href="unattention.php?id='.$row["user_account"].'">取消关注</a>';
    }
}
}else{
    echo "出现未知错误，请联系技术人员：<br>fwu582579@gmail.com";
}


?>
