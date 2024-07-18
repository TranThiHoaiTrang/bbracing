<div class="all_banner">
    <!-- <div id="background-banner" class="mb-5"> -->
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <!-- <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>
<div class="fixpage">

    <?php if (isset($hinhanhtt)) { ?>
        <h2 class="title_album"><?= $row_detail['ten'.$lang] ?></h2>
        <div class="album-images">
            <div class="row">
                <?php foreach($hinhanhtt as $v) {?>
                <div class="form-group col-md-3 col-sm-6 col-xs-12 album-images-item">
                    <a data-fancybox="album2" data-caption="<?=$v['ten'.$lang]?>" href="<?=UPLOAD_NEWS_L.$v['photo']?>">
                        <img class="lazyautosizes lazyloaded" data-sizes="auto" src="<?=THUMBS?>/617x928x1/<?=UPLOAD_NEWS_L.$v['photo']?>" data-src="<?=THUMBS?>/617x928x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.lang]?>" sizes="379px">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>

    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?= noidungdangcapnhat ?></strong>
        </div>
    <?php } ?>
    <?php if (count($news) > 0) { ?>
        <br><br>
        <div class="title_csbh">Bài Viết Tương Tự</div>
        <div class="content-main w-clear " style="margin-bottom: 20px;">
            <div class="owl-carousel owl-theme owl-dv">
                <?php foreach ($news as $k => $v) { ?>
                    <a href="<?= $v['tenkhongdauvi'] ?>">
                        <div class="tintuc">
                            <div class="img_tintuc">
                                <img src="<?= THUMBS ?>/690x450x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="">
                            </div>
                            <div class="date_tt"><i class="fas fa-calendar-alt"></i><span><?= date("d/m/Y", $v['ngaytao']) ?></span>
                            </div>
                            <div class="name_tt name_tt_two"><?= $v['ten' . $lang] ?></div>
                            <div class="mota_tt noidung-split"><?= $v['mota' . $lang] ?></div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="clear"></div>
        <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
    <?php } ?>
</div>