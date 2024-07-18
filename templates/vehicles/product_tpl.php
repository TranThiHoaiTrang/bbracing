<?php
$backgroud = '';
if ($pro_brand['icon']) {
    $backgroud = UPLOAD_PRODUCT_L . $pro_brand['icon'];
} elseif ($pro_list['icon']) {
    $backgroud = UPLOAD_PRODUCT_L . $pro_list['icon'];
} elseif ($pro_doday['icon']) {
    $backgroud = UPLOAD_PRODUCT_L . $pro_doday['icon'];
} else {
    $backgroud = UPLOAD_PHOTO_L . $background_banner['photo'];
}

$brand_list = $d->rawQuery("select * from #_product_brand where type = 'san-pham' and id_list REGEXP '" . $idl . "' and hienthi > 0 order by stt,id desc ");
?>
<div class="all_banner">
    <div class="fixwidth">
        <div id="background-banner" class="mb-2" style="background: #fff;">
            <div class="all_background_bn">
                <img src="<?= $backgroud ?>" alt="">
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

<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="all_sp_row">
            <div class="col_sp_1">
                <div class="all_fillter all_fillter_des">
                    <div class="all_hide_fillter">
                        <div class="hide_fillter">
                            <span><?= $lang == 'vi' ? 'Ẩn bộ lọc' : 'Hide fillter' ?> </span>
                            <div class="icon_danhmuc">
                                <i class="fas fa-minus"></i>
                            </div>
                        </div>
                        <div class="all_fillter_danhmuc">
                            <?php foreach ($vehicles as $b) {
                                $brand_xe_l = $d->rawQuery("select * from #_product_doday_list where type = ? and id_doday = ? order by stt,id desc", array($type, $b['id']));
                            ?>
                                <div class="all_brand_sp">
                                    <div class="title_brand active">
                                        <div class="check_vehicles" data-idvehicles="<?= $b['id'] ?>">
                                            <div class="icon_check_brand"><i class="far fa-square"></i></div>
                                            <span><?= $b['ten' . $lang] ?></span>
                                        </div>
                                        <!-- </?php if ($brand_xe_l) { ?>
                                            <div class="icon_danhmuc">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </?php } ?> -->
                                    </div>
                                    <div class="danhmuc_tong" style="display: none;">
                                        <ul class="all_danhmuc_con all_danhmuc_con_vhc_scroll">
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
                                        <option value="adenz"><?= $lang == 'vi' ? 'Theo A-Z' : 'Sort by A-Z' ?></option>
                                        <option value="zdena"><?= $lang == 'vi' ? 'Theo Z-A' : 'Sort by Z-A' ?></option>
                                        <option value="giathap"><?= $lang == 'vi' ? 'Theo giá – Thấp nhất' : 'Sort by Price – Lowest' ?></option>
                                        <option value="giacao"><?= $lang == 'vi' ? 'Theo giá - Cao nhất' : 'Sort by Price - Highest' ?></option>
                                        <option value="">Reset </option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn_loc_sp" data-toggle="modal" data-target="#loc_sp">
                            <span><?= $lang == 'vi' ? 'Lọc' : 'Filter' ?></span>
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="modal fade" id="loc_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding: 6px 16px;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="all_fillter_danhmuc">
                                            <?php foreach ($vehicles as $b) {
                                                $brand_xe_l = $d->rawQuery("select * from #_product_doday_list where type = ? and id_doday = ? order by stt,id desc", array($type, $b['id']));
                                            ?>
                                                <div class="all_brand_sp">
                                                    <div class="title_brand active">
                                                        <div class="check_vehicles" data-idvehicles="<?= $b['id'] ?>">
                                                            <div class="icon_check_brand"><i class="far fa-square"></i></div>
                                                            <span><?= $b['ten' . $lang] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="danhmuc_tong" style="display: none;">
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
                <?php if (isset($product) && count($product) > 0) { ?>
                    <?php
                    $arr_rong = [];
                    foreach ($vehicles as $k => $v) {
                        $name_ar = 'arr_rong_' . $v['id'];
                        $name_ar = [];
                        for ($i = 0; $i < count($product); $i++) {
                            if ($v['id'] == $product[$i]['id_doday']) {
                                $name_ar[$product[$i]['id']] = $product[$i];
                            }
                        }

                        $arr_rong[] = array_merge($name_ar);
                    }

                    ?>
                    <div class="all_sp_search">
                        <div class="load_product mainkhung_product ">
                            <?php foreach ($arr_rong as $prod) { ?>
                                <?php foreach ($prod as $k => $v) {
                                    $hinhanhsp = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='product' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc", array($v['id'], $v['type'], $v['type']));
                                    $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $v['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                ?>
                                    <div class="sanpham_moi_all">
                                        <div class="img_sp_moi">
                                            <!-- <div class="owl-carousel owl-theme auto_imgsanpham"> -->
                                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                                <img width="300" height="197" data-sizes="auto" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                                <?php if ($v['id_khuyenmai']) { ?>
                                                    <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                                <?php } ?>
                                            </a>

                                            <!-- </div> -->
                                        </div>
                                        <div class="all_content_sp_moi">
                                            <?php
                                            $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
                                            $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $v['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $brand_sp['id'] . "' limit 1");


                                            $giakhuyenmai = '';
                                            if (!empty($list_sp['id_news'])) {
                                                if ($dis_user['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($v['gia']) {
                                                            $khuyenmai = (($v['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $v['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($v['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $v['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($v['gia']) {
                                                            $khuyenmai = (($v['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $v['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($v['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $v['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } else {
                                                    if ($lang == 'vi') {
                                                        if ($v['gia']) {
                                                            $khuyenmai = (($v['gia'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $v['gia'] - $khuyenmai;
                                                        } else {

                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($v['giado'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $v['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                }
                                            } else {
                                                if ($dis_user['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($v['gia']) {
                                                            $khuyenmai = (($v['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $v['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($v['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $v['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($v['gia']) {
                                                            $khuyenmai = (($v['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $v['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($v['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $v['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <a href="<?= $brand_sp['tenkhongdauvi'] ?>">
                                                <div class="brand_sp"><?= $brand_sp['ten' . $lang] ?></div>
                                            </a>
                                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                                <div class="name_sp_moi text-split"><?= $v['ten' . $lang] ?></div>
                                            </a>
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
                                                    <?php if ($lang == 'vi') { ?>
                                                        <?php if ($giakhuyenmai) { ?>
                                                            <span class="giamoi"><?= $func->format_money($giakhuyenmai) ?></span>

                                                            <span class="giadel"><?= $func->format_money($v['gia']) ?></span>
                                                            <?php $sale = abs(round(((($giakhuyenmai / $v['gia']) * 100) - 100), 1));
                                                            if ($sale) {
                                                            ?>
                                                                <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                            <?php } ?>
                                                        <?php } elseif (!empty($v['giamoi']) || !empty($v['giadomoi'])) { ?>
                                                            <?php if ($v['giamoi']) { ?>
                                                                <span class="giamoi"><?= $func->format_money($v['giamoi']) ?></span>
                                                                <span class="giadel"><?= $func->format_money($v['gia']) ?></span>
                                                                <?php $sale = abs(round(((($v['giamoi'] / $v['gia']) * 100) - 100), 1));
                                                                if ($sale) {
                                                                ?>
                                                                    <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                                <?php } ?>
                                                            <?php } else {
                                                                $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                                $tigia_gia = round($tigia, 2);
                                                                $tigia_moi = $v['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                                $tigia_gia_moi = round($tigia_moi, 2);
                                                            ?>
                                                                <span class="giamoi"><?= $func->format_money($tigia_gia_moi) ?></span>
                                                                <span class="giadel"><?= $func->format_money($tigia_gia) ?></span>
                                                                <?php $sale = abs(round(((($tigia_gia_moi / $tigia_gia) * 100) - 100), 1));
                                                                if ($sale) {
                                                                ?>
                                                                    <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                                <?php } ?>
                                                            <?php } ?>

                                                        <?php } else { ?>
                                                            <?php if ($v['gia']) { ?>
                                                                <span class="giamoi"><?= $func->format_money($v['gia']) ?></span>
                                                            <?php } else {
                                                                $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                                $tigia_new = round($tigia, 2);
                                                            ?>
                                                                <span class="giamoi"><?= $func->format_money($tigia_new) ?></span>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if ($giakhuyenmai) { ?>
                                                            <span class="giamoi"><i class="fas fa-euro-sign"></i><?= $giakhuyenmai ?></span>
                                                            <?php if ($v['giado']) { ?>
                                                                <span class="giadel"><i class="fas fa-euro-sign"></i><?= $v['giado'] ?></span>

                                                                <?php $sale = abs(round(((($giakhuyenmai / $v['giado']) * 100) - 100), 1));
                                                                if ($sale) {
                                                                ?>
                                                                    <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <span class="giadel"><i class="fas fa-euro-sign"></i><?= $v['giado'] ?></span>

                                                                <?php $sale = abs(round(((($giakhuyenmai / $v['giado']) * 100) - 100), 1));
                                                                if ($sale) { ?>
                                                                    <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                                <?php } ?>
                                                            <?php } ?>

                                                        <?php } elseif (!empty($v['giadomoi'])) { ?>
                                                            <span class="giamoi"><i class="fas fa-euro-sign"></i><?= $v['giadomoi'] ?></span>
                                                            <span class="giadel"><i class="fas fa-euro-sign"></i><?= $v['giado'] ?></span>

                                                            <?php $sale = abs(round(((($v['giadomoi'] / $v['giado']) * 100) - 100), 1));
                                                            if ($sale) { ?>
                                                                <span class="batch"><i class="fas fa-long-arrow-alt-down"></i><?= $sale ?> %</span>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <span class="giamoi"><i class="fas fa-euro-sign"></i><?= $v['giado'] ?></span>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="giohang_sp">
                                                    <input type="hidden" name="cannang" class="cannang" value="<?= $v['cannang'] ?>">
                                                    <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $v['kichthuoc'] ?>">
                                                    <input type="hidden" name="color_detail" class="color_detail" value="<?= $v['id_mau'] ?>">
                                                    <?php if ($v['soluongkho'] <= 0) { ?>
                                                        <?php if ($v['cothemua'] <= 0) { ?>
                                                            <a class="muangay1">
                                                                <i class="fas fa-shopping-cart cart_hethang"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-lang="<?= $lang ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-lang="<?= $lang ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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
                    <div class="tintuc_noibat_sp">
                        <ul>
                            <?php foreach ($tintuc as $v) { ?>
                                <li>
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <div class="name_tintuc_noibat">
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
                    <!-- <div id="questions">
                        <?php foreach ($newsletter as $n) { ?>
                            <div class="row">
                                <div class="col-md-1 strong">Comment:</div>
                                <div class="col-md-11">
                                    <i><?= htmlspecialchars_decode($n['noidung']) ?></i>
                                    <br>
                                    <small><?= date("d/m/Y", $n['ngaytao']) ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 strong">Answer:</div>
                                <div class="col-md-11"><?= htmlspecialchars_decode($n['traloicauhoi']) ?></div>
                            </div>
                            <hr style="clear:both;">
                        <?php } ?>
                    </div> -->
                    <div class="mota_question">
                        <?php if ($lang == 'vi') { ?>
                            <strong>Quyền riêng tư của bạn: Không thêm bất kỳ thông tin cá nhân nào</strong>
                            vào hộp câu hỏi, chẳng hạn như tên, email, điện thoại, mọi người sẽ đọc nó; Để bảo vệ quyền riêng tư của bạn,
                            <strong>mọi câu hỏi bao gồm thông tin cá nhân đều bị hủy theo mặc định.</strong>
                        <?php } else { ?>
                            <strong>Your Privacy: Do not add any personal information</strong>
                            inside the question box, such as name, email, phone, everyone would read it; to protect your privacy,
                            <strong>every question which includes personal informations is by default canceled</strong>
                        <?php } ?>
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