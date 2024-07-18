<?php
$iduser = $_SESSION[$login_member]['id'];
$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
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
                                        <span><?= $lang == 'vi' ? 'Mã khách hàng':'Customer ID' ?>: </span>
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
                $donhang = $d->rawQuery("select * from table_order where id_user = ? and tinhtrang REGEXP '2|3' order by ngaytao desc", array($_SESSION[$login_member]['id']));
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
                                        <div class="tracking_Reorder">
                                            <i class="fas fa-th-large"></i>
                                            <span>Reorder</span>
                                        </div>
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