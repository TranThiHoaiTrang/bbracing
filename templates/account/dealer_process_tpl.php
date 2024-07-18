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
        <form class="form-user validation-user" novalidate method="post" action="account/dealer-process" enctype="multipart/form-data">

            <div class="input-group input-user">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="<?= nhapemail ?>" required>
                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
            </div>
            <div class="button-user">
                <input type="submit" class="btn btn-primary" name="quytrinhdaily" value="<?= $lang == 'vi' ? 'Account for Dealer Process' : 'Quy trình đăng ký đại lý' ?>" disabled>
            </div>
        </form>
    </div>
</div>