<?php if (count($slider)) { ?>
    <div class="wrap_slider">
        <div class="slideshow">
            <!-- <p class="control-slideshow prev-slideshow transition">
                PREV
                <img src="./assets/images/right.png" alt="">
            </p> -->
            <div id="slider" class="owl-carousel owl-theme owl-slideshow">
                <?php foreach ($slider as $v) { ?>
                    <div class="item_slider">
                        <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>">
                            <img onerror="this.src='<?= THUMBS ?>/910x380x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" />


                            <div class="all_noidung_slide <?= $v['huong_slide'] ?>">
                                <div class="name_slide"><?= $v['ten' . $lang] ?></div>
                                <div class="mota_slide"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                                <div class="noidung_slide"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!-- <p class="control-slideshow next-slideshow transition">
                NEXT
                <img src="./assets/images/right.png" alt="">
            </p> -->
            
        </div>
    </div>
<?php } ?>