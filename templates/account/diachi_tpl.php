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
                <form class="form-diachi validation-user" novalidate method="post" action="account/diachi" enctype="multipart/form-data">
                    <div class="all_from_diachi">
                        <div class="from_diachi">
                            <div class="title-user">
                                <span><?= $lang == 'vi' ? 'Thay đổi địa chỉ thanh toán' : 'Change Billing Address' ?></span>
                            </div>
                            <div class="contact_from_diachi">
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= diachi ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="..." value="<?= $row_detail['diachi'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Huyện' : 'District' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="district" name="district" placeholder="..." value="<?= $row_detail['district'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Thành phố ' : 'City' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="..." value="<?= $row_detail['city'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'quốc gia' : 'country' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="quocgia" name="quocgia" placeholder="..." value="<?= $row_detail['quocgia'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Mã Bưu Chính' : 'Zip code' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="..." value="<?= $row_detail['zip_code'] ?>">
                                    </div>
                                </div>
                                <div class="button-user">
                                    <input type="submit" class="btn btn-primary btn-block" name="thaydoidiachi" value="<?= capnhat ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="from_diachi">
                            <div class="title-user">
                                <span><?= $lang == 'vi' ? 'Thay đổi địa chỉ giao hàng' : 'Change Shipping Address' ?></span>
                            </div>
                            <div class="contact_from_diachi">
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= diachi ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="diachi_shipping" name="diachi_shipping" placeholder="..." value="<?= $row_detail['diachi_shipping'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Huyện' : 'District' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="district_shipping" name="district_shipping" placeholder="..." value="<?= $row_detail['district_shipping'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Thành phố ' : 'City' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="city_shipping" name="city_shipping" placeholder="..." value="<?= $row_detail['city_shipping'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'quốc gia' : 'country' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="quocgia_shipping" name="quocgia_shipping" placeholder="..." value="<?= $row_detail['quocgia_shipping'] ?>">
                                    </div>
                                </div>
                                <div class="all_input_diachi">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Mã Bưu Chính' : 'Zip code' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="zip_code_shipping" name="zip_code_shipping" placeholder="..." value="<?= $row_detail['zip_code_shipping'] ?>">
                                    </div>
                                </div>
                                <div class="button-user">
                                    <input type="submit" class="btn btn-primary btn-block" name="thaydoidiachi" value="<?= capnhat ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>