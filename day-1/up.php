<?php 
header("content-type:text/html;charset=utf-8");

mysql_connect('127.0.0.1','root','root');
mysql_select_db("shiyi");
mysql_query("set names utf8");
$id=$_POST['id'];
$mess=isset($_POST['mess'])?$_POST['mess']:"";
$date=time("Y-m-d H:i:s");
$sql="update mess set `mess`='$mess',`times`='$date'";
$data=mysql_query($sql);
if ($data) {
	echo "<script>alert('修改成功!');location.href='show.php'</script>";
}else{
	echo "<script>alert('修改失败!');location.href='show.php'</script>";
}

 ?>