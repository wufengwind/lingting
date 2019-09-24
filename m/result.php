<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>从数据库读出</title>
</head>
<body>
<?php
function connectDb()
{
    $link = mysqli_connect("localhost", "root", "wf1105yz0418");
    if ($link) {
        //echo "数据库连接成功！".'<br/>';
        mysqli_select_db($link, 'lingting');//选择要访问的数据库
        mysqli_query($link, "SET NAMES 'utf8'");//在选择数据库表前，防止中文在浏览器中查看乱码
 
 
    } else {
        echo mysqli_error($link);
    }
    return $link;
}
 
 
$link = connectDb();
$result = mysqli_query($link, "SELECT * FROM users");
$dataCount = mysqli_num_rows($result);//返回指定数据库表中数据的行数
 
echo "<table style=' text-align: center' border='2'>
        <tr><th>头像</th><th>用户名</th></tr>";
for ($i = 0; $i < $dataCount; $i++) {
    $result_arr = mysqli_fetch_assoc($result);//返回表中每条数据的具体内容
    $icon=$result_arr['icon'];
    $name = $result_arr['name'];
    echo "<tr>"?>
    <td><img src='<?php echo $icon ?>' height="60px" width="60px" border="1px solid red"></td>
    <?php echo "<td>$name</td></tr>";
}
echo "</table>";
?>
</body>
</html>

