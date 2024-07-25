<div class="wrap_slide_boloc" id="<?= $deviceType=='mobile' ? 'banner_sp_moi_mobile':'banner_sp_moi' ?>">
    <div class="all_search_border all_search_border_mobile">
        <div class="all_search">

            <div class="select_tong select_loaisanpham select_mobile">
                <div class="option_select" data-toggle="modal" data-target="#loc_loaisp_sp">
                    <span>
                        <?= $lang == 'vi' ? 'Loại Sản Phẩm' : 'Product type' ?>
                    </span>
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal fade" id="loc_loaisp_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 6px 16px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: 0;">
                                <ul class="results__options results__options__danhmuc" id="ul_select_loaisanpham">
                                    <!-- <li class="double_click" data-duongdan="catalogue" data-id="0"><?= $lang == 'vi' ? 'Loại sản phẩm' : 'Product type' ?></li> -->
                                    <?php foreach ($nhomdanhmuc_menu as $n) {
                                        if ($lang == 'vi') {
                                            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $n['id'] . "' and hienthi > 0 and noibat > 0 order by stt,id desc", array('san-pham'));
                                        } else {
                                            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $n['id'] . "' and hienthi > 0 and noibat > 0 order by stt,id desc", array('san-pham'));
                                        }
                                    ?>
                                        <li>
                                            <span><?= $n['ten' . $lang] ?></span>
                                            <ul>
                                                <?php foreach ($sp_list_ndm as $v) { ?>
                                                    <li class="double_click_ndm_mobile" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php
                                    if ($lang == 'vi') {
                                        $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by stt,id desc", array('san-pham'));
                                    } else {
                                        $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by stt,id desc", array('san-pham'));
                                    }
                                    // $col_danhmuc = ceil(count($sp_list_ndm) / 6);
                                    ?>
                                    <?php $j = 0;
                                    // for ($i = 0; $i < $col_danhmuc; $i++) {
                                    //     if ($lang == 'vi') {
                                    //         $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC  limit $j,6", array('san-pham'));
                                    //     } else {
                                    //         $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC  limit $j,6", array('san-pham'));
                                    //     }
                                    //     $j += 6;
                                    ?>
                                    <li class="phu-kien phu-kien">
                                        <span><?= $nhomdanhmuc_menu2['ten' . $lang] ?></span>
                                        <ul>
                                            <?php foreach ($sp_list_ndm as $v) { ?>
                                                <li class="double_click_ndm" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <!-- </?php } ?> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="select_tong select_thuonghieusanpham select_mobile">
                <div class="option_select" data-toggle="modal" data-target="#loc_thuonghieu_sp">
                    <span>
                        <?= $lang == 'vi' ? 'Thương Hiệu Sản Phẩm' : 'Product brands' ?>
                    </span>
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal fade" id="loc_thuonghieu_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 6px 16px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: 0;">
                                <ul class="results__options results__options_li" id="ul_select_thuonghieusanpham">
                                    <li class="double_click" data-duongdan="brand" data-id="0" data-idlist="0"><?= $lang == 'vi' ? 'Thương hiệu sản phẩm' : 'Product brands' ?></li>
                                    <?php foreach ($brand as $v) { ?>
                                        <li class="double_click" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>" data-idlist="<?= $v['id_list'] ?>"><?= $v['ten' . $lang] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="select_tong select_thuonghieuxe select_mobile">
                <div class="option_select" data-toggle="modal" data-target="#loc_thuonghieu_xe">
                    <span>
                        <?= $lang == 'vi' ? 'Thương Hiệu Xe' : 'Vehicle brand' ?>
                    </span>
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal fade" id="loc_thuonghieu_xe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 6px 16px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: 0;">
                                <ul class="results__options results__options_li" id="ul_select_thuonghieuxe">
                                    <li class="double_click" data-duongdan="vehicles" data-id="0"><?= $lang == 'vi' ? 'Thương hiệu xe' : 'Vehicle brand' ?></li>
                                    <?php foreach ($thuonghieuxe as $v) { ?>
                                        <li class="double_click" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="select_tong select_tenxe select_mobile">
                <!-- <option selected value="0"><?= $lang == 'vi' ? 'Tên xe' : 'Vehicle name' ?></option> -->
                <div class="option_select" data-toggle="modal" data-target="#loc_tenxe">
                    <span>
                        <?= $lang == 'vi' ? 'Tên Xe' : 'Vehicle name' ?>
                    </span>
                    <i class="fas fa-sort-down"></i>
                </div>
                <div class="modal fade" id="loc_tenxe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 6px 16px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 25px;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: 0;">
                                <ul class="results__options results__options_li" id="ul_select_tenxe">
                                    <li class="double_click" data-duongdan="vehicles" data-id="0"><?= $lang == 'vi' ? 'Tên xe' : 'Vehicle name' ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn_search_sp">
                <button type="submit" value="" class="search_sp" onclick="onSearchsp();">
                    <div><?= timkiem ?></div>
                </button>
                <input type="reset" class="btn_nhaplai reset" value="<?= nhaplai ?>" />
            </div>
        </div>
        <!-- <div class="all_search_ul"></div> -->
    </div>
</div>
<!-- </?php var_dump($_SESSION[$login_member]) ?> -->
<div class="wrap_bottom wrap_bottom_sp" id="<?= $deviceType=='mobile' ? 'banner_sp_moi_mobile':'banner_sp_moi' ?>">
    <div class="all_wrap_bottom">
        <div class="wrap_center wrap_center_sp">
            <div class="fixwidth">
                <div class="all_title_sp_nb">

                    <div class="title_sp_nb <?= $deviceType=='mobile' ? 'title_sp_nb_mb':'title_sp_nb' ?>">
                        <p class="control-sp prev-lsp transition"><i class="fas fa-angle-double-left"></i></p>
                        <span><?= $lang == 'vi' ? 'Danh mục' : 'Product'  ?></span>
                        <span class="<?= $deviceType=='mobile' ? 'span_title_sp_nb':'' ?>"><?= $lang == 'vi' ? 'Sản phẩm' : 'Portfolio'  ?></span>
                        <p class="control-sp next-lsp transition"><i class="fas fa-angle-double-right"></i></i></p>
                    </div>

                </div>
            </div>
            <div class="fixwidth">
                <div class="danhmucsp_control">
                    <?php
                    $list_sp_giamoi = ceil(count($list_sp_nb) / 6);
                    ?>
                    <div class="all_danhmuc_sp all_danhmuc_sp_des">
                        <div class="owl-carousel owl-theme auto_listsanpham">
                            <?php $j = 0;
                            for ($i = 0; $i < $list_sp_giamoi; $i++) { ?>
                                <div class="all_danhmuc_sp">
                                    <?php
                                    $sanpham_list = $d->rawQuery("select * from #_product_list where type = ? and hienthi > 0 and noibat > 0 order by stt,id desc limit $j,6", array('san-pham'));
                                    $j += 6;
                                    foreach ($sanpham_list as $v) {
                                    ?>
                                        <div class="danhmuc_sp">
                                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                                <img width="450" height="200" data-sizes="auto" src="<?=THUMBS?>/450x200x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="200">
                                                <div class="name_danhmuc_sp"><?= $v['ten' . $lang] ?></div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixwidth">
                <?php
                $list_sp_giamoi = ceil(count($list_sp_nb) / 4);
                ?>
                <div class="all_danhmuc_sp all_danhmuc_sp_mobile">
                    <div class="owl-carousel owl-theme auto_listsanpham">
                        <?php $j = 0;
                        for ($i = 0; $i < $list_sp_giamoi; $i++) { ?>
                            <div class="all_danhmuc_sp">
                                <?php
                                $sanpham_list = $d->rawQuery("select * from #_product_list where type = ? and hienthi > 0 and noibat > 0 order by stt,id desc limit $j,4", array('san-pham'));
                                $j += 4;
                                foreach ($sanpham_list as $v) {
                                ?>
                                    <div class="danhmuc_sp">
                                        <a href="<?= $v['tenkhongdauvi'] ?>">
                                            <img width="465" height="269" data-sizes="auto" src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                            <div class="name_danhmuc_sp"><?= $v['ten' . $lang] ?></div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrap_bottom" id="<?= $deviceType=='mobile' ? 'banner_sp_moi_mobile':'banner_sp_moi' ?>" style="padding-top: 0;">
    <div class="all_wrap_bottom">
        <div class="fixwidth">
            <div class="all_title_sp_nb all_title_sp_khuyenmai_mobile">
                <div class="title_sp_nb <?= $deviceType=='mobile' ? 'title_sp_nb_mb':'title_sp_nb' ?>">
                    <p class="control-sp prev-sp transition"><i class="fas fa-angle-double-left"></i></p>
                    <span><?= $lang == 'vi' ? 'Sản phẩm' : 'Product'  ?></span>
                    <span class="<?= $deviceType=='mobile' ? 'span_title_sp_nb':'' ?>"><?= $lang == 'vi' ? 'Khuyến mãi' : 'Sale'  ?></span>
                    <p class="control-sp next-sp transition"><i class="fas fa-angle-double-right"></i></i></p>
                </div>
            </div>
            <div class="row wrap_center wrap_center_km">
                <div class="col-md-4 col_title_sp">
                    <div class="all_title_sp_khuyenmai">
                        <div class="title_sp_km">
                            <span><?= $lang == 'vi' ? 'Sản phẩm' : 'Product'  ?></span>
                            <span><?= $lang == 'vi' ? 'Khuyến mãi' : 'Sale'  ?></span>
                        </div>
                        <div class="mota_spkm"><?= htmlspecialchars_decode($sp_khuyenmai['mota' . $lang]) ?></div>
                        <div class="noidung_spkm"><?= htmlspecialchars_decode($sp_khuyenmai['noidung' . $lang]) ?></div>
                        <div class="xemtatca_sp">
                            <a href="san-pham-khuyenmai"><?= $lang == 'vi' ? 'Xem tất cả' : 'See all' ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box-scroll box-scroll_mobile">
                        <div class="owl-carousel owl-theme auto_sanpham">
                            <?php
                            $sanpham_giamoi = $d->rawQuery("select * from #_product where type = ? and hienthi > 0 and hot > 0 order by stt,id desc", array('san-pham'));
                            foreach ($sanpham_giamoi as $v) {
                                $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $v['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
                            ?>
                                <div class="all_box">

                                    <div class="sanpham_moi_all">
                                        <div class="img_sp_moi">
                                            <a href="<?= $v['tenkhongdauvi'] ?>"><img width="300" height="197" data-sizes="auto" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px"></a>
                                            <?php if ($v['id_khuyenmai']) { ?>
                                                <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                            <?php } ?>
                                        </div>
                                        <div class="all_content_sp_moi">
                                            <?php

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
                                                    <?= $func->chuyendoitigia($v) ?>
                                                </div>
                                                <div class="giohang_sp">
                                                    <input type="hidden" name="cannang" class="cannang" value="<?= $v['cannang'] ?>">
                                                    <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $v['kichthuoc'] ?>">
                                                    <input type="hidden" name="color_detail" class="color_detail" value="<?= $v['id_mau'] ?>">
                                                    <?php if ($v['soluongkho'] <= 0) { ?>
                                                        <?php if ($v['cothemua'] <= 0) { ?>
                                                            <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
                                                                <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                            </a>
                                                        <?php } else { ?>
                                                            <?php if ($lang == 'vi') { ?>
                                                                <?php if ($v['gia'] <= 0) { ?>
                                                                    <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                    <a  href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                    </div>
                    <div class="box-scroll">
                        <?php
                        $sanpham_giamoi_cal = $d->rawQuery("select * from #_product where type = ? and hienthi > 0 and hot > 0 order by stt,id desc", array('san-pham'));
                        $col_giamoi = ceil(count($sanpham_giamoi_cal) / 6);
                        ?>
                        <!-- <p class="control-sp prev-sp transition"><i class="fas fa-chevron-left"></i></p> -->
                        <div class="owl-carousel owl-theme auto_sanpham">
                            <?php $j = 0;
                            for ($i = 0; $i < $col_giamoi; $i++) { ?>
                                <div class="all_box">
                                    <?php
                                    $sanpham_giamoi = $d->rawQuery("select * from #_product where type = ? and hienthi > 0 and hot > 0 order by stt,id desc limit $j,6", array('san-pham'));
                                    $j += 6;
                                    foreach ($sanpham_giamoi as $v) {
                                        $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $v['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                        $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
                                    ?>
                                        <div class="sanpham_moi_all">
                                            <div class="img_sp_moi">
                                                <a href="<?= $v['tenkhongdauvi'] ?>"><img width="300" height="197" data-sizes="auto" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px"></a>
                                                <?php if ($v['id_khuyenmai']) { ?>
                                                    <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                                <?php } ?>
                                            </div>
                                            <div class="all_content_sp_moi">

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
                                                        <?= $func->chuyendoitigia($v) ?>
                                                    </div>
                                                    <div class="giohang_sp">
                                                        <input type="hidden" name="cannang" class="cannang" value="<?= $v['cannang'] ?>">
                                                        <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $v['kichthuoc'] ?>">
                                                        <input type="hidden" name="color_detail" class="color_detail" value="<?= $v['id_mau'] ?>">
                                                        <?php if ($v['soluongkho'] <= 0) { ?>
                                                            <?php if ($v['cothemua'] <= 0) { ?>
                                                                <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
                                                                    <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                                    <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                                </a>
                                                            <?php } else { ?>
                                                                <?php if ($lang == 'vi') { ?>
                                                                    <?php if ($v['gia'] <= 0) { ?>
                                                                        <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                        <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                    <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                                                    <a href="<?=$config_base?>" onclick="event.preventDefault();" class="muangay1">
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
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <p class="control-sp next-sp transition"><i class="fas fa-chevron-right"></i></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($optsetting['link_youtube']) { ?>
    <div class="wrap_bottom" style="padding: 0px;">
        <?php $id_youtube = $func->getYoutube($optsetting['link_youtube']) ?>
        <div class="all_wap_bottom all_wap_bottom_video">
            <!-- <video width="100%" height="100%" style="display: block;" loop="true" autoplay="autoplay" controls muted playsinline="" data-wf-ignore="true" data-object-fit="cover">
            <source src="./assets/images/Brembo_video_landing_new_01122022.mp4" type="video/mp4" />
        </video> -->
            <iframe class="background-video-embed" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="no-referrer" title="Zard | World Première Products Background" width="100%" loading="lazy" src="https://www.youtube.com/embed/<?= $id_youtube ?>?autoplay=1&mute=1&controls=0&rel=0&enablejsapi=1&loop=1&playlist=<?= htmlspecialchars($id_youtube, ENT_QUOTES, 'UTF-8') ?>" id="widget2"></iframe>
        </div>
    </div>
<?php } ?>

<?php if ($event) { ?>
    <div class="wrap_bottom" style="padding-top: 20px;padding-bottom: 0;" id="<?= $deviceType=='mobile' ? 'banner_sp_moi_mobile':'banner_sp_moi' ?>">
        <div class="all_wrap_bottom">
            <div class="wrap_center wrap_center_event fixwidth">
                <?php if ($banner_event) { ?>
                    <div class="all_banner_event">
                        <div class="img_banner_event">
                            <img src="<?= UPLOAD_PHOTO_L . $banner_event['photo'] ?>" alt="">
                        </div>
                        <div class="content_banner_event">
                            <div class="name_event"><?= $banner_event['ten' . $lang] ?></div>
                            <div class="mota_event"><?= $banner_event['mota' . $lang] ?></div>
                            <div class="noidung_event"><?= $banner_event['noidung' . $lang] ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="all_news_event">
                    <div class="owl-carousel owl-theme auto_social">
                        <?php foreach ($event as $v) { ?>
                            <div class="event">
                                <div class="img_event">
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <img src="<?= THUMBS ?>/800x325x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" width="600" height="244">
                                    </a>
                                </div>
                                <div class="content_event">
                                    <!-- <a class="logo_event" href=""><img onerror="this.src='<?= THUMBS ?>/0x100x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a> -->
                                    <div class="name_event_news"><?= $v['ten' . $lang] ?></div>
                                    <div class="motangan_event_news"><?= htmlspecialchars_decode($v['motangan' . $lang]) ?></div>
                                    <div class="mota_event_news"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <div class="xemthem_sp">
                                            <span>Xem thêm</span>
                                            <img src="./assets/images/right.png" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($tintuc) { ?>
    <div class="wrap_bottom wrap_tintuc" id="<?= $deviceType=='mobile' ? 'banner_sp_moi_mobile':'banner_sp_moi' ?>">
        <div class="all_wrap_bottom">
            <div class="wrap_center ">
                <div class="fixwidth">
                    <div class="all_title_sp_nb">

                        <div class="title_sp_nb <?= $deviceType=='mobile' ? 'title_sp_nb_mb':'title_sp_nb' ?>">
                            <p class="control-sp prev-lsp transition"><i class="fas fa-angle-double-left"></i></p>
                            <span><?= $lang == 'vi' ? 'Tin tức' : 'Featured'  ?></span>
                            <span class="<?= $deviceType=='mobile' ? 'span_title_sp_nb':'' ?>"><?= $lang == 'vi' ? 'Nổi bật' : 'News'  ?></span>
                            <p class="control-sp next-lsp transition"><i class="fas fa-angle-double-right"></i></i></p>
                        </div>

                    </div>
                </div>
                <div class="all_tintuc_noibat">
                    <!-- <p class="control-dv prev-dv transition"><i class="fas fa-chevron-left"></i></p> -->
                    <div class="owl-carousel owl-theme owl-dv">
                        <?php foreach ($tintuc as $v) { ?>

                            <div class="tintuc">
                                <div class="img_tintuc">
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <img src="<?= THUMBS ?>/660x478x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" width="330" height="239">
                                    </a>
                                </div>
                                <div class="content_tintuc">
                                    <div class="time_news">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span><?= date("d M Y", $v['ngaytao']) ?></span>
                                    </div>
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <div class="name_tintuc"><?= $v['ten' . $lang] ?></div>
                                    </a>
                                    <div class="mota_tintuc"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <!-- <p class="control-dv next-dv transition"><i class="fas fa-chevron-right"></i></p> -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>