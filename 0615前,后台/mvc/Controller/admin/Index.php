<?php 
namespace Controller\admin;
use controller\Controller;
use model\Db;
class Index extends Controller
{
    public function index()
    {
        $this->display('admin/Index/login');
    }
    public function login_do(){
        $data=$_POST;
        $names = $data['names'];
        // var_dump($data);die;
        $pdo = new DB();
        $sql = $pdo->select('user',"`names` = '$names'");
        // var_dump($sql);die;
        $res='';
        foreach ($sql as $k => $v) {
            $res['names'] = $v['names'];
            $res['pwd'] = $v['pwd'];
        }
        if ($res['pwd']==$data['pwd']) {
            echo "<script>alert('登录成功!');location.href='index.php?c=admin\\\index&a=show'</script>";
        }else{
            echo "<script>alert('登录失败!');location.href='index.php?c=admin\\\Index&a=index'</script>";
        }
    }
    public function show()
    {
        $this->display('admin/Index/index');
    }
    public function welcome()
    {
        $this->display('Admin/Index/welcome');
    }
    //评论区的意见反馈
    public function feedback_list()
    {
        $this->display('Admin/Index/feedback_list');
    }
}
