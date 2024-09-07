<?php
$backgroud = '';
$backgroud = UPLOAD_PHOTO_L . $banner_sp_khuyenmai['photo'];

if ($lang == 'vi') {
    $brand_list = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $idl . "' and hienthi > 0 order by tenvi ASC ");
} else {
    $brand_list = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $idl . "' and hienthi > 0 order by tenen ASC ");
}
?>
<div class="all_banner">
    <div class="fixwidth">
        <div id="background-banner" class="mb-2" style="background: #fff;">
            <div class="all_background_bn">
                <?php if ($link) { ?>
                    <a href="<?= $link ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?= $backgroud ?>" alt="">
                    </a>
                <?php } else { ?>
                    <img src="<?= $backgroud ?>" alt="">
                <?php } ?>

                <div class="all_noidung_banner">
                    <?= htmlspecialchars_decode($noidung_page) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id_list" value="<?= $idl ?>">
<input type="hidden" name="id_cat" value="<?= $idc ?>">
<input type="hidden" name="id_brand" value="<?= $idb ?>">
<input type="hidden" name="id_doday" value="<?= $idd ?>">
<input type="hidden" name="id_doday_list" value="<?= $iddl ?>">
<input type="hidden" name="com" value="<?= $com ?>">

<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="all_sp_row">
            <div class="col_sp_1">
                <?php if ($deviceType != 'mobile') { ?>
                    <div class="all_fillter all_fillter_des">
                        <div class="all_hide_fillter">
                            <div class="hide_fillter">
                                <span><?= $lang == 'vi' ? 'Ẩn bộ lọc' : 'Hide fillter' ?> </span>
                                <div class="icon_danhmuc">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>
                            <div class="all_fillter_danhmuc">
                                <div class="all_brand_sp">
                                    <div class="title_brand">
                                        <span>Brand</span>
                                        <div class="icon_danhmuc">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </div>
                                    <div class="danhmuc_tong">
                                        <ul class="all_danhmuc_con all_danhmuc_con_scroll">
                                            <?php
                                            if (!empty($_REQUEST['id_brand'])) {
                                                $arr_idbrand = explode("-", $_REQUEST['id_brand']);
                                            }
                                            if ($_REQUEST['id_list']) {
                                                $arr_idlist = explode("-", $_REQUEST['id_list']);
                                                $arr_idlist = implode("|", $arr_idlist);
                                                if ($lang == 'vi') {
                                                    $brand_order = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $arr_idlist . "' and hienthi > 0 order by tenvi ASC");
                                                } else {
                                                    $brand_order = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $arr_idlist . "' and hienthi > 0 order by tenen ASC");
                                                }
                                            }
                                            ?>
                                            <?php foreach ($brand_order as $b) { ?>
                                                <?php if (!empty($arr_idbrand)) { ?>
                                                    <li class="check_brand check_brand_dm <?= in_array($b['id'], $arr_idbrand) ? 'active' : '' ?>" data-idbrand="<?= $b['id'] ?>">
                                                    <?php } else { ?>
                                                    <li class="check_brand check_brand_dm <?= in_array($b['id'], $ar_id_brands) ? 'active' : '' ?> " data-idbrand="<?= $b['id'] ?>">
                                                    <?php } ?>
                                                    <div class="icon_check_brand" style="z-index: -1;">
                                                        <?php if (!empty($arr_idbrand)) { ?>
                                                            <?php if (in_array($b['id'], $arr_idbrand)) { ?>
                                                                <i class="far fa-check-square"></i>
                                                            <?php } else { ?>
                                                                <i class="far fa-square"></i>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php if (in_array($b['id'], $ar_id_brands)) { ?>
                                                                <i class="far fa-check-square"></i>
                                                            <?php } else { ?>
                                                                <i class="far fa-square"></i>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <span><?= $b['ten' . $lang] ?></span>
                                                    </li>
                                                <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="all_brand_sp">
                                    <div class="title_brand ">
                                        <span>Catalog</span>
                                        <div class="icon_danhmuc">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                    <div class="danhmuc_tong">
                                        <ul class="all_danhmuc_con all_danhmuc_con_scroll all_danhmuc_con_catalog">
                                            <?php
                                            if (!empty($_REQUEST['id_list'])) {
                                                $arr_idlist = explode("-", $_REQUEST['id_list']);
                                            }
                                            if (!empty($_REQUEST['id_brand'])) {
                                                $arr_idbrand = explode("-", $_REQUEST['id_brand']);
                                                $arr_idbrand = implode("|", $arr_idbrand);
                                            }
                                            if ($lang == 'vi') {
                                                if ($_REQUEST['id_brand']) {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $arr_idbrand . "' and hienthi > 0 order by tenvi ASC");
                                                } elseif (!empty($tong_ar_idbrand)) {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $tong_ar_idbrand . "' and hienthi > 0 order by tenvi ASC");
                                                } else {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and hienthi > 0 order by tenvi ASC");
                                                }
                                            } else {
                                                if ($_REQUEST['id_brand']) {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $arr_idbrand . "' and hienthi > 0 order by tenen ASC");
                                                } elseif (!empty($tong_ar_idbrand)) {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $tong_ar_idbrand . "' and hienthi > 0 order by tenen ASC");
                                                } else {
                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and hienthi > 0 order by tenen ASC");
                                                }
                                            }
                                            foreach ($splistmenu_brand as $b) { ?>
                                                <?php if (!empty($arr_idlist)) { ?>
                                                    <li class="check_idlist <?= in_array($b['id'], $arr_idlist) ? 'active' : '' ?> " data-idlist="<?= $b['id'] ?>">
                                                        <div class="icon_check_brand" style="z-index: -1;">
                                                            <?php if (in_array($b['id'], $arr_idlist)) { ?>
                                                                <i class="far fa-check-square"></i>
                                                            <?php } else { ?>
                                                                <i class="far fa-square"></i>
                                                            <?php } ?>
                                                        </div>
                                                        <span><?= $b['ten' . $lang] ?></span>
                                                    </li>
                                                <?php } else { ?>
                                                    <li class="check_idlist <?= in_array($b['id'], $ar_id_lists) ? 'active' : '' ?> " data-idlist="<?= $b['id'] ?>">
                                                        <div class="icon_check_brand" style="z-index: -1;">
                                                            <?php if (in_array($b['id'], $ar_id_lists)) { ?>
                                                                <i class="far fa-check-square"></i>
                                                            <?php } else { ?>
                                                                <i class="far fa-square"></i>
                                                            <?php } ?>
                                                        </div>
                                                        <span><?= $b['ten' . $lang] ?></span>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col_sp_2">
                <div class="all_danhmuc_loc">
                    <div class="col_loc_1">
                        <div class="all_phantrang_show">
                            <div class="all_danhmuc_phantrang">
                                <div class="all_bread">
                                    <div class="breadCrumbs">
                                        <div><?= $breadcrumbs ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="all_show_pro">
                                <div class="input_title_show">
                                    <div class="title_show">Show</div>
                                    <input type="text" class="input_number_show" value="1" min="1" pattern="[1-9]{10}">
                                </div>
                                <div class="show_pro">
                                    <span><?= ceil($total / $per_page) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col_loc_2">
                        <div class="outerSort">
                            <div class="borderFilterMobile option browse-tags">
                                <span class="custom-dropdown custom-dropdown--grey">
                                    <select class="sort-by orderby custom-dropdown__select">
                                        <option value="adenz"><?= $lang == 'vi' ? 'Từ A-Z' : 'Sort by A-Z' ?></option>
                                        <option value="zdena"><?= $lang == 'vi' ? 'Từ Z-A' : 'Sort by Z-A' ?></option>
                                        <option value="giathap"><?= $lang == 'vi' ? 'Theo giá – Thấp nhất' : 'Sort by Price – Lowest' ?></option>
                                        <option value="giacao"><?= $lang == 'vi' ? 'Theo giá - Cao nhất' : 'Sort by Price - Highest' ?></option>
                                        <option value="">Reset </option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <?php if ($deviceType == 'mobile') { ?>
                            <button type="button" class="btn btn-primary btn_loc_sp" data-toggle="modal" data-target="#loc_sp">
                                <span><?= $lang == 'vi' ? 'Lọc' : 'Filter' ?></span>
                                <i class="fas fa-filter"></i>
                            </button>
                            <div class="modal fade" id="loc_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="padding: 6px 16px;height: 36px;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: fixed;right: 10px;margin: 0;top: 0;z-index: 3;opacity: 1;">
                                                <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="all_fillter_danhmuc">
                                                <div class="all_brand_sp">
                                                    <div class="title_brand">
                                                        <span>Brand</span>
                                                        <div class="icon_danhmuc">
                                                            <i class="fas fa-minus"></i>
                                                        </div>
                                                    </div>
                                                    <div class="danhmuc_tong">
                                                        <ul class="all_danhmuc_con all_danhmuc_con_scroll">
                                                            <?php
                                                            if (!empty($_REQUEST['id_brand'])) {
                                                                $arr_idbrand = explode("-", $_REQUEST['id_brand']);
                                                            }
                                                            if ($_REQUEST['id_list']) {
                                                                $arr_idlist = explode("-", $_REQUEST['id_list']);
                                                                $arr_idlist = implode("|", $arr_idlist);
                                                                if ($lang == 'vi') {
                                                                    $brand_order = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $arr_idlist . "' and hienthi > 0 order by tenvi ASC");
                                                                } else {
                                                                    $brand_order = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $arr_idlist . "' and hienthi > 0 order by tenen ASC");
                                                                }
                                                            }
                                                            ?>
                                                            <?php foreach ($brand_order as $b) { ?>
                                                                <?php if (!empty($arr_idbrand)) { ?>
                                                                    <li class="check_brand check_brand_dm <?= in_array($b['id'], $arr_idbrand) ? 'active' : '' ?>" data-idbrand="<?= $b['id'] ?>">
                                                                    <?php } else { ?>
                                                                    <li class="check_brand check_brand_dm <?= $b['id'] == $_REQUEST['id_brand'] ? 'active' : '' ?> " data-idbrand="<?= $b['id'] ?>">
                                                                    <?php } ?>
                                                                    <div class="icon_check_brand" style="z-index: -1;">
                                                                        <?php if (!empty($arr_idbrand)) { ?>
                                                                            <?php if (in_array($b['id'], $arr_idbrand)) { ?>
                                                                                <i class="far fa-check-square"></i>
                                                                            <?php } else { ?>
                                                                                <i class="far fa-square"></i>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <?php if ($b['id'] == $idb) { ?>
                                                                                <i class="far fa-check-square"></i>
                                                                            <?php } else { ?>
                                                                                <i class="far fa-square"></i>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <span><?= $b['ten' . $lang] ?></span>
                                                                    </li>
                                                                <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="all_brand_sp">
                                                    <div class="title_brand ">
                                                        <span>Catalog</span>
                                                        <div class="icon_danhmuc">
                                                            <i class="fas fa-plus"></i>
                                                        </div>
                                                    </div>
                                                    <div class="danhmuc_tong">
                                                        <ul class="all_danhmuc_con all_danhmuc_con_scroll all_danhmuc_con_catalog">
                                                            <?php
                                                            if (!empty($_REQUEST['id_list'])) {
                                                                $arr_idlist = explode("-", $_REQUEST['id_list']);
                                                            }
                                                            if (!empty($_REQUEST['id_brand'])) {
                                                                $arr_idbrand = explode("-", $_REQUEST['id_brand']);
                                                                $arr_idbrand = implode("|", $arr_idbrand);
                                                            }
                                                            if ($lang == 'vi') {
                                                                if ($_REQUEST['id_brand']) {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $arr_idbrand . "' and hienthi > 0 order by tenvi ASC");
                                                                } elseif (!empty($idb)) {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $idb . "' and hienthi > 0 order by tenvi ASC");
                                                                } else {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and hienthi > 0 order by tenvi ASC");
                                                                }
                                                            } else {
                                                                if ($_REQUEST['id_brand']) {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $arr_idbrand . "' and hienthi > 0 order by tenen ASC");
                                                                } elseif (!empty($idb)) {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_brand REGEXP '" . $idb . "' and hienthi > 0 order by tenen ASC");
                                                                } else {
                                                                    $splistmenu_brand = $d->rawQuery("select * from #_product_list where type = 'san-pham' and hienthi > 0 order by tenen ASC");
                                                                }
                                                            }
                                                            foreach ($splistmenu_brand as $b) { ?>
                                                                <li class="check_idlist <?= in_array($b['id'], $arr_idlist) ? 'active' : '' ?> " data-idlist="<?= $b['id'] ?>">
                                                                    <div class="icon_check_brand" style="z-index: -1;">
                                                                        <?php if (in_array($b['id'], $arr_idlist)) { ?>
                                                                            <i class="far fa-check-square"></i>
                                                                        <?php } else { ?>
                                                                            <i class="far fa-square"></i>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <span><?= $b['ten' . $lang] ?></span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="all_brand_sp">
                                                    <div class="title_brand active">
                                                        <span>Vehicles</span>
                                                        <div class="icon_danhmuc">
                                                            <i class="fas fa-plus"></i>
                                                        </div>
                                                    </div>
                                                    <div class="danhmuc_tong" style="display: none;">
                                                        <?php foreach ($thuonghieuxe_order as $b) {
                                                            // var_dump($_REQUEST['id_doday']);
                                                            if ($lang == 'vi') {
                                                                $brand_xe_l = $d->rawQuery("select * from #_product_doday_list where type = ? and id_doday = ? order by tenvi ASC", array('san-pham', $b['id']));
                                                                // var_dump("select * from #_product_doday_list where type = ? and id_doday = ? order by tenvi ASC", array('san-pham', $b['id']));
                                                            } else {
                                                                $brand_xe_l = $d->rawQuery("select * from #_product_doday_list where type = ? and id_doday = ? order by tenen ASC", array('san-pham', $b['id']));
                                                            }
                                                        ?>
                                                            <div class="all_brand_sp">
                                                                <div class="title_brand <?= $_REQUEST['id_doday'] == $b['id'] ? '' : 'active' ?>">
                                                                    <div class="check_vehicles <?= $_REQUEST['id_doday'] == $b['id'] ? 'active' : '' ?>" data-idvehicles="<?= $b['id'] ?>">
                                                                        <div class="icon_check_brand" style="z-index: 0;">
                                                                            <?php if ($_REQUEST['id_doday'] == $b['id']) { ?>
                                                                                <i class="far fa-check-square"></i>
                                                                            <?php } else { ?>
                                                                                <i class="far fa-square"></i>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <span><?= $b['ten' . $lang] ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="danhmuc_tong_vh " style="display: <?= $_REQUEST['id_doday'] == $b['id'] ? '' : 'none' ?>;">
                                                                    <ul class="all_danhmuc_con">
                                                                        <?php foreach ($brand_xe_l as $b) { ?>
                                                                            <li class="all_danhmuc_con_vehicles">
                                                                                <a href="<?= $b['tenkhongdauvi'] ?>"><?= $b['ten' . $lang] ?></a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if (isset($product) && count($product) > 0) { ?>
                    <div class="all_sp_search">
                        <div class="load_product mainkhung_product ">
                            <?php foreach ($product as $k => $v) {
                                $hinhanhsp = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='product' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc", array($v['id'], $v['type'], $v['type']));
                                $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $v['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
                            ?>
                                <div class="sanpham_moi_all">
                                    <div class="img_sp_moi">
                                        <!-- <div class="owl-carousel owl-theme auto_imgsanpham"> -->
                                        <a href="<?= $v['tenkhongdau' . $lang] ?>">
                                            <img width="300" height="197" data-sizes="auto" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                            <?php if ($v['id_khuyenmai']) { ?>
                                                <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                            <?php } ?>
                                        </a>
                                        <!-- </div> -->
                                    </div>
                                    <div class="all_content_sp_moi">
                                        <div class="top_all_content_sp_moi">
                                            <a href="<?= $brand_sp['tenkhongdau' . $lang] ?>">
                                                <div class="brand_sp"><?= $brand_sp['ten' . $lang] ?></div>
                                            </a>
                                            <a href="<?= $v['tenkhongdau' . $lang] ?>">
                                                <div class="name_sp_moi text-split"><?= $v['ten' . $lang] ?></div>
                                            </a>
                                        </div>
                                        <div class="bottom_all_content_sp_moi">
                                            <div class="masp_pro masp_pro_hethang">
                                                <span>
                                                    <span>P/N:</span>
                                                    <span><?= $v['masp'] ?></span>
                                                </span>
                                                <?php if ($v['cothemua'] <= 0) { ?>
                                                    <span class="hethang_sp"><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                                <?php } elseif ($v['soluongkho'] <= 0) { ?>
                                                    <span class="hethang_sp"><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                                <?php } ?>
                                            </div>
                                            <div class="all_gia_giohang">
                                                <div class="all_gia_spmoi">
                                                    <?= $func->chuyendoitigia($v) ?>
                                                </div>
                                                <div class="giohang_sp">
                                                    <input type="hidden" name="cannang" class="cannang" value="<?= $v['cannang'] ?>">
                                                    <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $v['kichthuoc'] ?>">
                                                    <input type="hidden" name="color_detail" class="color_detail" value="<?= $v['id_mau'] ?>">
                                                    <?php if ($v['soluongkho'] <= 0) { ?>
                                                        <?php if ($v['cothemua'] <= 0) { ?>
                                                            <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                                <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                            </a>
                                                        <?php } else { ?>
                                                            <?php if ($lang == 'vi') { ?>
                                                                <?php if ($v['gia'] <= 0) { ?>
                                                                    <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                                        <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                        <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                                        <!-- <i class="fas fa-shopping-cart"></i> -->
                                                                        <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                                    </a>
                                                                <?php } ?>

                                                            <?php } else { ?>
                                                                <?php if ($v['giado'] <= 0) { ?>
                                                                    <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                                        <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                        <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                                        <!-- <i class="fas fa-shopping-cart"></i> -->
                                                                        <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                                    </a>
                                                                <?php } ?>
                                                            <?php } ?>

                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if ($lang == 'vi') { ?>
                                                            <?php if ($v['gia'] <= 0) { ?>
                                                                <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                                    <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                    <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                                </a>
                                                            <?php } else { ?>
                                                                <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                                                    <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                                </a>
                                                            <?php } ?>

                                                        <?php } else { ?>
                                                            <?php if ($v['giado'] <= 0) { ?>
                                                                <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                                    <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                    <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                                </a>
                                                            <?php } else { ?>
                                                                <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                                                    <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong><?= khongtimthayketqua ?></strong>
                    </div>
                <?php } ?>
                <div class="clear"></div>
                <div class="all_danhgia_sp">
                    <?php
                    $faq = $d->rawQuery("select * from #_news where type = 'faqs' and hienthi > 0 order by stt,id desc limit 4");
                    ?>
                    <div class="descriptionheader" style="margin-bottom:10px;">
                        <span class="glyphicon glyphicon-comment mr-2">
                            <i class="far fa-question-circle"></i>
                        </span>
                        <span class="lead">
                            FAQs
                        </span>
                    </div>
                    <?php foreach ($faq as $v) { ?>
                        <div class="all_chinhsach_des">
                            <div class="name_chinhsach_des">
                                <div class="all_name_cs">
                                    <span class="icon_fl_cs_des"><i class="far fa-bookmark"></i></span>
                                    <span><?= $v['ten' . $lang] ?></span>
                                </div>
                                <span class="icon_chinhsach_des"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="noidung_chinhsach all_gioithieu_index">
                                <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                            </div>
                        </div>
                    <?php } ?>
                    <a href="faqs" class="more_faqs"><?= xemthem ?></a>
                </div>
                <div class="all_danhgia_sp">
                    <div class="descriptionheader" style="margin-bottom:10px;">
                        <span class="glyphicon glyphicon-comment mr-2">
                            <i class="fas fa-book-reader"></i>
                        </span>
                        <span class="lead">
                            <?= $lang == 'vi' ? 'Tin tức' : 'News' ?>
                        </span>
                    </div>
                    <?php
                    if ($idb) {
                        $tintucbrand = $d->rawQuery("select * from #_news where type = ? and id_brand = '$idb' and hienthi > 0 order by stt,id desc limit 5", array('tintuc'));
                        $count_tt = count($tintucbrand);
                        if ($count_tt < 5) {
                            $limit = 5 - $count_tt;
                            $tintucnb = $d->rawQuery("select * from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc limit $limit", array('tintuc'));
                        }
                    } else {
                        $tintucnb = $d->rawQuery("select * from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc limit 5", array('tintuc'));
                    }


                    ?>
                    <div class="tintuc_noibat_sp">
                        <ul>
                            <?php foreach ($tintucbrand as $v) { ?>
                                <li>
                                    <a href="<?= $v['tenkhongdau' . $lang] ?>">
                                        <div class="name_tintuc_noibat">
                                            <span><?= $lang == 'vi' ? 'Tin mới nhất' : 'Latest news' ?>: </span>
                                            <span><?= $v['ten' . $lang] ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php foreach ($tintucnb as $v) { ?>
                                <li>
                                    <a href="<?= $v['tenkhongdau' . $lang] ?>">
                                        <div class="name_tintuc_noibat tt_nb">
                                            <span><?= $lang == 'vi' ? 'Tin mới nhất' : 'Latest news' ?>: </span>
                                            <span><?= $v['ten' . $lang] ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="all_danhgia_sp">
                    <div class="descriptionheader" style="margin-bottom:10px;">
                        <span class="glyphicon glyphicon-comment mr-2">
                            <i class="fas fa-comments"></i>
                        </span>
                        <span class="lead">
                            <?= $lang == 'vi' ? 'Câu hỏi &amp; trả lời của khách hàng' : 'Customer Questions &amp; Answers' ?>
                        </span>
                    </div>
                    <?php
                    if ($idl) {
                        $id_list = "and id_list = " . $idl;
                    }
                    if ($idb) {
                        $id_brand = "and id_brand = " . $idb;
                    }
                    if ($idd) {
                        $id_doday = "and id_doday = " . $idd;
                    }
                    $newsletter = $d->rawQuery("select * from #_newsletter where type = 'comment' $id_list $id_doday $id_brand");
                    ?>
                    <div class="mota_question mota_question_read">
                        <span class="content">
                            <?php if ($lang == 'vi') { ?>
                                Câu hỏi & Câu trả lời mới được đặt ở đây có liên quan đến bản chất của sản phẩm này, cách thức hoạt động, nơi hoạt động, liệu nó có hữu ích không, v.v.<br>
                                Nếu bạn cần trợ giúp về phần khác, vui lòng không đặt câu hỏi của bạn ở đây mà bên trong trang đó.<br>
                                Đây không phải là nơi thích hợp để hỏi giá, tình trạng còn hàng, giao hàng, vận chuyển, để biết thông tin này, hãy nhấp vào “BBRacing” rồi đến “Liên hệ” ở đầu trang.<br>
                                Quyền riêng tư của bạn: Không thêm bất kỳ thông tin cá nhân nào vào hộp câu hỏi, chẳng hạn như tên, email, điện thoại, mọi người sẽ đọc nó.<br>
                                để bảo vệ quyền riêng tư của bạn, mọi câu hỏi bao gồm thông tin cá nhân đều bị hủy theo mặc định.
                            <?php } else { ?>
                                New QuestionQuestions & Answers placed here are related to the nature of this product, how it works, where it works, if it is useful etc etc. <br>
                                If you need help on another part please do not place your question here but inside its page.<br>
                                This is not either the right place where to ask for price, availability, delivery, shipping, for this info click on “BBRacing" and then "Contact" at the top of the page.<br>
                                Your Privacy: Do not add any personal information inside the question box, such as name, email, phone, everyone would read it; to protect your privacy,<br>
                                every question which includes personal informations is by default canceled.
                            <?php } ?>
                        </span>
                        <!-- <span class="readmore-link">Read more</span> -->
                    </div>

                    <div class="from_question">
                        <form class="form-newsletter validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                            <?php
                            $iduser = $_SESSION[$login_member]['id'];
                            $user = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
                            ?>
                            <input type="hidden" name="type" value="comment">
                            <input type="hidden" name="id_brand" value="<?= $pro_brand['id'] ?>">
                            <input type="hidden" name="id_list" value="<?= $idl ?>">
                            <input type="hidden" name="id_doday" value="<?= $pro_doday['id'] ?>">
                            <input type="hidden" name="com" value="<?= $com ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><?= hoten ?>*</label>
                                <div class="col-sm-8">
                                    <?php if ($iduser) { ?>
                                        <input type="text" class="form-control" id="name-newsletter" name="name-newsletter" value="<?= $user['id_vip'] > 0 ? $user['tencongty'] : $user['ten'] ?>" required />
                                    <?php } else { ?>
                                        <input type="text" class="form-control" id="name-newsletter" name="name-newsletter" required />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email*</label>
                                <div class="col-sm-8">
                                    <?php if ($iduser) { ?>
                                        <input type="email" class="form-control" id="email-newsletter" name="email-newsletter" value="<?= $user['email'] ?>" required />
                                    <?php } else { ?>
                                        <input type="email" class="form-control" id="email-newsletter" name="email-newsletter" required />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group flex-column align-items-center">
                                <div class="col-sm-8 check_dongy_new">
                                    <input type="checkbox" class="form-control" id="myCheck" name="myCheck" required />
                                    <?php if ($lang == 'vi') { ?>
                                        <div class="all_span">
                                            <span required>Tôi đã đọc và chấp nhận hoàn toàn thông tin về việc sử dụng dữ liệu cá nhân</span>
                                            <span style="display: block;color: #f00;">* Thông tin sẽ được bảo mật hoàn toàn</span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="all_span">
                                            <span required>I have read and integrally accept information about use of personal data</span>
                                            <span style="display: block;color: #f00;">* Information will be kept strictly confidential.</span>
                                        </div>
                                    <?php } ?>
                                    <div class="invalid-feedback"><?= $lang == 'vi' ? 'Bạn chưa chọn ô này' : 'You have not selected this box' ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><?= $lang == 'vi' ? 'Câu hỏi' : 'Question' ?>*</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="noidung-newsletter" name="noidung-newsletter" cols="50" rows="5" required /></textarea>
                                </div>
                            </div>
                            <div class="text-align-center">
                                <button type="submit" class="btn btn_newsletter" name="submit-newsletter">
                                    <i class="fas fa-comments"></i>
                                    <span><?= $lang == 'vi' ? 'Gửi câu hỏi' : 'Sen your question' ?></span>
                                </button>
                            </div>
                            <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponsenewsletter_pro">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>