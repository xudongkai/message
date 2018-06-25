<?php 
namespace Controller\admin;
use Controller\Controller;
use Model\DB;
class Article extends Controller
{
    //资讯管理
    public function article_list()
    {
        $pdo = new DB();
        $sql = $pdo->show('consult','classify',"consult.column=classify.column_id");
        
        // var_dump($data);die;
        $this->assign('data',$sql);
        
        $this->display('admin/Article/article_list');
    }
    //添加资讯
    public function article_add()
    {
        $pdo = new DB();
        $arr = $pdo->selectAll('classify');
        $data = $pdo->selectAll('art_type');
        $this->assign('arr',$arr);
        $this->assign('data',$data);
        $this->display('admin/Article/article_add');
    }
    public function insert()
    {
        $data = $_POST;
        // var_dump($data);die;
        $pdo = new DB();
        $sql = $pdo->insert('consult',$data);
        // var_dump($sql);die;
        if ($sql) {
            echo "<script>alert('添加成功!');location.href='index.php?c=admin\\\Article&a=article_list'</script>";
        }else{
            echo "<script>alert('添加失败!');location.href='index.php?c=admin\\\Article&a=article_add'</script>";
        }
    }
    //删除
     public function delete()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $pdo = new DB(); 
        $sql = $pdo->delete('consult',"`id`='$id'");
        if ($sql) {
            echo "<script>alert('删除成功!');location.href='index.php?c=admin\\\Article&a=article_list'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='index.php?c=admin\\\Article&a=article_list'</script>";
        }
    }
    public function up()
    {
        $id = $_GET['id'];
        $pdo = new DB();
        $sql = $pdo->select('consult',"`id`='$id'");

        $arr = $pdo->selectAll('classify');
        $data = $pdo->selectAll('art_type');
        $this->assign('arr',$arr);
        $this->assign('data',$data);
        // var_dump($sql);die;
        $this->assign('res',$sql);
        $this->display('admin/Article/article_up');
    }
    public function update()
    {
        $data = $_POST;
        $pdo = new DB();
        $sql = $pdo->update('consult',$data,"`id`={$data['id']}");
        // var_dump($sql);die;
        if ($sql) {
            echo "<script>alert('修改成功!');location.href='index.php?c=admin\\\Article&a=article_list'</script>";
        }else{
            echo "<script>alert('修改失败!');location.href='index.php?c=admin\\\Article&a=up'</script>";
        }
    }
}