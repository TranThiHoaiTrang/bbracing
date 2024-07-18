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
                    <span><?= thongtincanhan ?></span>
                </div>
                <form class="form-user validation-user" novalidate method="post" action="account/thong-tin" enctype="multipart/form-data">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="basic-url">AVATAR</label>
                            <div class="photoUpload-detail mb-2">
                                <img class="rounded_avatar" src="<?= THUMBS ?>/140x140x1/<?= UPLOAD_PHOTO_L . $row_detail['avatar'] ?>" onerror="src='assets/images/nguoidung.png'" alt="Alt Photo" width="140" height="140" />
                            </div>
                            <div class="input-group input-user">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-image"></i></div>
                                </div>
                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="AVATAR">
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION[$login_member]['id_vip'] > 0) { ?>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Đại diện' : 'Represent' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="..." value="<?= $row_detail['username'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Chức vụ' : 'Position' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="chucvu" name="chucvu" placeholder="..." value="<?= $row_detail['chucvu'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Tên công ty' : 'Company name' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="tencongty" name="tencongty" placeholder="..." value="<?= $row_detail['tencongty'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= dienthoai ?></label>
                                    <div class="input-group input-user">
                                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="..." value="<?= $row_detail['dienthoai'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= diachi ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="..." value="<?= $row_detail['diachi'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Fax</label>
                                    <div class="input-group input-user">
                                        <input type="number" class="form-control" id="hotline" name="hotline" placeholder="..." value="<?= $row_detail['hotline'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">MST</label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="mst" name="mst" placeholder="..." value="<?= $row_detail['mst'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Email</label>
                                    <div class="input-group input-user">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="..." value="<?= $row_detail['email'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Quốc gia' : 'Country' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="quocgia" name="quocgia" placeholder="..." value="<?= $row_detail['quocgia'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Zip code</label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="..." value="<?= $row_detail['zip_code'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Ngân hàng' : 'Bank' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="nganhang" name="nganhang" placeholder="..." value="<?= $row_detail['nganhang'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Số tài khoản' : 'Account number' ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="sotaikhoan" name="sotaikhoan" placeholder="..." value="<?= $row_detail['sotaikhoan'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="account_dashboard">
                            <div class="title_account_dashboard" style="padding: 15px;"><?= $lang == 'vi' ? 'Địa chỉ giao hàng' : 'Shipping Address' ?></div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= diachi ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="diachi_shipping" name="diachi_shipping" placeholder="..." value="<?= $row_detail['diachi_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Quận/Huyện ' : 'District' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="district_shipping" name="district_shipping" placeholder="..." value="<?= $row_detail['district_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Thành phố ' : 'City' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="city_shipping" name="city_shipping" placeholder="..." value="<?= $row_detail['city_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Quốc gia' : '' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="quocgia_shipping" name="quocgia_shipping" placeholder="..." value="<?= $row_detail['quocgia_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Zip Code</label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="zip_code_shipping" name="zip_code_shipping" placeholder="..." value="<?= $row_detail['zip_code_shipping'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="account_dashboard mb-3">
                            <div class="title_account_dashboard" style="padding: 15px;"><?= $lang == 'vi' ? 'Thông tin xuất hóa đơn' : 'Billing information' ?></div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Tên công ty' : 'Company name' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="tencongty" name="tencongty" placeholder="..." value="<?= $row_detail['tencongty'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Mã số thuế ' : 'Tax Code' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="mst" name="mst" placeholder="..." value="<?= $row_detail['mst'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= diachi ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="diachi_hoadon" name="diachi_hoadon" placeholder="..." value="<?= $row_detail['diachi_hoadon'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= dienthoai ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="dienthoai_hoadon" name="dienthoai_hoadon" placeholder="..." value="<?= $row_detail['dienthoai_hoadon'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="all_thuonghieu">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Thương hiệu' : 'Optional' ?></label>
                            <input type="hidden" class="all_brand" name="all_brand" value="<?= $row_detail['thuong_hieu'] ?>">
                            <div class="form-group">
                                <?php
                                $th = explode(',', $row_detail['thuong_hieu']);
                                foreach ($brand as $v) { ?>
                                    <div class="base-checkbox <?= in_array($v['ten' . $lang], $th) ? 'active' : '' ?>" name='base-checkbox' data-brand="<?= $v['ten' . $lang] ?>">
                                        <label>
                                            <span class="checkmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 12.56" name="Checked" class="icon-check">
                                                    <path d="m5.33 8.79 8.79-8.8L16 1.89 5.33 12.56 0 7.23l1.88-1.88Z"></path>
                                                </svg>
                                            </span>
                                            <?= $v['ten' . $lang] ?>
                                            <?= $th[$i] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <label for="basic-url"><?= $lang == 'vi' ? 'Thương hiệu khác' : 'Other Optional' ?></label>
                        <div class="input-group input-user">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-trademark"></i></div>
                            </div>
                            <input type="text" class="form-control" id="thuong_hieu_khac" name="thuong_hieu_khac" placeholder="<?= $lang == 'vi' ? 'Thương hiệu khác' : 'Other Optional' ?>" value="<?= $row_detail['thuong_hieu_khac'] ?>">
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Website</label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="<?= $row_detail['website'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Link Facebook </label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="link_facebook" name="link_facebook" placeholder="Link Facebook (Personal/Fanpage)" value="<?= $row_detail['link_facebook'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label for="basic-url"><?= $lang == 'vi' ? 'Hình ảnh cửa hàng/showroom' : 'Store/showroom images' ?></label>
                        <div class="input-group input-user">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-image"></i></div>
                            </div>
                            <input type="file" class="form-control" id="file" name="file" placeholder="<?= $lang == 'vi' ? 'Hình ảnh cửa hàng/showroom' : 'Store/showroom images' ?>">
                        </div>
                        <div class="photoUpload-detail mb-2"><img style="width: 100%;" class="rounded" src="<?= UPLOAD_PHOTO_L . $row_detail['banner'] ?>" onerror="src='assets/images/noimage.png'" alt="Alt Photo" /></div>

                        <label for="basic-url"><?= $lang == 'vi' ? 'Doanh số hằng năm' : 'Annual Revenue' ?></label>
                        <div class="input-group input-user">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-signal"></i></div>
                            </div>
                            <input type="text" class="form-control" id="doanh_so" name="doanh_so" placeholder="<?= $lang == 'vi' ? 'Doanh số hằng năm' : 'Annual Revenue' ?>" value="<?= $row_detail['doanh_so'] ?>">
                        </div>

                        <label for="basic-url"><?= $lang == 'vi' ? 'Ghi chú' : 'Note' ?></label>
                        <div class="input-contact">
                            <textarea class="form-control" id="ghichu" name="ghichu" placeholder="<?= $lang == 'vi' ? 'Ghi chú' : 'Note' ?>" required /><?= htmlspecialchars_decode($row_detail['ghichu']) ?></textarea>
                        </div>
                    <?php } else { ?>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">First Name </label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="..." value="<?= $row_detail['username'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= $lang == 'vi' ? 'Mã khách hàng' : 'Customer ID' ?></label>
                                    <div class="input-group input-user">
                                        <input type="email" class="form-control" id="id_member" name="id_member" placeholder="..." value="BBR<?= $row_detail['id_member'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Last name </label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="ten" name="ten" placeholder="..." value="<?= $row_detail['ten'] ?>"  style="background: #e9ecef;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url"><?= diachi ?></label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="..." value="<?= $row_detail['diachi'] ?>" style="background: #e9ecef;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Email</label>
                                    <div class="input-group input-user">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="..." value="<?= $row_detail['email'] ?>" style="background: #e9ecef;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Hotline</label>
                                    <div class="input-group input-user">
                                        <input type="number" class="form-control" id="hotline" name="hotline" placeholder="..." value="<?= $row_detail['hotline'] ?>" style="background: #e9ecef;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account_dashboard">
                            <div class="title_account_dashboard" style="padding: 15px;"><?= $lang == 'vi' ? 'Tài khoản thanh toán' : 'Card Purchase' ?></div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Tên' : 'Name' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="tentaikhoan" name="datacard[tentaikhoan]" placeholder="..." value="<?= $datacard['tentaikhoan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Ngân hàng ' : 'Bank' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="nganhang" name="datacard[nganhang]" placeholder="..." value="<?= $datacard['nganhang'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Số tài khoản' : 'Account number' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="sotaikhoan" name="datacard[sotaikhoan]" placeholder="..." value="<?= $datacard['sotaikhoan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Chi Nhánh' : 'Bank branch' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="chinhanh" name="datacard[chinhanh]" placeholder="..." value="<?= $datacard['chinhanh'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account_dashboard">
                            <div class="title_account_dashboard" style="padding: 15px;"><?= $lang == 'vi' ? 'Địa chỉ giao hàng' : 'Shipping Address' ?></div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= diachi ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="diachi_shipping" name="diachi_shipping" placeholder="..." value="<?= $row_detail['diachi_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Quận/Huyện ' : 'District' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="district_shipping" name="district_shipping" placeholder="..." value="<?= $row_detail['district_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Thành phố ' : 'City' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="city_shipping" name="city_shipping" placeholder="..." value="<?= $row_detail['city_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Quốc gia' : '' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="quocgia_shipping" name="quocgia_shipping" placeholder="..." value="<?= $row_detail['quocgia_shipping'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="all_input_dk">
                                    <label for="basic-url">Zip Code</label>
                                    <div class="input-group input-user">
                                        <input type="text" class="form-control" id="zip_code_shipping" name="zip_code_shipping" placeholder="..." value="<?= $row_detail['zip_code_shipping'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account_dashboard mb-3">
                            <div class="title_account_dashboard" style="padding: 15px;"><?= $lang == 'vi' ? 'Thông tin xuất hóa đơn' : 'Billing information' ?></div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Tên công ty' : 'Company name' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="tencongty" name="tencongty" placeholder="..." value="<?= $row_detail['tencongty'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= $lang == 'vi' ? 'Mã số thuế ' : 'Tax Code' ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="mst" name="mst" placeholder="..." value="<?= $row_detail['mst'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= diachi ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="diachi_hoadon" name="diachi_hoadon" placeholder="..." value="<?= $row_detail['diachi_hoadon'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="all_input_dk">
                                        <label for="basic-url"><?= dienthoai ?></label>
                                        <div class="input-group input-user">
                                            <input type="text" class="form-control" id="dienthoai_hoadon" name="dienthoai_hoadon" placeholder="..." value="<?= $row_detail['dienthoai_hoadon'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="button-user">
                        <input type="submit" class="btn btn-primary btn-block" name="thaydoidiachi" value="<?= $lang == 'vi' ? 'Lưu' : 'Save' ?>" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>