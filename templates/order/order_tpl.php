<div class="fixwidth">
    <div class="all_phantrang_show">
        <div class="all_danhmuc_phantrang">
            <div class="all_bread">
                <div class="breadCrumbs">
                    <div><?= $breadcrumbs ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($_SESSION['cart']) { ?>
        <div class="all_sanpham_giohang_row">
            <div class="sanpham_giohang_col_1">
                <div class="all_sanpham_giohang list-procart">
                    <?php $max = count($_SESSION['cart']);
                    for ($i = 0; $i < $max; $i++) {
                        $pid = $_SESSION['cart'][$i]['productid'];
                        $quantity = $_SESSION['cart'][$i]['qty'];
                        $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                        $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                        $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                        $proinfo = $cart->get_product_info($pid);
                        $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                        if ($proinfo['gia']) {
                            $pro_price = $proinfo['gia'];
                        } else {
                            $do_gia_pri = ($proinfo['giado']) / str_replace(",", "", $brand_sp['tigia_brand']);
                            $giado_pri = round($do_gia_pri, 2);
                            $pro_price = $giado_pri;
                        }
                        if ($proinfo['giamoi']) {
                            $pro_price_new = $proinfo['giamoi'];
                        } else {
                            $do_gia_pri_new = ($proinfo['giadomoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                            $giado_pri_new = round($do_gia_pri_new, 2);
                            $pro_price_new = $giado_pri_new;
                        }
                        $pro_price_qty = $pro_price * $quantity;
                        $pro_price_new_qty = $pro_price_new * $quantity;
                        if ($proinfo['giado']) {
                            $pro_price_do = $proinfo['giado'];
                            $pro_price_new_do = $proinfo['giadomoi'];
                            $pro_price_qty_do = $pro_price_do * $quantity;
                            $pro_price_new_qty_do = $pro_price_new_do * $quantity;
                        } else {
                            $do_gia = ($proinfo['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                            $giado = round($do_gia, 2);

                            $do_gia_moi = ($proinfo['giado']) / str_replace(",", "", $brand_sp['tigia_brand']);
                            $giado_moi = round($do_gia_moi, 2);
                            $pro_price_do = $giado;
                            $pro_price_new_do = $giado_moi;
                            $pro_price_qty_do = $pro_price_do * $quantity;
                            $pro_price_new_qty_do = $pro_price_new_do * $quantity;
                        }

                        $giakhuyenmai = $func->chuyendoitigia_pro_detail($proinfo,$brand_sp);
                        
                        $giakhuyenmai_qty = $giakhuyenmai * $quantity;

                    ?>
                        <div class="sanpham_giohang procart-<?= $code ?>">
                            <div class="img_sanpham_giohang">
                                <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                    <img onerror="this.src='<?= THUMBS ?>/600x395x1/assets/images/noimage.png';" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>" width="300" height="197" sizes="308px">
                                </a>
                            </div>
                            <div class="all_content_sanpham_giohang">
                                <div class="content_sanpham_giohang">
                                    <div class="name_sanpham_giohang"><?= $proinfo['ten' . $lang] ?></div>
                                    <div class="pa_sanpham_giohang">P/N: <strong><?= $proinfo['masp'] ?></strong></div>
                                    <br>
                                    <?php if ($mau) {
                                        $maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
                                        <div>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></div>
                                    <?php } ?>
                                    <div>
                                        <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                            <span><?= xoa ?></span>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="price-procart d-flex align-items-center">
                                        <strong style="font-weight: 600;margin-right: 5px;"><?= gia ?>: </strong>
                                        <?php if ($lang == 'vi') { ?>
                                            <?php if ($giakhuyenmai_qty) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money($giakhuyenmai_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
                                                    <?= $func->format_money($pro_price_qty) ?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoi']) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money($pro_price_new_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
                                                    <?= $func->format_money($pro_price_qty) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money($pro_price_qty) ?>
                                                </p>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($giakhuyenmai_qty) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money_erou($giakhuyenmai_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
                                                    <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoido']) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_new_qty_do) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
                                                    <?= $func->format_money_erou($func->format_money_erou) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                </p>
                                            <?php } ?>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="plus_sanpham_giohang">
                                    <input type="hidden" name="lang" class="lang" value="<?= $lang ?>">
                                    <input type="hidden" name="tigia" class="tigia" value="<?= $optsetting['tigia'] ?>">
                                    <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
                                        <?php if ($proinfo['cothemua']) { ?>
                                            <?php if ($proinfo['cothemua'] < $proinfo['soluongkho']) { ?>
                                                <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">-</span>
                                                <input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['cothemua'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                                <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">+</span>
                                            <?php } else { ?>
                                                <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">-</span>
                                                <input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['soluongkho'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                                <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">+</span>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">-</span>
                                                <input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['soluongkho'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                                <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">+</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="sanpham_giohang_col_2">
                <div class="sanpham_giohang_top">
                    <div class="title_tong_giohang"><?= $lang == 'vi' ? 'Tóm tắt đơn hàng' : 'Order Summary' ?></div>
                    <div class="subtotal_giohang">
                        <span><?= tamtinh ?>:</span>
                        <?php if ($lang == 'vi') { ?>
                            <span class="total-price load-price-temp"><?= $func->format_money($cart->get_order_total()) ?></span>
                        <?php } else {?>
                            <span class="total-price load-price-temp"><i class="fas fa-euro-sign"></i><?= $cart->get_order_total() ?></span>
                        <?php } ?>
                    </div>
                    <!-- <div class="vat_giohang">
                        <span>Vat</span>
                        <?php if ($lang == 'vi') {
                            $vat = (10 / 100) * $cart->get_order_total();
                        ?>
                            <span class="vat_sanpham"><?= $func->format_money($vat) ?></span>
                        <?php } else {
                            $total = round($cart->get_order_total(), 2);
                            $vat = (10 / 100) * $total;
                        ?>
                            <span class="total-price load-price-temp "><i class="fas fa-euro-sign"></i><?= $vat ?></span>
                        <?php } ?>
                    </div> -->
                    <div class="subtotal_giohang subtotal_giohang_border">
                        <span><?= tongtien ?>:</span>
                        <?php if ($lang == 'vi') {
                            $vat = (10 / 100) * $cart->get_order_total();
                            $total = $cart->get_order_total() ;
                        ?>
                            <span class="total-price load-price-total"><?= $func->format_money($total) ?></span>
                        <?php } else {
                            $total = $cart->get_order_total();
                            $vat = (10 / 100) * $total;
                            $total = $total ;
                        ?>
                            <span class="total-price load-price-total"><i class="fas fa-euro-sign"></i><?= $total ?></span>
                        <?php } ?>
                    </div>
                    <p>Free shipping for orders over 900,000 VND</p>
                    <div class="all_thanhtoan">
                        <a href="" class="promo_code">Have a promo code?</a>
                        <a href="thanh-toan" class="nut_thanhtoan">Thanh toán</a>
                    </div>
                </div>
                <div class="sanpham_giohang_bottom">
                    <div class="title_tong_giohang"><?= $lang == 'vi' ? 'Dịch vụ khách hàng' : 'Order Summary' ?></div>
                    <div class="mota_tong_giohang"><?= $lang == 'vi' ? 'Bạn cần hỗ trợ từ chúng tôi, liên hệ BBRacing ngay với Hotline '.$optsetting['hotline'] .' hoặc email '.$optsetting['hotline'] .' hoặc Zalo/WhatsApp/Line/We Chat: '.$optsetting['hotline'] : 'If you need support from us, contact BBRacing immediately Hotline '.$optsetting['hotline'] .' or email '.$optsetting['hotline'] .' or Zalo/WhatsApp/Line/We Chat: '.$optsetting['hotline'] ?></div>
                    <!-- <div class="all_hotline_giohang_tong">
                        <div class="hotline_giohang">
                            <span>Hotline: </span>
                            <span><?= $optsetting['hotline'] ?></span>
                        </div>
                        <div class="hotline_giohang">
                            <span>Email: </span>
                            <span><?= $optsetting['email'] ?></span>
                        </div>
                    </div>
                    <div class="all_zalo_whatap">
                        <span>Zalo/WhatsApp/Line/We Chat:</span>
                        <span><?= $optsetting['hotline'] ?></span>
                    </div> -->
                    <!-- <div class="all_thongtin_thanhtoan">
                        <div class="title_thanhtoan_chuyenkhoan"><?= $lang == 'vi' ? 'THANH TOÁN CHUYỂN KHOẢN' : 'TRANSFER PAYMENTS' ?></div>
                        <ul class="list_thanhtoan">
                            <li><?= $lang == 'vi' ? 'Nhận điểm tích lũy & nâng cấp tài khoản khi mua hàng được được nhận nhiều ưu đãi.' : 'Receive accumulated points & upgrade your account when making purchases to receive many incentives.' ?></li>
                            <li><?= $lang == 'vi' ? 'Chuyển khoản qua Paypal, Internet Banking, Visa, MasterCard …' : 'Transfer via Paypal, Internet Banking, Visa, Mastercard...' ?></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    <?php } else { ?>
        <a href="" class="empty-cart text-decoration-none">
            <p><?= khongtontaisanphamtronggiohang ?></p>
            <span><?= vetrangchu ?></span>
        </a>
    <?php } ?>
</div>