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
                                                    Quên mật khẩu
                                                <?php } else { ?>
                                                    Forgot Password
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
                    <span><?= $lang == 'vi' ? 'Quên mật khẩu' : 'Forgot Password' ?></span>
                </div>

                <form class="form-user validation-user" novalidate method="post" action="account/quen-mat-khau" enctype="multipart/form-data">
                    <div class="thoigian_dk" style="margin-top: 0;">
                        <span>
                            <?= $lang == 'vi' ? 'Please enter your email address below to reset your password' : 'Vui lòng nhập địa chỉ email của bạn bên dưới để đặt lại mật khẩu.' ?> :
                        </span>
                    </div>
                    <!-- <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?= taikhoan ?>" required>
                        <div class="invalid-feedback"><?= vuilongnhaptaikhoan ?></div>
                    </div> -->
                    <div class="input-group input-user">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?= nhapemail ?>" required>
                        <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                    </div>
                    <div class="button-user">
                        <input type="submit" class="btn btn-primary" name="quenmatkhau" value="<?= laymatkhau ?>" disabled>
                    </div>
                </form>
            </div>
</div>