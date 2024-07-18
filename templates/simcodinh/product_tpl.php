<!-- <div id="background-banner" class="mb-5">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="bread_title"><?=(@$title_cat!='')?$title_cat:@$title_crumb?></div>
            <div class="breadCrumbs">
                <div><?=$breadcrumbs?></div>
            </div>
        </div>
    </div>
</div> -->
<div class="wrap_dep">
    <div class="fixwidth">
        <?php if($noidung_simcodinh['noidung'.$lang]) {?>
        <div class="seo_content_after_scd">
            <?=htmlspecialchars_decode($noidung_simcodinh['noidung'.$lang])?>
        </div>
        <?php } ?>
        <div class="content-main w-clear">
            <div class="row wrapper__content">
                <div class="col-md-3 wrapper__content__left">
                    <?php include TEMPLATE.LAYOUT."search_left_simcodinh.php" ?>
                </div>
                <div class="col-md-6">
                    <section id="top-sim" class="container-sim section-item">
                        <div class="section-item__title">
                            <h1>SIM CỐ ĐỊNH</h1>
                        </div>
                        <div class="section-item__content">
                            <div id="prod-list" class="clearfix prod-list-top">
                                <?php if(isset($product) && count($product) > 0){?>
                                <table id="" class="tbl-list-sim prod-table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:64px">STT</th>
                                            <th>Số sim</th>
                                            <th>Giá bán</th>
                                            <th>Điểm</th>
                                            <th style="width:100px">Mua Sim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach($product_tong as $l) {?>
                                                <input type="hidden" class="selectexport_excel" value="<?=$l['id']?>">
                                            <?php } ?>
                                        <?php $i = $startpoint; foreach($product as $v) { $i++;?>
                                        <tr>
                                            <td class="index"><?=$i?></td>
                                            <td class="sim">
                                                <a rel="nofollow"
                                                    href="<?=$v['tenkhongdauvi']?>"><strong><?=$v['ten'.$lang]?></strong></a>
                                            </td>
                                            <td class="sprice">
                                                <?php if(!empty($v['giamoi'])) {?>
                                                <span><?=$func->format_money($v['giamoi'])?></span>
                                                <?php }else{ ?>
                                                <span><?=$func->format_money($v['gia'])?></span>
                                                <?php } ?>
                                            </td>
                                            <td class="score">
                                                <?=$v['diem']?>
                                            </td>
                                            <td class="buy">
                                                <a rel="nofollow" href="<?=$v['tenkhongdauvi']?>" target="_blank"
                                                    class="btn btn-order">Mua
                                                    ngay</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a class="exportExcel exportExcel_pro" title="Xuất file Excel"><i class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                <?php }else{?>
                                <div class="alert alert-warning" role="alert">
                                    <strong><?=khongtimthayketqua?></strong>
                                </div>
                                <?php }?>
                                <div class="clear"></div>
                                <?php if($paging) {?>
                                <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
                                <?php } ?>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 wrapper__content__right">
                    <?php include TEMPLATE.LAYOUT."search_right.php" ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap_mobile">
    <?php if($noidung_simcodinh['noidung'.$lang]) {?>
    <div class="seo_content_after_scd">
        <?=htmlspecialchars_decode($noidung_simcodinh['noidung'.$lang])?>
    </div>
    <?php } ?>
    <div class="wrap_bottom ">
        <div class="fixwidth">
            <div class="all_product_mobile prod-list-top">
                <section class="section-item">
                    <div class="section-item__title">
                        <h2>SIM CỐ ĐỊNH</h2>
                    </div>
                    <div class="section-item__content">
                        <div class="jsim-list-box clearfix">
                            <div class="jsim-list clearfix">
                                <div class="clearfix ">
                                    <!--[tbl-list-sim currentPage=1]-->
                                    <table id="container-list-sim" class="prod-list-table">
                                        <tbody class="prod-list">
                                            <?php foreach($product_tong as $l) {?>
                                                <input type="hidden" class="selectexport_excel" value="<?=$l['id']?>">
                                            <?php } ?>
                                            <?php foreach($product as $v) {?>
                                            <tr class="prod-item">
                                                <td class="prod-item__right">
                                                    <a rel="nofollow" href="<?=$v['tenkhongdauvi']?>" target="_blank">
                                                        <span
                                                            class="textle"><strong><?=$v['ten'.$lang]?></strong></span><br>
                                                        <?php if(!empty($v['giamoi'])) {?>
                                                        <span
                                                            class="price"><?=$func->format_money($v['giamoi'])?></span>
                                                        <?php }else{ ?>
                                                        <span class="price"><?=$func->format_money($v['gia'])?></span>
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <a class="exportExcel exportExcel_pro" title="Xuất file Excel"><i class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                    <!--[/tbl-list-sim]-->
                                </div>
                            </div>
                            <?php if($paging) {?>
                            <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="search_bottom_mobile">
        <?php include TEMPLATE.LAYOUT."search_left_simcodinh_mobile.php" ?>
    </div>
</div>