saimg
========

本项目是基于PHP开发的图床系统
主要特性是图片长传前使用flash压缩，减少服务器压力
本版本是针对新浪SAE的版本
需要在新浪SAE开启Storage

数据库
========
saimg.sql 里面是数据的基本格式

用户登录
========
默认用户名和密码均为admin 

测试地址
========
http://saimg.sinaapp.com/

图床配置
========
图床的配置文件为conn.php
$host=SAE_MYSQL_HOST_M;//数据库服务器
$user=SAE_MYSQL_USER;//数据库用户名
$password=SAE_MYSQL_PASS;//数据库密码
$database=SAE_MYSQL_DB;//数据库名
$port=SAE_MYSQL_PORT;//端口
$storagedomain='img';//SAE Stroage创建的domain名称
