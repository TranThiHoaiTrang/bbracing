<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);

// var_dump($tukhoa);
$idl_post = (isset($_GET['idl']) && $_GET['idl'] != '') ? (int)$_GET['idl'] : 0;
$idl_get = (isset($_GET['id']) && $_GET['id'] != '') ? (int)$_GET['id'] : 0;

if(!empty($idl_post)){
	$idl = $idl_post;
}
if(!empty($idl_get)){
	$idl = $idl_get;
}

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_questions.php?idl=" . $idl . "&perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";

// var_dump($_GET);



if ($idl > 0) {
	$where .= " and id_sanpham = " . $idl;
}

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select *  from #_newsletter where type='comment' $where and khuvuc_hienthi = '".$lang."' order by stt,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $d->rawQuery($sqlCache);
// var_dump($lang);

/* Count all data */
$countItems = count($d->rawQuery($sql));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
// var_dump($countItems);

?>
<?php if ($items) { ?>
	<?php foreach ($items as $n) { ?>
		<div class="row">
			<div class="col-md-1 strong">Question:</div>
			<div class="col-md-11 d-flex justify-content-between" style="gap: 10px;">
				<div class="qs_cauhoi"><?= htmlspecialchars_decode($n['noidung']) ?></div>
				<small><?= date("d/m/Y", $n['ngaytao']) ?></small>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 strong">Answer:</div>
			<div class="col-md-11">
				<div class="traloicauhoi"><?= htmlspecialchars_decode($n['traloicauhoi']) ?></div>
			</div>
		</div>
		<hr style="clear:both;">
	<?php } ?>
	<div class="paging_ajax">
		<?= $pagingItems ?>
	</div>
<?php } ?>