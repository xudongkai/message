<?php 
namespace Controller\admin;
use Controller\Controller;
use Model\DB;
class Article extends Controller
{
	//资讯管理
	public function article_list()
	{
		$this->display('admin/Article/article_list');
	}
	//添加资讯
	public function article_add()
	{
		$this->display('admin/Article/article_add');
	}
	public function insert()
	{
		$data=$_POST;
		var_dump($data);die;
	}
}