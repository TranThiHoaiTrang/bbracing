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
<div class="fixwidth">
    <div class="time-main"><i class="fas fa-calendar-week"></i><span><?=ngaydang?>:
            <?=date("d/m/Y h:i A",$row_detail['ngaytao'])?></span>
    </div>
    <?php if(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') { ?>
    <div class="meta-toc">
        <div class="box-readmore">
            <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
        </div>
    </div>
    <div class="content-main w-clear" id="toc-content">
        <?=htmlspecialchars_decode($row_detail['noidung'.$lang])?>
    </div>

    <?php } else { ?>
    <div class="alert alert-warning" role="alert">
        <strong><?=noidungdangcapnhat?></strong>
    </div>
    <?php } ?>
</div>