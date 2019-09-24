<?php
if(isset($_FILES['imgfile'])&&is_uploaded_file($_FILES['imgfile']['tmp_name'])){
	$imgFile=$_FILES['imgfile'];
	$upErr=$imgFile['error'];
	if($upErr==0){
		$imgType==$imgFile['type'];
		if($imgType=='image/jpeg' or $imgType='image/jpg' or $imgType='image/png'){
			$imgFileName=$imgFile['name'];
			$imgSize=$imgFile['size'];
			$imgTmpFile=$imgFile['tmp_name'];
			move_uploaded_file($imgTmpFile, 'upfiles/'.$imgFileName);
		}
		else{
			switch ($upErr) {
				case 1:
					# code...
				    echo "1";
					break;
				case 2:
					# code...
					echo "2";
					break;
				case 3:
					echo "3";
					break;
				case 4:
					echo "4";
					break;
				case 5:
					echo "5";
				
					# code.
					
					break;
			}
		}
	}
}
else{
	echo "文件上传失败";
}
?>
