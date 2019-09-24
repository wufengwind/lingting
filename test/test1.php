<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		function test(){
		$.ajax({
	type:"POST",
	url:"test.php",
	data:{
	"user":"admin",
	"password":"123"
},
success:function(data){
	var result=eval("("+data+")");
	//alert(result)
	for(var i = 0;i<result.length;i++)
		//alert(result[i]);
		document.write("<a href='"+result[i][1]+"'>"+result[i][0]+"</a><br>");
}
})}
	</script>
</head>
<body>
	<?php
echo date("now");
	?>
	<?php
	echo '<input type="button" name="" value="测试" onclick="test()">';
	?>
</body>
</html>