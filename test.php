
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        function attention(){
       
        $.ajax(
        {
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
}
)

    }
    </script>
</head>
<body>

<input type='button' value='我关注的' onclick='attention()'>
</body>
</html>