<?php
include "ajax_config.php";

$idbrand_list = (isset($_POST['idbrand_list']) && $_POST['idbrand_list'] > 0) ? htmlspecialchars($_POST['idbrand_list']) : 0;
$brandpro = (isset($_POST['brandpro']) && $_POST['brandpro'] > 0) ? htmlspecialchars($_POST['brandpro']) : 0;

if ($idbrand_list) {
	$id_brand_list = "and id_brand REGEXP '" . $idbrand_list . "'";
}
elseif($brandpro){
	$id_brand_list = "and id_brand REGEXP '" . $brandpro . "'";
}

// if ($lang == 'vi') {
// 	$orderby = 'order by tenvi ASC';
// } else {
// 	$orderby = 'order by tenen ASC';
// }
$orderby = 'order by stt,id desc';
$sql = "select * from #_product_list where type = 'san-pham' and hienthi > 0 $id_brand_list $orderby";
$product = $d->rawQuery($sql);

?>
<?php
if ($product) {
	foreach ($product as $b) {
?>
		<li class="check_idlist" data-idlist="<?= $b['id'] ?>">
			<div class="icon_check_brand"><i class="far fa-square"></i></div>
			<span><?= $b['ten' . $lang] ?></span>
		</li>
<?php }
} ?>

<script>
	$(".check_idlist").on("click", function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).children(".icon_check_brand").html('<i class="far fa-square"></i>');
		} else {
			$(this).addClass("active");
			$(this).children(".icon_check_brand").html('<i class="far fa-check-square"></i>');
		}
	});
</script>