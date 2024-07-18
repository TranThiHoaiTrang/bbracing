<?php
include "ajax_config.php";

if (isset($_POST['order'])) {

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


	$post_min_max = $d->rawQueryOne("select COUNT(*) AS `cnt`, MAX(stt) AS `max`, MIN(stt) AS `min` from #_product_nhomdanhmuc where type = 'san-pham' order by stt asc $limit");
	$all_post = $d->rawQuery("select id from #_product_nhomdanhmuc where type = 'san-pham' order by stt asc $limit");

	$min = $post_min_max['min'];
	$max = $post_min_max['max'];

	for ($i = $min; $i <= $max; $i++) {
		$id_post = $numbers[$i-1];
		$data['stt'] = intval($i);
		$d->rawQuery("update $table set stt = '".$data['stt']."' where id = $id_post");
		var_dump("update $table set stt = '".$data['stt']."' where id = $id_post");
	}

	$all_post_return = $d->rawQuery("select id from #_product_nhomdanhmuc where type = 'san-pham' order by stt asc $limit");
}
