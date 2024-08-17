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
                    <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/600x395x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>"></a>
                    <?php if ($hinhanhsp) {
                        if (count($hinhanhsp) > 0) { ?>
                            <div class="all_gallery_thumb_pro">
                                <div class="gallery_thumb">
                                    <?php foreach ($hinhanhsp as $v) { ?>
                                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                            <img onerror="this.src='<?= THUMBS ?>/600x400x2/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/900x600x6/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                        </a>
                                    <?php } ?>
                                    <?php if ($row_detail['video']) { ?>
                                        <a class="thumb-pro-detail thumbs_video" href="<?= $row_detail['video'] ?>" target="_blank">
                                            <img src="https://img.youtube.com/vi/<?= $func->getYoutube($row_detail['video']) ?>/maxresdefault.jpg" alt="<?= $row_detail['ten' . $lang] ?>">
                                        </a>
                                    <?php } ?>
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
                <div class="all_center_right_pro_detail mt-3">
                    <div class="center-pro-detail">

                        <div class="phuong_thuc_thanh_toan">
                            <?php if ($row_detail['soluongkho'] > 0) { ?>
                                <?php if ($row_detail['cothemua'] > 0) { ?>
                                    <?php if ($lang == 'vi') { ?>
                                        <?php if ($row_detail['gia'] <= 0) { ?>
                                            <div class="sp_kho">
                                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                                <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="sp_kho">
                                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                                <span><?= $lang == 'vi' ? 'Có sẵn' : 'Available' ?></span>
                                            </div>
                                        <?php } ?>

                                    <?php } else { ?>
                                        <?php if ($row_detail['giado'] <= 0) { ?>
                                            <div class="sp_kho">
                                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                                <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="sp_kho">
                                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                                <span><?= $lang == 'vi' ? 'Có sẵn' : 'Available' ?></span>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                <?php } else { ?>
                                    <div class="sp_kho">
                                        <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                        <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="sp_kho">
                                    <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                    <span><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                                </div>
                            <?php } ?>
                            <div class="trahang">
                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                <span>
                                    <?= $lang == 'vi' ? 'Có thể được trả lại trong vòng 30 ngày kể từ ngày giao hàng.' : 'Can be returned within 30 days of delivery.' ?>
                                </span>
                            </div>
                            <div class="trahang">
                                <div class="icon_trahang"><i class="fas fa-check"></i></div>
                                <span>
                                    <?= $lang == 'vi' ? 'Phương thức thanh toán: Credit Card, Express bank tranfer, Bank tranfer, ATM, E-wallet' : 'Payment Methods: Credit Card, Express bank tranfer, Bank tranfer, ATM, E-wallet' ?>
                                </span>
                            </div>
                        </div>

                        <?php if ($row_detail['id_khuyenmai']) { ?>
                            <?php
                            $khuyenmai = $d->rawQueryOne("select * from #_news where type = 'khuyenmai' and id = '" . $row_detail['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc");
                            ?>
                            <div class="all_km_del_pro">
                                <input type="hidden" name="id_khuyenmai" class="id_khuyenmai" value="<?= $khuyenmai['id'] ?>">
                                <div class="flash_sale_cover">
                                    <img class="imgm img-thumbnail" style="border: none;" src="<?= UPLOAD_NEWS_L . $khuyenmai['photo'] ?>" width="100%">
                                </div>
                                <div class="flash_sale_msg"><?= htmlspecialchars_decode($khuyenmai['mota' . $lang]) ?></div>
                                <input type="hidden" id="ngayktsukien" name="ngayktsukien" value="<?= date('Y-m-d h:i:s', $khuyenmai['ngayketthuc']) ?>">
                                <!-- Time -->
                                <center style="padding: 5px 2px 5px 2px;">
                                    <div id="Countdown_1" class="flash_sales_clock flip"></div>
                                </center>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="right-pro-detail w-clear">
                        <!-- <div class="sp_cs"></?= $lang == 'vi' ? '*Giới hạn số lượng mua' : '*Limit the amount of purchase' ?></div> -->

                        <?php if (isset($row_detail['mota' . $lang])) { ?>
                            <div class="box-gift-detail">
                                <?= htmlspecialchars_decode($row_detail['mota' . $lang]) ?>
                            </div>
                        <?php } ?>
                        <?php if ($row_detail['soluongkho'] > 0) { ?>
                            <?php if ($row_detail['cothemua'] > 0) { ?>

                                <?php if ($lang == 'vi') { ?>
                                    <?php if ($row_detail['gia'] <= 0) { ?>
                                        <div class="wrap-addcart clearfix">
                                            <a class=" muangay">
                                                <i class="fas fa-shopping-cart"></i>
                                                <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                            </a>
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
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="wrap-addcart clearfix">
                                <a class=" muangay">
                                    <i class="fas fa-shopping-cart"></i>
                                    <?= $lang == 'vi' ? 'Sản Phẩm hết hàng' : 'Product is out of stock' ?>
                                </a>
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
        <div class="taifile">
            <span><?= $lang == 'vi' ? 'Lựa chọn khác ' : 'Other options' ?></span>
            <?php
            $sp_thaythe = $d->rawQuery("select * from #_product where type = ? and id_list = ? and id_cat = ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
            ?>
            <div class="all_sp_thaythe">
                <?php foreach ($sp_thaythe as $sptt) {
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
                                    <span><?= $lang == 'vi' ? 'Màu sắc: ' : 'Color' ?></span>
                                    <strong><?= $color_sp['ten' . $lang] ?></strong>
                                </div>
                                <div class="ma_sp_tt">
                                    <span><?= $lang == 'vi' ? 'Mã sản phẩm: ' : 'Part Number: ' ?></span>
                                    <strong><?= $sptt['masp'] ?></strong>
                                </div>

                                <div class="gia_sp_tt">
                                    <span><?= $lang == 'vi' ? 'Giá sản phẩm: ' : 'Our Price: ' ?></span>
                                    <?= $func->chuyendoitigia($sptt) ?>

                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
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
                                    <span><?= noidung ?></span>
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
                                <!-- <div class="descriptionheader" style="margin-bottom:10px;">
                                    <span class="glyphicon glyphicon-comment mr-2">
                                        <i class="fas fa-comments"></i>
                                    </span>
                                    <span class="lead">
                                        <?= $lang == 'vi' ? 'Câu hỏi &amp; trả lời của khách hàng' : 'Customer Questions &amp; Answers' ?>
                                    </span>
                                </div> -->
                                <?php
                                $newsletter = $d->rawQuery("select * from #_newsletter where type = 'comment' and id_sanpham = '" . $row_detail['id'] . "' ");
                                ?>
                                <div id="questions">
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
                                </div>

                                <div class="lead">
                                    <?= $lang == 'vi' ? 'Câu hỏi và đánh giá mới' : 'New questions and reviews' ?>
                                </div>
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
                                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponsenewsletter">
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
                                                <a href="<?= $v['tenkhongdau'.$lang] ?>">
                                                    <div class="name_tintuc_noibat">
                                                        <span><?= $lang == 'vi' ? 'Tin mới nhất' : 'Latest news' ?>: </span>
                                                        <span><?= $v['ten' . $lang] ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php foreach ($tintucnb as $v) { ?>
                                            <li>
                                                <a href="<?= $v['tenkhongdau'.$lang] ?>">
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
                        </div>
                    </div>
                </div>

                <div class="all_sp_cungloai">
                    <div class="descriptionheader">
                        <span><?= $lang == 'vi' ? 'Sản phẩm cùng thương hiệu' : 'Link Product' ?></span>
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
                    <span><?= $lang == 'vi' ? 'Works on my Bike?' : 'Works on my Bike?' ?></span>
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