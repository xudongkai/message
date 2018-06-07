<?php 
header("content-type:text/html;charset=utf-8");

include_once "./single.class.php";

$id=$_GET['id'];

$db = Single::getIns();
$res = $db->up('mess',$id);
// var_dump($sql);die;
$data=mysql_fetch_assoc($res);
// var_dump($data);die;

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
 			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
 			<td>留言：</td>
 			<td><textarea name="mess" id="mes" cols="30" rows="10"><?php echo $data['mess']; ?></textarea>
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
