<?php 
namespace core;


class MyMVC{
    public static $config;
	public static $classMap = array();
	static public function run(){
        /*
        $config = new Config(GML.'/configs');
        var_dump($config['controller']);//这样就能拿到controller文件的配置内容
        */

        $config = new \core\lib\Config(GML.'/core/configs');//使用自动配置加载类 拿到配置
		\core\lib\Register::set('config',$config);//把配置对象写入注册树，就可以在项目任意位置获取该对象
		//\core\lib\Log::addcount(123);//日志添加测试
		//var_dump($config['route']);
		//调用路由类解析url
		$route = new \core\lib\Route($config['route']['CTRL'],$config['route']['ACTION']);//把配置文件中的默认加载的控制器和方法传入
		\core\lib\Register::set('route',$route);
        //var_dump($route);
		$ctrlClassName = $route->ctrl;//控制器的名字
		$action = $route->action;//调用的方法


		$ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClassName.'Ctrl';
        $ctrl = new $ctrlClass($ctrlClassName,$action);//创建控制器的对象
        $ctrl->$action($route->get);//执行该控制器的方法
		
    }



	static public function load($class){
		//自动加载类库
		//p($class);
		//p(GML.'/'.$class.'.php');
		$class = str_replace('\\', '/', $class);
		if(isset($classMap[$class])){//判断是否加载过
			return true;
		}else{
			if(is_file(GML.'/'.$class.'.php')){
				//p('加载一次');
				include GML.'/'.$class.'.php';
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
		
	}
}
