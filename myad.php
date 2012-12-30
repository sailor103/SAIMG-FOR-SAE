<?php
session_start();
$_SESSION['username']=!empty($_SESSION['username']) ? $_SESSION['username'] : null;
if ($_SESSION['username']==""){
  header("Location:login.php");
}
//验证page
if(isset($_GET['page'])&&is_numeric($_GET['page']))
{
	$page=intval($_GET['page']);    
}
else
{
	$page=1;
}
include_once 'conn.php';
mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
mysql_query("SET CHARACTER_SET_RESULTS=utf8"); 
date_default_timezone_set("PRC");
//每页显示数据    
$num=11;         
$total=mysql_num_rows(mysql_query("select `diskname` from `filelist`")); 
$pagenum=ceil($total/$num);      
//假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
if($page>$pagenum || $page <= 0)
{
	header("Location:myad.php"); 
}
//(传入的页数-1) * 每页的数据 得到limit第一个参数的值
$offset=($page-1)*$num;         
//获取相应页数所需要显示的数据
$info=mysql_query("select * from `filelist` order by `diskname` DESC limit $offset,$num");   
while($it=mysql_fetch_array($info))
{
   $tem[]=array($it['host'],$it['filename'],$it['diskname']);
}                                                              
//分页信息
$pre=$page-1;
$nex=$page+1;
?>  
<!DOCTYPE HTML>
<head>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8" />
<title>SAIMG图片管理</title>
<link rel="shortcut icon" href="/images/favicon.ico"/>
<link rel="stylesheet" href="saimgcon.css" type="text/css"/>
<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/**
	 * 删除一张图片
	 */
	$(".item_del").live("click",function(){
		var v_mid=$(this).attr("id");
		var tem_this=$(this);
		$.ajax({
		  url:"delpic.php",
		  type:'post',
		  data:{id:v_mid},
		  dataType:'json',
		  success:function(resp){
			if(resp['status']=="yes")
			{
			  tem_this.parent().remove();
			}
			else
			{
			  alert(resp['msg']);
			}
		  }
		});
	});
});

</script>
</head>
<body>
<!--header-->
<div id="header">
	<div class="headbtn">
		<a id="head_man" href="index.php">上传图片</a>
	</div>
	<div class="headbtn">
		<a href="loginout.php">退出登录</a>
	</div>
	<form id="saimgser" method="get" action="/search.php">
		<input id="sercon" type="text" value="" name="search">
		<input id="serbtn" type="submit" value="搜索">
	</form>
</div>
<div id="picbox">
<?php foreach($tem as $item):?>
<div class="picitem">
<img src="<?php echo $item[0]?>">
<input type="text" value="<?php echo $item[0]?>"/>
<span>图片名称：<?php echo $item[1];?></span>
<a class="item_del" id="<?php echo $item[2];?>" href="javascript:void(0);">删除</a>
</div>
<?php endforeach;?>
<div id="pagenav">
<?php
if($pre>=1)
{
	$prepage="<a style=\"float:left;\" href=\"myad.php?page=$pre\">上一页</a>";
	echo $prepage;
}
if($nex<=$pagenum)
{
	$nexpage="<a style=\"float:right;\" href=\"myad.php?page=$nex\">下一页</a>";
	echo $nexpage;
}
?>
</div>
</div>
</body>
</html>
