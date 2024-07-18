<?php
include "ajax_config.php";

$idlist_list = (isset($_POST['idlist_list']) && $_POST['idlist_list'] > 0) ? htmlspecialchars($_POST['idlist_list']) : 0;
$listpr = (isset($_POST['listpr']) && $_POST['listpr'] > 0) ? htmlspecialchars($_POST['listpr']) : 0;

if ($idlist_list) {
	$id__list = "and id_list REGEXP '" . $idlist_list . "'";
}
elseif ($listpr) {
	$id__list = "and id_list REGEXP '" . $listpr . "'";
}

// if ($lang == 'vi') {
// 	$orderby = 'order by tenvi ASC';
// } else {
// 	$orderby = 'order by tenen ASC';
// }
$orderby = 'order by stt,id desc';
$sql = "select * from #_product_brand where type = 'san-pham' and hienthi > 0 $id__list $orderby";
$product = $d->rawQuery($sql);

?>
<?php
if ($product) {
	foreach ($product as $b) {
?>
		<li class="check_brand" data-idbrand="<?= $b['id'] ?>">
			<div class="icon_check_brand"><i class="far fa-square"></i></div>
			<span><?= $b['ten' . $lang] ?></span>
		</li>
<?php }
} ?>

<script>
	$(".check_brand").on("click", function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).children(".icon_check_brand").html('<i class="far fa-square"></i>');
		} else {
			$(this).addClass("active");
			$(this)
				.children(".icon_check_brand")
				.html('<i class="far fa-check-square"></i>');
		}
	});
</script>