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
                                    <span><?= dangnhap ?></span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="all_dktk_login">
                <div class="news_customer">
                    <div class="name_news_customer"><?= $lang == 'vi' ? 'Đăng kí mua hàng' : 'REGISTER TO PURCHASE' ?></div>
                    <div class="mota_news_customer"><?= $lang == 'vi' ? 'Đăng kí tài khoản mang lại nhiều lợi ích trong mua hàng như thanh toán nhanh hơn, lưu trữ đăng nhập, theo dõi lịch sử mua hàng và nhận được nhiều thông tin về sản phẩm.' : 'Registering an account brings many benefits in purchasing such as faster payment, login storage, tracking purchase history and receiving more information about products.' ?></div>
                    <a href="account/dang-ky">
                        <div class="button_news_customer"><?= $lang == 'vi' ? 'Tạo tài khoản' : 'Create an account' ?></div>
                    </a>
                </div>
                <div class="news_customer">
                    <div class="name_news_customer"><?= $lang == 'vi' ? 'ĐĂNG KÍ TRỞ THÀNH ĐẠI LÝ' : 'become an authorized dealer' ?></div>
                    <div class="mota_news_customer"><?= $lang == 'vi' ? 'Trở thành đối tác mới để nhận được nhiều ưu đãi hấp dẫn chưa từng thấy, thể hiện rõ nhất trong quá trình mua hàng và sử dụng dịch vụ của chúng tôi.' : 'Become a new partner to receive many unprecedented attractive incentives, most clearly shown during the purchasing process and use of our services.' ?></div>
                    <a href="account/dangky_dealer">
                        <div class="button_news_customer"><?= $lang == 'vi' ? 'Tạo tài khoản' : 'Create an account' ?></div>
                    </a>

                    <div class="mota_news_customer">
                        <?= $lang == 'vi' ? 'Nếu đã hoàn thành quy trình đăng kí đại lý mới, vui lòng truy cập ' : 'If you have completed the new agent registration process, please visit' ?>
                        <a href="account/dealer-process">Link</a>
                        <?= $lang == 'vi' ? 'sau đây để nhận kết quả phản hồi sau cùng. ' : 'below is the final response.' ?>
                    </div>

                </div>
                <!-- <div class="news_customer">
                    <div class="name_news_customer"><?= $lang == 'vi' ? 'Quy trình đăng ký đại lý' : 'Account for Dealer Process' ?></div>
                    <div class="mota_news_customer"><?= $lang == 'vi' ? 'Tạo tài khoản sẽ có nhiều lợi ích: thanh toán nhanh hơn, giữ nhiều địa chỉ, theo dõi đơn hàng và hơn thế nữa.' : 'Creating an account has many benefits: check out faster, keep more than one address, track orders and more.' ?></div>
                    <a href="account/dealer-process">
                        <div class="button_news_customer"><?= $lang == 'vi' ? 'Tra cứu quá trình' : 'Look up the process' ?></div>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="col-md-6">

            <div class="wrap-user wrap_dk">
                <div class="title_dangnhap"><?= $lang == 'vi' ? 'Tài khoản đã đăng ký' : 'Registered Customers' ?></div>
                <div class="mota_dangnhap"><?= $lang == 'vi' ? 'Nếu bạn có tài khoản, hãy đăng nhập thông tin mail bên dưới.' : 'if you have an account, sign in with your email address' ?></div>
                <form class="form-user validation-user" novalidate method="post" action="account/dang-nhap" enctype="multipart/form-data">
                    <div class="input-group input-danhnhap">
                        <span>Email <strong>*</strong></span>
                        <input type="text" class="in_put_dn" id="username" name="username" placeholder="<?= taikhoan ?>" required>
                        <!-- <div class="invalid-feedback"><?= vuilongnhaptaikhoan ?></div> -->
                    </div>
                    <div class="input-group input-danhnhap">
                        <span>Password <strong>*</strong></span>
                        <input type="password" class="in_put_dn input_mk" id="password" name="password" placeholder="<?= matkhau ?>" required>
                        <!-- <div class="invalid-feedback"><?= vuilongnhapmatkhau ?></div> -->
                    </div>
                    <div class="show_matkhau">
                        <div class="icon_mk"><i class="fa-regular fa-square"></i></div>
                        <div class="title_show_mk"><?= $lang == 'vi' ? 'Hiển thị mật khẩu' : 'Show Password' ?></div>
                    </div>
                    <div class="remember_me">
                        <div class="checkbox-user custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember-user" id="remember-user" value="1">
                            <label class="custom-control-label" for="remember-user"><?= nhomatkhau ?></label>
                        </div>
                    </div>
                    <div class="all_login_dn_fb_gg d-flex align-items-center">
                        <div class="button-dn d-flex align-items-center justify-content-between">
                            <input type="submit" class="btn btn-primary btn_dn" name="dangnhap" value="<?= dangnhap ?>" disabled>
                        </div>
                        <div class="all_dn_fb_gg">
                            <div class="text_dn_khac " style="text-align: left;">
                                <?php if ($lang == 'vi') { ?>
                                    Hoặc
                                <?php } else { ?>
                                    Or 
                                <?php } ?>
                            </div>
                            <div class="all_button_dn_khac justify-content-start">
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
                        </div>
                    </div>

                    <div id="status"></div>
                    <div class="forgot_password">
                        <a href="account/quen-mat-khau"><?= quenmatkhau ?></a>
                    </div>
                    <span class="required">* <?= $lang == 'vi' ? 'Bắt buộc':'Required Fields' ?></span>
                    <!-- <span class="required"><?= $lang == 'vi' ? '** Hãy tích vào ô “Ghi nhớ tôi” để truy cập vào giỏ hàng của trên máy tính này ngay cả khi bạn chưa đăng nhập.':'** Check “Remmber me” to access your shopping cart on this computer even if you are not signed in.' ?></span> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div id="popup-container"></div>