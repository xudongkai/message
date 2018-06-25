<?php 
namespace Controller\Admin;
use Controller\Controller;
use Model\DB;
class Admin extends Controller
{
    //添加管理
    public function admin_add()
    {
        $this->display('Admin/Admin/admin_add');
    }
    //修改密码
    public function admin_assword_edit()
    {
        $this->display('Admin/Admin/admin_assword_edit');
    }
    //管理员列表
    public function admin_list()
    {
        $this->display('Admin/Admin/admin_list');
    }
    //权限管理
    public function admin_permission()
    {
        $this->display('Admin/Admin/admin_permission');
    }
    //角色管理
    public function admin_role()
    {
        $pdo = new DB();
        $sql = $pdo->show("role");
        $this->display('Admin/Admin/admin_role');
    }
    //添加角色
    public function admin_role_add()
    {
        $this->display('Admin/Admin/admin_role_add');
    }
    public function insert()
    {
        $data = $_POST;
        // var_dump($data);die;
        $pdo = new DB();
        $sql = $pdo->insert('role',$data);
        if ($sql) {
            echo "<script>alert('添加成功!');location.href='index.php?c=Admin&a=admin_role'</script>";
        } else {
            echo "<script>alert('添加失败!');location.href='index.php?c=Admin&a=admin_add'</script>";
        }
    }
}