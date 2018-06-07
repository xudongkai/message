<?php 
header("content-type:text/html;charset=utf-8");

mysql_connect('127.0.0.1', 'root', 'root');
mysql_select_db("shiyi");
mysql_query("set names utf-8");

$mess=isset($_POST['mess'])?$_POST['mess']:"";
// var_dump($mess);die;
$time=time("Y-m-d H:i:s");
// var_dump($time);die;
$data="insert into mess(`mess`,`time`) values ('$mess','$time')";
// var_dump($data);die;
$res=mysql_query($data);
if ($res) {
	echo "<script>alert('添加成功');location.href='show.php'</script>";
}else{
	echo "<script>alert('添加失败');location.href='message.html'</script>";
}


 ?>