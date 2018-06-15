<?php 
namespace controller;
use controller\Controller;
use model\Db;
class Mess
{
	public function insert()
	{
		$data=$_POST;
		// var_dump($data);die;
		include_once '../model/Db.php';
		$db = new DB();
		$data['time']=date("Y-m-d H:i:s");
		$sql=$db->insert('mess',$data);
		// var_dump($sql);die;
		if ($sql) {
			echo "<script>alert('添加成功!');location.href='./index.php?c=message&act=show'</script>";
		}else{
			echo "<script>alert('添加失败!');location.href='./message/age.php'</script>";
		}
	}

	public function show()
	{
		include_once '../model/Db.php';
		$db = new DB();
		$data=$db->selectAll("mess");
		include "../view/message/show.php";
	}

	public function delete()
	{	

		$id=$_GET['id'];
		// var_dump($id);die;
		include_once "../model/Db.php";
		$db = new DB();
		$sql = $db->delete('mess',"`id`=$id");
		// var_dump($sql);die;
		if ($sql) {
			echo "<script>alert('删除成功!');location.href='message.php?act=show'</script>";
		}else{
			echo "<script>alert('删除失败!');location.href='message.php?act=show'</script>";
		}
	}

	public function update()
	{
		$data = $_POST;
		$data['times']=date("Y-m-d H:i:s");
		include_once "../model/Db.php";
		$db = new DB();
		$sql = $db->update('mess',$data,"`id`={$data['id']}");
		if ($sql) {
			echo "<script>alert('修改成功!');location.href='./message.php?act=show'</script>";
		}else{
			echo "<script>alert('修改失败!');location.href='./message.php?act=show'</script>";
		}
	}
}
$name = new Mess;
$act = isset($_GET['act'])?$_GET['act']:'';
$name->$act();