<div class="all_banner">
    <!-- <div id="background-banner" class="mb-5"> -->
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <!-- <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
<div class="fixpage_product">
    <div class="clearfix">
        <div class="grid-pro-detail w-clear">
            <div class="left-pro-detail w-clear">
                <div class="left_pro_img_all">
                    <?php if ($row_detail['id_khuyenmai']) {
                        $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $row_detail['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                    ?>
                        <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;z-index: 9;">
                    <?php } ?>
                    <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/600x395x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>"></a>
                    <?php if ($hinhanhsp || $row_detail['video']) {
                        if (count($hinhanhsp) > 0 || $row_detail['video']) { ?>
                            <div class="all_gallery_thumb_pro">
                                <div class="gallery_thumb">
                                    <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                        <img onerror="this.src='<?= THUMBS ?>/600x400x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                    </a>
                                    <?php foreach ($hinhanhsp as $v) { ?>
                                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                            <img onerror="this.src='<?= THUMBS ?>/600x400x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                        </a>
                                    <?php } ?>
                                    <?php if ($row_detail['video']) {
                                        $videoID = $func->getYoutube($row_detail['video']);
                                        if ($videoID) {
                                            $thumbnailUrl = "https://img.youtube.com/vi/" . $videoID . "/hqdefault.jpg";
                                    ?>
                                            <a class="thumb-pro-detail thumbs_video" data-fancybox="video" data-src="<?= $row_detail['video'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                                <img src="<?= $thumbnailUrl ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                            </a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>

            <div class="all_center_right_title_pro_detail">
                <div class="product-title">
                    <h1 class="tp_product_detail_name"><?= $row_detail['ten' . $lang] ?></h1>
                </div>
                <div class="all_center_right_pro_detail">
                    <div class="center-pro-detail">
                        <div class="all_nhasanxuat">
                            <div class="nhasanxuat">
                                <span><?= $lang == 'vi' ? 'Nhà sản xuất: ' : 'Manufacturer: ' ?></span>
                                <strong><?= $pro_brand['ten' . $lang] ?></strong>
                            </div>
                            <div class="nhasanxuat">
                                <span><?= masp ?>: </span>
                                <strong><?= $row_detail['masp'] ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="right-pro-detail w-clear">
                        <ul class="attr-pro-detail all_nhasanxuat">
                            <li class="w-clear">
                                <div class="gia_detail"><?= $lang == 'vi' ? 'Giá sản phẩm' : 'Our Price' ?></div>

                                <div class="attr-content-pro-detail">
                                    <?= $func->hienthichuyendoitigia_pro_detail($row_detail, $pro_brand) ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="all_center_right_pro_detail all_center_right_pro_detail_khuyenmai mt-3">
                    <div class="center-pro-detail">
                        <!-- <div class="phuong_thuc_thanh_toan">
                            <?php if ($row_detail['soluongkho'] > 0) { ?>
                                <?php if ($row_detail['cothemua'] > 0) { ?>
                                    <div class="sp_kho">
                                        <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                        <span><?= $lang == 'vi' ? 'Có sẵn' : 'Available' ?></span>
                                    </div>

                                <?php } else { ?>
                                    <div class="sp_kho kho_hethang">
                                        <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                        <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="sp_kho kho_hethang">
                                    <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                    <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                </div>
                            <?php } ?>
                            <div class="trahang">
                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                <span>
                                    <?= $lang == 'vi' ? 'Phương thức thanh toán: Credit Card, Express bank tranfer, Bank tranfer, ATM, E-wallet' : 'Payment Methods: Credit Card, Express bank tranfer, Bank tranfer, ATM, E-wallet' ?>
                                </span>
                            </div>
                        </div> -->

                        <?php if ($row_detail['id_khuyenmai']) { ?>
                            <?php
                            $khuyenmai = $d->rawQueryOne("select * from #_news where type = 'khuyenmai' and id = '" . $row_detail['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc");
                            ?>
                            <div class="all_km_del_pro">
                                <!-- Time -->
                                <div style="padding: 0 2px 10px 2px;">
                                    <div id="Countdown_1" class="flash_sales_clock flip"></div>
                                </div>
                                <input type="hidden" name="id_khuyenmai" class="id_khuyenmai" value="<?= $khuyenmai['id'] ?>">
                                <div class="flash_sale_cover">
                                    <!-- <img class="imgm img-thumbnail" style="border: none;" src="<?= UPLOAD_NEWS_L . $khuyenmai['photo'] ?>" width="100%"> -->
                                    <span><?= $khuyenmai['ten' . $lang] ?></span>
                                </div>
                                <!-- <div class="flash_sale_msg"><?= htmlspecialchars_decode($khuyenmai['mota' . $lang]) ?></div> -->
                                <input type="hidden" id="ngayktsukien" name="ngayktsukien" value="<?= date('Y-m-d h:i:s', $khuyenmai['ngayketthuc']) ?>">

                            </div>
                        <?php } ?>

                    </div>
                    <div class="right-pro-detail w-clear">
                        <!-- <div class="sp_cs"></?= $lang == 'vi' ? '*Giới hạn số lượng mua' : '*Limit the amount of purchase' ?></div> -->

                        <!-- </?php if (isset($row_detail['mota' . $lang])) { ?>
                            <div class="box-gift-detail">
                                <?= htmlspecialchars_decode($row_detail['mota' . $lang]) ?>
                            </div>
                        </?php } ?> -->
                        <?php if ($row_detail['soluongkho'] > 0) { ?>
                            <?php if ($row_detail['cothemua'] > 0) { ?>

                                <?php if ($lang == 'vi') { ?>
                                    <?php if ($row_detail['gia'] <= 0) { ?>
                                        <div class="wrap-addcart clearfix">
                                            <a class=" muangay">
                                                <i class="fas fa-shopping-cart"></i>
                                                <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                            </a>
                                            <!-- <button type="button" class="btn btn-primary btn_thongbao_cohang" data-toggle="modal" data-target="#thongbao_cohang">
                                                <?= $lang == 'vi' ? 'Thông báo cho tôi khi có hàng' : 'Email me when Back-In-Stock' ?>
                                            </button> -->
                                        </div>
                                    <?php } else { ?>
                                        <div class="selector-actions">
                                            <div class="w-clear swatch">
                                                <div class="header_quantity"><?= $lang == 'vi' ? 'Số lượng' : 'Quantity' ?>:</div>
                                                <div class="attr-content-pro-detail">
                                                    <div class="quantity-pro-detail">
                                                        <?php if ($row_detail['cothemua']) { ?>
                                                            <?php if ($row_detail['cothemua'] < $row_detail['soluongkho']) { ?>
                                                                <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['cothemua'] ?>" data-action="minus">-</button>
                                                                <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['cothemua'] ?>" pattern="[1-9]{10}" value="1">
                                                                <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['cothemua'] ?>" data-action="plus">+</button>
                                                            <?php } else { ?>
                                                                <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="minus">-</button>
                                                                <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                                                <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="plus">+</button>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="minus">-</button>
                                                            <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                                            <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="plus">+</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cannang" class="cannang" value="<?= $row_detail['cannang'] ?>">
                                        <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $row_detail['kichthuoc'] ?>">
                                        <input type="hidden" name="color_detail" class="color_detail" value="<?= $row_detail['id_mau'] ?>">
                                        <div class="wrap-addcart clearfix">
                                            <a class=" addcart muangay" data-action="buynow" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-id="<?= $row_detail['id'] ?>" data-name="<?= $row_detail['tenvi'] ?>" data-gia="<?= $func->format_money($row_detail['gia']) ?>">
                                                <i class="fas fa-shopping-cart"></i>
                                                <?= $lang == 'vi' ? 'Thêm vào giỏ hàng' : 'Add to cart' ?>
                                            </a>
                                        </div>
                                    <?php } ?>

                                <?php } else { ?>
                                    <?php if ($row_detail['giado'] <= 0) { ?>
                                        <div class="wrap-addcart clearfix">
                                            <a class=" muangay">
                                                <i class="fas fa-shopping-cart"></i>
                                                <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                            </a>
                                            <!-- <button type="button" class="btn btn-primary btn_thongbao_cohang" data-toggle="modal" data-target="#thongbao_cohang">
                                                <?= $lang == 'vi' ? 'Thông báo cho tôi khi có hàng' : 'Email me when Back-In-Stock' ?>
                                            </button> -->
                                        </div>
                                    <?php } else { ?>
                                        <div class="selector-actions">
                                            <div class="w-clear swatch">
                                                <div class="header_quantity"><?= $lang == 'vi' ? 'Số lượng' : 'Quantity' ?>:</div>
                                                <div class="attr-content-pro-detail">
                                                    <div class="quantity-pro-detail">
                                                        <?php if ($row_detail['cothemua']) { ?>
                                                            <?php if ($row_detail['cothemua'] < $row_detail['soluongkho']) { ?>
                                                                <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['cothemua'] ?>" data-action="minus">-</button>
                                                                <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['cothemua'] ?>" pattern="[1-9]{10}" value="1">
                                                                <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['cothemua'] ?>" data-action="plus">+</button>
                                                            <?php } else { ?>
                                                                <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="minus">-</button>
                                                                <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                                                <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="plus">+</button>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <button type="button" class="quantity-minus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="minus">-</button>
                                                            <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                                            <button type="button" class="quantity-plus-pro-detail" data-soluongkho="<?= $row_detail['soluongkho'] ?>" data-action="plus">+</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cannang" class="cannang" value="<?= $row_detail['cannang'] ?>">
                                        <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $row_detail['kichthuoc'] ?>">
                                        <input type="hidden" name="color_detail" class="color_detail" value="<?= $row_detail['id_mau'] ?>">
                                        <div class="wrap-addcart clearfix">
                                            <a class=" addcart muangay" data-action="buynow" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-id="<?= $row_detail['id'] ?>" data-name="<?= $row_detail['tenvi'] ?>" data-gia="<?= $func->format_money($row_detail['gia']) ?>">
                                                <i class="fas fa-shopping-cart"></i>
                                                <?= $lang == 'vi' ? 'Thêm vào giỏ hàng' : 'Add to cart' ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>

                            <?php } else { ?>
                                <div class="wrap-addcart clearfix">
                                    <a class=" muangay">
                                        <i class="fas fa-shopping-cart"></i>
                                        <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                    </a>
                                    <!-- <button type="button" class="btn btn-primary btn_thongbao_cohang" data-toggle="modal" data-target="#thongbao_cohang">
                                        <?= $lang == 'vi' ? 'Thông báo cho tôi khi có hàng' : 'Email me when Back-In-Stock' ?>
                                    </button> -->
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="wrap-addcart clearfix">
                                <a class=" muangay">
                                    <i class="fas fa-shopping-cart"></i>
                                    <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                </a>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary btn_thongbao_cohang" data-toggle="modal" data-target="#thongbao_cohang">
                                    <?= $lang == 'vi' ? 'Thông báo cho tôi khi có hàng' : 'Email me when Back-In-Stock' ?>
                                </button> -->
                            </div>
                        <?php } ?>
                        <div class="section-dt">
                            <div class="row info-bellow-product">
                                <?php foreach ($cs_sanpham as $v) { ?>
                                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                        <div class="banner_ql_item">
                                            <img class="lazyautosizes lazyloaded" data-sizes="auto" src="<?= UPLOAD_NEWS_L . $v['photo'] ?>" data-src="<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" sizes="32px">
                                            <p class="banner-footer-item-title">
                                                <?= $v['ten' . $lang] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $i = 1;
                            foreach ($cs_pro as $cs_p) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="<?= $cs_p['id'] ?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $cs_p['id'] . $i ?>" aria-expanded="true" aria-controls="<?= $cs_p['id'] . $i ?>">
                                                <?= $cs_p['ten' . $lang] ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?= $cs_p['id'] . $i ?>" class="panel-collapse collapse in collapse" role="tabpanel" aria-labelledby="<?= $cs_p['id'] ?>">
                                        <div class="panel-body">
                                            <img src="<?= UPLOAD_NEWS_L . $cs_p['photo'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            } ?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($row_detail['id_option'])) {?>
                <div class="all_option_des_ulli">
                    <?php
                    $id_option = $d->rawQuery("select id,tenvi,tenen,tenkhongdauvi from #_product_option where id REGEXP '" . $row_detail['id_option'] . "' and type = '$type'");
                    // $id_option = explode('|', $row_detail['id_option']);
                    ?>
                    <?php if($row_detail['hienthi_option'] == 0) {?>
                    <ul class="nav nav-pills mb-2" id="pills-tab-idop" role="tablist">
                        <?php
                        foreach ($id_option as $idop) {
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-<?= $idop['tenkhongdauvi'] ?>-tab" data-toggle="pill" data-target="#pills-<?= $idop['tenkhongdauvi'] ?>" type="button" role="tab" aria-controls="pills-<?= $idop['tenkhongdauvi'] ?>" aria-selected="true"><?= $idop['ten' . $lang] ?></button>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        foreach ($id_option as $idop) {
                            $all_option_list = $d->rawQuery("select id,tenvi,tenen,tenkhongdauvi from #_product_option_list where id_option = '" . $idop['id'] . "' and id REGEXP '^(" . $row_detail['id_option_list'] . ")$' and type = '$type'");
                            // var_dump("select id,tenvi,tenen,tenkhongdauvi from #_product_option_list where id_option = '" . $idop['id'] . "' and id REGEXP '^(" . $row_detail['id_option_list'] . ")$' and type = '$type'");
                        ?>
                            <div class="tab-pane fade" id="pills-<?= $idop['id'] ?>" role="tabpanel" aria-labelledby="pills-<?= $idop['id'] ?>-tab">

                                <ul class="nav nav-pills mb-2" id="pills-tab-option-list" role="tablist">
                                    <?php
                                    usort($all_option_list, function($a, $b) {
                                        $a_value = (int)str_replace(',', '', $a);
                                        $b_value = (int)str_replace(',', '', $b);
                                        return $a_value - $b_value;
                                    });
                                    foreach ($all_option_list as $idol) {
                                    ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-<?= $idol['tenkhongdauvi'] ?>-tab" data-toggle="pill" data-target="#pills-<?= $idol['tenkhongdauvi'] ?>" type="button" role="tab" aria-controls="pills-<?= $idol['tenkhongdauvi'] ?>" aria-selected="true"><?= $idol['ten' . $lang] ?></button>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <?php
                                    for ($i = 0; $i < count($all_option_list); $i++) {
                                        $all_danhsach_option = explode('/', $row_detail['danhsach_option']);
                                        
                                        $danhsach_option = explode(',', $all_danhsach_option[$i]);
                                        $id_sp = explode('|', $danhsach_option[1]);
                                        $where = '';
                                        foreach ($id_sp as $tk) {
                                            $where .= "'$tk'" . ',';
                                        }

                                        $all_sp_product = $d->rawQuery("select * from #_product where id IN (" . substr($where, 0, -1) . ")");
                                    ?>
                                        <div class="tab-pane fade" id="pills-<?= $all_option_list[$i]['tenkhongdauvi'] ?>" role="tabpanel" aria-labelledby="pills-<?= $all_option_list[$i]['tenkhongdauvi'] ?>-tab">
                                            <div class="all_sp_option_li">
                                                <?php foreach ($all_sp_product as $sp) { ?>
                                                    <a href="<?= $sp['tenkhongdau'.$lang] ?>">
                                                        <div class="sp_option_li <?= $sp['id']==$row_detail['id'] ? 'active':'' ?>">
                                                            <div class="tenvi_option"><?= $sp['ten' . $lang] ?></div>
                                                            <div class="all_gia_sp_option">
                                                                <?= $func->chuyendoitigia($sp) ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="taifile">
            <span>Catologue:</span>
            <input type="hidden" name="id_user" class="id_user" value="<?= $_SESSION[$login_member]['id'] ?>">
            <a id="dowload_taptin" class="dowload_taptin" data-id="<?= $row_detail['id'] ?>" href="<?= $config_base ?>/upload/file/<?= $row_detail['taptin'] ?>">
                <i class="fas fa-arrow-circle-down"></i>
                <span><?= $row_detail['taptin'] ?></span>
            </a>
        </div>

        <div class="row" style="width: auto;margin-right: -15px;margin-left: -15px;">
            <div class="col-md-9">
                <!-- </?php if (!empty($row_detail['noidung' . $lang]) || (!empty($row_detail['ungdung' . $lang])) || (!empty($row_detail['luuy' . $lang])) || (!empty($row_detail['cauhoi' . $lang])) || (!empty($row_detail['cauhoi' . $lang])) || (!empty($row_detail['tintuc' . $lang]))) { ?> -->
                <div class="descriptionheader_noidung">

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php if ($row_detail['noidung' . $lang]) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                    <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                    <span><?= $lang == 'vi' ? 'Mô tả' : 'Description' ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($row_detail['ungdung' . $lang]) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-ungdung-tab" data-toggle="pill" href="#pills-ungdung" role="tab" aria-controls="pills-ungdung" aria-selected="false">
                                    <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                    <span><?= $lang == 'vi' ? 'Ứng dụng' : 'Application' ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <!-- <?php if ($row_detail['luuy' . $lang]) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-luuy-tab" data-toggle="pill" href="#pills-luuy" role="tab" aria-controls="pills-luuy" aria-selected="false">
                                        <div class="icon_des"><i class="fas fa-book"></i></div>
                                        <span><?= $lang == 'vi' ? 'Lưu ý' : 'Note' ?></span>
                                    </a>
                                </li>
                            <?php } ?> -->
                        <!-- </?php if ($row_detail['cauhoi' . $lang]) { ?> -->
                        <li class="nav-item">
                            <a class="nav-link" id="pills-cauhoi-tab" data-toggle="pill" href="#pills-cauhoi" role="tab" aria-controls="pills-cauhoi" aria-selected="false">
                                <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                <span><?= $lang == 'vi' ? 'Câu hỏi' : 'Question' ?></span>
                            </a>
                        </li>
                        <!-- </?php } ?> -->
                        <!-- </?php if ($row_detail['tintuc' . $lang]) { ?> -->
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tintuc-tab" data-toggle="pill" href="#pills-tintuc" role="tab" aria-controls="pills-tintuc" aria-selected="false">
                                <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                <span><?= $lang == 'vi' ? 'Tin tức' : 'News' ?></span>
                            </a>
                        </li>
                        <!-- </?php } ?> -->
                    </ul>
                </div>
                <!-- </?php } ?> -->
                <div class="product_detail">
                    <div class="tab-content" id="pills-tabContent">
                        <?php if ($row_detail['noidung' . $lang]) { ?>
                            <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
                            </div>
                        <?php } ?>
                        <?php if ($row_detail['ungdung' . $lang]) { ?>
                            <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-ungdung" role="tabpanel" aria-labelledby="pills-ungdung-tab">
                                <?= (isset($row_detail['ungdung' . $lang]) && $row_detail['ungdung' . $lang] != '') ? htmlspecialchars_decode($row_detail['ungdung' . $lang]) : '' ?>
                            </div>
                        <?php } ?>
                        <!-- <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-luuy" role="tabpanel" aria-labelledby="pills-luuy-tab">
                            <?= (isset($row_detail['luuy' . $lang]) && $row_detail['luuy' . $lang] != '') ? htmlspecialchars_decode($row_detail['luuy' . $lang]) : '' ?>
                        </div> -->
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-cauhoi" role="tabpanel" aria-labelledby="pills-cauhoi-tab">
                            <div class="all_danhgia_sp">
                                <?php
                                // $newsletter = $d->rawQuery("select * from #_newsletter where type = 'comment' and id_sanpham = '" . $row_detail['id'] . "' ");
                                ?>
                                <div id="questions" class="paging-questions" data-id="<?= $row_detail['id'] ?>">

                                </div>

                                <div class="lead">
                                    <?= $lang == 'vi' ? 'Hỏi & Đáp' : 'Question & Answer ' ?>
                                </div>
                                <div class="mota_question mota_question_readmore">
                                    <?php if ($lang == 'vi') { ?>
                                        <p>
                                            Phần sau đây được dành riêng để trả lời các câu hỏi liên quan đến chức năng, cách sử dụng và lợi ích của sản phẩm. Nếu bạn cần hỗ trợ về một khía cạnh khác của sản phẩm, vui lòng điều hướng đến trang thích hợp và đăng truy vấn của bạn ở đó. Xin lưu ý rằng phần này không phải là nơi thích hợp để hỏi về giá cả, tính sẵn có, giao hàng hoặc vận chuyển. Để biết thông tin như vậy, vui lòng nhấp vào "MyAccount" và sau đó "Đăng nhập hoặc Đăng ký" ở đầu trang.
                                        </p>
                                        <p>
                                            Quyền riêng tư của bạn rất quan trọng. Vui lòng không bao gồm thông tin cá nhân trong hộp câu hỏi vì nó sẽ được hiển thị cho mọi người. Các câu hỏi có thông tin cá nhân sẽ được coi là bí mật.
                                        </p>
                                    <?php } else { ?>
                                        <p>
                                            The following section is dedicated to answering questions related to the product's functionality, usage, and benefits. If you require assistance with a different aspect of the product, please navigate to the appropriate page and post your query there. Please note that this section is not the right place to inquire about pricing, availability, delivery, or shipping. For such information, please click on "MyAccount" and then "Login or Register" at the top of the page.
                                        </p>
                                        <p>
                                            Your Privacy is important. Please do not include personal information in the question box as it will be visible to everyone. Questions with personal information will be treated as confidential.
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="from_question">
                                    <form class="form-newsletter validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="type" value="comment">
                                        <input type="hidden" name="id_sanpham" value="<?= $row_detail['id'] ?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><?= hoten ?>*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="name-newsletter" name="name-newsletter" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Email*</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="email-newsletter" name="email-newsletter" required />
                                            </div>
                                        </div>
                                        <div class="form-group flex-column align-items-center">
                                            <div class="col-sm-8 check_dongy_new">
                                                <input type="checkbox" class="form-control" id="myCheck" name="myCheck" required />
                                                <?php if ($lang == 'vi') { ?>
                                                    <span required>Tôi đã đọc và chấp nhận hoàn toàn thông tin về việc sử dụng dữ liệu cá nhân</span>
                                                <?php } else { ?>
                                                    <span required>I have read and integrally accept information about use of personal data</span>
                                                <?php } ?>
                                                <div class="invalid-feedback"><?= $lang == 'vi' ? 'Bạn chưa chọn ô này' : 'You have not selected this box' ?></div>
                                            </div>
                                            <label class="col-sm-8">
                                                <?php if ($lang == 'vi') { ?>
                                                    *Thông tin sẽ được bảo mật hoàn toàn
                                                <?php } else { ?>
                                                    Information will be kept strictly confidential.
                                                <?php } ?>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><?= noidung ?>*</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="noidung-newsletter" name="noidung-newsletter" cols="50" rows="5" required /></textarea>
                                            </div>
                                        </div>
                                        <div class="text-align-center">
                                            <button type="submit" class="btn btn_newsletter" name="submit-newsletter">
                                                <i class="fas fa-comments"></i>
                                                <span><?= $lang == 'vi' ? 'Gửi bình luận' : 'Send your comment' ?></span>
                                            </button>
                                        </div>
                                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponsenewsletter_prodetail">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-tintuc" role="tabpanel" aria-labelledby="pills-tintuc-tab">
                            <div class="all_danhgia_sp">
                                <!-- <div class="descriptionheader" style="margin-bottom:10px;">
                                    <span class="glyphicon glyphicon-comment mr-2">
                                        <i class="fas fa-book-reader"></i>
                                    </span>
                                    <span class="lead">
                                        <?= $lang == 'vi' ? 'Tin tức' : 'News' ?>
                                    </span>
                                </div> -->
                                <?php
                                if ($row_detail['id_brand']) {
                                    $tintucbrand = $d->rawQuery("select * from #_news where type = ? and id_brand = '" . $row_detail['id_brand'] . "' and hienthi > 0 order by stt,id desc limit 5", array('tintuc'));
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
                                    <span>
                                        <i class="fas fa-angle-double-right"></i>
                                        <?= $lang == 'vi' ? 'Mới nhất' : 'Latest news' ?>:
                                    </span>
                                    <ul>
                                        <?php foreach ($tintucbrand as $v) { ?>
                                            <li>
                                                <a href="<?= $v['tenkhongdau'.$lang] ?>">
                                                    <div class="name_tintuc_noibat">
                                                        <span><?= $v['ten' . $lang] ?></span>
                                                    </div>
                                                    <div class="xem_tintuc_noibat">
                                                        <?= $lang == 'vi' ? 'Xem tất cả' : 'See All' ?>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php foreach ($tintucnb as $v) {
                                            foreach ($tintucbrand as $ttb) {
                                                if ($v['id'] != $ttb['id']) {
                                        ?>
                                                    <li>
                                                        <a href="<?= $v['tenkhongdau'.$lang] ?>">
                                                            <div class="name_tintuc_noibat tt_nb">
                                                                <span><?= $v['ten' . $lang] ?></span>
                                                            </div>
                                                            <div class="xem_tintuc_noibat">
                                                                <?= $lang == 'vi' ? 'Xem tất cả' : 'See All' ?>
                                                            </div>
                                                        </a>
                                                    </li>
                                        <?php }
                                            }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="taifile">
                    <div class="descriptionheader mb-2">
                        <span><?= $lang == 'vi' ? 'Phụ tùng thay thế ' : 'Spare part' ?></span>
                    </div>
                    <?php
                    $sp_thaythe = $d->rawQuery("select * from #_product where type = ? and id_list = ? and id_cat = ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
                    // var_dump("select * from #_product where type = ? and id_list = ? and id_cat = ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
                    ?>
                    <div class=" paging-productthaythe-index" data-id="<?= $row_detail['id_list'] ?>" data-idcat="<?= $row_detail['id_cat'] ?>"></div>
                </div>

                <div class="all_sp_cungloai">
                    <div class="descriptionheader">
                        <span><?= $lang == 'vi' ? 'Sản phẩm cùng thương hiệu' : 'Same as brand name' ?></span>
                    </div>
                    <?php
                    $sp_thaythe = $d->rawQuery("select * from #_product where type = ? and id_brand = ? and id != ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_brand'], $row_detail['id']));
                    ?>
                    <div class=" paging-product-index" data-id="<?= $row_detail['id'] ?>" data-idbrand="<?= $row_detail['id_brand'] ?>"></div>
                </div>


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

            </div>
            <div class="col-md-3">
                <div class="descriptionheader">
                    <!-- <div class="icon_des"><i class="fas fa-star"></i></div> -->
                    <span><?= $lang == 'vi' ? 'Tương thích dòng xe' : 'Compatible Vehicles' ?></span>
                </div>
                <div class="all_onmybike">
                    <?php
                    if (!empty($row_detail['id_doday_onmybike'])) {
                        $all_onmybike =  $d->rawQuery("select * from #_product_doday where type = 'san-pham' and id REGEXP '" . $row_detail['id_doday_onmybike'] . "' and hienthi > 0 order by stt,id desc ");
                    ?>
                        <ul>
                            <?php foreach ($all_onmybike as $k => $v) {
                                $onmybike_list = $d->rawQuery("select * from #_product_doday_list where type = 'san-pham' and id_doday = '" . $v['id'] . "' and id REGEXP '" . $row_detail['id_doday_list_onmybike'] . "' and hienthi > 0 order by stt,id desc");
                            ?>
                                <li>
                                    <a href="<?= $v['tenkhongdau'.$lang] ?>"><?= $v['ten' . $lang] ?></a>
                                    <ul>
                                        <?php foreach ($onmybike_list as $vl) { ?>
                                            <li>
                                                <a href="<?= $vl['tenkhongdauvi'] ?>">
                                                    <i class="fas fa-check"></i>
                                                    <?= $vl['ten' . $lang] ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="thongbao_cohang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="padding: 10px 10px 0 0;border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-contact_conhang validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="thongbao_cohang">
                    <input type="hidden" name="id_sanpham" value="<?= $row_detail['id'] ?>">
                    <input type="hidden" name="tieude" value="Email me when <?= $row_detail['ten' . $lang] ?> is back in stock.">

                    <div class="name_contact_conhang">
                        <?= $lang == 'vi' ? 'Thông báo cho tôi khi' : 'Email me when ' ?>
                        <span><?= $row_detail['ten' . $lang] ?></span>
                        <?= $lang == 'vi' ? ' có hàng trở lại.' : 'is back in stock.' ?>
                    </div>
                    <div class="all_input_text">
                        <span><?= hoten ?></span>
                        <input type="text" class="form-control" id="ten" name="ten" required />
                    </div>
                    <div class="all_input_text">
                        <span><?= sodienthoai ?></span>
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" required />
                    </div>
                    <div class="all_input_text">
                        <span>Email</span>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>

                    <div class="checkbox-nhan_tin custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="nhan_tin" value="1">
                        <label class="custom-control-label" for="nhan_tin"><?= $lang == 'vi' ? 'Đăng kí để nhận thông tin' : 'Sign up for our newsletter' ?></label>
                    </div>

                    <button type="submit" class="btn-contact_conhang" name="submit-contact">
                        <span><?= gui ?></span>
                    </button>

                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </form>
            </div>
        </div>
    </div>
</div>