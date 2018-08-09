<?php

		/**
		* 入口文件
		*1 定义常量
		*2 加载函数库
		*3 启动框架
		*/
session_start();
define('GML', str_replace('\\', '/', realpath('./')));//项目的根目录

define('XMM','/MyMVC');//项目在服务器的目录 如果域名直接指向该目录 则设置为'/'


define('CORE', GML.'/core');
define('APP', GML.'/app');
define('DEBUG', true);
define('MODULE', 'app');//
if(DEBUG){
	ini_set('display_error', 'on');
}else{
	ini_set('display_error', 'off');
}
include CORE.'/common/function.php';
include CORE.'/MyMVC.php';


spl_autoload_register('\core\MyMVC::load');//如果类未找到则执行该方法
\core\MyMVC::run();
















