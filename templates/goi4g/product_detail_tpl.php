<div class="fixwidth">
    <div class="row wrapper__content" style="margin-top: 20px;">
        <div class="col-md-3 wrapper__content__left">
            <section class="section-item">
                <div class="section-item__title"><i class="fas fa-sim-card"></i>Sim theo mạng</div>
                <nav class="section-item__content">
                    <ul>
                        <?php foreach($pro_list_menu as $v) {?>
                        <li>
                            <span class="jfilter-option check_sim" title="<?=$v['ten'.$lang]?>"
                                data-id_sim="<?=$v['id']?>" data-code="<?=$v['ten'.$lang]?>">
                                <?=$v['ten'.$lang]?>
                            </span>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </section>
        </div>
        <div class="col-md-6">
            <section class="container-sim section-item">
                <div class="section-item__title">
                    <h1>Đặt Mua Sim Số Đẹp <?=$row_detail['ten'.$lang]?></h1>
                </div>
                <div class="section-item__content">
                    <div class="booking__info-box">
                        <div class="row">
                            <div class="col col-left col-7">
                                <span class="row booking__info">
                                    <span class="col col-left col-12">
                                        <span class="col-4 col-label">Số thuê bao</span>
                                        <strong class="col-6 prod-number"><?=$row_detail['ten'.$lang]?></strong>
                                    </span>
                                </span>
                                <span class="row booking__info">
                                    <span class="col col-left col-12">
                                        <span class="col-4 col-label">Giá bán</span>
                                        <?php if($row_detail['giamoi']) {?>
                                        <span class="col-8 prod-price">
                                            <strong
                                                class="price sell-price"><?=$func->format_money($row_detail['giamoi'])?></strong>
                                            <span class="price-old"><?=$func->format_money($row_detail['gia'])?></span>
                                        </span>
                                        <?php }else{ ?>
                                        <span class="col-8 prod-price">
                                            <strong
                                                class="price sell-price"><?=$func->format_money($row_detail['gia'])?></strong>
                                        </span>
                                        <?php } ?>
                                    </span>
                                </span>
                                <span class="row booking__info">
                                    <span class="col col-left col-12">
                                        <span class="col-4 col-label">Mạng di động</span>
                                        <strong class="col-6 prod-network"><?=$pro_list['ten'.$lang]?></strong>
                                    </span>
                                </span>
                            </div>
                            <div class="col col-left col-5">
                                <div class="all_img_thesim">
                                    <?php if($pro_list['photo']) {?>
                                    <img width="600px" height="400px"
                                        src="<?=THUMBS?>/600x400x1/<?=UPLOAD_PRODUCT_L.$pro_list['photo']?>" alt="">
                                    <span class="so_sim"><?=$row_detail['tenkhongdauvi']?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-sim section-item">
                <div class="section-item__title">
                    <h1>THÔNG TIN KHÁCH HÀNG</h1>
                </div>
                <div class="section-item__content">
                    <form class="form-cart validation-cart" novalidate method="post" action=""
                        enctype="multipart/form-data">
                        <div class="bottom-thongtin">
                            <div class="section-cart">
                                <div class="information-cart">
                                    <div class="all_gioitinh">
                                        <div class="gioitinh">
                                            <input type="radio" name="gioitinh" value="nam">
                                            <span>Nam</span>
                                        </div>
                                        <div class="gioitinh">
                                            <input type="radio" name="gioitinh" value="nu">
                                            <span>Nữ</span>
                                        </div>
                                    </div>
                                    <div class="input-double-cart w-clear">
                                        <div class="input-cart">
                                            <input type="text" class="form-control" id="ten" name="ten"
                                                placeholder="<?=hoten?>" required />
                                            <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                                        </div>
                                        <div class="input-cart">
                                            <input type="number" class="form-control" id="dienthoai" name="dienthoai"
                                                placeholder="<?=sodienthoai?>" required />
                                            <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                                        </div>
                                    </div>
                                    <div class="input-cart">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                                    </div>
                                    <p class="title-cart">CHỌN ĐỊA CHỈ NHẬN HÀNG:</p>
                                    <div class="input-triple-cart w-clear">
                                        <div class="all_gioitinh">
                                            <div class="gioitinh">
                                                <input type="radio" name="cach_nhan" value="giao_tan_noi">
                                                <span>Giao tận nơi</span>
                                            </div>
                                            <div class="gioitinh">
                                                <input type="radio" name="cach_nhan" value="nhan_tai_cua_hang">
                                                <span>Nhận tại cửa hàng</span>
                                            </div>
                                        </div>
                                        <div class="input-cart">
                                            <select class="select-city-cart custom-select" required id="city"
                                                name="city">
                                                <option value=""><?=tinhthanh?></option>
                                                <?php for($i=0;$i<count($city);$i++) { ?>
                                                <option value="<?=$city[$i]['id']?>"><?=$city[$i]['ten']?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback"><?=vuilongchontinhthanh?></div>
                                        </div>
                                        <div class="input-cart">
                                            <select class="select-district-cart select-district custom-select" required
                                                id="district" name="district">
                                                <option value=""><?=quanhuyen?></option>
                                            </select>
                                            <div class="invalid-feedback"><?=vuilongchonquanhuyen?></div>
                                        </div>
                                        <div class="input-cart">
                                            <select class="select-wards-cart select-wards custom-select" required
                                                id="wards" name="wards">
                                                <option value=""><?=phuongxa?></option>
                                            </select>
                                            <div class="invalid-feedback"><?=vuilongchonphuongxa?></div>
                                        </div>
                                    </div>
                                    <div class="input-cart">
                                        <input type="text" class="form-control" id="diachi" name="diachi"
                                            placeholder="<?=diachi?>" required />
                                        <div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
                                    </div>
                                    <div class="input-cart">
                                        <textarea class="form-control" id="yeucaukhac" name="yeucaukhac"
                                            placeholder="<?=yeucaukhac?>" /></textarea>
                                    </div>
                                    <div class="all_gioitinh">
                                        <div class="gioitinh">
                                            <input type="radio" name="phuongthuoc_chuyenkhoan" value="tien_mat">
                                            <span>Tiền mặt</span>
                                        </div>
                                        <div class="gioitinh">
                                            <input type="radio" name="phuongthuoc_chuyenkhoan" value="chuyen_khoan">
                                            <span>Chuyển khoản</span>
                                        </div>
                                    </div>
                                    <div class="all_gioitinh">
                                        <div class="gioitinh">
                                            <input type="radio" name="loai_sim" value="phoi_sim_thuong">
                                            <span>Phôi sim thường</span>
                                        </div>
                                        <div class="gioitinh">
                                            <input type="radio" name="loai_sim" value="ma_qa_esim">
                                            <span>Mã QR Esim</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tong_tien">
                                    <span>Tổng tiền</span>
                                    <?php if($row_detail['giamoi']) {?>
                                    <span class="total-price load-price-total"
                                        style="color: #d0021a;font-weight: 500;font-size: 16px;"><?=$func->format_money($row_detail['giamoi'])?></span>
                                    <?php } else{ ?>
                                    <span class="total-price load-price-total"
                                        style="color: #d0021a;font-weight: 500;font-size: 16px;"><?=$func->format_money($row_detail['gia'])?></span>
                                    <?php } ?>

                                    <?php if($row_detail['giamoi']) {?>
                                    <input type="hidden" class="price-temp" name="price-temp"
                                        value="<?=$row_detail['giamoi']?>">
                                    <input type="hidden" class="price-total" name="price-total"
                                        value="<?=$row_detail['giamoi']?>">
                                    <?php }else{ ?>
                                    <input type="hidden" class="price-temp" name="price-temp"
                                        value="<?=$row_detail['gia']?>">
                                    <input type="hidden" class="price-total" name="price-total"
                                        value="<?=$row_detail['gia']?>">
                                    <?php } ?>

                                </div>
                                <input type="submit" class="btn-cart_product btn btn-primary btn-lg btn-block addcart"
                                    data-action="buynow" data-id="<?=$row_detail['id']?>"
                                    data-name="<?=$row_detail['tenvi']?>"
                                    data-gia="<?=$func->format_money($row_detail['gia'])?>" name="thanhtoan"
                                    value="<?=thanhtoan?>" disabled>

                                <div class="hotline_thanhtoan">
                                    Hoặc gọi mua hàng
                                    <a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">
                                        <i
                                            class="fas fa-phone fa-rotate-90 icon-call"></i>&nbsp;<?= $optsetting['hotline'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-md-3 wrapper__content__right">
            <section class="section-item">
                <div class="section-item__title">
                    Tin tức
                    <a href="tin-tuc" class="right">Xem tất cả</a>
                </div>
                <div class="section-item__content">
                    <div class="news-section">
                        <?php foreach($tintuc as $v) {?>
                        <div class="news-section__item">
                            <div class="news-section__item__right">
                                <a href="<?=$v['tenkhongdauvi']?>" class="textle"><?=$v['ten'.$lang]?></a>
                                <ul class="category">
                                    <li><a href="<?=$v['tenkhongdauvi']?>">Bạn cần biết</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="ckeditor-right section-item">
                <div class="section-item__title">
                    TổNG đàI NHà MạNG
                </div>
                <div class="section-item__content">
                    <div class="info-item">
                        <p class="title"><strong>KHO SIM</strong></p>

                        <p class="content">Tổng đài 24/24</p>

                        <ul class="category">
                            <li><?=$optsetting['hotline']?></li>
                            <li><?=$optsetting['dienthoai']?></li>
                        </ul>
                    </div>
                    <?php foreach($pro_list_noibat as $v) {?>
                    <div class="info-item">
                        <p class="title"><strong><?=$v['ten'.$lang]?></strong></p>

                        <p class="content">Tổng đài 24/24</p>

                        <ul class="category">
                            <?php 
                            $all_tongdai = explode(',', $v['so_tongdai']);
                            foreach($all_tongdai as $std){
                            ?>
                            <li><?=$std?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="info-item">
                        <p class="content">Đường dây nóng</p>

                        <ul class="category">
                            <?php 
                            $all_duongdaynong = explode(',', $v['so_duongdaynong']);
                            foreach($all_duongdaynong as $std){
                            ?>
                            <li><?=$std?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="info-item">
                        <p class="content">Các đầu số nhận biết</p>

                        <ul class="category badge viettel-color">
                            <?php 
                            $all_dauso = explode(',', $v['dauso']);
                            foreach($all_dauso as $std){
                            ?>
                            <li><?=$std?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>

    <div class="title_dichvu"><span>Sản phẩm tương tự</span></div>
    <div class="content-main w-clear">
        <?php if(isset($product) && count($product) > 0){?>
        <div class="loadkhung_product1 mainkhung_product">
            <?php foreach($product as $k=>$v){?>
            <div class="sanpham_noibat">
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <div class="cell">
                        <img src="<?=THUMBS?>/210x210x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?= $v['ten'.$lang] ?>"
                            width="210px" height="210px">
                        <?php 
                        if(!empty($v['giamoi'])) {
                            $sale = abs(ceil((($v['giamoi']/$v['gia'])*100)-100));    
                        ?>
                        <div class="sale"><?= $sale ?>%</div>
                        <?php } ?>
                        <div class="cover-content cover-sp">
                            <h6 class="text-split">
                                <?= $v['ten'.$lang] ?>
                            </h6>
                            <div class="all_gia">
                                <?php if(!empty($v['giamoi'])) {?>
                                <span><?=$func->format_money($v['giamoi'])?></span>
                                <del><?=$func->format_money($v['gia'])?></del>
                                <?php }else{ ?>
                                <span><?=$func->format_money($v['gia'])?></span>
                                <?php } ?>
                            </div>
                            <div class="noprice">
                                <span>Mua Ngay <i class="fas fa-caret-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="clear"></div>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
        <?php }else{?>
        <div class="alert alert-warning" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
        <?php }?>
    </div>
</div>