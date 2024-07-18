<div class="title"><?=$title_crumb?></div>
<div class="main_news"><span><?=$row_detail['ten'.$lang]?></span></div>
<?php /*<div class="time-main"><i class="fas fa-calendar-week"></i><span><?=ngaydang?>:
<?=date("d/m/Y h:i A",$row_detail['ngaytao'])?></span></div>*/?>
<?php if(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') { ?>
<div class="meta-toc">
    <div class="box-readmore">
        <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
    </div>
</div>
<div class="content-main w-clear" id="toc-content"><?=htmlspecialchars_decode($row_detail['noidung'.$lang])?></div>

<?php } else { ?>
<div class="alert alert-warning" role="alert">
    <strong><?=noidungdangcapnhat?></strong>
</div>
<?php } ?>
<?php if(count($news)>0) {?>
<br><br>
<div class="title">BÀI VIẾT KHÁC</div>
<div class="loadkhung_product mainkhung_product">
    <?php foreach($news as $k=>$v){?>
    <div class="boxproduct_item">
        <a class="boxproduct_img" href="<?=$v['tenkhongdauvi']?>"><img
                onerror="this.src='<?=THUMBS?>/280x280x2/assets/images/noimage.png';"
                src="<?=THUMBS?>/280x280x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>" /></a>
        <div class="boxproduct_info">
            <div class="boxproduct_name"><a href="<?=$v['tenkhongdauvi']?>"
                    title="<?=$v['tenvi']?>"><?=$v['ten'.$lang]?></a></div>
            <div class="boxproduct_mota"><?=$v['mota'.$lang]?></div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="clear"></div>
<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
<?php } ?>