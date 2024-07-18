<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);


//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;
// var_dump($_GET);
$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$id = (isset($_GET['id']) && $_GET['id'] != '') ? htmlspecialchars($_GET['id']) : '';
$idl = (isset($_GET['idl']) && $_GET['idl'] != '') ? (int)$_GET['id'] : 0;
$idbrand = (isset($_GET['id_post']) && $_GET['id_post'] != '') ? (int)$_GET['id_post'] : 0;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product_paging.php?idl=" . $idl . "&id=" . $id . "&id_post=" . $idbrand . "&perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";

if ($idl > 0) {
	$where .= " and id != " . $idl;
} elseif ($id > 0) {
	$where .= " and id != " . $id;
}
if ($idbrand > 0) {
	$where .= " and id_brand = " . $idbrand;
}

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select * from #_product where type = 'san-pham' $where and hienthi > 0 order by stt,id desc ";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->getCache($sqlCache, 'result', 7200);

/* Count all data */
$countItems = count($cache->getCache($sql, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
// var_dump($pageLink);

?>
<?php if ($countItems) { ?>
	<div class="all_sp_thaythe_cungloai">
		<?php foreach ($items as $sptt) {
			$color_sp = $d->rawQueryOne("select * from #_product_mau where type = ? and id = ? and hienthi > 0", array('san-pham', $sptt['id_mau']));
			$khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $sptt['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
		?>
			<a href="<?= $sptt['tenkhongdauvi'] ?>">
				<div class="sanpham_thaythe <?= $sptt['id'] == $row_detail['id'] ? 'active' : '' ?>">
					<div class="img_sp_thaythe">
						<img onerror="this.src='<?= WATERMARK ?>/product/100x75x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/100x75x1/<?= UPLOAD_PRODUCT_L . $sptt['photo'] ?>" alt="<?= $sptt['ten' . $lang] ?>">
						<?php if ($sptt['id_khuyenmai']) { ?>
							<img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 50px; max-width: 50px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
						<?php } ?>
					</div>
					<div class="con_ten_sptt">
						<div class="mau_sp">
							<!-- <span><?= $lang == 'vi' ? 'Tên sản phẩm: ' : "Product's name" ?></span> -->
							<strong class="noidung-split"><?= $sptt['ten' . $lang] ?></strong>
						</div>
						<!-- <div class="mau_sp">
							<span><?= $lang == 'vi' ? 'Màu sắc: ' : 'Color' ?></span>
							<strong><?= $color_sp['ten' . $lang] ?></strong>
						</div> -->
						<!-- <div class="ma_sp_tt">
							<span><?= $lang == 'vi' ? 'Mã sản phẩm: ' : 'Part Number: ' ?></span>
							<strong><?= $sptt['masp'] ?></strong>
						</div> -->
						
						<div class="gia_sp_tt">
							<span><?= $lang == 'vi' ? 'Giá: ' : 'Price: ' ?></span>
							<?= $func->chuyendoitigia($sptt) ?>
						</div>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>

	<div class="pagination-ajax">
		<div class="pagination">
			<?= $pagingItems ?>
		</div>
	</div>
<?php } ?>