<?php
include_once 'conn.php';
$saefile = new SaeStorage();//storage初始化
date_default_timezone_set("PRC");
$diskname=time().rand(0,9);
//获取flash文件流
$jpg=file_get_contents('php://input');
$headers = apache_request_headers();
if (!empty($jpg))
{
	if($saefile->write($storagedomain,$diskname,$jpg))
	{
		$orname =urldecode($headers["fileName"]);
		$host_sql=$saefile->getUrl ($storagedomain, $diskname);
		//写入数据库
		mysql_query("SET NAMES 'utf8'"); 
		mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
		mysql_query("SET CHARACTER_SET_RESULTS=utf8");
		$sql="INSERT INTO `filelist` (`diskname`,`filename`,`host`) VALUES('$diskname','$orname','$host_sql')";
		if(!mysql_query($sql))
		{
		  echo mysql_error();
		}
		echo $host_sql;
	}	
}
?>