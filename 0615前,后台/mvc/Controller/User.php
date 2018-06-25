<?php 
namespace controller;
use controller\Controller;
use model\Db;
class User extends Controller
{
    public function index()
    {
        $pdo = new DB();
        $sql = $pdo->selectAll("consult");
        $this->assign('data',$sql);
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
        $id = $_GET['id'];
        $pdo = new DB();
        $sql = $pdo->select('consult',"`id`='$id'");
        $this->assign('data',$sql);
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