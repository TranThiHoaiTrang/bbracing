<div class="all_center_right_pro_detail mt-3">
    <div class="center-pro-detail">
        <div class="phuong_thuc_thanh_toan">
            <?php if ($row_detail['soluongkho'] > 0) { ?>
                <?php if ($row_detail['cothemua'] > 0) { ?>
                    <div class="sp_kho">
                        <div class="icon_trahang"><i class="fas fa-check"></i></div>
                        <span><?= $lang == 'vi' ? 'Có sẵn' : 'Available' ?></span>
                    </div>

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
                    <!-- <img class="imgm img-thumbnail" style="border: none;" src="<?= UPLOAD_NEWS_L . $khuyenmai['photo'] ?>" width="100%"> -->
                    <span><?= $khuyenmai['ten' . $lang] ?></span>
                </div>
                <!-- <div class="flash_sale_msg"><?= htmlspecialchars_decode($khuyenmai['mota' . $lang]) ?></div> -->
                <input type="hidden" id="ngayktsukien" name="ngayktsukien" value="<?= date('Y-m-d h:i:s', $khuyenmai['ngayketthuc']) ?>">
                <!-- Time -->
                <div style="padding: 5px 2px 5px 2px;">
                    <div id="Countdown_1" class="flash_sales_clock flip"></div>
                </div>
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