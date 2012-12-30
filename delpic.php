<?php
if(isset($_POST['id']))
{
  include_once 'conn.php';
  $saefile = new SaeStorage();//storage初始化
  $sql="delete from `filelist` where `diskname` = " . $_POST['id'];
  
  if($saefile->fileExists($storagedomain,$_POST['id']))
  {
	if($saefile->delete($storagedomain,$_POST['id']))
	{
		if(!mysql_query($sql))
		{
			echo json_encode(array("status"=>"no","msg"=>"删除失败"));
		}
		else
		{
			echo json_encode(array("status"=>"yes","msg"=>"删除成功"));
		}
	}
	else
	{
		echo json_encode(array("status"=>"no","msg"=>"文件不存在"));
	}
  } 
}
?>
