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
    <div class="all_noidung_gioithieu">
        <div class="img_gioithieu">
            <img src="<?= UPLOAD_NEWS_L . $static['photo'] ?>" alt="">
        </div>
        <div class="content-main w-clear">
            <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
        </div>
    </div>
    <div class="all_galery_gioithieu">
        <?php foreach ($galery_static as $v) { ?>
            <div class="img_galerry_gioithieu">
                <img src="<?= UPLOAD_STATIC_L . $v['photo'] ?>" alt="">
                <div class="name_gallery"><?= $v['ten' . $lang] ?></div>
            </div>
        <?php } ?>
    </div>
</div>