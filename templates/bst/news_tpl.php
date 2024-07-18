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
    <div class="content-main w-clear">
        <?php if (count($news) > 0) { ?>
            <div class="content-main w-clear loadkhung_product1">
                <?php foreach ($news as $k => $v) { ?>
                    <div class="itemAlbums">
                        <a href="<?= $v['tenkhongdauvi'] ?>" title="<?= $v['ten' . $lang] ?>">
                            <img src="<?= THUMBS ?>/600x800x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" width="400" height="533">
                            <span><?= $v['ten' . $lang] ?></span>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="clear"></div>
            <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?= khongtimthayketqua ?></strong>
            </div>
        <?php } ?>

    </div>
</div>