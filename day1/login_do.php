<?php 
header("content-type:text/html;charset=utf-8");
mysql_connect('127.0.0.1','root','root');
mysql_select_db('shiyi');
mysql_query("set names utf-8");
$name=isset($_POST['names'])?$_POST['names']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
$time=date("Y-m-d H:i:s");
// var_dump($time);die;
	$sql="SELECT * FROM `user` WHERE `names`='$name'";
	// var_dump($sql);die;
	$res=mysql_query($sql);
	$arr=mysql_fetch_assoc($res);


// var_dump($arr);die;
if (!$arr['names']==$name) {
	$data="insert into user (`names`,`pwd`,`time`) values ('$name',md5('$pwd'),'$time')";
	$date=mysql_query($data);
	echo "<script>alert('注册成功,请返回登录!');location.href='index.html'</script>";
	}else{
		echo "<script>alert('用户名已存在，请重新注册!');location.href='login_do.html'</script>";
	}
	

?>