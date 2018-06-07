<?php 
header("content-type:text/html;charset=utf-8");
mysql_connect('127.0.0.1','root','root');
mysql_select_db('shiyi');
mysql_query("set names utf-8");

$id=$_GET['id'];

$sql="select * from mess where id='$id'";
$res=mysql_query($sql);
// var_dump($sql);die;
$arr=mysql_fetch_assoc($res);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
<form  action="up.php" method="post" >
 	<table>
 		<tr>
 			<input type="hidden" name="id" value="<?php echo $arr['id']; ?>">
 			<td>留言：</td>
 			<td><textarea name="mess" id="mes" cols="30" rows="10"><?php echo $arr['mess']; ?></textarea>
				<span id="names"></span>
 			</td>
 		</tr>
 		<tr>
 			<td colspan="2"><input type="submit" value="提交"></td>
 		</tr>
 	</table>
 </form>
 </body>
</html>
