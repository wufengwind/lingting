<?php
$email=$_POST['Email'];
$pwd=''   ;
/*$confirm='';
$chars='1234567890';
for($i=0;$i<4;$i++){
    $confirm.=$chars[mt_rand(0,strlen($chars)-1)];
} */
include "conn.php";
$sql="select *from user_info where user_account='$email';";
$result=mysqli_query($mysqli,$sql) ;
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $pwd=$row["user_pwd"];
        //$dbpassword=$row["user_pwd"];
    }
}else {
    ?>
    <script type="text/javascript">
        alert("该用户不存在");
        window.location.href = "lingting.html";
    </script>
    <?php
}
shell_exec('python3.5 28.py '.$pwd.' '.$email);
echo "密码已发送至你的邮箱，请及时查收";
?>
