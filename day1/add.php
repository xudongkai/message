<?php 
header("content-type:text/html;charset=utf-8");

include_once "./single.class.php";

$data = $_POST;

// var_dump($mess);die;
$data['time'] = time("Y-m-d H:i:s");
// var_dump($data);die;
$db = Single::getIns();
$res = $db->insert('mess',$data);
// var_dump($res);die;
if ($res) {
	echo "<script>alert('添加成功');location.href='show.php'</script>";
}else{
	echo "<script>alert('添加失败');location.href='message.html'</script>";
}


 ?>