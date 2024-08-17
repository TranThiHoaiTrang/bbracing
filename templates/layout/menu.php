<div class="all_header <?= $com == 'index' ? '' : 'all_header_nindex' ?>">
    <div class="header_wrap">
        <div class="header-cachtop header_an">
            <div class="header">
                <div class="header_top d-flex flex-wrap align-items-center">
                    <div class="innerTopLeft">
                        <a aria-label="hotline" class="btnHL" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
                            <span>Hotline: </span>
                            <span style="padding-left: 3px;"><?= $optsetting['hotline'] ?></span>
                        </a>
                    </div>
                    <div id="menu_top">
                        <div class=" clearfix">
                            <div class="menu">
                                <ul class="menu_cap_cha d-flex justify-content-center">
                                    <li class="menulicha menu_ngang">
                                        <a href="brand" title="<?= $lang == 'en' ? 'Our Brand' : 'Thương hiệu' ?>"><?= $lang == 'en' ? 'Our Brand' : 'Thương hiệu' ?></a>
                                        <?php if ($brand_order) { ?>
                                            <ul class="menu_cap_con">
                                                <?php foreach ($brand_order as $c => $cat) { ?>
                                                    <li>
                                                        <a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>">
                                                            <span><?= $cat['ten' . $lang] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="all_menu_brand_cap_con">
                                                <?php
                                                $col_danhmuc = ceil(count($brand) / 5);
                                                ?>
                                                <?php $j = 0;
                                                for ($i = 0; $i < $col_danhmuc; $i++) {
                                                    $danhmuc_moi = $d->rawQuery("select * from #_product_brand where type = ? and hienthi > 0 order by stt,id desc  limit $j,5", array('san-pham'));
                                                    $j += 5;
                                                ?>
                                                    <ul class="brand_cap_con">
                                                        <?php foreach ($danhmuc_moi as $v) { ?>
                                                            <li>
                                                                <a class="a_brand" title="<?= $v['ten' . $lang] ?>" href="<?= $v[$sluglang] ?>">
                                                                    <!-- <span><?= $v['ten' . $lang] ?></span> -->
                                                                    <img width="140" height="26" data-sizes="auto" src="<?= THUMBS ?>/140x50x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/140x50x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li class="menulicha menu_ngang">
                                        <a href="catalogue" title="<?= $lang == 'en' ? 'Catalog' : 'Danh mục sản phẩm' ?>"><?= $lang == 'en' ? 'Catalog' : 'Danh mục sản phẩm' ?></a>
                                        <?php if ($splistmenu) { ?>
                                            <?php
                                            if ($lang == 'vi') {
                                                $nhomdanhmuc = $d->rawQuery("select * from #_product_nhomdanhmuc where type = 'san-pham' and hienthi > 0 order by tenvi ASC ");
                                            } else {
                                                $nhomdanhmuc = $d->rawQuery("select * from #_product_nhomdanhmuc where type = 'san-pham' and hienthi > 0 order by tenen ASC ");
                                            }
                                            ?>
                                            <ul class="menu_cap_con">
                                                <?php for ($i = 0; $i < count($nhomdanhmuc); $i++) {
                                                    if ($lang == 'vi') {
                                                        $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $nhomdanhmuc[$i]['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC");
                                                    } else {
                                                        $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $nhomdanhmuc[$i]['id'] . "' and hienthi > 0 and noibat > 0 order by tenen ASC");
                                                    }
                                                ?>
                                                    <li>
                                                        <a href="<?= $nhomdanhmuc[$i]['tenkhongdauvi'] ?>" target="_blank" class="dm_cha_red"><?= $nhomdanhmuc[$i]['ten' . $lang] ?></a>
                                                        <ul style="display: block;">
                                                            <?php foreach ($danhmuc_moi as $v) { ?>
                                                                <li>
                                                                    <a title="<?= $v['ten' . $lang] ?>" href="<?= $v[$sluglang] ?>">
                                                                        <span><?= $v['ten' . $lang] ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="all_menu_brand_cap_con">
                                                <?php
                                                $nhomdanhmuc = $d->rawQuery("select * from #_product_nhomdanhmuc where type = 'san-pham' and hienthi > 0 order by stt,id desc ");
                                                // $col_danhmuc = ceil(count($nhomdanhmuc) / 5);
                                                ?>
                                                <?php $j = 0;
                                                // for ($i = 0; $i < $col_danhmuc; $i++) {
                                                // if ($lang == 'vi') {
                                                //     $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and hienthi > 0 and noibat > 0 order by tenvi ASC  limit $j,5", array('san-pham'));
                                                // } else {
                                                //     $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and hienthi > 0 and noibat > 0 order by tenen ASC  limit $j,5", array('san-pham'));
                                                // }
                                                // $j += 5;

                                                ?>
                                                <ul class="brand_cap_con">
                                                    <?php for ($i = 0; $i < count($nhomdanhmuc); $i++) {
                                                        $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = 'san-pham' and id_nhomdanhmuc = '" . $nhomdanhmuc[$i]['id'] . "' and hienthi > 0 and noibat > 0 order by stt,id desc");
                                                    ?>
                                                        <li>
                                                            <a href="<?= $nhomdanhmuc[$i]['tenkhongdauvi'] ?>" target="_blank" class="dm_cha_red"><?= $nhomdanhmuc[$i]['ten' . $lang] ?></a>
                                                            <ul>
                                                                <?php foreach ($danhmuc_moi as $v) { ?>
                                                                    <li>
                                                                        <a title="<?= $v['ten' . $lang] ?>" href="<?= $v[$sluglang] ?>">
                                                                            <span><?= $v['ten' . $lang] ?></span>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <!-- </?php } ?> -->
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li class="menulicha menu_ngang">
                                        <a href="vehicles" title="<?= $lang == 'en' ? 'Vehicles' : 'Thương hiệu xe' ?>"><?= $lang == 'en' ? 'Vehicles' : 'Thương hiệu xe' ?></a>
                                        <?php if ($thuonghieuxe_order) { ?>
                                            <ul class="menu_cap_con">
                                                <?php foreach ($thuonghieuxe_order as $c => $cat) { ?>
                                                    <li>
                                                        <a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>">
                                                            <span><?= $cat['ten' . $lang] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="all_menu_brand_cap_con">
                                                <?php
                                                $col_danhmuc = ceil(count($vehicles) / 5);
                                                ?>
                                                <?php $j = 0;
                                                for ($i = 0; $i < $col_danhmuc; $i++) {
                                                    $danhmuc_moi = $d->rawQuery("select * from #_product_doday where type = ? and hienthi > 0 order by stt,id desc  limit $j,5", array('san-pham'));
                                                    $j += 5;
                                                ?>
                                                    <ul class="brand_cap_con">
                                                        <?php foreach ($danhmuc_moi as $v) { ?>
                                                            <li>
                                                                <a title="<?= $v['ten' . $lang] ?>" href="<?= $v[$sluglang] ?>">
                                                                    <!-- <span><?= $v['ten' . $lang] ?></span> -->
                                                                    <img width="140" height="26" data-sizes="auto" src="<?= THUMBS ?>/140x50x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/140x50x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li class="menulicha menu_ngang">
                                        <a href="tin-tuc" class="menu_span" title="<?= tintuc ?>"><?= tintuc ?></a>
                                        <?php if ($ttlistmenu) { ?>
                                            <ul class="menu_cap_con">
                                                <?php foreach ($ttlistmenu as $c => $cat) { ?>
                                                    <li>
                                                        <a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>">
                                                            <span><?= $cat['ten' . $lang] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="all_menu_brand_cap_con all_menu_brand_cap_con_tintuc">
                                                <ul class="brand_cap_con">
                                                    <?php foreach ($ttlistmenu as $c => $cat) { ?>
                                                        <li>
                                                            <a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>">
                                                                <span><?= $cat['ten' . $lang] ?></span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li class="menulicha menu_ngang">
                                        <a href="officail" class="menu_span" title="<?= lienhe ?>"><?= lienhe ?></a>
                                        <!-- <ul class="menu_cap_con menu_Cap_con_lh">
                                            <li>
                                                <a href="officail" title="BBRacing" class="double_click" data-duongdan="officail">
                                                    <span>BBRacing</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="<?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?>" href="account/dai-ly">
                                                    <span><?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="<?= $lang == 'vi' ? 'Tra cứu bảo hành' : 'Warranty Check' ?>" href="bao-hanh">
                                                    <span><?= $lang == 'vi' ? 'Tra cứu bảo hành' : 'Warranty Check' ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="all_menu_brand_cap_con all_menu_brand_cap_con_tintuc">
                                            <ul class="brand_cap_con">
                                                <li>
                                                    <a href="officail" title="Official" class="double_click" data-duongdan="officail" style="text-align: right;">
                                                        <span>Official</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a title="<?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?>" href="account/dai-ly" style="text-align: right;">
                                                        <span><?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                <a title="<?= $lang == 'vi' ? 'Tra cứu bảo hành' : 'Warranty Check' ?>" href="bao-hanh">
                                                    <span><?= $lang == 'vi' ? 'Tra cứu bảo hành' : 'Warranty Check' ?></span>
                                                </a>
                                            </li>
                                            </ul>
                                        </div> -->
                                    </li>
                                    <li class="menulicha menu_ngang">
                                        <a href="account/dai-ly" class="menu_span" title="<?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?>"><?= $lang == 'vi' ? 'Đăng ký đại lý' : 'Dealers' ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="all_inner_thongtin">
                        <div class="innerTopright">
                            <div class="ngon_ngu">
                                <div class="all_ngonngu">
                                    <?php if ($lang == 'vi') { ?>
                                        <div class="ngonngu_a">
                                            <img src="./assets/images/vi.jpg" alt="" width="14">
                                            Vietnam
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    <?php } else { ?>
                                        <div class="ngonngu_a">
                                            <img src="./assets/images/en.jpg" alt="" width="14">
                                            English
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="ul_ngonngu">
                                    <div class=" <?= $lang == 'vi' ? 'active' : '' ?>">
                                        <a href="./ngon-ngu?lang=vi">
                                            <img src="./assets/images/vi.jpg" alt="" width="14">
                                            Vietnam
                                        </a>
                                    </div>
                                    <div class=" <?= $lang == 'en' ? 'active' : '' ?>">
                                        <a href="./ngon-ngu?lang=en">
                                            <img src="./assets/images/en.jpg" alt="" width="14">
                                            English
                                        </a>
                                    </div>
                                </div>
                                <!-- <ul class="d-flex">
                                    <li class=" <?= $lang == 'vi' ? 'active' : '' ?>"><a href="./ngon-ngu?lang=vi">VI</a></li>
                                    <li class=" <?= $lang == 'en' ? 'active' : '' ?>"><a href="./ngon-ngu?lang=en">EN</a></li>
                                </ul> -->
                            </div>
                            <div class="ngon_ngu tien_te">
                                <div class="all_ngonngu">
                                    <?php if ($lang == 'vi') { ?>
                                        <div class="ngonngu_a">
                                            VND
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    <?php } else { ?>
                                        <div class="ngonngu_a">
                                            EURO
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="ul_ngonngu">
                                    <div class=" <?= $lang == 'vi' ? 'active' : '' ?>">
                                        <a href="./ngon-ngu?lang=vi">
                                            VND
                                        </a>
                                    </div>
                                    <div class=" <?= $lang == 'en' ? 'active' : '' ?>">
                                        <a href="./ngon-ngu?lang=en">
                                            EURO
                                        </a>
                                    </div>
                                </div>
                                <!-- <ul class="d-flex">
                                    <li class=" <?= $lang == 'vi' ? 'active' : '' ?>"><a href="./ngon-ngu?lang=vi">VND</a></li>
                                    <li class=" <?= $lang == 'en' ? 'active' : '' ?>"><a href="./ngon-ngu?lang=en">EURO</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header_center header_an">
            <div class="d-flex flex-wrap align-items-center logo_header_mobile">
                <?php if ($deviceType == 'mobile') { ?>
                    <a class="header_logo" href=""><img onerror="this.src='<?= THUMBS ?>/0x100x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo_mobile['photo'] ?>" /></a>
                <?php } else { ?>
                    <a class="header_logo" href=""><img onerror="this.src='<?= THUMBS ?>/0x100x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>
                <?php } ?>

                <div class="frm_timkiem frm_timkiem_des">
                    <input type="text" class="input" id="keyword2" placeholder="<?= timkiem ?>" onkeypress="doEnter(event,'keyword2');">
                    <button type="submit" value="" class="btnSearch" onclick="onSearch('keyword2');">
                        <img src="./assets/images/search.svg" alt="">
                    </button>
                    <div class="suggesstion-box suggesstion-box-menu"></div>
                </div>
                <div class="all_thongtin all_thongtin_des">
                    <?php if ($_SESSION[$login_member]['active']) { ?>
                        <div class="all_thongtin_giohang">
                            <a href="account/tongquan">
                                <div class="giohang">
                                    <img src="./assets/images/nguodung.png" alt="" width="20px" height="20px">
                                </div>
                            </a>
                            <div class="thongtin_giohang">
                                <ul>
                                    <!-- <li><a href="account/dang-ky"><i class="fas fa-retweet"></i><?= dangky ?></a></li> -->
                                    <li><a href="account/tongquan"> <i class="fas fa-sign-in-alt"></i> <?= taikhoan ?></a></li>
                                    <!-- </?php if ($_SESSION[$login_member]['user_id'] != '') { ?>
                                        <li><a href="account/dang-xuat" onclick="FBLogout()"><i class="fas fa-sign-out-alt"></i><?= dangxuat ?></a></li>
                                    </?php } else { ?>
                                        <li><a href="account/dang-xuat"><i class="fas fa-sign-out-alt"></i><?= dangxuat ?></a></li>
                                    </?php } ?> -->
                                </ul>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="all_thongtin_giohang">
                            <a href="account/dang-nhap">
                                <div class="giohang">
                                    <img src="./assets/images/nguodung.png" alt="" width="20px" height="20px">
                                </div>
                            </a>
                            <div class="thongtin_giohang">
                                <ul>
                                    <!-- <li><a href="account/dang-ky"><i class="fas fa-retweet"></i><?= dangky ?></a></li> -->
                                    <li><a href="account/dang-nhap"> <i class="fas fa-sign-in-alt"></i> <?= taikhoan ?></a></li>
                                    <!-- </?php if ($_SESSION[$login_member]['user_id'] != '') { ?>
                                        <li><a href="account/dang-xuat" onclick="FBLogout()"><i class="fas fa-sign-out-alt"></i><?= dangxuat ?></a></li>
                                    </?php } else { ?>
                                        <li><a href="account/dang-xuat"><i class="fas fa-sign-out-alt"></i><?= dangxuat ?></a></li>
                                    </?php } ?> -->
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="all_thongtin_giohang">
                        <a href="gio-hang">
                            <div class="giohang">
                                <img src="./assets/images/giohang.png" alt="" width="20px" height="20px">
                                <?php if (isset($_SESSION['cart'])) { ?>
                                    <span class="count-cart"><?= count($_SESSION['cart']) ?></span>
                                <?php } ?>
                            </div>
                        </a>
                        <div class="thongtin_giohang">
                            <ul>
                                <li><a href="gio-hang"><i class="fas fa-shopping-cart"></i><?= giohang ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <?php if ($_SESSION[$login_member]['active']) { ?>
                        <div class="all_thongtin_giohang">
                            <a href="account/donhang">
                                <div class="giohang">
                                    <img src="./assets/images/donhang.png" alt="" width="20px" height="20px">
                                </div>
                            </a>
                            <div class="thongtin_giohang">
                                <ul>
                                    <li><a href="account/donhang"><i class="fas fa-luggage-cart"></i><?= $lang == 'vi' ? 'Đơn đặt hàng' : 'Order' ?></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php } else {
                        $session = session_id();
                        $order_dn = $d->rawQuery("select * from #_order where session_id = '" . $session . "'");
                    ?>
                        <div class="all_thongtin_giohang">
                            <a href="account/donhang">
                                <div class="giohang">
                                    <img src="./assets/images/donhang.png" alt="" width="20px" height="20px">
                                </div>
                            </a>
                            <div class="thongtin_giohang">
                                <ul>
                                    <li><a href="account/dang-nhap"><i class="fas fa-luggage-cart"></i><?= $lang == 'vi' ? 'Đơn đặt hàng' : 'Order' ?></a></li>
                                </ul>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="all_thongtin_giohang">
                        <a href="account/tracking">
                            <div class="giohang">
                                <img src="./assets/images/baohanh.png" alt="" width="20px" height="20px">
                            </div>
                        </a>
                        <div class="thongtin_giohang">
                            <ul>
                                <li><a href="account/tracking"><i class="far fa-id-card"></i><?= $lang == 'vi' ? 'Bảo hành' : 'Guarantee' ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all_thongtin all_thongtin_mobile">
                <?php if ($_SESSION[$login_member]['active']) { ?>
                    <div class="all_thongtin_giohang">
                        <a href="account/tongquan">
                            <div class="giohang">
                                <i class="fas fa-user"></i>
                                <span><?= taikhoan ?></span>
                            </div>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="all_thongtin_giohang">
                        <a href="account/dang-nhap">
                            <div class="giohang">
                                <i class="fas fa-user"></i>
                                <span><?= dangnhap ?></span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <div class="all_thongtin_giohang">
                    <a href="gio-hang">
                        <div class="giohang">
                            <i class="fas fa-shopping-bag"></i>
                            <span><?= giohang ?></span>
                        </div>
                    </a>
                </div>

                <?php if ($_SESSION[$login_member]['active']) { ?>
                    <div class="all_thongtin_giohang">
                        <a href="account/donhang">
                            <div class="giohang">
                                <i class="far fa-file-alt"></i>
                                <span><?= donhang ?></span>
                            </div>
                        </a>
                    </div>
                <?php } else {
                    $session = session_id();
                    $order_dn = $d->rawQuery("select * from #_order where session_id = '" . $session . "'");
                ?>
                    <div class="all_thongtin_giohang">
                        <a href="account/donhang">
                            <div class="giohang">
                                <i class="far fa-file-alt"></i>
                                <span><?= donhang ?></span>
                            </div>
                        </a>
                    </div>
                <?php } ?>

                <div class="all_thongtin_giohang">
                    <a href="account/tracking">
                        <div class="giohang">
                            <i class="fas fa-file-contract"></i>
                            <span><?= $lang == 'vi' ? 'Bảo hành' : 'Guarantee' ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="all_slogan_iner_top_mobile">
                <div class="innerTopLeft_mobile">
                    <div class="menu_mobi align-self-center">
                        <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>
                        <p class="menu_baophu"></p>
                        <a href="" class="home_mobi">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="menu_mobi_add"></div>
                    <div class="frm_timkiem frm_timkiem_mobile">
                        <input type="text" class="input" id="keyword3" placeholder="<?= timkiem ?>" onkeypress="doEnter(event,'keyword3');">
                        <button type="submit" value="" class="btnSearch" onclick="onSearch('keyword3');">
                            <img src="./assets/images/search.svg" alt="">
                        </button>
                    </div>
                </div>
                <div class="header-height slogan_header_mobile">
                    <div class="owl-carousel owl-theme auto_slogan">
                        <?php foreach ($slogan as $v) { ?>
                            <div class="innerTopCenter ">
                                <span><?= $v['ten' . $lang] ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-height slogan_header_des header_an">
            <div class="owl-carousel owl-theme auto_slogan">
                <?php foreach ($slogan as $v) { ?>
                    <div class="innerTopCenter">
                        <span><?= $v['ten' . $lang] ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="all_search_border all_search_border_des">
            <div class="all_search">

                <div class="select_tong select_loaisanpham">
                    <div class="option_select">
                        <span>
                            <?= $lang == 'vi' ? 'Loại Sản Phẩm' : 'CATALOG ' ?>
                        </span>
                        <i class="fas fa-sort-down"></i>
                    </div>

                    <ul class="results__options results__options__danhmuc">
                        <!-- <li class="double_click" data-duongdan="catalogue" data-id="0"><?= $lang == 'vi' ? 'Loại sản phẩm' : 'CATALOG' ?></li> -->
                        <?php foreach ($nhomdanhmuc_menu as $n) {
                            if ($lang == 'vi') {
                                $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $n['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC", array('san-pham'));
                            } else {
                                $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $n['id'] . "' and hienthi > 0 and noibat > 0 order by tenen ASC", array('san-pham'));
                            }
                        ?>
                            <li>
                                <a href="<?= $n['tenkhongdauvi'] ?>"><span><?= $n['ten' . $lang] ?></span></a>
                                <ul>
                                    <?php foreach ($sp_list_ndm as $v) { ?>
                                        <li class="double_click_ndm" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php
                        if ($lang == 'vi') {
                            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC", array('san-pham'));
                        } else {
                            $sp_list_ndm = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenen ASC", array('san-pham'));
                        }
                        $col_danhmuc = ceil(count($sp_list_ndm) / 6);
                        ?>
                        <?php $j = 0;
                        // for ($i = 0; $i < $col_danhmuc; $i++) {
                        //     if ($lang == 'vi') {
                        //         $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC  limit $j,6", array('san-pham'));
                        //     } else {
                        //         $danhmuc_moi = $d->rawQuery("select * from #_product_list where type = ? and id_nhomdanhmuc = '" . $nhomdanhmuc_menu2['id'] . "' and hienthi > 0 and noibat > 0 order by tenvi ASC  limit $j,6", array('san-pham'));
                        //     }
                        //     $j += 6;
                        ?>
                        <li class="phu-kien phu-kien-<?= $i ?>">
                            <span><?= $nhomdanhmuc_menu2['ten' . $lang] ?></span>
                            <ul>
                                <?php foreach ($sp_list_ndm as $v) { ?>
                                    <li class="double_click_ndm" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <!-- </?php } ?> -->
                    </ul>
                </div>

                <div class="select_tong select_thuonghieusanpham">
                    <div class="option_select">
                        <span>
                            <?= $lang == 'vi' ? 'Thương Hiệu Sản Phẩm' : 'BRAND' ?>
                        </span>
                        <i class="fas fa-sort-down"></i>
                    </div>

                    <ul class="results__options results__options_li ul_select_thuonghieusanpham">
                        <li class="double_click" data-duongdan="brand" data-id="0" data-idlist="0"><?= $lang == 'vi' ? 'Thương hiệu sản phẩm' : 'BRAND' ?></li>
                        <?php foreach ($brand_order as $v) { ?>
                            <li class="double_click" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>" data-idlist="<?= $v['id_list'] ?>"><?= $v['ten' . $lang] ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="select_tong select_thuonghieuxe">
                    <div class="option_select">
                        <span>
                            <?= $lang == 'vi' ? 'Thương Hiệu Xe' : 'BIKE' ?>
                        </span>
                        <i class="fas fa-sort-down"></i>
                    </div>

                    <ul class="results__options results__options_li">
                        <li class="double_click" data-duongdan="vehicles" data-id="0"><?= $lang == 'vi' ? 'Thương hiệu xe' : 'BIKE' ?></li>
                        <?php foreach ($thuonghieuxe_order as $v) { ?>
                            <li class="double_click" data-duongdan="<?= $v['tenkhongdauvi'] ?>" data-id="<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="select_tong select_tenxe">
                    <!-- <option selected value="0"><?= $lang == 'vi' ? 'Tên xe' : 'MODEL YEAR' ?></option> -->
                    <div class="option_select">
                        <span>
                            <?= $lang == 'vi' ? 'Tên Xe' : 'MODEL YEAR' ?>
                        </span>
                        <i class="fas fa-sort-down"></i>
                    </div>
                    <ul class="results__options results__options_li">
                        <li class="double_click" data-duongdan="vehicles" data-id="0"><?= $lang == 'vi' ? 'Tên xe' : 'MODEL YEAR' ?></li>
                    </ul>
                </div>

                <div class="btn_search_sp">
                    <button type="submit" value="" class="search_sp" onclick="onSearchsp();">
                        <!-- <img src="./assets/images/search_white.png" alt=""> -->
                        <div><?= timkiem ?></div>
                    </button>
                    <input type="reset" class="btn_nhaplai reset" value="<?= nhaplai ?>" />
                </div>
            </div>
        </div>

    </div>
</div>