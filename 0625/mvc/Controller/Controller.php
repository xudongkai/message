<?php 
namespace Controller;
class Controller
{
	public $assign;
	public function display($action)
	{
		@extract($this->assign);
		include './view/'.$action.'.php';
	}
	public function assign($k,$val)
	{
		$this->assign[$k] = $val;
	}
}