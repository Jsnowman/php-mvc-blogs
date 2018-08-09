<?php
	//打印数据的函数
	function p($v){
		if(is_bool($v)){
			var_dump($v);
		}else if (is_null($v)) {
			var_dump(NULL);
		}else{
			echo "<pre style='position:relative;background:#f5f5f5;'>".print_r($v,true)."</pre>";
		}
	}



    //弹窗提醒函数
    function alertMes($mes=null,$url=null){
        if($mes==null&&$url!=null){
            echo "<script>window.location='{$url}';</script>";
            exit;
        }
        if($url==null&&$mes!=null){
            echo "<script>alert('{$mes}');</script>";
            exit;
        }
        if($mes!=null&&$url!=null){
            echo "<script>alert('{$mes}');</script>";
            echo "<script>window.location='{$url}';</script>";
            exit;
        }

    }