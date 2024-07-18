<?php  
	if(!defined('SOURCES')) die("Error");

	$id_doday = $_GET['id_doday'];
	$id_size = $_GET['id_size'];
	$id_list = $_GET['id_list'];
	$id_brand = $_GET['id_brand'];

	$kiemtra = (!empty($id_doday) || !empty($id_size) || !empty($id_list) || !empty($id_brand));
	if($kiemtra == true){
		// var_dump("aaaa");

		if($id_doday){
			$doday_id = "and id_doday = ". $id_doday ;
		}
		if($id_size){
			$size_id = "and id_size = ". $id_size ;
		}
		if($id_list){
			$list_id = "and id_list = ". $id_list ;
		}
		if($id_brand){
			$brand_id = "and id_brand = ". $id_brand ;
		}

		$where = "";
		$where = " type = 'san-pham' $doday_id $size_id $list_id $brand_id and hienthi > 0";
		// if($lang == 'vi'){
		// 	$orderby = "order by tenvi ASC";
		// }else{
		// 	$orderby = "order by tenen ASC";
		// }
		$orderby = "ORDER BY stt,id ASC";
		$curPage = $get_page;
		$per_page = 24;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit ".$startpoint.",".$per_page;
		$sql = "select * from #_product where $where $orderby $limit";
		// var_dump($sql);
		
		$product = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from #_product where $where $orderby";
		$count = $d->rawQueryOne($sqlNum);
		$total = $count['num'];
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$per_page,$curPage,$url);
	}

	/* Tìm kiếm sản phẩm */
	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array('tim-kiem'));
	$banner=$seopage['banner'];
	/* SEO */
	$seo->setSeo('title',$title_crumb);

	/* breadCrumbs */
	$breadcr->setBreadCrumbs('',$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();