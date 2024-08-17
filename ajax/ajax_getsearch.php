<?php
include "ajax_config.php";

$com = $_POST['com'];
$id = $_POST['id'];
$id_loaisanpham = $_POST['id_loaisanpham'];
// var_dump($_POST);
if ($com == 'thuonghieuxe') {
    if ($id != 0) {
        $row_size = $d->rawQuery("select * from #_product_doday_list where id_doday = ? and type = ? ", array($id, 'san-pham'));
    }
?>
    <li class="double_click" data-duongdan="vehicles" data-id="0"><?= $lang == 'vi' ? 'Tên xe' : 'MODEL YEAR' ?></li>
    <?php foreach ($row_size as $v) { ?>
        <li class="double_click" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
    <?php } ?>
    <!-- <option selected value="0">Tên xe</option>
    <?php foreach ($row_size as $v) { ?>
        <option value="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></option>
    <?php } ?> -->
<?php } elseif ($com == 'loaisanpham') {

    if ($id != 0) {
        $row_list = $d->rawQueryOne("select id_brand from #_product_list where id = ? and type = ? limit 0,1", array($id, 'san-pham'));
        $row_brand = $d->rawQuery("select id,tenvi,tenen,id_list from #_product_brand where find_in_set(id,'" . $row_list['id_brand'] . "') and type = 'san-pham'");
    } else {
        $row_brand = $d->rawQuery("select id,tenvi,tenen,id_list from #_product_brand where type = 'san-pham'");
    }

?>
    <li class="double_click" data-duongdan="brand" data-id="0"><?= $lang == 'vi' ? 'Thương Hiệu Sản Phẩm' : 'BRAND' ?></li>
    <?php foreach ($row_brand as $v) { ?>
        <li class="double_click <?= ($v['id'] == $id_loaisanpham) ? 'active' : '' ?>" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>" data-idlist="<?= $v['id_list'] ?>"><?= $v['ten' . $lang] ?></li>
    <?php } ?>
<?php } elseif ($com == 'thuonghieusanpham') {
    if ($lang == 'vi') {
        $nhomdanhmuc_menu = $d->rawQuery("select * from #_product_nhomdanhmuc where type = ? and hienthi > 0 order by tenvi ASC", array('san-pham'));
    } else {
        $nhomdanhmuc_menu = $d->rawQuery("select * from #_product_nhomdanhmuc where type = ? and hienthi > 0 order by tenen ASC", array('san-pham'));
    }
    $nhomdanhmuc_menu = $d->rawQuery("select * from #_product_nhomdanhmuc where type = ? and hienthi > 0 order by stt,id desc", array('san-pham'));
    if ($id != 0) {
        $row_list = $d->rawQueryOne("select id_list from #_product_brand where id = ? and type = ? limit 0,1", array($id, 'san-pham'));
        // var_dump("select id,tenvi,tenen from #_product_list where find_in_set(id,'" . $row_list['id_list'] . "') and type = 'san-pham'");die();
        $row_list = $d->rawQuery("select id,tenvi,tenen from #_product_list where find_in_set(id,'" . $row_list['id_list'] . "') and type = 'san-pham'");
        $id_brand_list = '';
        foreach ($row_list as $v) {
            $id_brand_list .= $v['id'] . ',';
        }
    } else {
        $row_list = $d->rawQuery("select id,tenvi,tenen from #_product_list where type = 'san-pham'");
    }
    $all_idbrand = substr($id_brand_list, 0, -1);
    $all_idbrand = explode(',', $all_idbrand);
    
?>
    <!-- <li class="double_click" data-duongdan="catalogue" data-id="0">Loại sản phẩm</li> -->
    <?php foreach ($nhomdanhmuc_menu as $n) {
        if ($lang == 'vi') {
            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $n['id'] . "' and id_brand REGEXP (" . $id . ") and hienthi > 0 and noibat > 0 order by tenvi ASC");
        } else {
            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $n['id'] . "' and id_brand REGEXP (" . $id . ") and hienthi > 0 and noibat > 0 order by tenen ASC");
        }
        // $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $n['id'] . "' and id_brand REGEXP (" . $id . ") and hienthi > 0 and noibat > 0 order by stt,id desc");
    ?>
        <?php if (count($sp_list_ndm)) { ?>
            <li>
            <a href="<?= $n['tenkhongdauvi'] ?>"><span><?= $n['ten' . $lang] ?></span></a>
                <ul>
                    <?php foreach ($sp_list_ndm as $ldm) {?>
                        <li class="double_click_ndm  <?= ($ldm['id'] == $id_loaisanpham) ? 'active' : '' ?>" data-duongdan="<?= $ldm['tenkhongdauvi'] ?>" data-id="<?= $ldm['id'] ?>"><?= $ldm['ten' . $lang] ?></li>
                        <!-- <li class="double_click_ndm </?= in_array($v['id'], $all_idbrand) ? 'in_array' : '' ?>" data-duongdan="</?= $v['tenkhongdauvi'] ?>" data-id="</?= $v['id'] ?>"></?= $v['ten' . $lang] ?></li> -->
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    <?php } ?>
<?php } ?>

<script>
    $(".double_click_ndm,.double_click").click(function () {
    $(".results__options").removeClass("active");
    $(".results__options").css({
      display: "none",
    });
    // console.log("aaaa");
  });
</script>