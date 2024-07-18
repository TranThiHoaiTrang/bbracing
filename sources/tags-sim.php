<?php  
	if(!defined('SOURCES')) die("Error");
		
	$id = htmlspecialchars($_GET['id']);
	
	if($id)
	{
		/* Lấy tag detail */
		$tags_detail = $d->rawQueryOne("select * from #_tags where id = ? and type = ? limit 0,1",array($id,$type));
		
		/* Lấy mục */
		$chuoi_id_sim .= $tags_detail['id'] .'|';
		$id_sim = rtrim($chuoi_id_sim, "|");
		$where = "";
		$where = "id_tags_sim REGEXP '(".$id_sim.")' and type = 'san-pham'";

		$table = 'product';
		/* Column for sản phẩm */
		if($table == 'product') $col = "*";

		/* Column for bài viết */
		if($table == 'news') $col = "photo, ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, noidung$lang, ngaytao, id";

		$curPage = $get_page;
		$per_page = 10;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit ".$startpoint.",".$per_page;
		$sql = "select $col from #_product where $where order by stt,id desc $limit";
		$product = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = $count['num'];
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$per_page,$curPage,$url);
		
		/* Data for sản phẩm */
		// if($table == 'product') $items = $product;

		/* Data for bài viết */
		// if($table == 'news') $items = $news;
		/* SEO */
		$title_cat = $tags_detail['ten'.$lang];
		$title_crumb = $tags_detail['ten'.$lang];
		$seoDB = $seo->getSeoDB($tags_detail['id'],'tags','man',$tags_detail['type']);
		$seo->setSeo('h1',$tags_detail['ten'.$lang]);
		if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
		else $seo->setSeo('title',$tags_detail['ten'.$lang]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
		$seo->setSeo('url',$func->getPageURL());
		$img_json_bar = (isset($tags_detail['options']) && $tags_detail['options'] != '') ? json_decode($tags_detail['options'],true) : null;
		if($img_json_bar == null || ($img_json_bar['p'] != $tags_detail['photo']))
		{
			$img_json_bar = $func->getImgSize($tags_detail['photo'],UPLOAD_TAGS_L.$tags_detail['photo']);
			$seo->updateSeoDB(json_encode($img_json_bar),'tags',$tags_detail['id']);
		}
		if(count($img_json_bar) > 0)
		{
			$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_TAGS_L.$tags_detail['photo']);
			$seo->setSeo('photo:width',$img_json_bar['w']);
			$seo->setSeo('photo:height',$img_json_bar['h']);
			$seo->setSeo('photo:type',$img_json_bar['m']);
		}

		/* breadCrumbs */
		if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($tags_detail[$sluglang],$title_crumb);
		$breadcrumbs = $breadcr->getBreadCrumbs();
	}
?>