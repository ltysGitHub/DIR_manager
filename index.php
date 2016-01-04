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
<?php
if(isset($_GET['action'])&&$_GET['action']==="show_content"){
	$content=file_get_contents(urldecode($_GET['filename']));
	$name_enc=mb_detect_encoding($content,array("GB2312","GBK","UTF-8","BIG5"),false);
	if($name_enc)
		$content=iconv($name_enc,'UTF-8//IGNORE',$content);
	echo $content;
}
?>
<table width="100%" border="1px" cellpadding="2" cellspacing="0" bgcolor="#ABCDEF" align="center">
	<tr>
		<td>编号</td>
		<td>名称</td>
		<td>类型</td>
		<td>大小</td>
		<td>可读</td>
		<td>可写</td>
		<td>可执行</td>
		<td>查看内容</td>
		<td>修改</td>
		<td>删除</td>
	</tr>
<?php
	$i=1;
	foreach($arr as $key=>$array){
?>
<?php foreach($array as $item){
		$utf8_name = iconv(mb_detect_encoding($item,array("GB2312","GBK","UTF-8","BIG5")),'UTF-8//IGNORE',$item);
?>
	<tr>
		<td><?php echo $i; $i++?></td>
		<td><?php echo $utf8_name;?></td>
		<td><?php echo $key; ?></td>
		<td><?php echo file_size(filesize($path.'/'.$item))?></td>
		<td><?php echo is_readable($path.'/'.$item)?'是':'否';?></td>
		<td><?php echo is_writeable($path.'/'.$item)?'是':'否';?></td>
		<td><?php echo is_executable($path.'/'.$item)?'是':'否';?></td>
		<td><a href="<?php echo "index.php?action=show_content&filename=".$path.'/'.urlencode($item);?>">查看内容</a></td>
		<td></td>
		<td></td>
	</tr>
	<?php }?>
<?php }?>
</table>
</body>
</html>