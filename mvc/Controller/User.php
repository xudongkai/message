<?php 
namespace controller;
use controller\Controller;
use model\Db;
class User extends Controller
{
	public function index()
	{
		$this->display('index/index');
	}

	public function cargo()
	{
		$this->display('index/cargo');
	}

	public function cross()
	{
		$this->display('index/cross');
	}

	public function details()
	{
		$this->display('index/details');
	}

	public function regards()
	{
		$this->display('index/regards');
	}

	public function seek()
	{
		$this->display('index/seek');
	}


}
// $user = new User;
// $act = isset($_GET['act'])?$_GET['act']:'login';
// $user->$act();