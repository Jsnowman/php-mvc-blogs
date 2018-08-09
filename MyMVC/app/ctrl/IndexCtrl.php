<?php

namespace app\ctrl;
use core\lib\Controller;
use core\lib\Factory;
use core\lib\Register;


class indexCtrl extends Controller
{


    //获取首页内容
	public function index()
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
        //var_dump($weatherdata);



        $essay = Factory::getObj('essay');
        $common = Factory::getObj('common');


        //每一次请求更新一次访问次数
        $count = Factory::getObj('count');
        $count->countUpdate();
        $lookcount = $count->getCount();
        $data['lookcount'] = $lookcount;


        //获取主页面数据
        $essay_data = $essay->getEssayHome();
        $page = $essay->getPage('index/index/');
        //获取右边信息
        $right_data = $common->getRight();
        //var_dump($page);
        $data['page'] = $page;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];
        $data['essay_data'] = $essay_data;
        $this->assign($data);
		$this->display('');
	}
    //获取最热内容
    public function hots()
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
        $count = Factory::getObj('count');
        $lookcount = $count->getCount();
        $data['lookcount'] = $lookcount;
        $count->countUpdate();


        $essay = Factory::getObj('essay');
        $common = Factory::getObj('common');

        $essay_data = $essay->getEssayHots();
        $page = $essay->getPage('index/hots/');
        //获取右边信息
        $right_data = $common->getRight();


        $data['page'] = $page;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];
        $data['essay_data'] = $essay_data;
        $this->assign($data);
        $this->display('index');
    }
    //获取最新内容
    public function news()
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



        $count = Factory::getObj('count');
        $lookcount = $count->getCount();
        $data['lookcount'] = $lookcount;
        $count->countUpdate();

        $essay = Factory::getObj('essay');
        $common = Factory::getObj('common');

        $essay_data = $essay->getEssayNews();
        $page = $essay->getPage('index/news/');
        //获取右边信息
        $right_data = $common->getRight();


        $data['page'] = $page;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];

        //获取文章信息
        $data['essay_data'] = $essay_data;
        $this->assign($data);
        $this->display('index');
    }


    //查看关于
    function about()
    {
        $diary = Factory::getObj('diary');
        $diary_data = $diary->getDiary();
        //echo $diary->sql;
        //var_dump($diary_data);
        foreach ($diary_data as $key=>$value){
            $diary_data[$key]['style'] = $value['sequence']%3+1;
        }
        $data['diary_data'] = $diary_data;
        $this->assign($data);
        $this->display();
    }


    //查看帖子内容

    public function look()
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



        //拿到右边数据
        $common = Factory::getObj('common');
        $right_data = $common->getRight();


        //拿到文章数据
        $essay = Factory::getObj('essay');
        $essay_data = $essay->getEssay();

        //var_dump($essay_data);


        $data['essay_data'] = $essay_data;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];
        $this->assign($data);
        $this->display();

    }


    public function search()
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

        $ss = $_POST['ss'];
        $ss = trim($ss);
        if(empty($ss)){
            alertMes('搜索条件不能为空',XMM.'/index/index');
        }
        $essay_data = $essay->getSearch($ss);
        //var_dump($essay->sql);
        $page = $essay->getPage('index/news/');
        //获取右边信息
        $right_data = $common->getRight();


        $data['page'] = $page;
        $data['rigth_news'] = $right_data['news'];
        $data['rigth_hots'] = $right_data['hots'];

        //获取文章信息
        $data['essay_data'] = $essay_data;
        $this->assign($data);
        $this->display('index');
    }


    public function addZan()
    {
        $route = Register::get('route');
        $addtype = $route->get['addtype'];
        $tid = $route->get['tid'];
        if(empty($_SESSION['addnum_'.$tid])){

            $essay = Factory::getObj('essay');

            if($addtype == 1){
                $essay->where('tid='.$tid)->update('dznum = dznum+1');
            }else{
                $essay->where('tid='.$tid)->update('dznum = dznum-1');
            }
            //var_dump($essay->sql);
            $_SESSION['addnum_'.$tid] = 'en';
            alertMes('',XMM.'/index/look/tid/'.$tid);
        }else{
            alertMes('你已经点过赞了',XMM.'/index/look/tid/'.$tid);
        }




    }


	
}