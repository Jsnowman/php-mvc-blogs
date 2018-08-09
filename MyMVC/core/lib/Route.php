<?php
namespace core\lib;


class Route{
	public $ctrl;
	public $action;
	public $get;
	public function __construct($ctrl,$action){//该构造方法中的值为配置文件中配置的
		/*
			1隐藏index.php
			2获取URL参数部分
			3返回对应的控制器和方法
			4获取get参数 存储在变量中
			5 加载控制器文件 如果不存在则加载默认
		*/
		//获取URL地址
		
		$a = $_SERVER['PHP_SELF'];// /MyMVC/index.php/asdasd/sadas'
		$b = $_SERVER['SCRIPT_NAME'];//'/MyMVC/index.php'
		$c = str_replace($b,'', $a);//替换后的url
        //如果之后没有参数 使用默认的
		if($c=='/'){
			$this->ctrl = ucfirst($ctrl);
			$this->action = $action;
		}else{
			//取出值
			$arr = explode('/', trim($c,'/'));
			//var_dump($arr);
			if(isset($arr[0])){
				$this->ctrl = ucfirst($arr[0]);
			}else{
				$this->ctrl = $ctrl;
				
			}
			if(isset($arr[1])){
				$this->action = $arr[1];
			}else{
				$this->action = $action;
			}

			//拼接一下控制器路径  检查是否存在 存在就设置控制器和方法设置  不存在使用默认
			$ctrlfile = APP.'/ctrl/'.ucfirst($this->ctrl).'Ctrl.php';//控制器文件路径

			if(is_file($ctrlfile)){
				//include $ctrlfile;
			}else{
				$this->ctrl = ucfirst($ctrl);
				$this->action = $action;
				//$ctrlfile = APP.'/ctrl/'.ucfirst($ctrl).'Ctrl.php';//如果控制器不存在则 加载配置文件中默认的配置
				//include $ctrlfile;
			}
			//var_dump($ctrlfile);


			if (isset($arr[2])&&count($arr)%2==0)//如果存在第三个数据,并且总数为偶数,就认为后面的是get请求的数据
			{
				for ($k = 2; $k < count($arr); $k=$k+2)
				{
					$this->get[$arr[$k]] = $arr[$k+1];
				}
			}

		}
	}
}
