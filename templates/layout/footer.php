<div class="<?= $source == 'index' ? 'all_footer' : '' ?>" id="background-footer">
    <div class=" <?= $source == 'index' ? 'wrap_center wrap_center_footer' : '' ?> ">

        <div class="boxfooter_container ">
            <div class="all_box_footer">
                <div class="row">
                    <div class="col-md-5">
                        <!-- <div class="title_footer"><?= $lang == 'vi' ? 'LIÊN HỆ' : 'CONTACT' ?></div> -->
                        <!-- <div class="name_footer"><?= $setting['ten' . $lang] ?></div> -->
                        <a class="header_logo" href=""><img class="mb-2" onerror="this.src='<?= THUMBS ?>/0x100x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>
                        <div class="all_menu_footer">
                            <p class="diachi_footer flex-column align-items-start">
                                <span>
                                    <?= $lang == 'vi' ? 'Address: 25/9 Hau Giang Street. ' : 'Address: 25/9 Hau Giang Street. ' ?>
                                </span>
                                <span>
                                    <?= $lang == 'vi' ? 'Tan Binh District. HCMC' : 'Tan Binh District. HCMC' ?>
                                </span>
                            </p>
                            <p></p>

                            <a href="mailto:<?= $optsetting['email'] ?>">
                                <span>
                                    <!-- <strong>Email: </strong> -->
                                    <?= $optsetting['email'] ?>
                                </span>
                            </a><br>
                            <a href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
                                <span>
                                    <!-- <strong>Hotline: </strong> -->
                                    <?= $optsetting['hotline'] ?>
                                </span>
                            </a><br>
                            <a href="<?= $optsetting['website'] ?>">
                                <span>
                                    <!-- <strong>Website: </strong> -->
                                    <?= $optsetting['website'] ?>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3 d-flex  flex-column">
                        <!-- <div class="title_footer"><?= $lang == 'vi' ? 'Vui lòng liên hệ nếu bạn có câu hỏi' : 'Please contact if you have question' ?></div>
                        <div class="dknud">
                            <form class="form-contact_footer validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="type" value="contact">

                                <div class="all_input_mail">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                                    <button type="submit" class="btn-contact" name="submit-contact">
                                        <span>Send</span>
                                    </button>
                                </div>

                                <textarea class="form-control control_noidung" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                                <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                            </form>
                        </div> -->
                        <div class="mxh_title">
                            <div class="all_mxh">
                                <?php foreach ($social1 as $v) { ?>
                                    <div class="mxh">
                                        <a href="<?= $v['link'] ?>">
                                            <img src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="" width="30px" height="30px">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <div class="all_thanhtoan_title">
                            <div class="all_mxh">
                                <?php foreach ($thanh_toan as $v) { ?>
                                    <div class="mxh thanhtoan">
                                        <img src="<?= THUMBS ?>/90x90x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="" width="30px" height="30px">
                                    </div>
                                <?php } ?>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="boxfooter_bottom">
                <div class="fixwidth">
                    <div class="coppyright_gioithieu">
                        <div class="all_gioithieu_footer">
                            <?php foreach ($gioithieu1 as $v) { ?>
                                <p><a href="<?= $v['tenkhongdau'.$lang] ?>"><?= $v['ten' . $lang] ?></a></p>
                            <?php } ?>
                            <p><a href="faqs">FAQs</a></p>
                        </div>
                        <div class="all_coppyright">
                            <div class="img_bct">
                                <img src="./assets/images/bocongthuong.png" alt="">
                            </div>
                            <div class="left">© 2022 <?= $setting['ten' . $lang] ?>, All rights reserved.</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>