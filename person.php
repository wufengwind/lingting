<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        function attention(){
        $.ajax({
    type:"POST",
    url:"attention_button.php",
    data:{
    "user":"admin",
    "password":"123"
},
success:function(data){
    var result=eval("("+data+")");
    //alert(result)
    for(var i = 0;i<result.length;i++)
        //alert(result[i]);
        document.write("<a href='seeone.php?id="+result[i][1]+"'>"+result[i][0]+"</a><br>");
    }

})}
    </script>
	<title>个人主页</title>
    
</head>
<body>
    <div></div>
<?php
$meet_account="";
if(!empty($_COOKIE["ccount"])){
    $meet_account=$_COOKIE["ccount"];
}
else{
    echo "nope";
}
include "conn.php";

$sql_str = "select* from user_info where user_account='$meet_account';";
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
        echo "<a href='story.php'>我的故事</a><br>";
        //echo "<a href='manage.php?do=update'>删除</a>" ;
        echo "<a href='see.php'>随便看看</a><br>";
        echo "<form action='seeone_2.php' method='get'><label>搜索用户</label>";
        echo "<input type='text' id='search' name='id'>";
        echo "<input type='submit' value='确定'></form>";?>

        <input type='button' value='我关注的' onclick='attention()'>
<?php
    }
}
}else{
    echo "出现未知错误，请联系技术人员：<br>fwu582579@gmail.com";
}
?>
</body>
</html>
