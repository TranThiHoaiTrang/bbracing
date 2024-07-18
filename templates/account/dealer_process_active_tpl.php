<div class="fixwidth pt-2">
    <!-- <div class="row">
        <div class="col-md-3">
            <div class="all_fillter all_fillter_account">
                <div class="all_hide_fillter">
                    <div class="hide_fillter">
                        <span><?= $lang == 'vi' ? 'Ẩn bộ lọc' : 'Hide fillter' ?> </span>
                        <div class="icon_danhmuc">
                            <i class="fas fa-minus"></i>
                        </div>
                    </div>
                    <div class="all_fillter_danhmuc">
                        <div class="all_brand_sp">
                            <a href="account/dang-ky">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Đăng ký tài khoản' : 'Account for Personal' ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="all_brand_sp">
                            <a href="account/dangky_dealer">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Đăng ký trở thành đại lý' : 'Account for Dealer' ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="all_brand_sp">
                            <a href="account/dealer-process">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Quy trình đăng ký đại lý' : 'Account for Dealer Process' ?></span>
                                </div>
                            </a>
                        </div>
                        <div class="all_brand_sp">
                            <a href="account/quen-mat-khau">
                                <div class="title_brand">
                                    <span><?= $lang == 'vi' ? 'Quên mật khẩu' : 'Forgot password' ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            
        </div>
    </div> -->
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
                                            Quy trình đăng ký đại lý
                                        <?php } else { ?>
                                            Account for Dealer Process
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
            <span><?= $lang == 'vi' ? 'Account for Dealer Process' : 'Quy trình đăng ký đại lý' ?></span>
        </div>
        <?php
        $email_user = $_SESSION["email_user"];
        $user_active = $d->rawQueryOne("select * from #_member where email = ? limit 0,1", array($email_user));
        ?>
        <div class="thoigian_dk">
            <span>
                <?= $lang == 'vi' ? 'Thời gian đăng ký' : 'Registration period' ?> :
                <?= date("d M Y", $user_active['ngaytao']) ?>
            </span>
        </div>
        <div class="all_from_thongbao">
            <div class="from_thongbao active">
                <div class="header_thongbao "><?= dangky ?></div>
                <div class="mota_thongbao">
                    <span>
                        <?php if ($lang == 'vi') { ?>
                            Hoàn tất điền form đăng kí trở thành Dealer
                        <?php } else { ?>
                            Complete the registration form to become a Dealer
                        <?php } ?>
                    </span>
                    <br>
                    <span>
                        (<?php if ($lang == 'vi') { ?>
                        Hoàn tất
                    <?php } else { ?>
                        Complete
                        <?php } ?>)
                    </span>
                </div>
            </div>
            <div class="from_thongbao active">
                <div class="header_thongbao "><?= $lang == 'vi' ? 'Gửi email' : 'Send email' ?></div>
                <div class="mota_thongbao">
                    <span>
                        <?php if ($lang == 'vi') { ?>
                            Send email thành công
                        <?php } else { ?>
                            Email sent successfully
                        <?php } ?>
                    </span>
                    <br>
                    <span>
                        ( <?php if ($lang == 'vi') { ?>
                            Hoàn tất
                        <?php } else { ?>
                            Complete
                            <?php } ?>)
                    </span>
                </div>
            </div>
            <div class="from_thongbao active">
                <div class="header_thongbao "><?= $lang == 'vi' ? 'BBR nhận email' : 'BBR receives emails' ?></div>
                <div class="mota_thongbao">
                    <span>
                        <?php if ($lang == 'vi') { ?>
                            BBR nhận được email yêu cầu đăng ký dealer
                        <?php } else { ?>
                            BBR received an email asking to register as a dealer
                        <?php } ?>
                    </span>
                    <br>
                    <span>
                        (<?php if ($lang == 'vi') { ?>
                        Hoàn tất
                    <?php } else { ?>
                        Complete
                        <?php } ?>)
                    </span>
                </div>
            </div>
            <div class="from_thongbao active">
                <div class="header_thongbao "><?= $lang == 'vi' ? 'Xử lý' : 'Handle' ?></div>
                <div class="mota_thongbao">
                    <span>
                        <?php if ($lang == 'vi') { ?>
                            Hoàn tất
                        <?php } else { ?>
                            Complete
                        <?php } ?>
                    </span>
                    <br>
                    <span>
                        (<?php if ($lang == 'vi') { ?>
                        Hoàn tất
                    <?php } else { ?>
                        Complete
                        <?php } ?>)
                    </span>
                </div>
            </div>
            <div class="from_thongbao <?= $user_active['hienthi'] > 0 ? 'active' : '' ?>">
                <div class="header_thongbao "><?= $lang == 'vi' ? 'Kết quả' : 'Result' ?></div>
                <div class="mota_thongbao">
                    <span>
                        <?php if ($lang == 'vi') { ?>
                            Đăng ký thành công ( hoặc Đăng ký thất bại)
                        <?php } else { ?>
                            Register successfully (or Register failed)
                        <?php } ?>
                    </span>
                    <br>
                    <span>
                        <?php if ($user_active['hienthi'] > 0) { ?>
                            <?php if ($lang == 'vi') { ?>
                                Thành công
                            <?php } else { ?>
                                Success
                            <?php } ?>
                        <?php } else { ?>
                            (<?php if ($lang == 'vi') { ?>
                            Đang xử lý
                        <?php } else { ?>
                            Processing
                            <?php } ?>)
                        <?php } ?>
                    </span>
                </div>
            </div>
        </div>
        <?php if ($user_active['hienthi'] > 0) { ?>
            <div class="title-user title-user-result ">
                <span><?= $lang == 'vi' ? 'Account for Dealer Process' : 'Quy trình đăng ký đại lý' ?></span>
            </div>
            <div class="thoigian_dk">
                <span>
                    <?= $lang == 'vi' ? 'Thời gian đăng ký thành công' : 'Successful registration time' ?> :
                    <?= date("d M Y", $user_active['ngaykichhoat']) ?>
                </span>
            </div>
            <div class="thongbao_dkthanhcong">
                Thông báo: <?= $user_active['tencongty'] ?> đã trở thành đại lý phân phối chính thức của BBRacing cho các sản phẩm như đĩa thắng, tay côn, tay ga của thương hiệu Brembo tại thị trường Việt Nam
                kể từ kể từ ngày <?= date("d M Y", $user_active['ngaykichhoat']) ?>. Mọi thông tin liên quan có trong Hợp đồng đăng kí phân phối hàng hóa số TT/BBR-2345/52023 sẽ được BBR phổ biến đến khách hàng và toàn bộ đối tác.
                Thời gian hết hạn phân phối: <?= date("d M Y", $user_active['ngayketthuc']) ?>
            </div>
        <?php } ?>
        <?php
        $quyenloi = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array('quyen_loi_nhaphanphoi'));
        ?>
        <div class="quyenloi mt-3">
            <a href="<?= $quyenloi['link_youtube'] ?>">
                <?= $quyenloi['ten' . $lang] ?>
                <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    </div>
</div>