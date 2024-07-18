<?php 

?>
<div class="wrap_dep">
    <?php include TEMPLATE.LAYOUT."top_menu.php" ?>
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="row wrapper__content">
                <div class="col-md-3 wrapper__content__left">
                    <?php include TEMPLATE.LAYOUT."search_left.php" ?>
                </div>
                <div class="col-md-6">
                    <!-- </?php if(isset($products) && count($products) > 0){ ?> -->
                    <section id="top-sim" class="container-sim section-item">
                        <div class="section-item__title">
                            <h1>SIM tìm kiếm</h1>
                        </div>
                        <div class="section-item__content">
                            <div id="prod-list" class="clearfix prod-list-top">
                                <?php if(isset($products) && count($products) > 0){ ?>
                                <table id="" class="tbl-list-sim prod-table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:64px">STT</th>
                                            <th>Số sim</th>
                                            <th>Giá bán</th>
                                            <th>Điểm</th>
                                            <th>Mạng</th>
                                            <th style="width:100px">Mua Sim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product_tong as $l) {?>
                                        <input type="hidden" class="selectexport_excel" value="<?=$l['id']?>">
                                        <?php } ?>
                                        <?php $i = $startpoint; foreach($products as $v) { $i++;?>
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
                                            <?php 
                                        $prob_l = $d->rawQueryOne("select * from #_product_list where type = 'san-pham' and id = '".$v['id_list']."' and hienthi > 0 order by stt,id desc");
                                        
                                        $text_name = $prob_l['id'];
                                        if($text_name == '118'){
                                            $style = 'style="color: #d10032;"';
                                        }
                                        elseif($text_name == '117'){
                                            $style = 'style="color: #134a9f;"';
                                        }
                                        elseif($text_name == '116'){
                                            $style = 'style="color: #288ad6;"';
                                        }
                                        elseif($text_name == '115'){
                                            $style = 'style="color: #ff821e;"';
                                        }
                                        elseif($text_name == '114'){
                                            $style = 'style="color: #f1b82c;"';
                                        }
                                        else{
                                            $style = 'style="color: #333;"';
                                        }
                                        ?>
                                            <td class="netopr" <?= $style ?>><?=$prob_l['ten'.$lang]?></td>
                                            <td class="buy">
                                                <a rel="nofollow" href="<?=$v['tenkhongdauvi']?>" target="_blank"
                                                    class="btn btn-order">Mua
                                                    ngay</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a class="exportExcel exportExcel_pro" title="Xuất file Excel"><i
                                        class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                <?php }else{ ?>
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
                    <!-- </?php } else { ?> -->
                    <?php if(strpos($tukhoa, "*") === false) { 
                    if(($count_tukhoa >= 10)) { ?>
                    <section id="top-sim" class="container-sim section-item">
                        <div class="section-item__title">
                            <h1>SIM tìm kiếm</h1>
                        </div>
                        <div class="section-item__content">
                            <div id="prod-list" class="clearfix prod-list-top">
                                <div class="booking__info">
                                    <div class="col col-left">
                                        <div>
                                            <p class="prod-number"><strong><?=$tukhoa?></strong></p>
                                            <p class="price">Sim đã bán hoặc chưa được cập nhật</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                    <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong><?=khongtimthayketqua?></strong>
                    </div>
                    <?php } ?>
                    <!-- </?php } ?> -->
                    <?php if(strpos($tukhoa, "*") === false) {?>
                    <section class="container-sim section-item sim_gan_giong">
                        <div class="section-item__title">
                            <h1>Tham khảo SIM Gần Giống</h1>
                        </div>
                        <div class="section-item__content">
                            <div class="clearfix prod-list">
                                <?php if(isset($sim_gan_giong) && count($sim_gan_giong) > 0){?>
                                <table id="" class="tbl-list-sim prod-table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width:64px">STT</th>
                                            <th>Số sim</th>
                                            <th>Giá bán</th>
                                            <th>Điểm</th>
                                            <th>Mạng</th>
                                            <th style="width:100px">Mua Sim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($sim_gan_giong_tong as $l) {?>
                                        <input type="hidden" class="selectexport_excel_simgangiong"
                                            value="<?=$l['id']?>">
                                        <?php } ?>
                                        <?php 
                                        // var_dump($sim_where_re);
                                        // var_dump($sim_gan_giong);
                                        $i = $startpoint; foreach($sim_gan_giong as $v) { $i++;
                                            $product_sim_gangiong = $d->rawQuery("select * from #_product where type = ? and tenkhongdauvi = ?",array('san-pham',$j));
                                            // foreach($product_sim_gangiong as $v) {
                                        ?>
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
                                            <?php 
                                            $prob_l = $d->rawQueryOne("select * from #_product_list where type = 'san-pham' and id = '".$v['id_list']."' and hienthi > 0 order by stt,id desc");
                                            
                                            $text_name = $prob_l['id'];
                                            if($text_name == '118'){
                                                $style = 'style="color: #d10032;"';
                                            }
                                            elseif($text_name == '117'){
                                                $style = 'style="color: #134a9f;"';
                                            }
                                            elseif($text_name == '116'){
                                                $style = 'style="color: #288ad6;"';
                                            }
                                            elseif($text_name == '115'){
                                                $style = 'style="color: #ff821e;"';
                                            }
                                            elseif($text_name == '114'){
                                                $style = 'style="color: #f1b82c;"';
                                            }
                                            else{
                                                $style = 'style="color: #333;"';
                                            }
                                            ?>
                                            <td class="netopr" <?= $style ?>><?=$prob_l['ten'.$lang]?></td>
                                            <td class="buy">
                                                <a rel="nofollow" href="<?=$v['tenkhongdauvi']?>" target="_blank"
                                                    class="btn btn-order">Mua
                                                    ngay</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a class="exportExcel exportExcel_simgangiong" title="Xuất file Excel"><i
                                        class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                <?php }else{?>
                                <div class="booking__info">
                                    <div class="col col-left">
                                        <div>
                                            <p class="price">Không có sim nào gần giống với sim <?=$tukhoa?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="clear"></div>
                                <!-- </?php if($paging_gangiong) {?>
                                <div class="pagination-home">
                                    </?=(isset($paging_gangiong) && $paging_gangiong != '') ? $paging_gangiong : ''?>
                                </div>
                                </?php } ?> -->
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                    <?php if($noidung_sanpham['noidung'.$lang]) {?>
                    <div class="seo_content_after">
                        <?=htmlspecialchars_decode($noidung_sanpham['noidung'.$lang])?>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-3 wrapper__content__right">
                    <?php include TEMPLATE.LAYOUT."search_right.php" ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap_mobile">
    <?php include TEMPLATE.LAYOUT."top_menu_mobile.php" ?>
    <div class="wrap_bottom ">
        <div class="fixwidth">
            <div class="all_product_mobile">
                <?php if(strpos($tukhoa, "*") === false) {
                if(($count_tukhoa >= 10)) { ?>
                <section id="top-sim" class="container-sim section-item">
                    <div class="section-item__title">
                        <h2>SIM tìm kiếm</h2>
                    </div>
                    <div class="section-item__content">
                        <div id="prod-list" class="clearfix prod-list-top">
                            <div class="booking__info">
                                <div class="col col-left">
                                    <div>
                                        <p class="prod-number"><strong><?=$tukhoa?></strong></p>
                                        <p class="price">Sim đã bán hoặc chưa được cập nhật</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if(isset($sim_gan_giong) && count($sim_gan_giong) > 0){?>
                <section class="section-item">
                    <div class="section-item__title">
                        <h2>Tìm gần giống </h2>
                    </div>
                    <div class="section-item__content">
                        <div class="jsim-list-box clearfix">
                            <div class="jsim-list clearfix">
                                <div class="clearfix">
                                    <table id="container-list-sim" style="margin-bottom: 10px;" class="prod-list-table">
                                        <tbody class="prod-list">
                                            <?php foreach($sim_gan_giong_tong as $l) {?>
                                            <input type="hidden" class="selectexport_excel_simgangiong"
                                                value="<?=$l['id']?>">
                                            <?php } ?>
                                            <?php 
											$i = $startpoint; foreach($sim_gan_giong as $v) { $i++;
                                            $product_sim_gangiong = $d->rawQuery("select * from #_product where type = ? and tenkhongdauvi = ?",array('san-pham',$j));
											?>
                                            <tr class="prod-item">
                                                <?php 
                                                $pro_sp_all = $d->rawQueryOne("select * from #_product_list where type = ? and hienthi > 0 and id = ? order by stt,id desc",array('san-pham',$v['id_list']));
                                                ?>
                                                <?php if(!empty($pro_sp_all['photo2'])) {?>
                                                <td class="prod-item__left">
                                                    <img class="icon-viettel-circle"
                                                        src="<?=THUMBS?>/300x300x1/<?=UPLOAD_PRODUCT_L.$pro_sp_all['photo2']?>"
                                                        width="48px" height="48px" alt="">
                                                </td>
                                                <?php } ?>
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
                                    <a class="exportExcel exportExcel_simgangiong mt-3" title="Xuất file Excel"><i
                                            class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php }else{?>
                <div class="booking__info">
                    <div class="col col-left">
                        <div>
                            <p class="price">Không có sim nào gần giống với sim <?=$tukhoa?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="clear"></div>
                <?php if($paging_gangiong) {?>
                <div class="pagination-home">
                    <?=(isset($paging_gangiong) && $paging_gangiong != '') ? $paging_gangiong : ''?>
                </div>
                <?php } ?>
                <?php } else { ?>
                <?php if(isset($sim_gan_giong) && count($sim_gan_giong) > 0){?>
                <section class="section-item">
                    <div class="section-item__title">
                        <h2>Tìm gần giống </h2>
                    </div>
                    <div class="section-item__content">
                        <div class="jsim-list-box clearfix">
                            <div class="jsim-list clearfix">
                                <div class="clearfix">
                                    <table id="container-list-sim" style="margin-bottom: 10px;" class="prod-list-table">
                                        <tbody class="prod-list">
                                            <?php foreach($sim_gan_giong_tong as $l) {?>
                                            <input type="hidden" class="selectexport_excel_simgangiong"
                                                value="<?=$l['id']?>">
                                            <?php } ?>
                                            <?php 
											$i = $startpoint; foreach($sim_gan_giong as $v) { $i++;
                                            $product_sim_gangiong = $d->rawQuery("select * from #_product where type = ? and tenkhongdauvi = ?",array('san-pham',$j));
											?>
                                            <tr class="prod-item">
                                                <?php 
                                                $pro_sp_all = $d->rawQueryOne("select * from #_product_list where type = ? and hienthi > 0 and id = ? order by stt,id desc",array('san-pham',$v['id_list']));
                                                ?>
                                                <?php if(!empty($pro_sp_all['photo2'])) {?>
                                                <td class="prod-item__left">
                                                    <img class="icon-viettel-circle"
                                                        src="<?=THUMBS?>/300x300x1/<?=UPLOAD_PRODUCT_L.$pro_sp_all['photo2']?>"
                                                        width="48px" height="48px" alt="">
                                                </td>
                                                <?php } ?>
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
                                    <a class="exportExcel exportExcel_simgangiong mt-3" title="Xuất file Excel"><i
                                            class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php }else{?>
                <div class="booking__info">
                    <div class="col col-left">
                        <div>
                            <p class="price">Không có sim nào gần giống với sim <?=$tukhoa?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="clear"></div>
                <?php if($paging_gangiong) {?>
                <div class="pagination-home">
                    <?=(isset($paging_gangiong) && $paging_gangiong != '') ? $paging_gangiong : ''?>
                </div>
                <?php } ?>
                <?php } ?>
                <?php }else{ ?>
                <?php if(isset($products) && count($products) > 0){?>
                <section class="section-item">
                    <div class="section-item__title">
                        <h2>Tìm kiếm </h2>
                    </div>
                    <div class="section-item__content">
                        <div class="jsim-list-box clearfix">
                            <div class="jsim-list clearfix">
                                <div class="clearfix">
                                    <!--[tbl-list-sim currentPage=1]-->
                                    <table id="container-list-sim" style="margin-bottom: 10px;" class="prod-list-table">
                                        <tbody class="prod-list">
                                            <?php foreach($product_tong as $l) {?>
                                            <input type="hidden" class="selectexport_excel_simgangiong"
                                                value="<?=$l['id']?>">
                                            <?php } ?>
                                            <?php foreach($products as $v) {?>
                                            <tr class="prod-item">
                                                <?php 
                                                $pro_sp_all = $d->rawQueryOne("select * from #_product_list where type = ? and hienthi > 0 and id = ? order by stt,id desc",array('san-pham',$v['id_list']));
                                                ?>
                                                <?php if(!empty($pro_sp_all['photo2'])) {?>
                                                <td class="prod-item__left">
                                                    <img class="icon-viettel-circle"
                                                        src="<?=THUMBS?>/300x300x1/<?=UPLOAD_PRODUCT_L.$pro_sp_all['photo2']?>"
                                                        width="48px" height="48px" alt="">
                                                </td>
                                                <?php } ?>
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
                                    <a class="exportExcel selectexport_excel mt-3" title="Xuất file Excel"><i
                                            class="far fa-file-excel mr-1"></i>Xuất file Excel</a>
                                    <!--[/tbl-list-sim]-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php }else{?>
                <div class="booking__info">
                    <div class="col col-left">
                        <div>
                            <p class="price">Không có sim nào gần giống với từ khóa <?=$tukhoa_t?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="clear"></div>
                <?php if($paging) {?>
                <div class="pagination-home">
                    <?=(isset($paging) && $paging != '') ? $paging : ''?>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>