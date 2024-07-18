<?php
$backgroud = UPLOAD_NEWS_L . $row_detail['photo'];
?>
<div class="all_banner">
    <div class="fixwidth">
        <div id="background-banner" class="mb-2" style="background: url(<?= $backgroud ?>)  no-repeat center;background-size: cover;">
            <div class="all_noidung_banner">
                <!-- <div class="title_gioithieu">
                    <?= $row_detail['ten' . $lang] ?>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="gioithieu_static">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <!-- <div class="all_tabs_gioithieu">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-gioithieu-tab" data-toggle="pill" href="#v-pills-gioithieu" role="tab" aria-controls="v-pills-gioithieu" aria-selected="true">
                        <span>Giới thiệu</span>
                    </a>
                    <?php foreach ($static2 as $v) { ?>
                        <a class="nav-link" id="v-pills-<?= $v['id'] ?>-tab" data-toggle="pill" href="#v-pills-<?= $v['id'] ?>" role="tab" aria-controls="v-pills-<?= $v['id'] ?>" aria-selected="false">
                            <span><?= $v['ten' . $lang] ?></span>
                        </a>
                    <?php } ?>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-gioithieu" role="tabpanel" aria-labelledby="v-pills-gioithieu-tab">
                        <div class="noidung_gioithieu">
                            <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
                        </div>
                    </div>
                    <?php foreach ($static2 as $v) { ?>
                        <div class="tab-pane fade" id="v-pills-<?= $v['id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $v['id'] ?>-tab">
                            <div class="noidung_gioithieu">
                                <?= (isset($v['noidung' . $lang]) && $v['noidung' . $lang] != '') ? htmlspecialchars_decode($v['noidung' . $lang]) : '' ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div> -->
            <div class="noidung_gioithieu">
                <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
            </div>
        </div>
    </div>
</div>