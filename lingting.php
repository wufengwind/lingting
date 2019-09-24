<html>
<head>
    <body>
<?php
header("Content-type:text/html;charset=UTF-8");
$account=$_POST['account'];
$password=$_POST['yourpw'];
setcookie("ccount",$account);
//setcookie("cc")
include "conn.php";
$sql="select * from user_info where user_account='$account';";
$sql_str = "select* from user_info order where user_account='$account';";
$sql_ever="select count(*) from ever where user_account='$account';";
$sql_meet="select count(*) from meet where user_account='$account';";
$sql_leaved="select count(*) from leaved where user_account='$account';";
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
//echo $result_ever.' '.$result_leaved.' '.$result_meet;
$result=mysqli_query($mysqli,$sql) ;
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $dbaccount=$row["user_account"];
        $dbpassword=$row["user_pwd"];
    }
}else{
    ?>
    <script type="text/javascript">
        alert("该用户不存在");
        window.location.href="lingting.html";
    </script>
    <?php
}
if($password==$dbpassword){
    if($num_ever!=0 || $num_leaved!=0 || $num_meet!=0){
    ?>
    <script type="text/javascript">
        window.location.href="person.php";
    </script>
<?php
}else{
?>
    <script type="text/javascript">
        window.location.href="lianaiguoma.html";
    </script><?php } }else { ?>
    <script type="text/javascript">
        alert("密码错误");
        window.location.href="lingting.html";
    </script>
    <?php
}
//$con->close();
?>

</body>
</head>
</html>
