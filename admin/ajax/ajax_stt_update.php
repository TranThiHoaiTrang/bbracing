<?php
include "ajax_config.php";

if (isset($_POST['order'])) {
	$where = '';
	if($_POST['id_list']){
		$where = ' and id_list = '. $_POST['id_list'];
	}
	if($_POST['id_cat']){
		$where = ' and id_cat = '. $_POST['id_cat'];
	}
	if($_POST['id_brand']){
		$where = ' and id_brand = '. $_POST['id_brand'];
	}

	$table = 'table_'.$_POST['table'];

	if (!empty($_POST['limit'])) {
		$per_page = $_POST['limit'];
	} else {
		$per_page = 20;
	}
	if (!empty($_POST['p'])) {
		$curPage = $_POST['p'];
	} else {
		$curPage = 1;
	}

	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;

	$array_list_post = parse_str($_POST['order'], $outputArray);
	$numbers = $outputArray['post'];
	// var_dump($numbers);

	$post_min_max = $d->rawQuery("select stt from $table where type = 'san-pham' $where order by stt asc $limit");
	// $post_min_max = $d->rawQueryOne("select COUNT(*) AS `cnt`, MAX(stt) AS `max`, MIN(stt) AS `min` from $table where type = 'san-pham' order by stt asc $limit");
	$all_post = $d->rawQuery("select id from $table where type = 'san-pham' $where order by stt asc $limit");
	// var_dump($post_min_max);
	// $min = $post_min_max['min'];
	// $max = $post_min_max['max'];

	for ($i = 0; $i < count($post_min_max); $i++) {
		$id_post = $numbers[$i];
		$data['stt'] = intval($post_min_max[$i]['stt']);
		$d->rawQuery("update $table set stt = '".$data['stt']."' where id = $id_post");
		var_dump("update $table set stt = '".$data['stt']."' where id = $id_post");
	}

	$all_post_return = $d->rawQuery("select id from $table where type = 'san-pham' $where order by stt asc $limit");
}
