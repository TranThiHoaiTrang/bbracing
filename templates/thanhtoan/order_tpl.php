<!-- <div class="all_banner">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            
        </div>
    </div>
</div> -->

<?php
$iduser = $_SESSION[$login_member]['id'];
$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));

$cap_daily = $d->rawQueryOne("select * from #_member_vip where id = ? limit 0,1", array($row_detail['id_vip']));

$congnodadung = 0;
$order = $d->rawQuery("select * from table_order where id_user = " . $iduser . " and httt = 'congno'");
foreach ($order as $v) {
    $congnodadung += $v['tonggia'];
}

$congnoconlai = $cap_daily['congno'] - $congnodadung;

$donhangcongno_som = $d->rawQueryOne("select Min(id) from table_order where id_user = " . $iduser . " and httt = 'congno'");
$ngaycongno = $d->rawQueryOne("select * from table_order where id = " . $donhangcongno_som['Min(id)'] . "");

$startTime_h = date("H ", $ngaycongno['ngaytao']);
$startTime_i = date("i ", $ngaycongno['ngaytao']);
$startTime_s = date("s ", $ngaycongno['ngaytao']);
$startTime_d = date("d ", $ngaycongno['ngaytao']);
$startTime_m = date("m ", $ngaycongno['ngaytao']);
$startTime_y = date("Y ", $ngaycongno['ngaytao']);
// $thoigiancongno = date('d/m/Y ', strtotime(
//     '+' . $cap_daily['thoigian_congno'] . ' day',
//     strtotime($startTime)
// ));
$thoigiancongno = mktime($startTime_h, $startTime_i, $startTime_s, $startTime_m, ($startTime_d + $cap_daily['thoigian_congno']), $startTime_y);



$today = date("d/m/Y");
$thoigiancongno = date("d/m/Y", $thoigiancongno);

$tg_conlai = $thoigiancongno - $today;

?>

<div class="fixwidth">
    <form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
        <div class="wrap-cart d-flex align-items-stretch justify-content-between">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])) { ?>
                <div class="bottom-cart">
                    <div class="all_login">
                        <?php
                        $iduser = $_SESSION[$login_member]['id'];
                        if ($iduser) {
                        ?>
                            <div class="tb_login">
                                <span><?= $lang == 'vi' ? 'Already Registered?' : 'Đã đăng ký?' ?></span>
                                <a href="account/dang-ky"><?= dangky ?></a>
                            </div>
                        <?php } else { ?>
                            <div class="tb_login">
                                <span><?= $lang == 'vi' ? 'Already Registered?' : 'Đã đăng ký?' ?></span>
                                <a href="account/dang-ky"><?= dangky ?></a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="section-cart">
                        <div class="section-cart_tt">
                            <p class="title-cart"><?= thongtingiaohang ?>:</p>
                            <?php
                            $iduser = $_SESSION[$login_member]['id'];
                            $row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
                            ?>
                            <div class="information-cart">
                                <label for="basic-url">First name *</label>
                                <div class="input-cart">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?= !empty($iduser) ? $row_detail['username'] : ''  ?>" required />
                                </div>
                                <label for="basic-url">Last name *</label>
                                <div class="input-cart">
                                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Last name" value="<?= !empty($row_detail['ten']) ? $row_detail['ten'] : ''  ?>" required />
                                </div>
                                <label for="basic-url">Email *</label>
                                <div class="input-cart">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?= !empty($row_detail['email']) ? $row_detail['email'] : ''  ?>" required />
                                </div>
                                <label for="basic-url"><?= dienthoai ?> *</label>
                                    <div class="input-cart">
                                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" value="<?= !empty($row_detail['dienthoai']) ? $row_detail['dienthoai'] : ''  ?>" required />
                                    </div>
                                <?php if ($row_detail['id_vip']) { ?>
                                    <label for="basic-url">Company name </label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="tencongty" name="tencongty" placeholder="Company name" value="<?= !empty($iduser) ? $row_detail['tencongty'] : ''  ?>" />
                                    </div>
                                    <label for="basic-url"><?= diachi ?> *</label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="diachi_shipping" name="diachi_shipping" placeholder="<?= diachi ?>" value="<?= !empty($iduser) ? $row_detail['diachi_shipping'] : ''  ?>" required />
                                    </div>

                                    <label for="basic-url">Zip code *</label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="zip_code_shipping" name="zip_code_shipping" placeholder="Zip code" value="<?= !empty($iduser) ? $row_detail['zip_code_shipping'] : ''  ?>" required />
                                    </div>

                                    <label for="basic-url"><?= $lang == 'vi' ? 'Quận/Huyện ' : 'District' ?> *</label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="district_shipping" name="district_shipping" placeholder="<?= $lang == 'vi' ? 'Quận/Huyện ' : 'District' ?>" value="<?= !empty($iduser) ? $row_detail['district_shipping'] : ''  ?>" required />
                                    </div>

                                    <label for="basic-url"><?= $lang == 'vi' ? 'Thành phố ' : 'City' ?> *</label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="city_shipping" name="city_shipping" placeholder="<?= $lang == 'vi' ? 'Thành phố ' : 'City' ?>" value="<?= !empty($iduser) ? $row_detail['city_shipping'] : ''  ?>" required />
                                    </div>

                                    <label for="basic-url"><?= $lang == 'vi' ? 'quốc gia' : 'country' ?> *</label>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="quocgia_shipping" name="quocgia_shipping" placeholder="<?= $lang == 'vi' ? 'Thành phố ' : 'City' ?>" value="<?= !empty($iduser) ? $row_detail['quocgia_shipping'] : ''  ?>" required />
                                    </div>

                                    
                                <?php } ?>
                            </div>
                        </div>
                        <div class="payment">
                            <p class="title-cart"><?= hinhthucthanhtoan ?>:</p>
                            <div class="information-cart all_card">
                                <!-- </?php foreach ($httt as $key => $value) { ?>
                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payments-<?= $value['id'] ?>" name="payments" value="<?= $value['id'] ?>" required>
                                        <label class="payments-label custom-control-label" for="payments-<?= $value['id'] ?>" data-payments="<?= $value['id'] ?>"><?= $value['ten' . $lang] ?></label>
                                        <?php if ($value['mota' . $lang]) { ?>
                                            <div class="payments-info payments-info-<?= $value['id'] ?> transition">
                                                <?= str_replace("\n", "<br>", $value['mota' . $lang]) ?></div>
                                        <?php } ?>
                                    </div>
                                </?php } ?> -->
                                <?php if ($_SESSION[$login_member]['active']) {
                                    $member_vip = $d->rawQueryOne("select congno from #_member_vip where id = '" . $_SESSION[$login_member]['id_vip'] . "'");
                                    if ($member_vip['congno'] != 0) {
                                        if ($congnodadung != $member_vip['congno']) {
                                            if ($tg_conlai > 0) { ?>
                                                <div class="payments-cart custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="payments-congno" name="payments" value="congno" required>
                                                    <label class="payments-label custom-control-label" for="payments-congno" data-payments="congno"><?= $lang == 'vi' ? 'Công nợ' : 'Debt' ?></label>
                                                </div>
                                            <?php
                                            } else { ?>
                                                <div class="payments-cart payments-label_khoa custom-control custom-radio">
                                                    <!-- <input type="radio" class="custom-control-input" id="payments-congno" name="payments" value="congno" required> -->
                                                    <label class="" for="payments-congno" data-payments="congno">(<?= $lang == 'vi' ? 'Quá thời gian hạn mức' : 'Exceeded limit time' ?>)</label>
                                                </div>
                                            <?php
                                            }
                                        } else { ?>
                                            <div class="payments-cart payments-label_khoa custom-control custom-radio">
                                                <!-- <input type="radio" class="custom-control-input" id="payments-congno" name="payments" value="congno" required> -->
                                                <label for=""><?= $lang == 'vi' ? 'Công nợ' : 'Debt' ?></label>
                                                <label class="" for="payments-congno" data-payments="congno">(<?= $lang == 'vi' ? 'Đạt hạn mức' : 'Reached limit ' ?>)</label>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php ?>
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="UK" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <?php
                                $tigia_paypal = ($cart->get_order_total()) / str_replace(",", "", $optsetting['tigia']);
                                $total_paypal = round($tigia_paypal, 2);
                                ?>
                                <input type="hidden" name="toltal_paypal" value="<?= $total_paypal ?>">
                                <div class="payments-cart custom-control custom-radio" style="pointer-events: none;padding-left: 15px;">
                                    <!-- <input type="radio" class="custom-control-input" id="payments-tt_visa" name="payments" value="visa" required>
                                    <label class="payments-label custom-control-label" for="payments-tt_visa" data-payments="tt_visa">visa</label> -->
                                    <label class="payments-label" for="payments-tt_visa" data-payments="tt_visa">visa</label>
                                </div>
                                <div class="payments-cart custom-control custom-radio" style="pointer-events: none;padding-left: 15px;">
                                    <!-- <input type="radio" class="custom-control-input" id="payments-tt_master_card" name="payments" value="master_card" required>
                                    <label class="payments-label custom-control-label" for="payments-tt_master_card" data-payments="tt_master_card">Master Card</label> -->
                                    <label class="payments-label" for="payments-tt_master_card" data-payments="tt_master_card">Master Card</label>
                                </div>
                                <div class="payments-cart custom-control custom-radio" style="pointer-events: none;padding-left: 15px;">
                                    <!-- <input type="radio" class="custom-control-input" id="payments-tt_paypal" name="payments" value="paypal" required>
                                    <label class="payments-label custom-control-label" for="payments-tt_paypal" data-payments="tt_paypal">Paypal</label> -->
                                    <label class="payments-label" for="payments-tt_paypal" data-payments="tt_paypal">Paypal</label>
                                </div>
                                <div class="payments-cart custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payments-tt_khac" name="payments" value="lua_chon_khac" required>
                                    <label class="payments-label custom-control-label" for="payments-tt_khac" data-payments="lua_chon_khac"><?= $lang == 'vi' ? 'Lựa chọn khác':'Another choice' ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <p class="title-cart"><?= $lang == 'vi' ? 'Phương thức vận chuyển' : 'Shipping method' ?>:</p>
                            <div class="information-cart all_ptvc">
                                <div class="ptvc_trongnuoc" style="width: 100%;">
                                    <div class="title_ptvc"><?= $lang == 'vi' ? 'Trong nước' : 'Domestic' ?></div>
                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="ptvc_viettel_post" name="ptvc" value="viettel_post" required>
                                        <label class="payments-label custom-control-label" for="ptvc_viettel_post" data-payments="viettel_post">Viettel Post</label>
                                    </div>
                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="ptvc_vn_post" name="ptvc" value="vn_post" required>
                                        <label class="payments-label custom-control-label" for="ptvc_vn_post" data-payments="vn_post">VN Post</label>
                                    </div>
                                </div>
                                <!-- <div class="ptvc_trongnuoc">
                                    <div class="title_ptvc"><?= $lang == 'vi' ? 'Ngoài nước' : 'Foreign' ?></div>
                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="ptvc_dnl" name="ptvc" value="dnl" required>
                                        <label class="payments-label custom-control-label" for="ptvc_dnl" data-payments="dnl">DNL</label>
                                    </div>
                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="ptvc_fedex" name="ptvc" value="fedex" required>
                                        <label class="payments-label custom-control-label" for="ptvc_fedex" data-payments="fedex">Fedex</label>
                                    </div>
                                </div> -->
                                <div class="payments-cart custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="ptvc_khac" name="ptvc" value="khac" required>
                                    <label class="payments-label custom-control-label" for="ptvc_khac" data-payments="khac"><?= $lang == 'vi' ? 'Khác' : 'Other' ?></label>
                                </div>
                                <div class="note_ptvc">
                                    <input type="text" name="phuongthucvanchuyen_note" placeholder="Noted ... " class="phuongthucvanchuyen_note" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="all_card_payment">
                    <div class="breadCrumbs">
                        <div><?= $breadcrumbs ?></div>
                    </div>
                    <div class="top-cart">
                        <p class="title-cart"><?= giohangcuaban ?>:</p>
                        <div class="list-procart">
                            <div class="procart procart-label d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= hinhanh ?></div>
                                <div class="info-procart"><?= tensanpham ?></div>
                                <div class="quantity-procart">
                                    <p><?= soluong ?></p>
                                    <p><?= thanhtien ?></p>
                                </div>
                                <div class="price-procart"><?= thanhtien ?></div>
                            </div>
                            <?php $max = count($_SESSION['cart']);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $_SESSION['cart'][$i]['productid'];
                                $quantity = $_SESSION['cart'][$i]['qty'];
                                $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                                $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                                $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $proinfo['gia'];
                                $pro_price_new = $proinfo['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;



                                $list_sp = $cart->get_product_list($proinfo['id_list']);
                                $khuyenmai = $cart->get_product_khuyenmai($list_sp['id_news']);
                                $khuyenmai_user = $cart->get_product_khuyenmai_user($proinfo['id_brand'], $_SESSION[$login_member]['id_vip']);
                                $khuyenmai_sanpham_one = $cart->get_khuyenmai_sanpham_one($proinfo['id_khuyenmai']);
                                $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                                

                                if ($proinfo['giado']) {
                                    $pro_price_do = $proinfo['giado'];
                                    $pro_price_new_do = $proinfo['giadomoi'];
                                    $pro_price_qty_do = $pro_price_do * $quantity;
                                    $pro_price_new_qty_do = $pro_price_new_do * $quantity;
                                } else {
                                    $do_gia = ($proinfo['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                    $giado = round($do_gia, 2);

                                    $pro_price_do = $giado;
                                    $pro_price_new_do = $proinfo['giadomoi'];
                                    $pro_price_qty_do = $pro_price_do * $quantity;
                                    $pro_price_new_qty_do = $pro_price_new_do * $quantity;
                                }
                                $giakhuyenmai = $func->chuyendoitigia_pro_detail($proinfo,$brand_sp);
                                $giakhuyenmai_qty = $giakhuyenmai * $quantity;

                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between">
                                    <div class="pic-procart">
                                        <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x2/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
                                        <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                            <i class="fa fa-times-circle"></i>
                                            <span><?= xoa ?></span>
                                        </a>
                                    </div>
                                    <div class="info-procart">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a>
                                        </h3>
                                        <div class="properties-procart">
                                            <?php if ($mau) {
                                                $maudetail = $cart->get_product_mau($mau); ?>
                                                <p>Màu: <strong><?= $maudetail ?></strong></p>
                                            <?php } ?>
                                            <?php if ($size) {
                                                $sizedetail = $cart->get_product_size($size); ?>
                                                <p>Size: <strong><?= $sizedetail ?></strong></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="quantity-procart">
                                        <div class="price-procart price-procart-rp">
                                            <?php if ($lang == 'vi') { ?>
                                                <?php if ($giakhuyenmai) { ?>
                                                    <p class="price-new-cart load-price-new-<?= $code ?>">
                                                        <?= $func->format_money($giakhuyenmai) ?>
                                                    </p>
                                                    <p class="price-old-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money($pro_price_qty) ?>
                                                    </p>
                                                <?php } elseif ($proinfo['giamoi']) { ?>
                                                    <p class="price-new-cart load-price-new-<?= $code ?>">
                                                        <?= $func->format_money($pro_price_new_qty) ?>
                                                    </p>
                                                    <p class="price-old-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money($pro_price_qty) ?>
                                                    </p>
                                                <?php } else { ?>
                                                    <p class="price-new-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money($pro_price_qty) ?>
                                                    </p>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php if ($giakhuyenmai) { ?>
                                                    <p class="price-new-cart load-price-new-<?= $code ?>">
                                                        <?= $func->format_money_erou($giakhuyenmai) ?>
                                                    </p>
                                                    <p class="price-old-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                    </p>
                                                <?php } elseif ($proinfo['giamoi']) { ?>
                                                    <p class="price-new-cart load-price-new-<?= $code ?>">
                                                        <?= $func->format_money_erou($pro_price_new_qty_do) ?>
                                                    </p>
                                                    <p class="price-old-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money_erou($pro_price_qty_do )?>
                                                    </p>
                                                <?php } else { ?>
                                                    <p class="price-new-cart load-price-<?= $code ?>">
                                                        <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                    </p>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
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
                                        <div class="pic-procart pic-procart-rp">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
                                            <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                                <i class="fa fa-times-circle"></i>
                                                <span><?= xoa ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="price-procart">
                                        <?php if ($lang == 'vi') { ?>
                                            <?php if ($giakhuyenmai_qty) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money($giakhuyenmai_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money($pro_price_qty) ?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoi']) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money($pro_price_new_qty) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>">
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
                                                <p class="price-old-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_qty_do )?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoi']) { ?>
                                                <p class="price-new-cart load-price-new-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_new_qty_do) ?>
                                                </p>
                                                <p class="price-old-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart load-price-<?= $code ?>">
                                                    <?= $func->format_money_erou($pro_price_qty_do) ?>
                                                </p>
                                            <?php } ?>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between mt-3">
                            <p><?= $lang == 'vi' ? 'Mã khuyến mãi' : 'Promotional code' ?>:</p>
                            <input class="discount_text" type="text">
                        </div> -->
                        <div class="money-procart">

                            <?php if ($config['order']['ship']) { ?>
                                <div class="total-procart d-flex align-items-center justify-content-between d-none">
                                    <p><?= tamtinh ?>:</p>
                                    <?php if ($lang == 'vi') { ?>
                                        <p class="total-price load-price-temp"><?= $func->format_money($cart->get_order_total()) ?></p>
                                    <?php } else { ?>
                                        <p class="total-price "><?= $func->format_money_erou($cart->get_order_total()) ?></p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <!-- </?php if ($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= phivanchuyen ?>:</p>
                                <p class="total-price load-price-ship">0đ</p>
                                <input type="hidden" name="phi_ship" class="phiship" value="">
                            </div>
                            </?php } ?> -->
                            <!-- <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Discount:</p>
                                <p class="total-price load-price-discount">0đ</p>
                            </div> -->
                            <!-- <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>VAT(10%):</p>
                                </?php if ($lang == 'vi') {
                                    $vat = (10 / 100) * $cart->get_order_total();
                                ?>
                                    <p class="total-price load-price-vat"><?= $func->format_money($vat) ?></p>
                                </?php } else {
                                    $total = $cart->get_order_total();
                                    $vat = (10 / 100) * $total;
                                    // var_dump($total);
                                ?>
                                    <p class="total-price load-price-vat"><i class="fas fa-euro-sign"></i><?= $vat ?></p>
                                </?php } ?>
                            </div> -->
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tongtien ?>:</p>
                                <?php if ($lang == 'vi') {
                                    // $vat = (10 / 100) * $cart->get_order_total();
                                    $total = $cart->get_order_total();
                                ?>
                                    <p class="total-price load-price-total"><?= $func->format_money($total) ?></p>
                                <?php } else {
                                    // $total = $cart->get_order_total();
                                    // $vat = (10 / 100) * $total;
                                    $total = $total;
                                ?>
                                    <p class="total-price load-price-total"><?= $func->format_money_erou($total) ?></p>
                                <?php } ?>
                            </div>
                            <!-- <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= $lang == 'vi' ? 'Tổng cân nặng' : 'Total weight' ?>:</p>
                                <p class="total-price load-weight-total"><?= $cart->get_cannang_total() ?>KG</p>
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= $lang == 'vi' ? 'Tổng kích thước' : 'Total size' ?>:</p>
                                <p class="total-price load-size-total"><?= $cart->get_kichthuoc_total() ?>CM</p>
                            </div> -->
                            <?php if ($lang == 'vi') { ?>
                                <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <?php } else { ?>
                                <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <?php } ?>
                            <input type="hidden" class="price-ship" name="price-ship">
                            <input type="hidden" class="price-discount" name="price-discount">
                            <?php if ($lang == 'vi') {
                                $vat = (10 / 100) * $cart->get_order_total();
                                $total = $cart->get_order_total();
                            ?>
                                <input type="hidden" class="price-total" name="price-total" value="<?= $total ?>">
                            <?php } else {
                                $total = $cart->get_order_total();
                                $vat = (10 / 100) * $total;
                                $total = $total;
                            ?>
                                <input type="hidden" class="price-total" name="price-total" value="<?= $total ?>">
                            <?php } ?>
                            <input type="hidden" class="cannang-total" name="cannang-total" value="<?= $cart->get_cannang_total() ?>">
                            <input type="hidden" class="kichthuoc-total" name="kichthuoc-total" value="<?= $cart->get_kichthuoc_total() ?>">
                        </div>
                        <div class="all_thanhtoan_cart">
                            <input type="submit" class="btn-cart btn btn-lg btn-block" name="thanhtoan" value="<?= $lang == 'vi' ? 'Tôi xác nhận đơn hàng của tôi' : 'I confirm my order' ?>">
                            <i class="fas fa-angle-double-right"></i>
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
    </form>
</div>