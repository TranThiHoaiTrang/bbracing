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
    <?php if ($er == true) { ?>
        <div class="wrap-user wrap_dk">
            <div class="title-user">
                <span><?= $lang == 'vi' ? 'FORM ĐĂNG KÍ TRỞ THÀNH ĐẠI LÝ – ĐỐI TÁC TIN CẬY CỦA BBRACING' : 'REGISTRATION FORM TO BECOME AN AGENT - A TRUSTED PARTNER OF BBRACING' ?></span>
            </div>
            <form class="form-user form_dkdl validation-user" novalidate method="post" action="account/dai-ly" enctype="multipart/form-data">

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Đại diện' : 'Represent' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="username" name="username" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Chức vụ' : 'Position' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="chucvu" name="chucvu" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Tên công ty' : 'Company name' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="tencongty" name="tencongty" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= dienthoai ?></label>
                            <div class="input-group input-user">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= diachi ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">Fax</label>
                            <div class="input-group input-user">
                                <input type="number" class="form-control" id="hotline" name="hotline" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">MST</label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="mst" name="mst" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">Email</label>
                            <div class="input-group input-user">
                                <input type="email" class="form-control" id="email" name="email" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Quốc gia' : 'Country' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="quocgia" name="quocgia" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">Zip code</label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Ngân hàng' : 'Bank' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="nganhang" name="nganhang" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= $lang == 'vi' ? 'Số tài khoản' : 'Account number' ?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="sotaikhoan" name="sotaikhoan" placeholder="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= matkhau ?></label>
                            <div class="input-group input-user">
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?= nhapmatkhau ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url"><?= nhaplaimatkhau ?></label>
                            <div class="input-group input-user">
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="<?= nhaplaimatkhau ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="all_thuonghieu">
                    <label for="basic-url"><?= $lang == 'vi' ? 'Thương hiệu' : 'Optional' ?></label>
                    <input type="hidden" class="all_brand" name="all_brand" value="">
                    <div class="form-group">
                        <?php foreach ($brand as $v) { ?>
                            <div class="base-checkbox" name='base-checkbox' data-brand="<?= $v['ten' . $lang] ?>">
                                <label>
                                    <span class="checkmark">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 12.56" name="Checked" class="icon-check">
                                            <path d="m5.33 8.79 8.79-8.8L16 1.89 5.33 12.56 0 7.23l1.88-1.88Z"></path>
                                        </svg>
                                    </span>
                                    <?= $v['ten' . $lang] ?>
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
                    <input type="text" class="form-control" id="thuong_hieu_khac" name="thuong_hieu_khac" placeholder="<?= $lang == 'vi' ? 'Thương hiệu khác' : 'Other Optional' ?>">
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">Website</label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_input_dk">
                            <label for="basic-url">Link Facebook </label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="link_facebook" name="link_facebook" placeholder="Link Facebook (Personal/Fanpage)">
                            </div>
                        </div>
                    </div>
                </div>

                <label for="basic-url"><?= $lang == 'vi' ? 'Hình ảnh cửa hàng/showroom' : 'Store/showroom images' ?></label>
                <div class="input-group input-user">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-file-image"></i></div>
                    </div>
                    <input type="file" class="form-control" id="file" name="file" placeholder="<?= $lang == 'vi' ? 'Doanh số hằng năm' : 'Annual Revenue' ?>">
                </div>

                <label for="basic-url"><?= $lang == 'vi' ? 'Doanh số hằng năm' : 'Annual Revenue' ?></label>
                <div class="input-group input-user">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-signal"></i></div>
                    </div>
                    <input type="text" class="form-control" id="doanh_so" name="doanh_so" placeholder="<?= $lang == 'vi' ? 'Doanh số hằng năm' : 'Annual Revenue' ?>">
                </div>

                <label for="basic-url"><?= $lang == 'vi' ? 'Ghi chú' : 'Note' ?></label>
                <div class="input-contact">
                    <textarea class="form-control" id="ghichu" name="ghichu" placeholder="<?= $lang == 'vi' ? 'Ghi chú' : 'Note' ?>" required /></textarea>
                </div>

                <div class="button-user">
                    <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" />
                    <input type="submit" class="btn btn-primary btn-block" name="dangky_daili" value="<?= gui ?>" disabled>
                </div>
            </form>
        </div>
    <?php } else { ?>
        <div class="empty-dk">
            <p><?= $lang == 'vi' ? 'Bạn đã có tài khoản đại lý.' : 'You already have an affiliate account.' ?></p>
            <p><?= $lang == 'vi' ? 'Nếu bạn muốn năng cấp tài khoản hãy liên hệ với chúng tôi.' : 'If you want to upgrade your account, please contact us.' ?></p>
        </div>
    <?php } ?>
</div>