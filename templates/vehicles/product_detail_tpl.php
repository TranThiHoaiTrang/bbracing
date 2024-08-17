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
        <div class="product-title">
            <h1 class="tp_product_detail_name"><?= $row_detail['ten' . $lang] ?></h1>
        </div>
        <div class="grid-pro-detail w-clear">
            <div class="left-pro-detail w-clear">
                <div class="left_pro_img_all">
                    <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/600x395x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>"></a>
                    <?php if ($hinhanhsp) {
                        if (count($hinhanhsp) > 0) { ?>
                            <div class="all_gallery_thumb_pro">
                                <div class="gallery_thumb">
                                    <?php foreach ($hinhanhsp as $v) { ?>
                                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                            <img onerror="this.src='<?= THUMBS ?>/600x395x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>

            <div class="center-pro-detail w-clear">
                <div class="nhasanxuat">
                    <span><?= $lang == 'vi' ? 'Nhà sản xuất: ' : 'Manufacturer: ' ?></span>
                    <strong><?= $pro_brand['ten' . $lang] ?></strong>
                </div>
                <div class="nhasanxuat">
                    <span><?= masp ?>: </span>
                    <strong><?= $row_detail['masp'] ?></strong>
                </div>
                <?php if ($row_detail['soluongkho'] > 0) { ?>
                    <?php if ($row_detail['cothemua'] > 0) { ?>
                        <div class="sp_kho">
                            <?= $lang == 'vi' ? 'Sản phẩm này có sẵn trong kho của chúng tôi' : 'This Product is available in our warehouse' ?>
                        </div>
                    <?php } else { ?>
                        <div class="sp_kho">
                            <?= $lang == 'vi' ? 'Sản phẩm này không có sẵn trong kho của chúng tôi' : 'This product is not available in our warehouse' ?>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="sp_kho">
                        <?= $lang == 'vi' ? 'Sản phẩm này không có sẵn trong kho của chúng tôi' : 'This product is not available in our warehouse' ?>
                    </div>
                <?php } ?>
                <div class="phuong_thuc_thanh_toan">
                    <span><?= $lang == 'vi' ? 'Phương thức thanh toán:' : 'Payment Methods:' ?></span>
                    <div class="thanhtoan">
                        <div class="hand_tt">
                            <div class="icon_tt"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <span><?= $lang == 'vi' ? 'Thẻ tín dụng' : 'Credit' ?></span>
                        </div>
                        <div class="small_tt">
                            <span>
                                <?= $lang == 'vi' ? 'Thanh toán bằng thẻ Verified by Visa hoặc Mastercard Secure Code.' : 'Pay with Verified by Visa or Mastercard Secure Code card.' ?>
                            </span>
                        </div>
                    </div>
                    <div class="thanhtoan">
                        <div class="hand_tt">
                            <div class="icon_tt"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <span><?= $lang == 'vi' ? 'Chuyển khoản ngân hàng' : 'Bank Transfer' ?></span>
                        </div>
                        <div class="small_tt">
                            <span>
                                <?= $lang == 'vi' ? 'Thanh toán bằng chuyển khoản ngân hàng' : 'Payment by bank transfer' ?>
                            </span>
                        </div>
                    </div>
                    <div class="trahang">
                        <div class="icon_trahang"><i class="fas fa-exchange-alt"></i></div>
                        <span>
                            <?= $lang == 'vi' ? 'Trả lại: có thể được trả lại trong vòng 30 ngày kể từ ngày giao hàng.' : 'Returns: can be returned within 30 days of delivery.' ?>
                        </span>
                    </div>
                </div>

                <?php if ($row_detail['id_khuyenmai']) { ?>
                    <?php
                    $khuyenmai = $d->rawQueryOne("select * from #_news where type = 'khuyenmai' and id = '" . $row_detail['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc");
                    ?>
                    <div class="flash_sale_cover">
                        <img class="imgm img-thumbnail" style="border: none;" src="<?= UPLOAD_NEWS_L . $khuyenmai['photo'] ?>" width="100%">
                    </div>
                    <div class="flash_sale_msg"><?= htmlspecialchars_decode($khuyenmai['mota' . $lang]) ?></div>
                    <input type="hidden" id="ngayktsukien" name="ngayktsukien" value="<?= date('Y-m-d h:i:s', $khuyenmai['ngayketthuc']) ?>">
                    <!-- Time -->
                    <center style="padding: 5px 2px 5px 2px;">
                        <div id="Countdown_1" class="flash_sales_clock flip"></div>
                    </center>
                <?php } ?>

            </div>

            <div class="right-pro-detail w-clear">

                <ul class="attr-pro-detail">
                    <li class="w-clear">
                        <div class="gia_detail"><?= $lang == 'vi' ? 'Giá sản phẩm' : 'Our Price' ?></div>
                        <?php
                        $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $row_detail['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                        $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                        $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $pro_brand['id'] . "' limit 1");
                        $khuyenmai_sanpham_one = $d->rawQueryOne("select discount from #_news where type = 'khuyenmai' and id = '" . $row_detail['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                        
                        $giakhuyenmai = '';
                        if (!empty($list_sp['id_news'])) {
                            if ($dis_user['discount'] != 0) {
                                if ($lang == 'vi') {
                                    if ($row_detail['gia']) {
                                        $khuyenmai = (($row_detail['gia'] * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $row_detail['gia'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                } else {
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['giado'] * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $row_detail['giado'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                }
                            } else {
                                if ($lang == 'vi') {
                                    if ($row_detail['gia']) {
                                        $khuyenmai = (($row_detail['gia'] * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $row_detail['gia'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                } else {
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['giado'] * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $row_detail['giado'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                }
                            }
                        } elseif (!empty($row_detail['id_khuyenmai'])) {
                            if ($khuyenmai_sanpham_one['discount'] != 0) {
                                if ($lang == 'vi') {
                                    if ($row_detail['gia']) {
                                        $khuyenmai = (($row_detail['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                        $giakhuyenmai = $row_detail['gia'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                } else {
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                        $giakhuyenmai = $row_detail['giado'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                }
                            } else {
                                if ($lang == 'vi') {
                                    if ($row_detail['gia']) {
                                        $khuyenmai = (($row_detail['gia'] * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $row_detail['gia'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                } else {
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['giado'] * $khuyenmai['discount']) / 100);
                                        $giakhuyenmai = $row_detail['giado'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
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
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['gia'] * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $row_detail['gia'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                } else {
                                    if ($row_detail['giado']) {
                                        $khuyenmai = (($row_detail['giado'] * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $row_detail['giado'] - $khuyenmai;
                                    } else {
                                        $tigia = $row_detail['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                        $giakhuyenmai = $tigia_new - $khuyenmai;
                                        $giakhuyenmai = round($giakhuyenmai, 2);
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="attr-content-pro-detail">
                            <?php if ($lang == 'vi') { 
                                $tigia = $row_detail['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                $tigia_gia = round($tigia, 2);   
                                ?>
                                <?php if ($giakhuyenmai) { ?>
                                    <span class="price-new-pro-detail"><?= $func->format_money($giakhuyenmai) ?></span>
                                    <span class="price-old-pro-detail"><?= $func->format_money($row_detail['gia']) ?></span>
                                <?php } elseif (!empty($row_detail['giadomoi'])) { 
                                    $tigiamoi = $row_detail['giadomoi'] * str_replace(",", "", $pro_brand['tigia_brand']);
                                    $tigia_giamoi = round($tigiamoi, 2);    
                                ?>
                                    <span class="price-new-pro-detail"><?= $func->format_money($tigia_giamoi) ?></span>
                                    <span class="price-old-pro-detail"><?= $func->format_money($tigia_gia) ?></span>
                                <?php } else { ?>
                                    <span class="price-new-pro-detail"><?= $func->format_money($tigia_gia) ?></span>
                                <?php } ?>
                            <?php } else {?>
                                <?php if ($giakhuyenmai) { ?>
                                    <span class="price-new-pro-detail"><i class="fas fa-euro-sign"></i><?= $giakhuyenmai ?></span>
                                    <span class="price-old-pro-detail"><i class="fas fa-euro-sign"></i><?= $row_detail['giado'] ?></span>
                                <?php } elseif (!empty($row_detail['giadomoi'])) {?>
                                    <span class="price-new-pro-detail"><i class="fas fa-euro-sign"></i><?= $row_detail['giadomoi'] ?></span>
                                    <span class="price-old-pro-detail"><i class="fas fa-euro-sign"></i><?= $row_detail['giado'] ?></span>
                                <?php } else { ?>
                                    <span class="price-new-pro-detail"><i class="fas fa-euro-sign"></i><?= $row_detail['giado'] ?></span>
                                <?php } ?>
                            <?php } ?>

                        </div>
                    </li>
                </ul>

                <?php if ($row_detail['soluongkho'] > 0) { ?>
                    <?php if ($row_detail['cothemua'] > 0) { ?>
                        <div class="sp_tonkho">
                            <div class="tonhang">
                                <?= $lang == 'vi' ? 'Sẵn có' : 'Available' ?>:
                                <?php if ($row_detail['cothemua']) { ?>
                                    <?php if ($row_detail['cothemua'] < $row_detail['soluongkho']) { ?>
                                        <span><span><?= $lang == 'vi' ? 'Còn hàng' : 'Stocking' ?></span> <br>(<?= $lang == 'vi' ? 'Số lượng bạn có thể mua là' : 'The quantity you can buy is' ?> <?= $row_detail['cothemua'] ?> <?= $lang == 'vi' ? 'sản phẩm' : 'product' ?>)</span>
                                    <?php } else { ?>
                                        <span><span><?= $lang == 'vi' ? 'Còn hàng' : 'Stocking' ?></span> <br>(<?= $lang == 'vi' ? 'Số lượng bạn có thể mua là' : 'The quantity you can buy is' ?> <?= $row_detail['soluongkho'] ?> <?= $lang == 'vi' ? 'sản phẩm' : 'product' ?>)</span>
                                    <?php } ?>
                                <?php } else { ?>
                                    <span><span><?= $lang == 'vi' ? 'Còn hàng' : 'Stocking' ?></span> <br>(<?= $lang == 'vi' ? 'Số lượng bạn có thể mua là' : 'The quantity you can buy is' ?> <?= $row_detail['soluongkho'] ?> <?= $lang == 'vi' ? 'sản phẩm' : 'product' ?>)</span>
                                <?php } ?>

                            </div>
                            <div class="sp_cs"><?= $lang == 'vi' ? 'Sản phẩm này có sẵn trong kho của chúng tôi' : 'This Product is available in our warehouse' ?></div>
                        </div>
                    <?php } else { ?>
                        <div class="sp_tonkho">
                            <div class="tonhang hethang">
                                <?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?>
                            </div>
                            <div class="sp_cs"><?= $lang == 'vi' ? 'Sản phẩm này không có sẵn trong kho của chúng tôi' : 'This product is not available in our warehouse' ?></div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="sp_tonkho">
                        <div class="tonhang hethang">
                            <?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?>
                        </div>
                        <div class="sp_cs"><?= $lang == 'vi' ? 'Sản phẩm này không có sẵn trong kho của chúng tôi' : 'This product is not available in our warehouse' ?></div>
                    </div>
                <?php } ?>

                <?php if (isset($row_detail['mota' . $lang])) { ?>
                    <div class="box-gift-detail">
                        <?= htmlspecialchars_decode($row_detail['mota' . $lang]) ?>
                    </div>
                <?php } ?>
                <?php if ($_SESSION[$login_member]['active']) { ?>
                    <?php if ($row_detail['soluongkho'] > 0) { ?>
                        <?php if ($row_detail['cothemua'] > 0) { ?>
                            <div class="selector-actions">
                                <div class="w-clear swatch">
                                    <div class="header_quantity"><?= $lang == 'vi' ? 'Số lượng' : 'Quantity' ?>:</div>
                                    <div class="attr-content-pro-detail">
                                        <div class="quantity-pro-detail">
                                            <?php if ($row_detail['cothemua']) { ?>
                                                <?php if ($row_detail['cothemua'] < $row_detail['soluongkho']) { ?>
                                                    <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['cothemua'] ?>" pattern="[1-9]{10}" value="1">
                                                <?php } else { ?>
                                                    <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                                <?php } ?>
                                            <?php } else { ?>
                                                <input type="number" class="quantity_<?= $row_detail['id'] ?> testinput" min="1" max="<?= $row_detail['soluongkho'] ?>" pattern="[1-9]{10}" value="1">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="cannang" class="cannang" value="<?= $row_detail['cannang'] ?>">
                            <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $row_detail['kichthuoc'] ?>">
                            <input type="hidden" name="color_detail" class="color_detail" value="<?= $row_detail['id_mau'] ?>">
                            <div class="wrap-addcart clearfix">
                                <a class=" addcart muangay" data-action="buynow" data-id="<?= $row_detail['id'] ?>" data-name="<?= $row_detail['tenvi'] ?>" data-gia="<?= $func->format_money($row_detail['gia']) ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <?= $lang == 'vi' ? 'Thêm vào giỏ hàng' : 'Add to cart' ?>
                                </a>
                            </div>
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
            <div class="clear"></div>
        </div>

        <div class="taifile">
            <span><?= $lang == 'vi' ? 'Tải' : 'Dowload' ?>:</span>
            <input type="hidden" name="id_user" class="id_user" value="<?= $_SESSION[$login_member]['id'] ?>">
            <a id="dowload_taptin" class="dowload_taptin" data-id="<?= $row_detail['id'] ?>" href="<?= $config_base ?>/upload/file/<?= $row_detail['taptin'] ?>">
                <i class="fas fa-arrow-circle-down"></i>
                <span><?= $row_detail['taptin'] ?></span>
            </a>
        </div>
        <div class="taifile">
            <span><?= $lang == 'vi' ? 'Thay thế' : 'Alternatives' ?></span>
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
                                <?php
                                $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $sptt['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $sptt['id_brand']));
                                $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $brand_sp['id'] . "' limit 1");

                                $giakhuyenmai = '';
                                if (!empty($list_sp['id_news'])) {
                                    if ($dis_user['discount'] != 0) {
                                        if ($lang == 'vi') {
                                            if ($sptt['gia']) {
                                                $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        } else {
                                            if ($sptt['giado']) {
                                                $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        }
                                    } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                        if ($lang == 'vi') {
                                            if ($sptt['gia']) {
                                                $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                            } else {
                                                $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        } else {
                                            if ($v['giado']) {
                                                $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $sptt['giado'] - $khuyenmai;
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
                                            if ($sptt['gia']) {
                                                $khuyenmai = (($sptt['gia'] * $khuyenmai['discount']) / 100);
                                                $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        } else {
                                            if ($v['giado']) {
                                                $khuyenmai = (($sptt['giado'] * $khuyenmai['discount']) / 100);
                                                $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
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
                                            if ($sptt['gia']) {
                                                $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        } else {
                                            if ($sptt['giado']) {
                                                $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        }
                                    } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                        if ($lang == 'vi') {
                                            if ($sptt['gia']) {
                                                $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        } else {
                                            if ($sptt['giado']) {
                                                $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                            } else {
                                                $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);

                                                $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                $giakhuyenmai = $tigia_new - $khuyenmai;
                                                $giakhuyenmai = round($giakhuyenmai, 2);
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="gia_sp_tt">
                                    <span><?= $lang == 'vi' ? 'Giá sản phẩm: ' : 'Our Price: ' ?></span>
                                    <?php if ($lang == 'vi') { ?>
                                        <?php if ($giakhuyenmai) { ?>
                                            <strong><?= $func->format_money($giakhuyenmai) ?></strong>
                                        <?php } elseif ($sptt['giamoi'] || $sptt['giadomoi']) {
                                            $tigia = $sptt['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                            $tigia_new = round($tigia, 2);
                                        ?>
                                            <?php if ($sptt['giamoi']) { ?>
                                                <strong><?= $func->format_money($sptt['giamoi']) ?></strong>
                                            <?php } else { ?>
                                                <strong><?= $func->format_money($tigia_new) ?></strong>
                                            <?php } ?>
                                        <?php } else {
                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                            $tigia_new = round($tigia, 2);
                                        ?>
                                            <?php if ($sptt['gia']) { ?>
                                                <strong><?= $func->format_money($sptt['gia']) ?></strong>
                                            <?php } else { ?>
                                                <strong><?= $func->format_money($tigia_new) ?></strong>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($giakhuyenmai) { ?>
                                            <strong><?= $giakhuyenmai ?>$</strong>
                                        <?php } elseif ($sptt['giadomoi']) { ?>
                                            <strong><?= $sptt['giadomoi'] ?>$</strong>
                                        <?php } else { ?>
                                            <?php if ($sptt['giado']) { ?>
                                                <strong><?= $sptt['giado'] ?>$</strong>
                                            <?php } else {
                                                $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);
                                            ?>
                                                <strong><?= $tigia_new ?>$</strong>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <?php if (!empty($row_detail['noidung' . $lang]) || (!empty($row_detail['ungdung' . $lang])) || (!empty($row_detail['luuy' . $lang])) || (!empty($row_detail['cauhoi' . $lang])) || (!empty($row_detail['cauhoi' . $lang])) || (!empty($row_detail['tintuc' . $lang]))) { ?>
                    <div class="descriptionheader">

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
                            <?php if ($row_detail['luuy' . $lang]) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-luuy-tab" data-toggle="pill" href="#pills-luuy" role="tab" aria-controls="pills-luuy" aria-selected="false">
                                        <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                        <span><?= $lang == 'vi' ? 'Lưu ý' : 'Note' ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($row_detail['cauhoi' . $lang]) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-cauhoi-tab" data-toggle="pill" href="#pills-cauhoi" role="tab" aria-controls="pills-cauhoi" aria-selected="false">
                                        <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                        <span><?= $lang == 'vi' ? 'Câu hỏi' : 'Question' ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($row_detail['tintuc' . $lang]) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-tintuc-tab" data-toggle="pill" href="#pills-tintuc" role="tab" aria-controls="pills-tintuc" aria-selected="false">
                                        <!-- <div class="icon_des"><i class="fas fa-book"></i></div> -->
                                        <span><?= $lang == 'vi' ? 'Tin tức' : 'News' ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="product_detail">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
                        </div>
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-ungdung" role="tabpanel" aria-labelledby="pills-ungdung-tab">
                            <?= (isset($row_detail['ungdung' . $lang]) && $row_detail['ungdung' . $lang] != '') ? htmlspecialchars_decode($row_detail['ungdung' . $lang]) : '' ?>
                        </div>
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-luuy" role="tabpanel" aria-labelledby="pills-luuy-tab">
                            <?= (isset($row_detail['luuy' . $lang]) && $row_detail['luuy' . $lang] != '') ? htmlspecialchars_decode($row_detail['luuy' . $lang]) : '' ?>
                        </div>
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-cauhoi" role="tabpanel" aria-labelledby="pills-cauhoi-tab">
                            <?= (isset($row_detail['cauhoi' . $lang]) && $row_detail['cauhoi' . $lang] != '') ? htmlspecialchars_decode($row_detail['cauhoi' . $lang]) : '' ?>
                        </div>
                        <div class="tab-pane fade content-tabs-pro-detail info-pro-detail" id="pills-tintuc" role="tabpanel" aria-labelledby="pills-tintuc-tab">
                            <?= (isset($row_detail['tintuc' . $lang]) && $row_detail['tintuc' . $lang] != '') ? htmlspecialchars_decode($row_detail['tintuc' . $lang]) : '' ?>
                        </div>
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

                <div class="all_sp_cungloai">
                    <div class="descriptionheader">
                        <span><?= $lang == 'vi' ? 'Màu sắc' : 'Color' ?></span>
                    </div>
                    <?php
                    $sp_thaythe = $d->rawQuery("select * from #_product where type = ? and id_list = ? and id_cat = ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
                    ?>
                    <div class="all_sp_theomau">
                        <?php foreach ($sp_thaythe as $sptt) {
                            $color_sp = $d->rawQueryOne("select * from #_product_mau where type = ? and id = ? and hienthi > 0", array('san-pham', $sptt['id_mau']));
                            $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $sptt['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                        ?>
                            <div class="sanpham_theomau">
                                <div class="row">
                                    <div class="col-md-10 d-flex align-items-center">
                                        <div class="img_sp_theomau">
                                            <img onerror="this.src='<?= THUMBS ?>/100x75x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/100x75x1/<?= UPLOAD_PRODUCT_L . $sptt['photo'] ?>" alt="<?= $sptt['ten' . $lang] ?>">
                                            <?php if ($sptt['id_khuyenmai']) { ?>
                                                <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 50px; max-width: 50px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                            <?php } ?>
                                        </div>
                                        <div class="con_ten_sptt">
                                            <div class="ten_sptheomau"><?= $sptt['ten' . $lang] ?></div>
                                            <div class="mau_sp">
                                                <span><?= $lang == 'vi' ? 'Màu sắc: ' : 'Color' ?></span>
                                                <strong><?= $color_sp['ten' . $lang] ?></strong>
                                            </div>
                                            <div class="ma_sp_tt">
                                                <span><?= $lang == 'vi' ? 'Mã sản phẩm: ' : 'Part Number: ' ?></span>
                                                <strong><?= $sptt['masp'] ?></strong>
                                            </div>
                                            <?php
                                            $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $sptt['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $sptt['id_brand']));
                                            $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $brand_sp['id'] . "' limit 1");

                                            $giakhuyenmai = '';
                                            if (!empty($list_sp['id_news'])) {
                                                if ($dis_user['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
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
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
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
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <div class="gia_sp_tt">
                                                <span><?= $lang == 'vi' ? 'Giá sản phẩm: ' : 'Our Price: ' ?></span>
                                                <?php if ($lang == 'vi') { ?>
                                                    <?php if ($giakhuyenmai) { ?>
                                                        <strong><?= $func->format_money($giakhuyenmai) ?></strong>
                                                    <?php } elseif ($sptt['giamoi'] || $sptt['giadomoi']) {
                                                        $tigia = $sptt['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                    ?>
                                                        <?php if ($sptt['giamoi']) { ?>
                                                            <strong><?= $func->format_money($sptt['giamoi']) ?></strong>
                                                        <?php } else { ?>
                                                            <strong><?= $func->format_money($tigia_new) ?></strong>
                                                        <?php } ?>
                                                    <?php } else {
                                                        $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                    ?>
                                                        <?php if ($sptt['gia']) { ?>
                                                            <strong><?= $func->format_money($sptt['gia']) ?></strong>
                                                        <?php } else { ?>
                                                            <strong><?= $func->format_money($tigia_new) ?></strong>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if ($giakhuyenmai) { ?>
                                                        <strong><?= $giakhuyenmai ?>$</strong>
                                                    <?php } elseif ($sptt['giadomoi']) { ?>
                                                        <strong><?= $sptt['giadomoi'] ?>$</strong>
                                                    <?php } else { ?>
                                                        <?php if ($sptt['giado']) { ?>
                                                            <strong><?= $sptt['giado'] ?>$</strong>
                                                        <?php } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);
                                                        ?>
                                                            <strong><?= $tigia_new ?>$</strong>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="<?= $sptt['tenkhongdauvi'] ?>" class="btn_sptheomau">
                                            <?= $lang == 'vi' ? 'Chi tiết' : 'Details' ?>
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="all_sp_cungloai">
                    <div class="descriptionheader">
                        <span><?= $lang == 'vi' ? 'Sản phẩm liên kết' : 'Linked Products' ?></span>
                    </div>
                    <?php
                    $sp_thaythe = $d->rawQuery("select * from #_product where type = ? and id_list = ? and id_cat != ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
                    ?>
                    <div class="all_sp_theomau">
                        <?php foreach ($sp_thaythe as $sptt) {
                            $color_sp = $d->rawQueryOne("select * from #_product_mau where type = ? and id = ? and hienthi > 0", array('san-pham', $sptt['id_mau']));
                            $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $sptt['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                        ?>
                            <div class="sanpham_theomau">
                                <div class="row">
                                    <div class="col-md-10 d-flex align-items-center">
                                        <div class="img_sp_theomau">
                                            <img onerror="this.src='<?= THUMBS ?>/100x75x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/100x75x1/<?= UPLOAD_PRODUCT_L . $sptt['photo'] ?>" alt="<?= $sptt['ten' . $lang] ?>">
                                            <?php if ($sptt['id_khuyenmai']) { ?>
                                                <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 50px; max-width: 50px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                            <?php } ?>
                                        </div>
                                        <div class="con_ten_sptt">
                                            <div class="ten_sptheomau"><?= $sptt['ten' . $lang] ?></div>
                                            <div class="mau_sp">
                                                <span><?= $lang == 'vi' ? 'Màu sắc: ' : 'Color' ?></span>
                                                <strong><?= $color_sp['ten' . $lang] ?></strong>
                                            </div>
                                            <div class="ma_sp_tt">
                                                <span><?= $lang == 'vi' ? 'Mã sản phẩm: ' : 'Part Number: ' ?></span>
                                                <strong><?= $sptt['masp'] ?></strong>
                                            </div>
                                            <?php
                                            $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $sptt['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                            $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $sptt['id_brand']));
                                            $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $brand_sp['id'] . "' limit 1");

                                            $giakhuyenmai = '';
                                            if (!empty($list_sp['id_news'])) {
                                                if ($dis_user['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
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
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($v['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
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
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                } elseif ($khuyenmai_sanpham_one['discount'] != 0) {
                                                    if ($lang == 'vi') {
                                                        if ($sptt['gia']) {
                                                            $khuyenmai = (($sptt['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['gia'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    } else {
                                                        if ($sptt['giado']) {
                                                            $khuyenmai = (($sptt['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $sptt['giado'] - $khuyenmai;
                                                        } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);

                                                            $khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
                                                            $giakhuyenmai = $tigia_new - $khuyenmai;
                                                            $giakhuyenmai = round($giakhuyenmai, 2);
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <div class="gia_sp_tt">
                                                <span><?= $lang == 'vi' ? 'Giá sản phẩm: ' : 'Our Price: ' ?></span>
                                                <?php if ($lang == 'vi') { ?>
                                                    <?php if ($giakhuyenmai) { ?>
                                                        <strong><?= $func->format_money($giakhuyenmai) ?></strong>
                                                    <?php } elseif ($sptt['giamoi'] || $sptt['giadomoi']) {
                                                        $tigia = $sptt['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                    ?>
                                                        <?php if ($sptt['giamoi']) { ?>
                                                            <strong><?= $func->format_money($sptt['giamoi']) ?></strong>
                                                        <?php } else { ?>
                                                            <strong><?= $func->format_money($tigia_new) ?></strong>
                                                        <?php } ?>
                                                    <?php } else {
                                                        $tigia = $sptt['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                    ?>
                                                        <?php if ($sptt['gia']) { ?>
                                                            <strong><?= $func->format_money($sptt['gia']) ?></strong>
                                                        <?php } else { ?>
                                                            <strong><?= $func->format_money($tigia_new) ?></strong>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if ($giakhuyenmai) { ?>
                                                        <strong><?= $giakhuyenmai ?>$</strong>
                                                    <?php } elseif ($sptt['giadomoi']) { ?>
                                                        <strong><?= $sptt['giadomoi'] ?>$</strong>
                                                    <?php } else { ?>
                                                        <?php if ($sptt['giado']) { ?>
                                                            <strong><?= $sptt['giado'] ?>$</strong>
                                                        <?php } else {
                                                            $tigia = $sptt['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);
                                                        ?>
                                                            <strong><?= $tigia_new ?>$</strong>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="<?= $sptt['tenkhongdauvi'] ?>" class="btn_sptheomau">
                                            <?= $lang == 'vi' ? 'Chi tiết' : 'Details' ?>
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="descriptionheader">
                    <div class="icon_des"><i class="fas fa-star"></i></div>
                    <span><?= $lang == 'vi' ? 'Sản phẩm liên kết' : 'Linked Products' ?></span>
                </div>
                <div class="all_sp_lienket">
                    <?php
                    $sp_lk =  $d->rawQuery("select * from #_product where type = ? and id_list = ? and id_cat != ? and hienthi > 0 order by stt,id desc ", array('san-pham', $row_detail['id_list'], $row_detail['id_cat']));
                    ?>
                    <?php foreach ($sp_lk as $k => $v) {
                        $khuyenmai_sanpham_one = $d->rawQueryOne("select discount,icon from #_news where type = 'khuyenmai' and id = '" . $v['id_khuyenmai'] . "' and hienthi > 0 order by stt,id desc limit 1");
                    ?>
                        <div class="sanpham_lienket">
                            <div class="img_sp_lienket">
                                <a href="<?= $v['tenkhongdau'.$lang] ?>">
                                    <img width="300" height="197" data-sizes="auto" src="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= WATERMARK ?>/product/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                    <?php if ($v['id_khuyenmai']) { ?>
                                        <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 50px; max-width: 50px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="content_sp_lienket">
                                <div class="name_sp_lk"><?= $v['ten' . $lang] ?></div>
                                <div class="ma_sp_lk">
                                    <span><?= $lang == 'vi' ? 'Mã sản phẩm: ' : 'Part Number: ' ?></span>
                                    <strong><?= $v['masp'] ?></strong>
                                </div>
                                <?php
                                $list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $c['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
                                $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
                                $dis_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' and id_brand = '" . $brand_sp['id'] . "' limit 1");

                                $giakhuyenmai = '';
                                if (!empty($list_sp['id_news'])) {
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
                                <div class="gia_sp_lk">
                                    <span><?= $lang == 'vi' ? 'Giá sản phẩm: ' : 'Our Price: ' ?></span>
                                    <?php if ($lang == 'vi') { ?>
                                        <?php if ($giakhuyenmai) { ?>
                                            <strong><?= $func->format_money($giakhuyenmai) ?></strong>
                                        <?php } elseif ($v['giamoi'] || $v['giadomoi']) {
                                            $tigia = $v['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                            $tigia_new = round($tigia, 2);
                                        ?>
                                            <?php if ($v['giamoi']) { ?>
                                                <strong><?= $func->format_money($v['giamoi']) ?></strong>
                                            <?php } else { ?>
                                                <strong><?= $func->format_money($tigia_new) ?></strong>
                                            <?php } ?>
                                        <?php } else {
                                            $tigia = $v['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
                                            $tigia_new = round($tigia, 2);
                                        ?>
                                            <?php if ($v['gia']) { ?>
                                                <strong><?= $func->format_money($v['gia']) ?></strong>
                                            <?php } else { ?>
                                                <strong><?= $func->format_money($tigia_new) ?></strong>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($giakhuyenmai) { ?>
                                            <strong><?= $giakhuyenmai ?>$</strong>
                                        <?php } elseif ($v['giadomoi']) { ?>
                                            <strong><?= $v['giadomoi'] ?>$</strong>
                                        <?php } else { ?>
                                            <?php if ($v['giado']) { ?>
                                                <strong><?= $v['giado'] ?>$</strong>
                                            <?php } else {
                                                $tigia = $v['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
                                                $tigia_new = round($tigia, 2);
                                            ?>
                                                <strong><?= $tigia_new ?>$</strong>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                                <a href="<?= $v['tenkhongdau'.$lang] ?>" class="btn_splk">
                                    <?= $lang == 'vi' ? 'Chi tiết' : 'Details' ?>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>