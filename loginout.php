<?php
//注销登录
session_start();
$_SESSION['username']="";
header("Location:index.php");
?>
