
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>读入数据库</title>
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
 
//上传头像处理
//限制上传.gif 或 .jpeg 类型图片并小于 200 kb
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 200000)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "E:\\xampp\htdocs\dashboard\love\love\m\image/" . $_FILES["file"]["name"]);
 
        $icon_tem = "image/" . $_FILES["file"]["name"];
        $icon_arr = array("$icon_tem");
        $icon = implode($icon_arr);
 
        $name = $_POST['name'];
 
        mysqli_query($link,"INSERT INTO test(icon,name) VALUES ('$icon','$name')");
    }
}
?>
</body>
</html>

