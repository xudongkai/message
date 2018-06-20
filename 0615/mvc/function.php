<?php 

function C($key)
{
	global $config; 
	return $config[$key];
}

function __autoload($className)
{
	//echo $className;die;
	include './'.$className.'.php';
}

function url($controller,$action,$name=[])
{
	$url = APP_HOST."/mvc/index.php?c=".$controller."&a=".$action;

	if (!empty($name)) {
		foreach ($name as $key => $value) {
			$url .= '&'.$key.'='.$value;
		}
	}
	return $url;
}

function redirect($url)
{
	return APP_HOST.'mvc/public/'.$url;
}

function img($imgSrc)
{
	return APP_HOST.'mvc/Public/img'.$imgSrc;
}

function js($jsSrc)
{
	return APP_HOST.'mvc/Public/js/'.$jsSrc;
}

function css($cssSrc)
{
	return APP_HOST.'mvc/Public/css/'.$cssSrc;
}