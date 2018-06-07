<?php 
header("content-type:text/html;charset=utf-8");

mysql_connect("127.0.0.1",'root','root');
mysql_select_db('shiyi');
mysql_query("set names utf-8");
$id=$_GET['id'];
// var_dump($id);die;
$sql="delete from mess where id in ($id)";
$res=mysql_query($sql);
if ($res) {
	echo " <script>alert('删除成功!');location.href='show.php'</script> ";
}else{
	echo " <script>alert('删除失败!');location.href='show.php'</script> ";
}

// function class test{
// 	$b=2;
// }
 ?>