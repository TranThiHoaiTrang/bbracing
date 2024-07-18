<?php
$iduser = $_SESSION[$login_member]['id'];
$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
if ($_REQUEST['PayerID']) {
    $d->rawQuery("update #_order set tinhtrang = 4, ngay_waiting_payment = " . time() . ", ngay_payment = " . time() . " where id = '" . $_REQUEST['id_donhang'] . "'");
}
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
                    <div class="title_donhang"><?= $lang == 'vi' ? 'Đơn hàng của tôi' : 'My order' ?></div>
                    <div class="all_boloc_donhang">
                        <input type="hidden" class="action" name="action" value="<?= $action ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION[$login_member]['id'] ?>" class="id_user">
                        <div class="thanh_search_donhang">
                            <input type="text" class="input" id="keyword_donhang" placeholder="<Nhập mã đơn hàng>   " onkeypress="doEnter_donhang(event,'keyword_donhang');">
                            <button type="submit" value="" class="search_donhang" onclick="onSearch_donhang('keyword_donhang');">
                                ... <?= timkiem ?>
                            </button>
                        </div>
                        <div class="all_ngaydat_donhang" style="z-index: 2;">
                            <input class="date_dathang" placeholder="Ngày đặt hàng" id="date_dathang" name="date_dathang" value="<?= (isset($_GET['date_dathang'])) ? $_GET['date_dathang'] : '' ?>" />
                        </div>
                        <div class="thanh_trang_thai">
                            <?php
                            $trangthai = $d->rawQuery("select * from table_status");
                            ?>
                            <select class="select_donhang">
                                <option selected value="0"><?= $lang == 'vi' ? 'Trạng thái' : 'Status' ?></option>
                                <?php foreach ($trangthai as $v) { ?>
                                    <option value="<?= $v['id'] ?>"><?= $v['trangthai'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="wrap-user">
                    <?php
                    $donhang = $d->rawQuery("select * from table_order where id_user = ? order by ngaytao desc", array($_SESSION[$login_member]['id']));
                    ?>
                    <div class="all_table_donhang">
                        <table class="table table_donhang">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $lang == 'vi' ? 'Mã đơn hàng' : 'Code orders' ?></th>
                                    <th scope="col"><?= $lang == 'vi' ? 'Ngày đặt' : 'Order date' ?></th>
                                    <th scope="col"><?= $lang == 'vi' ? 'Thành tiền' : 'Money amount' ?></th>
                                    <th scope="col">Payment</th>
                                    <th scope="col"><?= $lang == 'vi' ? 'Tình trạng' : 'Status' ?></th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donhang as $l) { ?>
                                    <?php
                                    $tendonhang = $d->rawQuery("select * from table_order_detail where id_order = ?", array($l['id']));
                                    ?>
                                    <tr>
                                        <td><a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>"><?= $l['madonhang'] ?></a></td>
                                        <th scope="row"><?= date("d/m/Y", $l['ngaytao']) ?></th>

                                        <?php if ($l['tonggiaen']) { ?>
                                            <td colspan="1"><strong><i class="fas fa-euro-sign"></i><?= $l['tonggiaen'] ?></strong></td>
                                        <?php } else { ?>
                                            <td colspan="1"><strong><?= $func->format_money($l['tonggia']) ?></strong></td>
                                        <?php } ?>
                                        <td><?= $func->get_payments($l['httt']) ?></td>
                                        <?php $tinhtrang = $d->rawQueryOne("select * from table_status where id = ? ", array($l['tinhtrang'])); ?>

                                        <td><?= $tinhtrang['trangthai'] ?></td>
                                        <td>
                                            <a href="<?= $config_base ?>/upload/file/<?= $l['taptin'] ?>" style="color: #000;">
                                                <i class="far fa-file-pdf"></i>
                                                <span>PDF</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" style="color: #000;">
                                                <div class="tracking_donhang">
                                                    <span>Details</span>
                                                    <i class="fas fa-long-arrow-alt-right"></i>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn tracking_Reorder" data-id_order="<?= $l['id'] ?>" data-toggle="modal" data-target=".reo_order">
                                                <i class="fas fa-th-large"></i>
                                                <span>Reorder</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else {
    $session = session_id();
    $donhang = $d->rawQuery("select * from table_order where session_id = ? order by ngaytao desc", array($session));
    if ($donhang) {
    ?>
        <div class="fixwidth mt-4">
            <div class="wrap-user">
                <div class="all_table_donhang">
                    <table class="table table_donhang">
                        <thead>
                            <tr>
                                <th scope="col"><?= $lang == 'vi' ? 'Mã đơn hàng' : 'Code orders' ?></th>
                                <th scope="col"><?= $lang == 'vi' ? 'Ngày đặt' : 'Order date' ?></th>
                                <th scope="col"><?= $lang == 'vi' ? 'Thành tiền' : 'Money amount' ?></th>
                                <th scope="col">Payment</th>
                                <th scope="col"><?= $lang == 'vi' ? 'Tình trạng' : 'Status' ?></th>
                                <th scope="col">Invoice</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donhang as $l) { ?>
                                <?php
                                $tendonhang = $d->rawQuery("select * from table_order_detail where id_order = ?", array($l['id']));
                                ?>
                                <tr>
                                    <td><a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>"><?= $l['madonhang'] ?></a></td>
                                    <th scope="row"><?= date("d/m/Y", $l['ngaytao']) ?></th>

                                    <?php if ($l['tonggiaen']) { ?>
                                        <td colspan="1"><strong><i class="fas fa-euro-sign"></i><?= $l['tonggiaen'] ?></strong></td>
                                    <?php } else { ?>
                                        <td colspan="1"><strong><?= $func->format_money($l['tonggia']) ?></strong></td>
                                    <?php } ?>
                                    <td><?= $func->get_payments($l['httt']) ?></td>
                                    <?php $tinhtrang = $d->rawQueryOne("select * from table_status where id = ? ", array($l['tinhtrang'])); ?>

                                    <td><?= $tinhtrang['trangthai'] ?></td>
                                    <td>
                                        <a href="<?= $config_base ?>/upload/file/<?= $l['taptin'] ?>" style="color: #000;">
                                            <i class="far fa-file-pdf"></i>
                                            <span>PDF</span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" style="color: #000;">
                                            <div class="tracking_donhang">
                                                <span>Details</span>
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn tracking_Reorder" data-id_order="<?= $l['id'] ?>" data-toggle="modal" data-target=".reo_order">
                                            <i class="fas fa-th-large"></i>
                                            <span>Reorder</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="fixwidth pt-2">
            <div class="all_phantrang_show">
                <div class="all_danhmuc_phantrang">
                    <div class="all_bread">
                        <div class="breadCrumbs">
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none">
                                            <span><?= trangchu ?></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a class="text-decoration-none">
                                            <span>
                                                <?php if ($lang == 'vi') { ?>
                                                    Đơn hàng
                                                <?php } else { ?>
                                                    Order
                                                <?php } ?>
                                            </span>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-user wrap_donhang">
                <div class="all_wrap_donhang">
                    <div class="mb-2"><?= $lang == 'vi' ? 'Cám ơn Qúy khách đã mua hàng tại BBRacing !' : 'Thank you for your purchase at BBRacing!' ?></div>
                    <div>
                        <?= $lang == 'vi' ? 'Quý khách vui lòng nhập mã đơn hàng để tra cứu, bạn có thể nhập nhiều mã đơn hàng để tra cứu.' : 'Kindly provide your order code to find your order, you can input many order codes to look up.' ?>
                        <br>
                        VD: MSJ1010/KSXW2334 …
                    </div>

                    <div class="all_form_nhapma">
                        <input type="text" name="code_dh" class="code_dh" value="" placeholder="<Nhập mã đơn hàng>">
                        <input type="submit" class="code_dh_tk" value="Tìm kiếm">
                    </div>
                    <div class="ketqua_donhang">
                        <div class="all_noidung_kq_donhang">
                            <div>
                                <?php if ($lang == 'vi') { ?>
                                    Quý khách có thể trực tiếp liên hệ hotline BBRacing +84 919 999 968 để tra cứu về trạng thái đơn hàng hoặc tiến hành các bước sau để biết thông tin chi tiết đơn hàng của bạn:
                                <?php } else { ?>
                                    Don’t hesitate to contact BBRacing hotline +84 919 999 968 to look up your order status or follow these steps to know your order details:
                                <?php } ?>
                            </div>
                            <div>
                                <?php if ($lang == 'vi') { ?>
                                    Bước 1: Truy cập <a href="https://bbracing.vn" target="_blank" rel="noopener noreferrer">www.bbracing.vn</a> đến mục đơn hàng, nhấp vào để nhập thông tin tra cứu đơn hàng.
                                <?php } else { ?>
                                    Step 1: Access to <a href="https://bbracing.vn" target="_blank" rel="noopener noreferrer">www.bbracing.vn</a> go order, enter order lookup information.
                                <?php } ?>
                            </div>
                            <div>
                                <?php if ($lang == 'vi') { ?>
                                    Bước 2: Nhập mã đơn hàng (mã đơn hàng được gửi đến bạn thông qua email sau khi bạn xác nhận mua hàng và thanh toán).
                                <?php } else { ?>
                                    Step 2: Enter your order code (order code is sent to you via email after you confirm purchase and payment).
                                <?php } ?>
                            </div>
                            <div>
                                <?php if ($lang == 'vi') { ?>
                                    Bước 3: Bấm tìm kiếm
                                <?php } else { ?>
                                    Bước 3: Click search
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>