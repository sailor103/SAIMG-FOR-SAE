<?php
if(!isset($_POST['username']) || !isset($_POST['userpass'])) 
{
	header("Location:login.php");
}
//验证登陆信息
session_start();
include_once 'conn.php';
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];
	$userpass=md5($userpass);
	$sql="select * from `user` where `username`='$username'";
	$query=mysql_query($sql);
	$row=mysql_fetch_array($query);
	if ($row['username']==$username){
		if ($row['userpass']==$userpass){
			$_SESSION['username']=$username;
			echo json_encode(array("status"=>"yes","msg"=>"登陆成功"));
		}
		else {
			echo json_encode(array("status"=>"no","msg"=>"登陆密码错误"));
		}
	}
	else {
		echo json_encode(array("status"=>"no","msg"=>"用户不存在"));
	}
?>
