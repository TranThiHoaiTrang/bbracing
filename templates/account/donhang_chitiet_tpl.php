<?php
$iduser = $_SESSION[$login_member]['id'];
$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
$order = $d->rawQueryOne("select * from #_order where id = ? limit 0,1", array($id_donhang));
$order_detail = $d->rawQuery("select * from #_order_detail where id_order = ? limit 0,1", array($id_donhang));

if ($iduser) {
?>
    <div class="fixwidth mt-4">
        <div class="al_user_detail">
            <div class="user_detail_left">
                <div class="all_fillter all_fillter_account">
                    <div class="all_hide_fillter">
                        <div class="hide_fillter_thongtin">
                            <a href="account/thong-tin">
                                <div class="all_tongquan_thongtin">
                                    <div class="avata_member">
                                        <div class="photoUpload-detail mb-2"><img style="width: 100%;" class="rounded" src="<?= UPLOAD_PHOTO_L . $row_detail['avatar'] ?>" onerror="src='assets/images/nguoidung.png'" alt="Alt Photo" /></div>
                                        <!-- <input type="file" class="form-control" id="avatar" name="avatar" placeholder=""> -->
                                    </div>
                                    <div class="thongtin_coban">
                                        <div class="name_account">
                                            <span>Account Of: </span>
                                            <span><?= $row_detail['username'] ?></span>
                                        </div>
                                        <div class="name_account">
                                            <span><?= $lang == 'vi' ? 'Mã khách hàng' : 'Customer ID' ?>: </span>
                                            <span>BBR<?= $row_detail['id_member'] ?></span>
                                        </div>
                                        <!-- <div class="hotline_account"><?= $row_detail['dienthoai'] ?></div> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="all_fillter_danhmuc">
                            <div class="all_brand_sp">
                                <a href="account/donhang">
                                    <div class="title_brand" style="padding-top: 0;">
                                        <span><?= $lang == 'vi' ? 'Đơn hàng của tôi' : 'My order' ?></span>
                                    </div>
                                </a>
                            </div>
                            <div class="all_brand_sp">
                                <a href="account/donhang_chothanhtoan">
                                    <div class="title_brand">
                                        <span><?= $lang == 'vi' ? 'Đơn hàng chờ thanh toán' : 'Pending payment' ?></span>
                                    </div>
                                </a>
                            </div>
                            <div class="all_brand_sp">
                                <a href="account/donhang_chothanhtoan">
                                    <div class="title_brand">
                                        <span><?= $lang == 'vi' ? 'Yêu cầu thanh toán' : 'Payment request' ?></span>
                                    </div>
                                </a>
                            </div>
                            <?php if ($_SESSION[$login_member]['id_vip'] == 0) { ?>
                                <div class="all_brand_sp">
                                    <a href="account/donhang">
                                        <div class="title_brand">
                                            <span><?= $lang == 'vi' ? 'Điểm tích lũy mua hàng' : 'BBRPoint' ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="all_brand_sp">
                                <a href="account/tongquan">
                                    <div class="title_brand">
                                        <span><?= $lang == 'vi' ? 'Quản lý thông tin' : 'Account Dashboard' ?></span>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="all_brand_sp">
                                <a href="account/diachi">
                                    <div class="title_brand">
                                        <span><?= $lang == 'vi' ? 'Địa chỉ giao hàng' : 'Delivery address' ?></span>
                                    </div>
                                </a>
                            </div> -->
                            <div class="all_brand_sp">
                                <?php if ($_SESSION[$login_member]['user_id'] != '') { ?>
                                    <a href="account/dang-xuat" onclick="FBLogout()">
                                        <div class="title_brand">
                                            <span><?= dangxuat ?></span>
                                        </div>
                                    </a>
                                <?php } else { ?>
                                    <a href="account/dang-xuat">
                                        <div class="title_brand">
                                            <span><?= dangxuat ?></span>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user_detail_right">
                <div class="all_title_boloc_user">
                    <div class="title_donhang"><?= $lang == 'vi' ? 'Chi tiết đơn hàng ' . $order['madonhang'] : $order['madonhang'] . ' order details' ?></div>
                </div>
                <div class="wrap-user">
                    <div class="reorder">
                        <span>Your order Reference <?= $order['madonhang'] ?> – placed on <?= date("d/m/Y", $order['ngaytao']) ?> </span>
                        <button type="button" class="btn reorder_button" data-id_order="<?= $id_donhang ?>" data-toggle="modal" data-target=".reo_order">
                            <span>Reorder</span>
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                    <div class="mota_tinhtrangdonhang">FOLLOW YOUR ORDER’S STATUS STEP BY-STEP IN BELOW</div>
                    <div class="all_tinhtrangdonhang">
                        <div class="all_date_status">
                            <div class="date"><strong>DATE</strong></div>
                            <div class="status"><strong>STATUS</strong></div>
                        </div>
                        <?php if (!empty($order['ngay_completed'])) { ?>
                            <div class="all_date_status">
                                <div class="date"><?= date("d/m/Y", $order['ngay_completed']) ?></div>
                                <div class="status" style="color: #0800ff;">Completed</div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($order['ngay_shipped'])) { ?>
                            <div class="all_date_status">
                                <div class="date"><?= date("d/m/Y", $order['ngay_shipped']) ?></div>
                                <div class="status" style="color: #ff9200;">Shipped</div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($order['ngay_payment'])) { ?>
                            <div class="all_date_status">
                                <div class="date"><?= date("d/m/Y", $order['ngay_payment']) ?></div>
                                <div class="status">Completly Payment</div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($order['ngay_waiting_payment'])) { ?>
                            <div class="all_date_status">
                                <div class="date"><?= date("d/m/Y", $order['ngay_waiting_payment']) ?></div>
                                <div class="status" style="color:#16af00;">Awaiting bank wire payment</div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($order['ngay_shipcost'])) { ?>
                            <div class="all_date_status">
                                <div class="date"><?= date("d/m/Y", $order['ngay_shipcost']) ?></div>
                                <div class="status" style="color:#5f00b7;">Shipping Cost</div>
                            </div>
                        <?php } ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngaytao']) ?></div>
                            <div class="status" style="color:#004ad2;">Confirm order</div>
                        </div>
                    </div>
                    <div class="all_diachi_donhang">
                        <div class="diachi_giaohang">
                            <span>DELIVERY ADDRESS</span>
                            <div class="user_name_diachi"><?= $row_detail['username'] ?></div>
                            <!-- <div class="diachi_text"><?= $order['diachi'] . ' ' . $order['district_shipping'] . ' ' . $order['city_shipping'] ?></div>
                            <div class="quocgia_text"><?= $order['quocgia_shipping'] ?></div>
                            <div class="macode_text"><?= $row_detail['zip_code_shipping'] ?></div>
                            <div class="hotline_text"><?= $row_detail['hotline'] ?></div> -->
                            <div class="hotline_text"><?= $row_detail['email'] ?></div>
                        </div>
                        <div class="diachi_giaohang">
                            <span>ADDRESS</span>
                            <!-- <div class="user_name_diachi"><?= $row_detail['username'] ?></div> -->
                            <div class="diachi_text"><?= $row_detail['diachi'] . ' ' . $row_detail['district'] . ' ' . $row_detail['city'] ?></div>
                            <!-- <div class="quocgia_text"><?= $row_detail['quocgia'] ?></div>
                            <div class="macode_text"><?= $row_detail['zip_code'] ?></div>
                            <div class="hotline_text"><?= $row_detail['hotline'] ?></div> -->
                        </div>
                    </div>
                    <div class="all_product_donhang">
                        <table class="table table_chitietdonhang">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $lang == 'vi' ? 'MÔ TẢ' : 'DESCRIBE' ?></th>
                                    <th scope="col" style="text-transform: uppercase;"><?= sanpham ?></th>
                                    <th scope="col" class="text-align-center" style="text-transform: uppercase;"><?= soluong ?></th>
                                    <th scope="col" class="text-align-center"><?= $lang == 'vi' ? 'ĐƠN GIÁ' : 'UNIT PRICE' ?></th>
                                    <th scope="col" class="text-align-center"><?= $lang == 'vi' ? 'TOTAL PRICE' : 'TỔNG GIÁ' ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $giatongall = 0;
                                foreach ($order_detail as $v) {
                                    $proinfo = $cart->get_product_info($v['id_product']);
                                    $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                                ?>
                                    <tr>
                                        <td class="td_img_chitietdonhang">
                                            <div class="img_chitietdonhang">
                                                <img class="rounded img-preview" src="<?= THUMBS ?>/400x262x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>" width="200" height="130">
                                            </div>
                                        </td>
                                        <td class="td_noidung_chitietdonhang">
                                            <div class="name_sanpham_giohang"><?= $v['ten'] ?></div>
                                            <div class="pa_sanpham_giohang">P/A: <strong><?= $proinfo['masp'] ?></strong></div>
                                            <div>Màu: <strong><?= $v['mau'] ?></strong></div>
                                        </td>
                                        <td class="td_img_chitietdonhang text-align-center"><?= $v['soluong'] ?></td>
                                        <td class="td_img_chitietdonhang">
                                            <div class="gia_donhangchitiet">
                                                <?php if ($lang == 'vi') { ?>
                                                    <?php if (!empty($v['giamoi'])) { ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money($v['giamoi']) ?></span>
                                                    <?php } elseif (!empty($v['giamoien'])) {
                                                        $tigia = ($v['giamoien']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, -3);
                                                    ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money($tigia_new) ?></span>
                                                        <?php } else {
                                                        if (!empty($v['gia'])) { ?>
                                                            <span class="price-new-cart-detail"><?= $func->format_money($v['gia']) ?></span>
                                                        <?php } else {
                                                            $tigia = ($v['giaen']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, -3);
                                                        ?>
                                                            <span class="price-new-cart-detail"><?= $func->format_money($tigia_new) ?></span>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else {  ?>
                                                    <?php if ($v['giamoien']) { ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $v['giamoien'] ?></span>
                                                    <?php } elseif ($v['giamoi']) { 
                                                        $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);

                                                        $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new_gia = round($tigia_gia, 2);
                                                    ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new ?></span>
                                                        <!-- <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new_gia ?></span> -->
                                                    <?php } else {
                                                        
                                                        if ($v['giaen']) { ?>
                                                            <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $v['gia'] ?></span>
                                                        <?php } else {
                                                            $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);
                                                        ?>
                                                            <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new ?></span>
                                                        <?php } ?>
                                                    <?php }?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td class="td_img_chitietdonhang">
                                            <div class="gia_donhangchitiet">
                                                <?php if ($lang == 'vi') { ?>
                                                    <?php if ($v['giamoi']) {
                                                        $tonggia = $v['giamoi'] * $v['soluong']; ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money(($v['giamoi'] * $v['soluong'])) ?></span>
                                                        <!-- <span class="price-old-cart-detail"><?= $func->format_money(($v['gia'] * $v['soluong'])) ?></span> -->
                                                    <?php } elseif ($v['giamoien']) {
                                                        $tigia = ($v['giamoien']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, -3);

                                                        $tonggia = $tigia_new * $v['soluong'];
                                                    ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money(($tigia_new * $v['soluong'])) ?></span>
                                                        <!-- <span class="price-old-cart-detail"><?= $func->format_money(($v['giaen'] * $v['soluong'])) ?></span> -->
                                                        <?php } else {
                                                        if ($v['gia']) {
                                                            $tonggia = $v['gia'] * $v['soluong']; ?>
                                                            <span class="price-new-cart-detail"><?= $func->format_money(($v['gia'] * $v['soluong'])) ?></span>
                                                        <?php } else {
                                                            $tigia = ($v['giaen']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, -3);
                                                            $tonggia = $tigia_new * $v['soluong'];
                                                        ?>
                                                            <span class="price-new-cart-detail"><?= $func->format_money(($tigia_new * $v['soluong'])) ?></span>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if ($v['giamoien']) {
                                                        $tonggia = $v['giamoien'] * $v['soluong']; ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giamoien'] * $v['soluong']) ?></span>
                                                        <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giaen'] * $v['soluong']) ?></span>
                                                    <?php } elseif ($v['giamoi']) {
                                                        $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);

                                                        $tonggia = $tigia_new * $v['soluong'];

                                                        $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new_gia = round($tigia_gia, 2);
                                                    ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new * $v['soluong']) ?></span>
                                                        <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new_gia * $v['soluong']) ?></span>
                                                        <?php } else {
                                                        if ($v['giaen']) {
                                                            $tonggia = $v['giaen'] * $v['soluong']; ?>
                                                            <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giaen'] * $v['soluong']) ?></span>
                                                        <?php } else {
                                                            $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                            $tigia_new = round($tigia, 2);
                                                            $tonggia = $tigia_new * $v['soluong'];
                                                        ?>
                                                            <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new * $v['soluong']) ?></span>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $giatongall += $tonggia;
                                } ?>
                                <tr>
                                    <td colspan="2" class="title_dongia_chuathue">
                                        <span>Items (tax excl.)</span>
                                    </td>
                                    <td colspan="3" class="noidung_dongia_chuathue">
                                        <?php if ($lang == 'vi') { ?>
                                            <div class="cast-money-cart-detail"><?= $func->format_money($giatongall) ?></div>
                                        <?php } else { ?>
                                            <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $giatongall ?></div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td colspan="2" class="title_dongia_chuathue">
                                        <span>Items (tax incl.)</span>
                                    </td>
                                    <td colspan="3" class="noidung_dongia_chuathue">
                                        <?php if ($lang == 'vi') {
                                            $vat = (10 / 100) * $giatongall;
                                            $total = $giatongall + $vat;
                                        ?>
                                            <div class="cast-money-cart-detail"><?= $func->format_money($total) ?></div>
                                        <?php } else {
                                            $total = $giatongall;
                                            $vat = (10 / 100) * $total;
                                            $total = $total + $vat;
                                        ?>
                                            <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $total ?></div>
                                        <?php } ?>
                                    </td>
                                </tr> -->
                                <!-- </?php if ($order) { ?>
                                    <tr>
                                        <td colspan="2" class="title_dongia_chuathue">
                                            <span>Shipping Fee (tax incl.)</span>
                                        </td>
                                        <td colspan="3" class="noidung_dongia_chuathue">
                                            <?php if ($lang == 'vi') { ?>
                                                <?php if (!empty($order['phiship'])) { ?>
                                                    <div class="cast-money-cart-detail"><?= $func->format_money($order['phiship']) ?></div>
                                                <?php } else { ?>
                                                    <div class="cast-money-cart-detail">0</div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php if (!empty($order['phishipen'])) { ?>
                                                    <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $order['phishipen'] ?></div>
                                                <?php } else { ?>
                                                    <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i>0</div>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </?php } ?> -->
                                <tr>
                                    <td colspan="2" class="title_dongia_chuathue">
                                        <span>Total</span>
                                    </td>
                                    <td colspan="3" class="noidung_dongia_chuathue">
                                        <?php if ($lang == 'vi') {
                                            if ($order['phiship']) {
                                                $vat = (10 / 100) * $giatongall;
                                                $total_tong = $giatongall + $order['phiship'];
                                            } else {
                                                $vat = (10 / 100) * $giatongall;
                                                $total_tong = $giatongall;
                                            }
                                        ?>
                                            <div class="cast-money-cart-detail"><?= $func->format_money($total_tong) ?></div>
                                        <?php } else {
                                            if ($order['phishipen']) {
                                                $vat = (10 / 100) * $giatongall;
                                                $total_tong = $giatongall + $order['phishipen'];
                                            } else {
                                                $vat = (10 / 100) * $giatongall;
                                                $total_tong = $giatongall;
                                            }
                                        ?>
                                            <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $total_tong ?></div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table_chitietdonhang table_shipping">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-align-center">DATE</th>
                                    <th scope="col" class="text-align-center">CARRIER</th>
                                    <th scope="col" class="text-align-center">WEIGHT</th>
                                    <th scope="col" class="text-align-center">SHIPPING COST</th>
                                    <th scope="col" class="text-align-center">TRACKING NUMBER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-align-center"><span><?= date("d/m/Y", $order['ngaytao']) ?></span></td>
                                    <td class="text-align-center"><span><?= $order['phuongthucvanchuyen'] ?></span></td>
                                    <td class="text-align-center"><span><?= $order['cannang'] ?></span></td>
                                    <td class="text-align-center">
                                        <?php if ($lang == 'vi') { ?>
                                            <?php if ($order['phiship']) { ?>
                                                <span><?= $func->format_money($order['phiship']) ?></span>
                                            <?php } else { ?>
                                                <span>0</span>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($order['phishipen']) { ?>
                                                <span><i class="fas fa-euro-sign"></i><?= $order['phishipen'] ?></span>
                                            <?php } else { ?>
                                                <span>0</span>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-align-center"><span><?= $order['shipping_cost'] ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($order['tinhtrang'] == 2 || $order['tinhtrang'] == 3 || $total_tong > 900000) { ?>
                        <form class="form-diachi validation-user" method="post" action="./paypal/payments.php" enctype="multipart/form-data" id="paypal_form">
                            <div class="thanhtoandonhang">
                                <?php
                                $tonggia_pay = 0;
                                foreach ($order_detail as $v) {
                                    $proinfo = $cart->get_product_info($v['id_product']);
                                    $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                                    if ($v['giamoien']) {
                                        $tonggia = $v['giamoien'] * $v['soluong'];
                                    } elseif ($v['giamoi']) {
                                        $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                        $tigia_new = round($tigia, 2);

                                        $tonggia = $tigia_new * $v['soluong'];

                                        $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                        $tigia_new_gia = round($tigia_gia, 2);
                                    } else {
                                        if ($v['giaen']) {
                                            $tonggia = $v['giaen'] * $v['soluong'];
                                        } else {
                                            $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                            $tigia_new = round($tigia, 2);
                                            $tonggia = $tigia_new * $v['soluong'];
                                        }
                                    }
                                }
                                $tonggia_pay += $tonggia;
                                if ($order['phishipen']) {
                                    $vat = (10 / 100) * $tonggia_pay;
                                    $total_paypal = $tonggia_pay + $vat + $order['phishipen'];
                                } else {
                                    $vat = (10 / 100) * $tonggia_pay;
                                    $total_paypal = $tonggia_pay + $vat;
                                }
                                ?>
                                <input type="hidden" name="first_name" value="<?= $order['first_name'] ?>" />
                                <input type="hidden" name="last_name" value="<?= $order['hoten'] ?>" />
                                <input type="hidden" name="email" value="<?= $order['email'] ?>" />
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="UK" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <input type="hidden" name="item_number" value="<?= $total_paypal ?>" />
                                <input type="hidden" name="itemAmount" value="<?= $total_paypal ?>" />
                                <input type="hidden" name="id_order" value="<?= $id_donhang ?>" />
                                <input type="hidden" name="ma_donhang" value="<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" />
                                <input type="submit" value="<?= $lang == 'vi' ? 'Thanh toán đơn hàng' : 'Payment orders' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button">
                            </div>
                        </form>
                    <?php } elseif ($order['tinhtrang'] == 1) { ?>
                        <div class="thanhtoandonhang">
                            <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng chưa được cập nhật phí ship' : 'The order has not been updated with shipping fees' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                        </div>
                    <?php } elseif ($order['tinhtrang'] == 7) { ?>
                        <div class="thanhtoandonhang">
                            <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng của bạn đã bị hủy' : 'Your order has been cancelled' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                        </div>
                    <?php } else { ?>
                        <div class="thanhtoandonhang">
                            <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng Đã được thanh toán' : 'Order has been paid' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                        </div>
                    <?php } ?>
                    <div class="mota_tinhtrangdonhang">Please click <a href="<?= $link_chitietdonhang['link_youtube'] ?>">here</a> for more information about order tracking instructions.</div>
                    <form class="form-diachi validation-user" novalidate method="post" action="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" enctype="multipart/form-data">
                        <div class="all_ghichu">
                            <input type="submit" value="Add a message" name="themghichu">
                            <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Write a message if you want …." value="<?= $order['ghichu'] ?>">
                        </div>
                    </form>
                    <div class="all_tracuudonhang">
                        <div class="thanhtoandonhang mt-3">
                            <input type="submit" value="<?= $lang == 'vi' ? 'Tracking đơn hàng' : 'Tracking orders' ?>" name="tracking" class="thanhtoandonhang_button" disabled>
                        </div>
                        <div class="tracuu_icon">
                            <div class="icon_tracuu">
                                <i class="far fa-file-alt"></i>
                                <i class="fas fa-search"></i>
                            </div>
                            <span>Tra cứu tracking number (VD: EB125966888VN, EI125556888VN)</span>
                        </div>
                        <div class="all_donvigiaohang">
                            <?php foreach ($tracking as $v) { ?>
                                <a href="<?= $v['link'] ?>"  target="_blank">
                                    <div class="donvigiaohang">
                                        <div class="name_donvigiaohang"><?= $v['ten' . $lang] ?></div>
                                        <i class="fas fa-external-link-alt"></i>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php } else {
    if ($order) {
    ?>
        <div class="fixwidth mt-4">
            <div class="all_title_boloc_user">
                <div class="title_donhang"><?= $lang == 'vi' ? 'Chi tiết đơn hàng ' . $order['madonhang'] : $order['madonhang'] . ' order details' ?></div>
            </div>
            <div class="wrap-user">
                <div class="reorder">
                    <span>Your order Reference <?= $order['madonhang'] ?> – placed on <?= date("d/m/Y", $order['ngaytao']) ?> </span>
                    <button type="button" class="btn reorder_button" data-id_order="<?= $id_donhang ?>" data-toggle="modal" data-target=".reo_order">
                        <span>Reorder</span>
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>
                <div class="mota_tinhtrangdonhang">FOLLOW YOUR ORDER’S STATUS STEP BY-STEP IN BELOW</div>
                <div class="all_tinhtrangdonhang">
                    <div class="all_date_status">
                        <div class="date"><strong>DATE</strong></div>
                        <div class="status"><strong>STATUS</strong></div>
                    </div>
                    <?php if (!empty($order['ngay_completed'])) { ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngay_completed']) ?></div>
                            <div class="status" style="color: #0800ff;">Completed</div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($order['ngay_shipped'])) { ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngay_shipped']) ?></div>
                            <div class="status" style="color: #ff9200;">Shipped</div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($order['ngay_payment'])) { ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngay_payment']) ?></div>
                            <div class="status">Completly Payment</div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($order['ngay_waiting_payment'])) { ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngay_waiting_payment']) ?></div>
                            <div class="status" style="color:#16af00;">Awaiting bank wire payment</div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($order['ngay_shipcost'])) { ?>
                        <div class="all_date_status">
                            <div class="date"><?= date("d/m/Y", $order['ngay_shipcost']) ?></div>
                            <div class="status" style="color:#5f00b7;">Shipping Cost</div>
                        </div>
                    <?php } ?>
                    <div class="all_date_status">
                        <div class="date"><?= date("d/m/Y", $order['ngaytao']) ?></div>
                        <div class="status" style="color:#004ad2;">Confirm order</div>
                    </div>
                </div>
                <div class="all_diachi_donhang">
                    <div class="diachi_giaohang">
                        <span>DELIVERY ADDRESS</span>
                        <div class="user_name_diachi"><?= $row_detail['username'] ?></div>
                        <div class="diachi_text"><?= $order['diachi'] . ' ' . $order['district_shipping'] . ' ' . $order['city_shipping'] ?></div>
                        <div class="quocgia_text"><?= $order['quocgia_shipping'] ?></div>
                        <div class="macode_text"><?= $row_detail['zip_code_shipping'] ?></div>
                        <div class="hotline_text"><?= $row_detail['hotline'] ?></div>
                    </div>
                    <div class="diachi_giaohang">
                        <span>INVOICE ADDRESS</span>
                        <div class="user_name_diachi"><?= $row_detail['username'] ?></div>
                        <div class="diachi_text"><?= $row_detail['diachi'] . ' ' . $row_detail['district'] . ' ' . $row_detail['city'] ?></div>
                        <div class="quocgia_text"><?= $row_detail['quocgia'] ?></div>
                        <div class="macode_text"><?= $row_detail['zip_code'] ?></div>
                        <div class="hotline_text"><?= $row_detail['hotline'] ?></div>
                    </div>
                </div>
                <div class="all_product_donhang">
                    <table class="table table_chitietdonhang">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"><?= sanpham ?></th>
                                <th scope="col" class="text-align-center"><?= soluong ?></th>
                                <th scope="col" class="text-align-center"><?= $lang == 'vi' ? 'ĐƠN GIÁ' : 'UNIT PRICE' ?></th>
                                <th scope="col" class="text-align-center"><?= $lang == 'vi' ? 'TOTAL PRICE' : 'TỔNG GIÁ' ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $giatongall = 0;
                            foreach ($order_detail as $v) {
                                $proinfo = $cart->get_product_info($v['id_product']);
                                $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                            ?>
                                <tr>
                                    <td class="td_img_chitietdonhang">
                                        <div class="img_chitietdonhang">
                                            <img class="rounded img-preview" src="<?= THUMBS ?>/400x262x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>" width="200" height="130">
                                        </div>
                                    </td>
                                    <td class="td_noidung_chitietdonhang">
                                        <div class="name_sanpham_giohang"><?= $v['ten'] ?></div>
                                        <div class="pa_sanpham_giohang">P/A: <strong><?= $proinfo['masp'] ?></strong></div>
                                        <div>Màu: <strong><?= $v['mau'] ?></strong></div>
                                    </td>
                                    <td class="td_img_chitietdonhang text-align-center"><?= $v['soluong'] ?></td>
                                    <td class="td_img_chitietdonhang">
                                        <div class="gia_donhangchitiet">
                                            <?php if ($lang == 'vi') { ?>
                                                <?php if (!empty($v['giamoi'])) { ?>
                                                    <span class="price-new-cart-detail"><?= $func->format_money($v['giamoi']) ?></span>
                                                    <!-- <span class="price-old-cart-detail"><?= $func->format_money($v['gia']) ?></span> -->
                                                <?php } elseif (!empty($v['giamoien'])) {
                                                    $tigia = ($v['giamoien']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new = round($tigia, -3);
                                                ?>
                                                    <span class="price-new-cart-detail"><?= $func->format_money($tigia_new) ?></span>
                                                    <!-- <span class="price-old-cart-detail"><?= $func->format_money($v['giaen']) ?></span> -->
                                                    <?php } else {
                                                    if (!empty($v['gia'])) { ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money($v['gia']) ?></span>
                                                    <?php } else {
                                                        $tigia = ($v['giaen']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, -3);
                                                    ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money($tigia_new) ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php if ($v['giamoien']) { ?>
                                                    <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $v['giamoien'] ?></span>
                                                    <!-- <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $v['giaen'] ?></span> -->
                                                <?php } elseif ($v['giamoi']) {
                                                    $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new = round($tigia, 2);

                                                    $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new_gia = round($tigia_gia, 2);
                                                ?>
                                                    <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new ?></span>
                                                    <!-- <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new_gia ?></span> -->
                                                    <?php } else {
                                                    if ($v['giaen']) { ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $v['gia'] ?></span>
                                                    <?php } else {
                                                        $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                    ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= $tigia_new ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="td_img_chitietdonhang">
                                        <div class="gia_donhangchitiet">
                                            <?php if ($lang == 'vi') { ?>
                                                <?php if ($v['giamoi']) {
                                                    $tonggia = $v['giamoi'] * $v['soluong']; ?>
                                                    <span class="price-new-cart-detail"><?= $func->format_money(($v['giamoi'] * $v['soluong'])) ?></span>
                                                    <!-- <span class="price-old-cart-detail"><?= $func->format_money(($v['gia'] * $v['soluong'])) ?></span> -->
                                                <?php } elseif ($v['giamoien']) {
                                                    $tigia = ($v['giamoien']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new = round($tigia, -3);

                                                    $tonggia = $tigia_new * $v['soluong'];
                                                ?>
                                                    <span class="price-new-cart-detail"><?= $func->format_money(($tigia_new * $v['soluong'])) ?></span>
                                                    <!-- <span class="price-old-cart-detail"><?= $func->format_money(($v['giaen'] * $v['soluong'])) ?></span> -->
                                                    <?php } else {
                                                    if ($v['gia']) {
                                                        $tonggia = $v['gia'] * $v['soluong']; ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money(($v['gia'] * $v['soluong'])) ?></span>
                                                    <?php } else {
                                                        $tigia = ($v['giaen']) * str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, -3);
                                                        $tonggia = $tigia_new * $v['soluong'];
                                                    ?>
                                                        <span class="price-new-cart-detail"><?= $func->format_money(($tigia_new * $v['soluong'])) ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php if ($v['giamoien']) {
                                                    $tonggia = $v['giamoien'] * $v['soluong']; ?>
                                                    <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giamoien'] * $v['soluong']) ?></span>
                                                    <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giaen'] * $v['soluong']) ?></span>
                                                <?php } elseif ($v['giamoi']) {
                                                    $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new = round($tigia, 2);

                                                    $tonggia = $tigia_new * $v['soluong'];

                                                    $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                    $tigia_new_gia = round($tigia_gia, 2);
                                                ?>
                                                    <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new * $v['soluong']) ?></span>
                                                    <span class="price-old-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new_gia * $v['soluong']) ?></span>
                                                    <?php } else {
                                                    if ($v['giaen']) {
                                                        $tonggia = $v['giaen'] * $v['soluong']; ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($v['giaen'] * $v['soluong']) ?></span>
                                                    <?php } else {
                                                        $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                                        $tigia_new = round($tigia, 2);
                                                        $tonggia = $tigia_new * $v['soluong'];
                                                    ?>
                                                        <span class="price-new-cart-detail d-flex align-items-center"><i class="fas fa-euro-sign"></i><?= ($tigia_new * $v['soluong']) ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php $giatongall += $tonggia;
                            } ?>
                            <tr>
                                <td colspan="2" class="title_dongia_chuathue">
                                    <span>Items (tax excl.)</span>
                                </td>
                                <td colspan="3" class="noidung_dongia_chuathue">
                                    <?php if ($lang == 'vi') { ?>
                                        <div class="cast-money-cart-detail"><?= $func->format_money($giatongall) ?></div>
                                    <?php } else { ?>
                                        <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $giatongall ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="title_dongia_chuathue">
                                    <span>Items (tax incl.)</span>
                                </td>
                                <td colspan="3" class="noidung_dongia_chuathue">
                                    <?php if ($lang == 'vi') {
                                        $vat = (10 / 100) * $giatongall;
                                        $total = $giatongall + $vat;
                                    ?>
                                        <div class="cast-money-cart-detail"><?= $func->format_money($total) ?></div>
                                    <?php } else {
                                        $total = $giatongall;
                                        $vat = (10 / 100) * $total;
                                        $total = $total + $vat;
                                    ?>
                                        <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $total ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php if ($order) { ?>
                                <tr>
                                    <td colspan="2" class="title_dongia_chuathue">
                                        <span>Shipping Fee (tax incl.)</span>
                                    </td>
                                    <td colspan="3" class="noidung_dongia_chuathue">
                                        <?php if ($lang == 'vi') { ?>
                                            <?php if (!empty($order['phiship'])) { ?>
                                                <div class="cast-money-cart-detail"><?= $func->format_money($order['phiship']) ?></div>
                                            <?php } else { ?>
                                                <div class="cast-money-cart-detail">0</div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if (!empty($order['phishipen'])) { ?>
                                                <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $order['phishipen'] ?></div>
                                            <?php } else { ?>
                                                <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i>0</div>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2" class="title_dongia_chuathue">
                                    <span>Total</span>
                                </td>
                                <td colspan="3" class="noidung_dongia_chuathue">
                                    <?php if ($lang == 'vi') {
                                        if ($order['phiship']) {
                                            $vat = (10 / 100) * $giatongall;
                                            $total_tong = $giatongall + $vat + $order['phiship'];
                                        } else {
                                            $vat = (10 / 100) * $giatongall;
                                            $total_tong = $giatongall + $vat;
                                        }
                                    ?>
                                        <div class="cast-money-cart-detail"><?= $func->format_money($total_tong) ?></div>
                                    <?php } else {
                                        if ($order['phishipen']) {
                                            $vat = (10 / 100) * $giatongall;
                                            $total_tong = $giatongall + $vat + $order['phishipen'];
                                        } else {
                                            $vat = (10 / 100) * $giatongall;
                                            $total_tong = $giatongall + $vat;
                                        }
                                    ?>
                                        <div class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $total_tong ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table_chitietdonhang table_shipping">
                        <thead>
                            <tr>
                                <th scope="col" class="text-align-center">DATE</th>
                                <th scope="col" class="text-align-center">CARRIER</th>
                                <th scope="col" class="text-align-center">WEIGHT</th>
                                <th scope="col" class="text-align-center">SHIPPING COST</th>
                                <th scope="col" class="text-align-center">TRACKING NUMBER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-align-center"><span><?= date("d/m/Y", $order['ngaytao']) ?></span></td>
                                <td class="text-align-center"><span><?= $order['phuongthucvanchuyen'] ?></span></td>
                                <td class="text-align-center"><span><?= $order['cannang'] ?></span></td>
                                <td class="text-align-center">
                                    <?php if ($lang == 'vi') { ?>
                                        <?php if ($order['phiship']) { ?>
                                            <span><?= $func->format_money($order['phiship']) ?></span>
                                        <?php } else { ?>
                                            <span>0</span>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($order['phishipen']) { ?>
                                            <span><i class="fas fa-euro-sign"></i><?= $order['phishipen'] ?></span>
                                        <?php } else { ?>
                                            <span>0</span>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td class="text-align-center"><span><?= $order['shipping_cost'] ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php if ($order['tinhtrang'] == 2 || $order['tinhtrang'] == 3) { ?>
                    <form class="form-diachi validation-user" method="post" action="./paypal/payments.php" enctype="multipart/form-data" id="paypal_form">
                        <div class="thanhtoandonhang">
                            <?php
                            $tonggia_pay = 0;
                            foreach ($order_detail as $v) {
                                $proinfo = $cart->get_product_info($v['id_product']);
                                $brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
                                if ($v['giamoien']) {
                                    $tonggia = $v['giamoien'] * $v['soluong'];
                                } elseif ($v['giamoi']) {
                                    $tigia = ($v['giamoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                    $tigia_new = round($tigia, 2);

                                    $tonggia = $tigia_new * $v['soluong'];

                                    $tigia_gia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                    $tigia_new_gia = round($tigia_gia, 2);
                                } else {
                                    if ($v['giaen']) {
                                        $tonggia = $v['giaen'] * $v['soluong'];
                                    } else {
                                        $tigia = ($v['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
                                        $tigia_new = round($tigia, 2);
                                        $tonggia = $tigia_new * $v['soluong'];
                                    }
                                }
                            }
                            $tonggia_pay += $tonggia;
                            if ($order['phishipen']) {
                                $vat = (10 / 100) * $tonggia_pay;
                                $total_paypal = $tonggia_pay + $vat + $order['phishipen'];
                            } else {
                                $vat = (10 / 100) * $tonggia_pay;
                                $total_paypal = $tonggia_pay + $vat;
                            }
                            ?>
                            <input type="hidden" name="first_name" value="<?= $order['first_name'] ?>" />
                            <input type="hidden" name="last_name" value="<?= $order['hoten'] ?>" />
                            <input type="hidden" name="email" value="<?= $order['email'] ?>" />
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="no_note" value="1" />
                            <input type="hidden" name="lc" value="UK" />
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                            <input type="hidden" name="item_number" value="<?= $total_paypal ?>" />
                            <input type="hidden" name="itemAmount" value="<?= $total_paypal ?>" />
                            <input type="hidden" name="id_order" value="<?= $id_donhang ?>" />
                            <input type="hidden" name="ma_donhang" value="<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" />
                            <input type="submit" value="<?= $lang == 'vi' ? 'Thanh toán đơn hàng' : 'Payment orders' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button">
                        </div>
                    </form>
                <?php } elseif ($order['tinhtrang'] == 1) { ?>
                    <div class="thanhtoandonhang">
                        <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng chưa được cập nhật phí ship' : 'The order has not been updated with shipping fees' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                    </div>
                <?php } elseif ($order['tinhtrang'] == 7) { ?>
                    <div class="thanhtoandonhang">
                        <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng của bạn đã bị hủy' : 'Your order has been cancelled' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                    </div>
                <?php } else { ?>
                    <div class="thanhtoandonhang">
                        <input type="submit" value="<?= $lang == 'vi' ? 'Đơn hàng Đã được thanh toán' : 'Order has been paid' ?>" name="thanhtoandonhang" class="thanhtoandonhang_button" disabled>
                    </div>
                <?php } ?>
                <div class="mota_tinhtrangdonhang">Please click <a href="<?= $link_chitietdonhang['link_youtube'] ?>">here</a> for more information about order tracking instructions.</div>
                <form class="form-diachi validation-user" novalidate method="post" action="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" enctype="multipart/form-data">
                    <div class="all_ghichu">
                        <input type="submit" value="Add a message" name="themghichu">
                        <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Write a message if you want …." value="<?= $order['ghichu'] ?>">
                    </div>
                </form>
            </div>
        </div>
<?php } else {
        $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base . 'account/dang-nhap', false);
    }
} ?>