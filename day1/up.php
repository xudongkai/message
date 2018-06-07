<?php 
header("content-type:text/html;charset=utf-8");

include_once "./single.class.php";

$id=$_POST['id'];
$data=$_POST;
$data['times']=time("Y-m-d H:i:s");
$db=Single::getIns();
$res=$db->update('mess',$id,$data);
// var_dump($arr);die;
if ($res) {
	echo "<script>alert('修改成功!');location.href='show.php'</script>";
}else{
	echo "<script>alert('修改失败!');location.href='show.php'</script>";
}

 ?>