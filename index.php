<?php
session_start();
$_SESSION['username']=!empty($_SESSION['username']) ? $_SESSION['username'] : null;
if ($_SESSION['username']==""){
  header("Location:login.php");
}
?>  
<!DOCTYPE HTML>
<head>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8" />
<title>SAIMG图片管理</title>
<link rel="shortcut icon" href="/images/favicon.ico"/>
<link rel="stylesheet" href="saimgcon.css" type="text/css"/>
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	showFlash();
});
//加载上传的flash	
function showFlash() {
	var params = {
		serverUrl: "saveImage.php",
		jsFunction: "flashReturn",
		imgWidth:600,
		imgHeight:600,
		imgQuality:80,
		btnText:'点击上传'
	}
	swfobject.embedSWF("imgZipUpload.swf", "divFlash", "100", "30", "10.0.0", "expressInstall.swf", params);
}

function flashReturn(type, str) {
	if(type == 'error')
	{
		alert(str);
	}
	else if (type == 'complete')
	{
		var imgblocks='<div class="picitem"><img src="'+str+'"><input type="text" value="'+str+'"/><div>'
		$('#uppic').append(imgblocks);
	}
}
</script>
</head>
<body>
<!--header-->
<div id="header">
	<div class="headbtn">
		<a id="head_man" href="myad.php">管理图片</a>
	</div>
	<div class="headbtn">
		<a href="loginout.php">退出登录</a>
	</div>
</div>
<!--上传图片-->
<div id="uppic">
	<div id="divFlash"></div>
</div>

</body>
</html>
