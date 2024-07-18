<?php
global $d;
include "ajax_config.php";
	

if (!empty($_POST["term"])) {
    $tukhoa = htmlspecialchars($_POST['term']['term']);
    $where = " and tenvi LIKE('%" . $tukhoa . "%')";
    $data = $d->rawQuery("select id, tenvi, tenkhongdauvi, slugvi from #_product where type = 'san-pham' $where ");
//   var_dump($data);
	$result = array_merge($data);
	$result_js = json_encode($result);
	echo $result_js;
}