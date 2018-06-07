<?php 
header("content-type:text/html;charset=utf-8");

include_once "./single.class.php";

$db = Single::getIns();
$res = $db->selectAll();
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
 		<?php foreach ($res as $k => $v) { ?>
 		<tr>
 			<td><?php echo $v['id'] ?></td>
 			<td><?php echo $v['mess'] ?></td>
 			<td><?php echo $v['time'] ?></td>
 			<td><a href="update.php?id=<?php echo $v['id']; ?>">修改</a>|<a href="del.php?id=<?php echo $v['id']; ?>">删除</a></td>
 		</tr>
 		<?php } ?>
 	</table>
 </center>
 </body>
 </html>