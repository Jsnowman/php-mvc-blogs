<?php
namespace app\ctrl;

use core\lib\Controller;
use core\lib\Factory;
use core\lib\Register;

class AdminCtrl extends Controller//继承控制器的抽象类
{
    function __construct($controller_name, $view_name)
    {
        parent::__construct($controller_name, $view_name);
        if(empty($_SESSION['uid'])){
            alertMes('',XMM.'/index/index');
            exit;
        }
    }

    function index()
    {
        //获取天气
        if (empty($_SESSION['weather']))
        {
            $weather = new \core\common\WeatherAPI();
            $weatherdata = $weather->getWeather();
            $data['weather'] = $weatherdata;
            $_SESSION['weather']=$weatherdata;
        }else{
            $weatherdata = $_SESSION['weather'];
            $data['weather'] = $weatherdata;
        }


        //查到访问次数

        $count = Factory::getObj('count');
        $lookcount = $count->getCount();
        $data['lookcount'] = $lookcount;
        $count->countUpdate();


        $essay = Factory::getObj('essay');
        $common = Factory::getObj('common');

        $essay_data = $essay->getEssayAll();


        $page = $essay->getPage('admin/index/');
        //获取右边信息
        $right_data = $common->getRight();


        $data['page'] = $page;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];
        $data['essay_data'] = $essay_data;
        $this->assign($data);
        $this->display('index');
    }


    //博文添加
   function addEssay()
   {

       //var_dump($_POST);
       if(!isset($_POST)){
           alertMes('',XMM.'/index/index');
       }
       if(empty($_POST['title'])){
           alertMes('标题不能为空',XMM.'/admin/fbw');
       }

       $data['title'] = $_POST['title'];
       $data['content'] = $_POST['content'];
       $data['addtime'] = time();

       $essay = Factory::getObj('essay');
       $essay->insert($data);
       alertMes('发表成功',XMM.'/index/news');

   }
    //展示发博文页面
   function fbw()
   {
       $data = array();
       $this->assign($data);
       $this->display();
   }
    //日记管理块开始
    function diary()
    {
        $diary = Factory::getObj('diary');
        $diary_data = $diary->getDiary();
        //echo $diary->sql;
        //var_dump($diary_data);
        $data['diary_data'] = $diary_data;
        $this->assign($data);
        $this->display();
    }


    function updatediary()
    {
        var_dump($_POST);
        if(empty($_POST['title'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['time'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['sequence'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['content'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }

        $data['title'] = $_POST['title'];
        $data['time'] = $_POST['time'];
        $data['sequence'] = $_POST['sequence'];
        $data['content'] = $_POST['content'];

        $diary = Factory::getObj('diary');
        $a =  $diary->where('id='.$_POST['id'])->update($data);
        //var_dump($a);
        alertMes('成功',XMM.'/admin/diary');

    }

    function deldiary()
    {
        $route = Register::get('route');
        $did = $route->get['did'];
        if(empty($did)){
            alertMes('异常',XMM.'/admin/diary');
        }
        $diary = Factory::getObj('diary');
        $diary->where('id='.$did)->delete();
        alertMes('删除成功',XMM.'/admin/diary');

    }


    function adddiary()
    {

        //var_dump($_POST);
        if(empty($_POST['title'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['time'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['sequence'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }
        if(empty($_POST['content'])){
            alertMes('信息不完整',XMM.'/admin/diary');
        }

        $data['title'] = $_POST['title'];
        $data['time'] = $_POST['time'];
        $data['sequence'] = $_POST['sequence'];
        $data['content'] = $_POST['content'];

        $diary = Factory::getObj('diary');
        $a =  $diary->insert($data);
        //var_dump($a);
        alertMes('成功',XMM.'/admin/diary');

    }



    //添加到首页
   function addHome()
   {
       $essay = Factory::getObj('essay');
       $route = Register::get('route');
       $tid = $route->get['tid'];
       $essay->where('tid='.$tid)->update(['ishome'=>1]);
       //var_dump($essay->sql);
       alertMes('',XMM.'/admin/index');
   }
    //从首页删除
   function selectHome()
   {
       $essay = Factory::getObj('essay');
       $route = Register::get('route');
       $tid = $route->get['tid'];
       $essay->where('tid='.$tid)->update(['ishome'=>0]);
       alertMes('',XMM.'/admin/index');
   }
    //删除文章
   function select()
   {
       $essay = Factory::getObj('essay');
       $route = Register::get('route');
       $tid = $route->get['tid'];
       $essay->where('tid='.$tid)->update(['isdel'=>1]);
       alertMes('',XMM.'/admin/index');
   }
    //撤销 删除
   function cxselect()
   {
       $essay = Factory::getObj('essay');
       $route = Register::get('route');
       $tid = $route->get['tid'];
       $essay->where('tid='.$tid)->update(['isdel'=>0]);
       alertMes('',XMM.'/admin/index');
   }


}