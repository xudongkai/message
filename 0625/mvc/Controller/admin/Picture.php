<?php 
namespace Controller\Admin;
use Controller\Controller;
use Model\DB;
use Model\imag;
class Picture extends Controller
{
    //图片管理
    public function picture_list()
    {
        $pdo = new DB();
        $sql = $pdo->show('image','classify',"image.column=classify.column_id");
        // var_dump($sql);die;
        $this->assign('data',$sql);
        $this->display('Admin/Picture/picture_list');
    }
    //添加图片
    public function picture_add()
    {
        $pdo = new DB();
        $data = $pdo->selectAll('classify');
        // var_dump($data);die;
        $this->assign('data',$data);
        $this->display('Admin/Picture/picture_add');
    }
    public function insert()
    {
        $data = $_POST;
        $data['start'] = date("Y-m-d H:i:s");
        // var_dump($img);die;
        $imae = new imag;
        $data['img'] = $imae->int($_FILES['img']);
        // $data['img'] = $print;

        $pdo = new DB();
        $sql = $pdo->insert('image',$data);
        if ($sql) {
            echo "<script>alert('添加成功!');location.href='index.php?c=admin\\\Picture&a=picture_list'</script>";
        }else{
            echo "<script>alert('添加失败!');location.href='index.php?c=admin\\\Picture&a=picture_add'</script>";
        }
    }
    //删除
    public function delete()
    {
        $id = $_GET['id'];
        $pdo = new DB();
        $sql = $pdo->delete('image',"`id`='$id'");
         if ($sql) {
            echo "<script>alert('删除成功!');location.href='index.php?c=admin\\\Picture&a=picture_list'</script>";
        }else{
            echo "<script>alert('删除失败!');location.href='index.php?c=admin\\\Picture&a=picture_list'</script>";
        }
    }
    public function up(){
        $id = $_GET['id'];
        $pdo = new DB();

        $arr = $pdo->selectAll('classify');
        $this->assign('res',$arr);

        $data = $pdo->select('image',"`id`='$id'");
        // var_dump($data);die;
        $this->assign('data',$data);
        $this->display('Admin/Picture/picture_up');
    }
    public function update()
    {
        $data = $_POST;
        $data['over'] = date("Y-m-d H:i:s");
        $pdo = new DB();
        $imae = new imag;
        $data['img'] = $imae->int($_FILES['img']);
        $sql = $pdo->update('image',$data,"`id`={$data['id']}");
        // var_dump($sql);die;
        if ($sql) {
            echo "<script>alert('修改成功!');location.href='index.php?c=admin\\\Picture&a=picture_list'</script>";
        }else{
            echo "<script>alert('修改失败!');location.href='index.php?c=admin\\\Picture&a=up'</script>";
        }
    }
}