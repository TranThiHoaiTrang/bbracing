<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = 12;
$eShow = '.all_search_news';


$keyword = $_POST['keyword'];
$type = $_POST['type'] ?? '';
$idlist = $_POST['idlist'] ?? '';
$tukhoa = $func->url_title($keyword,'dash');
// var_dump($tukhoa);

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_news.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "and tenkhongdauvi LIKE '%$tukhoa%' or tenkhongdauvi LIKE '$tukhoa%' or tenkhongdauvi LIKE '%$tukhoa'";


$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select *  from #_news where type='$type' and id_list = '$idlist' $where and noibat > 0 and hienthi > 0 order by stt,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->getCache($sqlCache, 'result', 7200);
// var_dump($sql);

/* Count all data */
$countItems = count($cache->getCache($sql, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);


?>
<?php if ($countItems) { ?>
	<div class="content-main w-clear  ">
		<?php foreach ($items as $k => $v) { ?>
			<a href="<?= $v['tenkhongdau'.$lang] ?>">
				<div class="tintuc_news">
					<div class="img_tintuc_news">
						<img src="<?= THUMBS ?>/660x478x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" width="330" height="239">
					</div>
					<div class="content_news">
						<div class="name_news"><?= $v['ten' . $lang] ?></div>
						<div class="time_tintuc">
							<span><?= date("D m Y", $v['ngaytao']) ?></span>
						</div>
						<div class="mota_news"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
	<div class="paging_ajax">
		<?= $pagingItems ?>
	</div>
<?php } ?>