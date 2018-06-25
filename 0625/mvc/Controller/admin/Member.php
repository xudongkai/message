<?php 
namespace Controller\Admin;
use Controller\Controller;
use Model\DB;
class Member extends Controller
{
    //会员列表
    public function member_list()
    {
        $pdo = new DB();
        $sql = $pdo->show('member','m_city',"member.city=m_city.id");
        $this->assign('data',$sql);
        $this->display('Admin/Member/member_list');
    }
    //添加会员
    public function member_add()
    {
        $pdo = new DB();
        $sql = $pdo->selectAll('m_city');
        $this->assign('data',$sql);
        $this->display('Admin/Member/member_add');
    }
    public function insert()
    {
        $data = $_POST;
        $data['time'] = date("Y-m-d H:i:s");
        $data['pwd'] = md5($data['pwd']);
        $names = $data['names'];
        // var_dump($data);die;
        $pdo = new DB();
        $sql = $pdo->select('member',"`names`='$names'");
        $arr = '';
        foreach ($sql as $k => $v) {
            $arr['names'] = $v['names'];
        }
        // var_dump($arr);die;
        if (!$names = $arr['names']) {
            $res = $pdo->insert('member',$data);
            if ($res) {
                echo "<script>alert('添加成功!');location.href='index.php?c=admin\\\Member&a=member_list'</script>";
            } else {
                echo "<script>alert('添加失败!');location.href='index.php?c=admin\\\Member&a=member_add'</script>";
            }
        } else {
            echo "<script>alert('用户已存在!');location.href='index.php?c=admin\\\Member&a=member_add'</script>";
        }
    }
    //删除的会员
    public function member_del()
    {
        $pdo = new DB();
        $sql = $pdo->selectAll('member');
        $this->assign('data',$sql);
        $this->display('Admin/Member/member_del');
    }
    public function delete()
    {
        $id = $_GET['id'];
        var_dump($id);die;
        $pdo = new DB();
        $sql = $pdo->delete('member',$id);
        if ($sql) {
            echo "<script>alert('删除成功!');location.href='index.php?c=admin\\\Member&a=member_del'</script>";
        } else {
            echo "<script>alert('删除失败!');location.href='index.php?c=admin\\\Member&a=member_del'</script>";
        }
    }
    //等级管理
    public function member_level()
    {
        $this->display('Admin/Member/member_level');
    }
    //积分管理
    public function member_scoreoperation()
    {
        $this->display('Admin/Member/member_scoreoperation');
    }
    //浏览记录
    public function member_record_browse()
    {
        $this->display('Admin/Member/member_record_browse');
    }
    //下载记录
    public function member_record_download()
    {
        $this->display('Admin/Member/member_record_download');
    }
    //分享记录
    public function member_record_share()
    {
        $this->display('Admin/Member/member_record_share');
    }

}