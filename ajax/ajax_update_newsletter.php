<?php
	include "ajax_config.php";
	
	$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
	$id_user = (isset($_POST['id_user']) && $_POST['id_user'] > 0) ? htmlspecialchars($_POST['id_user']) : 0;

	$pro_userid = $d->rawQueryOne("select id_user from #_product where id = '$id'");

	$user = $id_user .','. $pro_userid['id_user'];
	$user_ex = array_unique(explode(',',$user));
	$user = implode(',',$user_ex);
	
	$data['id_user'] = $user;
	$d->where('id', $id);
	$d->update('product', $data);
	// var_dump($user);
	
?>
