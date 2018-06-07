<?php 
header("content-type:text/html;charset=utf-8");
include_once "./single.class.php";

$id = $_GET['id'];
// var_dump($id);die;
$db = Single::getIns();
$res = $db->delete('mess',$id);

if ($res) {
	echo " <script>alert('删除成功!');location.href='show.php'</script> ";
}else{
	echo " <script>alert('删除失败!');location.href='show.php'</script> ";
}

 ?>