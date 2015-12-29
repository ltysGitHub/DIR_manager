<?php
function readDirectory($path){
	$handle = opendir($path);
	while(($item=readdir($handle))!==false){
		if($item=="."||$item=="..")
			continue;
		else if(is_file($path.'/'.$item)){
			$arr["file"][]=$item;
		}
		else if(is_dir($path.'/'.$item)){
			$arr["dir"][]=$item;
		}
	}
	closedir($handle);
	return $arr;
}
?>