<?php 
header("content-type:text/html;charset=utf-8");

mysql_connect('127.0.0.1', 'root', 'root');
mysql_select_db("shiyi");
mysql_query("set names utf-8");

$sql="select * from mess";
$data=mysql_query($sql);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>查看留言</title>
 </head>
 <body>
 <center>
 	<table>
 		<tr>
 			<td>ID</td>
 			<td>内容</td>
 			<td>时间</td>
 			<td>操作</td>
 		</tr>
 		<?php while ($arr=mysql_fetch_assoc($data)) { ?>
 		<tr>
 			<td><?php echo $arr['id'] ?></td>
 			<td><?php echo $arr['mess'] ?></td>
 			<td><?php echo $arr['time'] ?></td>
 			<td><a href="update.php?id=<?php echo $arr['id'] ?>">修改</a>|<a href="del.php?id=<?php echo $arr['id'] ?>">删除</a></td>
 		</tr>
 		<?php } ?>
 	</table>
 </center>
 </body>
 </html>