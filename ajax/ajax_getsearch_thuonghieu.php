<?php
include "ajax_config.php";

$idbrand_list = (isset($_POST['idbrand_list']) && $_POST['idbrand_list'] > 0) ? htmlspecialchars($_POST['idbrand_list']) : 0;
$idlist_list = (isset($_POST['idlist_list']) && $_POST['idlist_list'] > 0) ? htmlspecialchars($_POST['idlist_list']) : 0;
$brandpro = (isset($_POST['brandpro']) && $_POST['brandpro'] > 0) ? htmlspecialchars($_POST['brandpro']) : 0;



if ($idbrand_list) {
	$id_brand_list = "and id_brand REGEXP '" . $idbrand_list . "'";
}
elseif($brandpro){
	$id_brand_list = "and id_brand REGEXP '" . $brandpro . "'";
}

if ($lang == 'vi') {
	$orderby = 'order by tenvi ASC';
} else {
	$orderby = 'order by tenen ASC';
}
// $orderby = 'order by stt,id desc';
$sql = "select * from #_product_list where type = 'san-pham' and hienthi > 0 $id_brand_list $orderby";
$product = $d->rawQuery($sql);

?>
<?php
if ($product) {
	$idlist = explode("|",$idlist_list);
	foreach ($product as $b) {
?>
		<li class="check_idlist <?= in_array($b['id'],$idlist)  == true ? 'active' : '' ?>" data-idlist="<?= $b['id'] ?>">
			<div class="icon_check_brand" style="z-index: -1;">
				<i class="<?= in_array($b['id'],$idlist)  == true ? 'far fa-check-square' : 'far fa-square' ?>"></i>
			</div>
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