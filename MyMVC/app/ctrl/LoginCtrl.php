<?php
namespace app\ctrl;

use core\lib\Controller;
use core\lib\Factory;

class LoginCtrl extends Controller//继承控制器的抽象类
{
    function login()
    {

        $username = $_POST['uname'];
        $password = md5($_POST['pwd']);
        if(!$this->check($username)){
            var_dump($_SERVER['HTTP_REFERER']);
            alertMes('用户名非法',XMM.'/index/index');
            exit;
        }
        $user = Factory::getObj('user');
        $where = 'username = \''.$username.'\' and password =\''. $password.'\'';
        //var_dump($where);

        $r = $user->where($where)->select();
        if (empty($r)) {
            alertMes('用户名或密码错误',XMM.'/index/index');
            exit;
        }
        //echo $user->sql;
        //var_dump($r);
        $_SESSION['uid'] = $r[0]['uid'];
        $_SESSION['username'] = $r[0]['username'];

        alertMes('',XMM.'/index/index');

        
        
    }
    
    function outLogin()
    {
        session_destroy ();
        alertMes('',XMM.'/index/index');
    }

    private function check($str)
    {
        $zz = '/\W/';
        if(strlen($str)<4||strlen($str)>20||preg_match($zz,$str)){
            return false;
        }else{
            return true;
        }
    }




}