<?php
	include "ajax_config.php";
	require_once LIBRARIES."config-type.php";

	/* Xử lý params */
	$flag = true;
	$param = (isset($_POST['params'])) ? $_POST['params'] : null;
	var_dump($_POST['params']);
	$params = null;
	if($param) parse_str(base64_decode(addslashes($param)), $params);
	$id = (isset($params['id']) && $params['id']) ? $params['id'] : 0;
	
	$com = 'product';
	$type = 'product';
	$hash = (isset($_POST['hash'])) ? addslashes($_POST['hash']) : '';
	$stt = (isset($_POST['stt'])) ? (int)$_POST['stt'] : 0;
	$e = (isset($params['act']) && $params['act'] != '') ? @explode("_", $params['act']) : null;
	if($e) $ex = (count($e) > 1) ? end($e) : '';
	else $ex = '';
	 
	$kind = "man".(($ex) ? ("_".$ex) : '');
	$data = array('success' => true, 'msg' => 'Upload thành công');

	/* Xử lý $_FILE - Path image */
	$myFile = (isset($_FILES['files'])) ? $_FILES['files'] : null;
	$_FILES['file'] = array('name' => $myFile['name'][0],'type' => $myFile['type'][0],'tmp_name' => $myFile['tmp_name'][0],'error' => $myFile['error'][0],'size' => $myFile['size'][0]);
	$file_name = $func->uploadName($_FILES['file']['name']);
	$upload_path = array("product" => UPLOAD_PRODUCT, "news" => UPLOAD_NEWS, "static" => UPLOAD_STATIC);
	// var_dump($param);
	/* Xử lý lưu image */
	// if(isset($config[$com][$type]['img_type']) && $config[$com][$type]['img_type'] != '')
	// {
		if($photo =  $file_name)
		{
			$data_file = array();
			// if(!$id)
			// {
			// 	$data_file['hash'] = $hash;
			// }
			$data_file['link_video'] = $photo;
			$data_file['stt'] = 0;		
			$data_file['tenvi'] = "";
			$data_file['id_photo'] = $id;
			$data_file['com'] = $com;
			$data_file['type'] = $type;
			$data_file['kind'] = $kind;
			$data_file['val'] = "img1";
			$data_file['hienthi'] = 1;
			$data_file['ngaytao'] = time();
			$max_stt = $d->rawQueryOne("select max(stt) as max_stt from #_gallery where com = ? and  type = ? and kind = ? and val = ? and id_photo = ?",array($com, $type, $kind, "img1", $id));
			$data_file['stt'] = $max_stt['max_stt']+1;
			// var_dump($data_file);die();
			if(!$d->insert('gallery',$data_file))
			{
				$flag = false;
			}
		}
		else
		{
			$flag = false;
		}
	// }
	// else
	// {
	// 	$flag = false;
	// }

	if(!$flag)
	{
		$data = array('success' => false, 'msg' => 'Upload thất bại');
	}

	echo json_encode($data);
?>