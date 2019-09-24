<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<script type="text/javascript">
		function check(){
			var a=document.getElementById("test").value;
			//alert(a);
			if(a=="")
				return false;
			document.write(a)
		}
		function test(){
			var email = document.getElementById("test").value;
			var pattern= /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
			var strEmail=pattern.test(email);
			if(strEmail){
			//邮箱格式正确
			alert("格式正确");
			}else{
			//邮箱格式不正确
			alert("格式不正确");
			}

		}
	</script>
</head>
<body>
	<input   name="test" id="test">
	<input type="button" onclick="test()" name="">
<?php

?>
</body>
</html>