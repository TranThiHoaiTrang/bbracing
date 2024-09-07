<?php
if (!defined('SOURCES')) die("Error");

/* Tìm kiếm sản phẩm */
if (isset($_GET['keyword'])) {
	$tukhoa = htmlspecialchars($_GET['keyword']);
	// $tukhoa = $func->url_title($tukhoa);

	if ($tukhoa) {

		$product_test = $d->rawQuery("select * from #_product where  masp LIKE '$tukhoa%' order by stt,id desc ");

		if ($product_test) {
			$curPage = $get_page;
			$per_page = 24;
			$startpoint = ($curPage * $per_page) - $per_page;
			$limit = " limit " . $startpoint . "," . $per_page;
			$sql = "select * from #_product where  masp LIKE '$tukhoa%' order by stt,id desc $limit";
			$product = $d->rawQuery($sql);
			// if($lang == 'vi'){
			// 	$orderby = "order by tenvi ASC";
			// }else{
			// 	$orderby = "order by tenen ASC";
			// }
			$orderby = "ORDER BY stt,id ASC";
			$sqlNum = "select count(*) as 'num' from #_product where masp LIKE '$tukhoa%' $orderby";
			$count = $d->rawQueryOne($sqlNum, $params);
			$total = $count['num'];
			$url = $func->getCurrentPageURL();
			$paging = $func->pagination($total, $per_page, $curPage, $url);
		} else {
			$where = ' ( 1=1';
			$tukhoa_sp = $func->changeTitle($tukhoa);
			$tukhoa_sp = preg_split("/[\s,-]+/", $tukhoa_sp);

			if ($lang == 'vi') {
				if (strpos($tukhoa, ' ') !== false) {
					$i = 1;
					foreach ($tukhoa_sp as $k) {
						$tk_m = str_split($k, 4);
						if ($i > 1) {
							$where .= " and (tenkhongdauvi LIKE CONCAT('%', '-" . $k . "', '%'))";
						} else {
							$where .= " and (tenkhongdauvi LIKE CONCAT('%', '" . $k . "-', '%'))";
						}
						$i++;
					}
				} else {
					foreach ($tukhoa_sp as $k) {
						$tk_m = str_split($k, 4);
						$where .= " and (slugvi LIKE CONCAT('%', '" . $k . "', '%'))";
					}
				}
			} else {
				if (strpos($tukhoa, ' ') !== false) {
					$i = 1;
					foreach ($tukhoa_sp as $k) {
						$tk_m = str_split($k, 4);
						if ($i > 1) {
							$where .= " and (tenkhongdauen LIKE CONCAT('%', '-" . $k . "', '%'))";
						} else {
							$where .= " and (tenkhongdauen LIKE CONCAT('%', '" . $k . "-', '%'))";
						}
						$i++;
					}
				} else {
					foreach ($tukhoa_sp as $k) {
						$tk_m = str_split($k, 4);
						// $all_tk = implode('|',$tk_m);
						// var_dump($all_tk);
						$where .= " and (slugen LIKE CONCAT('%', '" . $k . "', '%'))";
						// foreach($tk_m as $tk){
						//     // var_dump($tk);
						//     $where .= " and (slugen LIKE CONCAT('%', '" . $tk . "', '%'))";
						//     // $where .= " and (slugvi LIKE '%$tk%' or slugen LIKE '%$tk%')";
						// }
		
					}
				}
			}
			
			$where .= ')';

			$curPage = $get_page;
			$per_page = 24;
			$startpoint = ($curPage * $per_page) - $per_page;
			$limit = " limit " . $startpoint . "," . $per_page;
			// if($lang == 'vi'){
			// 	$orderby = "order by tenvi ASC";
			// }else{
			// 	$orderby = "order by tenen ASC";
			// }
			$orderby = "ORDER BY stt,id ASC";
			$sql = "select * from #_product where $where $orderby $limit";
			// var_dump($sql);
			$product = $d->rawQuery($sql);
			$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
			$count = $d->rawQueryOne($sqlNum);
			$total = $count['num'];
			$url = $func->getCurrentPageURL();
			$paging = $func->pagination($total, $per_page, $curPage, $url);
		}
	}
}

$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array('tim-kiem'));
$banner = $seopage['banner'];
/* SEO */
$seo->setSeo('title', $title_crumb);

/* breadCrumbs */
$breadcr->setBreadCrumbs('', $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
