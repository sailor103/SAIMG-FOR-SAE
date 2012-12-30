<?php
//数据库链接文件
$host=SAE_MYSQL_HOST_M;//数据库服务器
$user=SAE_MYSQL_USER;//数据库用户名
$password=SAE_MYSQL_PASS;//数据库密码
$database=SAE_MYSQL_DB;//数据库名
$port=SAE_MYSQL_PORT;//端口
$storagedomain='img';//SAE Stroage创建的domain名称
$conn=@mysql_connect($host.':'.$port,$user,$password) or die('数据库连接失败！');
@mysql_select_db($database) or die('没有找到数据库！');
?>
