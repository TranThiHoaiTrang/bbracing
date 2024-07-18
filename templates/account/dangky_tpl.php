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
                                    <span><?= dangky ?></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-decoration-none">
                                    <span>
                                        <?php if ($lang == 'vi') { ?>
                                            Tài khoản dành cho cá nhân
                                        <?php } else { ?>
                                            Account for Personal
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
    <div class="wrap-user wrap_dk">
        <div class="title-user">
            <span><?= $lang == 'vi' ? 'Tạo tài khoản cho cá nhân' : 'Create Account for Personal' ?></span>
        </div>
        <form class="form-user form-user-dktk validation-user" novalidate method="post" action="account/dang-ky" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="all_input_dktk">
                        <label for="basic-url">First Name *</label>
                        <div class="input-group input-user">
                            <input type="text" class="form-control" id="username" name="username" placeholder="...">
                        </div>
                    </div>
                    <div class="all_input_dktk">
                        <label for="basic-url">Last Name *</label>
                        <div class="input-group input-user">
                            <input type="text" class="form-control" id="ten" name="ten" placeholder="...">
                        </div>
                    </div>
                    <div class="all_input_dktk">
                        <label for="basic-url">Email *</label>
                        <div class="input-group input-user">
                            <input type="text" class="form-control" id="email" name="email" placeholder="...">
                        </div>
                    </div>
                    <div class="all_input_dktk">
                        <label for="basic-url"><?= $lang == 'vi' ? 'Số điện thoại':'Phone Number' ?></label>
                        <div class="input-group input-user">
                            <input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="...">
                        </div>
                    </div>
                    <div class="all_input_dktk">
                        <label for="basic-url"><?= diachi ?> *</label>
                        <div class="input-group input-user">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="...">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="all_input_dktk">
                        <label for="basic-url">Password *</label>
                        <div class="input-group input-user">
                            <input type="password" class="form-control" id="password" name="password" placeholder="<?= nhapmatkhau ?>">
                        </div>
                    </div>

                    <div class="all_input_dktk ">
                    <label for="basic-url">Password Strength</label>
                        <div class="all_input_dktk passwordStrength">
                            <span>Password Strength:</span>
                            <div class="" id="passwordStrength"></div>
                        </div>
                    </div>

                    <div class="all_input_dktk">
                        <label for="basic-url">Comfirm Password *</label>
                        <div class="input-group input-user">
                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="<?= nhaplaimatkhau ?>">
                        </div>
                    </div>

                    <div class="all_check_remember">
                        <div class="check_remember">
                            <input type="checkbox" name="check_remember" id="check_remember" value="1">
                            <span>Remmber me</span>
                        </div>
                        <div class="check_remember">
                            <input type="checkbox" name="check_newsletter" value="1" id="check_newsletter">
                            <span>
                                <?php if ($lang == 'vi') { ?>
                                    Đăng nhập để nhận Bản tin BB Racing
                                <?php } else { ?>
                                    Sign in for the BBRacing Newsletter
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                    <div class="button-user-dktk">
                <!-- <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" /> -->
                <?php if ($lang == 'vi') {
                    $cr = 'Tạo tài khoản';
                } else {
                    $cr = 'Created an Account';
                } ?>
                <input type="submit" class="btn btn-primary btn-block" name="dangky" value="<?= $cr ?>" disabled>
            </div>
            <div class="text_dn_khac">
                <?php if ($lang == 'vi') { ?>
                    Hoặc đăng nhập qua
                <?php } else { ?>
                    Or log in via
                <?php } ?>
            </div>
            <div id="status"></div>
            <div class="ac-data" id="userData"></div>
            <div class="all_button_dn_khac">
                <fb:login-button data-size="large" scope="public_profile" onlogin="checkLoginState();">
                    <div class="btn_facebook btn_login_khac">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </div>
                </fb:login-button>

                <?php
                $client = $func->clientGoogle();
                $url = $client->createAuthUrl();
                ?>
                <a href="<?= $url ?>">
                    <div class="btn_google btn_login_khac">
                        <i class="fab fa-google"></i>
                        <span>Google</span>
                    </div>
                </a>

            </div>
            <div id="status"></div>
                </div>
            </div>
            
        </form>
    </div>
    <?php
    $quyenloi = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array('quyen_loi_taikhoan_canhan'));
    ?>
    <div class="quyenloi">
        <a href="<?= $quyenloi['link_youtube'] ?>">
            <?= $quyenloi['ten' . $lang] ?>
            <i class="fas fa-angle-double-right"></i>
        </a>
    </div>
</div>