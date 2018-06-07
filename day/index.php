<?php 
header("content-type:text/html;charset=utf-8");

mysql_connect('127.0.0.1', 'root', 'root');
mysql_select_db("shiyi");
mysql_query("set names utf-8");

$name=isset($_POST['name'])?$_POST['name']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
$time=time("Y-m-d H:i:s");

$sql="SELECT * FROM `user` WHERE `names`='$name'";
$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);
if ($arr) {
	if ($arr['pwd']==$pwd) {
		echo "登录成功";
	}else{
		echo "密码错误";
	}
}else{
	echo " <script>alert('用户名不存在!');location.href='index.html'</script>";
 }

 ?>