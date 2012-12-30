<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>登录_SAIMG</title>
<link rel="shortcut icon" href="/images/favicon.ico"/>
<link rel="stylesheet" href="saimg.css" type="text/css"/>
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("#submit").click(function(){
			var user=$.trim(username.value);
			var pwd=$.trim(userpass.value);
			if(user!=""&&pwd!="")
			{
				$.ajax({
				url:'logincheck.php',
				type:'post',
				dataType:'json',
				data:{username:user,userpass:pwd},
				success:function(resp){
					if(resp['status']==='yes')
					{
						location='index.php';
					}
					else
					{
						document.getElementById("result").innerHTML=resp['msg'];
					}
				}	
				});
			}			
			else
			{
				document.getElementById("result").innerHTML="用户名密码不允许为空";
			}	
		});
	});
	function reset()
	{
		username.value="";
		userpass.value="";
		result.innerHTML="";
	}
</script>

</head>
<body>
<div id="title">
<h1>SAIMG图床管理系统</h1>
</div>
<div id="login" name="login">
<div id="top">
<img src="images/login.png" >
</div>
			<div id = "user">
					<div id="lg-un">
						<label class="text" for="username">用户:</label><input name="username" type="text" class="input" id="username" required="required" placeholder="用户名"/>
					</div>
					<div id="lg-pw">
						<label class="text" for="userpass">密码:</label><input name="userpass" type="password" class="input" id="userpass" required="required" placeholder="用户密码"/>
					</div>
					<div id="but">
							<input type="submit" name="Submit" value="提交" class="button" id="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="reset" name="Submit2" value="重置" class="button" onclick="reset();"/>
					</div>
					<div id="result"></div>
			</div>
</div>

</body>
</html>
