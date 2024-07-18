<?php
$backgroud = UPLOAD_NEWS_L . $row_detail['photo'];
?>
<div class="all_banner">
    <div class="fixwidth">
        <?php if (!empty($row_detail['photo'])) { ?>
            <div id="background-banner" class="mb-2" style="background: url(<?= $backgroud ?>)  no-repeat center;background-size: cover;">
                <div class="all_noidung_banner"></div>
            </div>
        <?php } else { ?>
            <div id="background-banner" class="mb-2">
                <div class="all_noidung_banner"></div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="gioithieu_static">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <?php if (!empty($static_faqs)) { ?>
                <?php foreach ($static_faqs as $v) { ?>
                    <div class="all_chinhsach_des">
                        <div class="name_chinhsach_des">
                            <div class="all_name_cs">
                                <span class="icon_fl_cs_des"><i class="far fa-bookmark"></i></span>
                                <span><?= $v['ten' . $lang] ?></span>
                            </div>
                            <span class="icon_chinhsach_des"><i class="fas fa-angle-down"></i></span>
                        </div>
                        <div class="noidung_chinhsach all_gioithieu_index">
                            <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="noidung_gioithieu">
                    <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>