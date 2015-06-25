<?php 
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
	$json_url = "http://192.168.29.61/transparencia/json_planes_parciales_intranetV";
	$item = file_get_contents($json_url);
	$item =json_decode($item);	
	foreach ($item as $key => $value) {
		foreach ($value as $k => $val) {
			$var[$k] = explode(",", str_replace(array("&quot;"), array(""), $val->node->upload_fid));
		}
	}
	foreach ($var as $y => $v) {
		foreach ($v as $name) {
			$name = explode("|", $name);
			$json["zona".$y][] = array("name"=>$name[0],"file"=>$name[1]);
			
		}
	}
		print json_encode($json);
?>

