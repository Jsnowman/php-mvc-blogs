<?php
namespace app\model;
use core\lib\Factory;
use core\lib\Page;
use core\lib\Register;
/**
 *
 */
class EssayModel extends \core\lib\Model
{
    //当前页数
    private $page;

    private $pagetype = 'home';
    function getEssayNews()
    {
        //获取页码
        $route = Register::get('route');
        $page = $route->get['page'];
        if(empty($page)||$page<1){
            $page = 1;
            $this->page = $page;
        }


        $this->pagetype = 'news';




        $where = 'isdel = 0';
        $field = 'tid,title,content,addtime,lookcount,dznum';
        $essay_data = $this->field($field)->where($where)->order('addtime desc')->select();
        //var_dump($essay->field($field)->where($where)->select());
        foreach ($essay_data as $key => $value)
        {
            //处理时间格式
            $essay_data[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);

            //简化查处文章内容
            $essay_data[$key]['content'] = mb_substr($value['content'],0,120).'... ...';

            //查询回复数




        }
        return $essay_data;

    }

    function getEssayHots()
    {


        //获取页码
        $route = Register::get('route');
        $page = $route->get['page'];
        if(empty($page)||$page<1){
            $page = 1;
            $this->page = $page;
        }



        $this->pagetype = 'hots';



        $where = 'isdel = 0';
        $field = 'tid,title,content,addtime,lookcount,dznum';
        $essay_data = $this->field($field)->where($where)->order('lookcount desc')->select();
        //var_dump($essay->field($field)->where($where)->select());
        foreach ($essay_data as $key => $value)
        {
            //处理时间格式
            $essay_data[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);

            //简化查处文章内容
            $essay_data[$key]['content'] = mb_substr($value['content'],0,120).'... ...';

            //查询回复数




        }
        return $essay_data;

    }

    function getEssayHome()
    {
        $this->pagetype = 'home';

        //从注册树中拿到路由解析类娶到url中的数据
        $route = Register::get('route');
        $page = $route->get['page'];
        if(empty($page)||$page<1){
            $page = 1;
            $this->page = $page;
        }

        //var_dump($page*(10-1));

        $where = 'ishome = 1 and isdel = 0';

        $field = 'tid,title,content,addtime,lookcount,dznum';
        $essay_data = $this->field($field)->where($where)->limit(10*($page-1).',10')->select();
        //var_dump($essay->field($field)->where($where)->select());
        if (!empty($essay_data)){
            foreach ($essay_data as $key => $value)
            {
                //处理时间格式
                $essay_data[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);

                //简化查处文章内容
                $essay_data[$key]['content'] = mb_substr($value['content'],0,120).'... ...';

                //查询回复数




            }
        }

        return $essay_data;

    }


    function getEssayAll()
    {



        //获取页码
        $route = Register::get('route');
        $page = $route->get['page'];
        if(empty($page)||$page<1){
            $page = 1;
            $this->page = $page;
        }



        $this->pagetype = 'all';


        $where = '';

        $field = 'tid,title,content,ishome,isdel,addtime,dznum';
        $essay_data = $this->field($field)->select();

        foreach ($essay_data as $key => $value)
        {

            $essay_data[$key]['content'] = mb_substr($value['content'],0,40).'... ...';
            $essay_data[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);

        }


        return $essay_data;
    }


    function getSearch($str)
    {
        //获取页码
        $route = Register::get('route');
        $page = $route->get['page'];
        if(empty($page)||$page<1){
            $page = 1;
            $this->page = $page;
        }


        $this->pagetype = 'search';


        $where = 'title like \'%'.$str.'%\' and isdel = 0';

        $field = 'tid,title,content,lookcount,ishome,isdel,addtime,dznum';
        $essay_data = $this->where($where)->field($field)->select();
        if(empty($essay_data)){
            return false;
        }
        foreach ($essay_data as $key => $value)
        {

            $essay_data[$key]['content'] = mb_substr($value['content'],0,40).'... ...';
            $essay_data[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);
            //查询回复数


        }


        return $essay_data;
    }

    /**
     * @return bool 获取指定id的文章
     */
    function getEssay()
    {
        $route = Register::get('route');
        $tid = $route->get['tid'];
        if (empty($tid))
        {
            return false;
        }

        $field = 'tid,title,content';
        $where = 'tid='.$tid;
        $this->where($where)->update('lookcount=lookcount+1');
        //var_dump($this->sql);
        $essay_data = $this->where($where)->field($field)->select();
        return $essay_data[0];

    }





    //获取页码
    function getPage($qz='index/index/')
    {
        //获取文章数量
        if($this->pagetype=='news'){
            $num = $this->where('isdel=0')->count('tid');
        }
        if($this->pagetype=='hots'){
            $num = $this->where('isdel=0')->count('tid');
        }
        if($this->pagetype=='home'){
            $num = $this->where('isdel=0 and ishome = 1')->count('tid');
        }
        if($this->pagetype=='all'){
            $num = $this->count('tid');
        }
        if($this->pagetype=='search'){

            $num = $this->count('tid');
        }
        //已经获取当前类型文章数量
        //var_dump($num);
        //一共多少页
        $pageNum = ceil($num/10);
        //如果总页数小于10页
        if($pageNum<10){
            for ($i=1;$i<=$pageNum;$i++)
            {
                $page[$i]['a']=$qz.'page/'.$i.'/';
                $page[$i]['p']=$i;
            }
        }else{
            //如果当前页数小于5则显示前10页
            if ($this->page<5)
            {
                for ($i=1;$i<=10;$i++)
                {
                    $page[$i]['a']=$qz.'page/'.$i.'/';
                    $page[$i]['p']=$i;
                }
            }else{
                //如果当前页数小于最后一页-5 则显示前后十页
                if($this->page<$pageNum-5){
                    for ($i=0;$i<10;$i++)
                    {
                        $page[$i]['a']=$qz.'page/'.($this->page-$i-5).'/';
                        $page[$i]['p']=$this->page-$i-5;
                    }
                }else{
                    //否则显示最后十页
                    for ($i=0;$i<10;$i++)
                    {
                        $page[$i]['a']=$qz.'page/'.($num-$i-10).'/';
                        $page[$i]['p']=$num-$i-10;

                    }
                }
                //如果不小于5则显示当前页前5页
            }
        }

        //var_dump($page);
        return $page;
    }

}