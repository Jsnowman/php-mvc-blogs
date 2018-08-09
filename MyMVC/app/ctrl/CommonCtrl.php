<?php

namespace app\ctrl;

use core\lib\Controller;

class commonCtrl extends Controller//继承控制器的抽象类
{
   function getCode()
   {
       echo '获取验证码';
   }
}