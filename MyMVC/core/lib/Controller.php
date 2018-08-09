<?php
/**
 * 所有控制器的父类
 * 控制器继承这个类就可以使用装饰器功能
 */
namespace core\lib;

abstract class Controller
{
    protected $data;
    protected $controller_name;//这里存储的是控制器和方法的名字 在调用模版的时候用
    protected $view_name;

    protected $template_dir;

    function __construct($controller_name, $view_name)
    {
        $this->controller_name = $controller_name;
        $this->view_name = $view_name;
        $this->template_dir = APP.'/views/';//模版文件的所在目录




    }

    function assign($data)//把传给模版的数据存储在
    {
        $this->data = $data;
    }

    function display($view_name='')//调用模版的函数
    {
        if(!empty($view_name)){
            $this->view_name = $view_name;
        }

        //调用模版引擎
        $file = $this->controller_name.'/'.$this->view_name.'.php';
        //var_dump($file);
        $v = new \core\lib\Tpl();
        $v->assign($this->data);
        $v->display($file);


        //$file =  $this->template_dir.$this->controller_name.'/'.$this->view_name.'.php';
        /*
        if(is_file($file)){
            $data = $this->data;
            include $file;
        }else{
            var_dump( '模版文件不存在');
        }
        */
    }

    function __call(string $function_name, array $arguments)//如果调用的方法不存在则调用此函数
    {
        var_dump('调用的控制器方法'.$function_name.'不存在');
    }
}