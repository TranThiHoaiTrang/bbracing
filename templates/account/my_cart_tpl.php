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
                            <a href="account/tongquan">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Trang tổng quan tài khoản' : 'Account Dashboard' ?></span>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="all_brand_sp">
                            <a href="account/thong-tin">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Thông tin tài khoản' : 'Account information' ?></span>
                                </div>
                            </a>
                        </div> -->
                        <?php if ($_SESSION[$login_member]['id_vip'] > 0) { ?>
                            <div class="all_brand_sp">
                                <a href="account/diachi">
                                    <div class="title_brand">
                                        <span><?= diachi ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
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
                        <hr>
                        <div class="all_brand_sp">
                            <a href="account/donhang">
                                <div class="title_brand" style="padding-top: 0;">
                                    <span><?= $lang == 'vi' ? 'Đơn hàng của tôi' : 'My order' ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="all_brand_sp">
                            <a href="account/my_question">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Câu hỏi của tôi' : 'My question' ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="all_brand_sp">
                            <a href="account/newsletter">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Đăng ký nhận bản tin' : 'Newsletter Subscription' ?></span>
                                </div>
                            </a>
                        </div>
                        <?php if ($_SESSION[$login_member]['id_vip'] > 0) { ?>
                            <div class="all_brand_sp">
                                <a href="account/my_cart">
                                    <div class="title_brand">
                                        <span><?= $lang == 'vi' ? 'Thẻ của tôi' : 'My Card' ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="all_brand_sp">
                            <a href="account/my_sub">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Đăng ký của tôi' : 'My Subscriptions' ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user_detail_right">
            <div class="wrap-user">
                <div class="title-user">
                    <span><?= $lang == 'vi' ? 'Thẻ của tôi' : 'My card' ?></span>
                    <div class="add_card"><?= $lang == 'vi' ? 'Thêm thẻ' : 'Add card' ?></div>
                </div>
                <div class="all_mycard">
                    <div class="mycard">
                        <div class="img_card">
                            <img src="./assets/images/my_card.png" alt="">
                        </div>
                        <div class="all_thongtin_card">
                            <div class="thongtin_card">
                                <div class="name_card"><?= $lang == 'vi' ? 'Thông tin tài khoản ngân hàng' : 'Bank account infomation' ?></div>
                                <div class="tentaikhoan"><?= $lang == 'vi' ? 'Tên tài khoản: ' : 'Account name:' ?><?= $card_chinh['tentaikhoan'] ?></div>
                                <div class="nganhang"><?= $lang == 'vi' ? 'Ngân hàng: ' : 'Bank:' ?><?= $card_chinh['nganhang'] ?></div>
                                <div class="Số tài khoản"><?= $lang == 'vi' ? 'Số tài khoản: ' : 'Account number:' ?><?= $card_chinh['sotaikhoan'] ?></div>
                            </div>
                            <div class="date_card">
                                <?= date("d/m/Y", $card_chinh['ngaytao']) ?>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($card_phu as $v) { ?>
                        <div class="mycard">
                            <div class="img_card">
                                <img src="./assets/images/my_card.png" alt="">
                            </div>
                            <div class="all_thongtin_card">
                                <div class="thongtin_card">
                                    <div class="name_card"><?= $lang == 'vi' ? 'Thông tin tài khoản ngân hàng' : 'Bank account infomation' ?></div>
                                    <div class="tentaikhoan"><?= $lang == 'vi' ? 'Tên tài khoản: ' : 'Account name:' ?><?= $v['tentaikhoan'] ?></div>
                                    <div class="nganhang"><?= $lang == 'vi' ? 'Ngân hàng: ' : 'Bank:' ?><?= $v['nganhang'] ?></div>
                                    <div class="Số tài khoản"><?= $lang == 'vi' ? 'Số tài khoản: ' : 'Account number:' ?><?= $v['sotaikhoan'] ?></div>
                                </div>
                                <div class="date_card">
                                    <?= date("d/m/Y", $v['ngaytao']) ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>