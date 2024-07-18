<div class="all_banner">
    <div id="background-banner" class="mb-5">
        <div class="fixwidth">
            <div class="all_bread d-flex">
                <div class="bread_title"><?=(@$title_cat!='')?$title_cat:@$title_crumb?></div>
                <div class="breadCrumbs">
                    <div><?=$breadcrumbs?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="top-contact">
            <div class="right_contact">
                <div class="name_contact"><?= $setting['ten'.$lang] ?></div>
                <!-- <div class="article-contact">
                        </?=(isset($lienhe['mota'.$lang]) && $lienhe['mota'.$lang] != '') ? htmlspecialchars_decode($lienhe['mota'.$lang]) : ''?>
                    </div> -->
                <ul class="infomation">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="title-contact">
                            <p><strong><?=diachi?>:</strong> <?= $optsetting['diachi'] ?></p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-phone fa-flip-horizontal"></i>
                        <div class="title-contact">
                            <p><strong><?=sodienthoai?>:</strong> <?= $optsetting['hotline'] ?>
                                <?php if(!empty($optsetting['dienthoai'])) {?> - <?= $optsetting['dienthoai'] ?>
                                <?php } ?></p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <div class="title-contact">
                            <p><strong>Email:</strong> <?= $optsetting['email'] ?></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="left_contact">
                <div class="title_contact">
                    <?= $lang=='vi' ? 'GỬI TIN NHẮN CỦA BẠN CHO CHÚNG TÔI':'SEND YOUR MESSAGE TO US' ?></div>
                <form class="form-contact validation-contact" novalidate method="post" action=""
                    enctype="multipart/form-data">
                    <input type="hidden" name="type" value="contact">
                    <div class="input-contact">
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=hoten?>" required />
                        <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                    </div>
                    <div class="input-contact">
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai"
                            placeholder="<?=sodienthoai?>" required />
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>
                    <div class="input-contact">
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=diachi?>"
                            required />
                        <div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
                    </div>
                    <div class="input-contact">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                    </div>
                    <div class="input-contact">
                        <textarea class="form-control" id="noidung" name="noidung" placeholder="<?=noidung?>"
                            required /></textarea>
                        <div class="invalid-feedback"><?=vuilongnhapnoidung?></div>
                    </div>
                    <!-- <div class="input-contact">
                        <input type="file" class="custom-file-input" name="file">
                        <label class="custom-file-label" for="file" title="<?=chon?>"><?=dinhkemtaptin?></label>
                    </div> -->
                    <input type="submit" class="btn btn-contact" name="submit-contact"
                        value="<?= $lang=='vi' ? 'Gửi liên hệ':'Send the contact' ?>" disabled />
                    <!-- <input type="reset" class="btn btn-secondary" value="<?=nhaplai?>" /> -->
                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="bottom-contact"><?=htmlspecialchars_decode($optsetting['toado_iframe'])?></div>