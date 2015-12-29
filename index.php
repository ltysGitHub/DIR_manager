<?php
	require_once("dir_func.php");
	require_once("file_func.php");
	$path=isset($_GET['path'])?$_GET['path']:"testdir";
	$arr = readDirectory($path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dir_manager</title>
</head>
<body>
<table width="100%" border="1px" cellpadding="2" cellspacing="0" bgcolor="#ABCDEF" align="center">
	<tr>
		<td>编号</td>
		<td>名称</td>
		<td>类型</td>
		<td>大小</td>
		<td>可读</td>
		<td>可写</td>
		<td>可执行</td>
	</tr>
<?php 
$i=1;
foreach($arr as $key=>$array){?>
	<?php foreach($array as $item){?>
	<tr>
		<td><?php echo $i; $i++?></td>
		<td><?php echo $item;?></td>
		<td><?php echo $key; ?></td>
		<td><?php echo file_size(filesize($path.'/'.$item))?></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php }?>
<?php }?>
</table>
</body>
</html>