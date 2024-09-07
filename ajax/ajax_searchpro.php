<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = 28;
$eShow = '.all_sp_search';


$catpro = (isset($_POST['catpro']) && $_POST['catpro'] > 0) ? htmlspecialchars($_POST['catpro']) : 0;
$dodaylistpro = (isset($_POST['dodaylistpro']) && $_POST['dodaylistpro'] > 0) ? htmlspecialchars($_POST['dodaylistpro']) : 0;

// var_dump($_POST['idbrand_list']);
if ($_POST['idbrand_list']) {
    $idbrand_list = (isset($_POST['idbrand_list']) && $_POST['idbrand_list'] > 0) ? htmlspecialchars($_POST['idbrand_list']) : 0;
} else {
    $brandpro = (isset($_POST['brandpro']) && $_POST['brandpro'] > 0) ? htmlspecialchars($_POST['brandpro']) : 0;
}

if ($_POST['idlist_list']) {
    $idlist_list = (isset($_POST['idlist_list']) && $_POST['idlist_list'] > 0) ? htmlspecialchars($_POST['idlist_list']) : 0;
} else {
    $listpr = (isset($_POST['listpr']) && $_POST['listpr'] > 0) ? htmlspecialchars($_POST['listpr']) : 0;
}

if ($_POST['vehicles_list']) {
    $vehicles_list = (isset($_POST['vehicles_list']) && $_POST['vehicles_list'] > 0) ? htmlspecialchars($_POST['vehicles_list']) : 0;
} else {
    $dodaypro = (isset($_POST['dodaypro']) && $_POST['dodaypro'] > 0) ? htmlspecialchars($_POST['dodaypro']) : 0;
}


$com_pr = $_POST['com'];
$order_pr = $_POST['orderby'];
$p_pro = $_POST['p'];

if ($_GET['p']) {
    $p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
} elseif ($p_pro) {
    $p = $p_pro;
} else {
    $p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
}

$idl_p = $_GET['idl'];
$idc_p = $_GET['idc'];
$idb_p = $_GET['idb'];
$idd_p = $_GET['idd'];
$idbl_p = $_GET['idbrl'];
$idll_p = $_GET['idll'];
$iddl_p = $_GET['iddl'];
$idodaylist_p = $_GET['idodaylist'];
$order_p = $_GET['order'];
$com_p = $_GET['com'];

if ($listpr) {
    $per .= "&idl=$listpr";
}
if ($catpro) {
    $per .= "&idodaylist=$catpro";
}
if ($dodaylistpro) {
    $per .= "&idc=$dodaylistpro";
}
if ($brandpro) {
    $per .= "&idb=$brandpro";
}
if ($dodaypro) {
    $per .= "&idd=$dodaypro";
}
if ($idbrand_list) {
    $per .= "&idbrl=$idbrand_list";
}
if ($idlist_list) {
    $per .= "&idll=$idlist_list";
}
if ($vehicles_list) {
    $per .= "&iddl=$vehicles_list";
}
if ($idl_p) {
    $per .= "&idl=$idl_p";
}
if ($idc_p) {
    $per .= "&idc=$idc_p";
}
if ($idodaylist_p) {
    $per .= "&idodaylist=$idodaylist_p";
}
if ($idb_p) {
    $per .= "&idb=$idb_p";
}
if ($idd_p) {
    $per .= "&idd=$idd_p";
}
if ($idbl_p) {
    $per .= "&idbrl=$idbl_p";
}
if ($idll_p) {
    $per .= "&idll=$idll_p";
}
if ($iddl_p) {
    $per .= "&iddl=$iddl_p";
}
if ($order_pr) {
    $per .= "&order=$order_pr";
}
if ($order_p) {
    $per .= "&order=$order_p";
}
if ($com_pr) {
    $per .= "&com=$com_pr";
}
if ($com_p) {
    $per .= "&com=$com_p";
}

$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_searchpro.php?perpage=" . $pagingAjax->perpage . $per;
$tempLink = "";
$tempLink .= "&p=";
$pageLink .= $tempLink;


if ($listpr) {
    $id_list = "and id_list = $listpr";
}
if ($catpro) {
    $id_cat = "and id_cat = $catpro";
}
if ($dodaylistpro) {
    $id_doday_list = "and id_doday_list = $dodaylistpro";
}
if ($brandpro) {
    $id_brand = "and id_brand = $brandpro";
}
if ($dodaypro) {
    $id_doday = "and id_doday = $dodaypro";
}
if ($idbrand_list) {
    $id_brand_list = "and id_brand REGEXP '" . $idbrand_list . "'";
}
if ($idlist_list) {
    $id_list_list = "and id_list REGEXP '" . $idlist_list . "'";
}
if ($vehicles_list) {
    $id_vehicles_list = "and id_doday REGEXP '" . $vehicles_list . "'";
}
if ($idl_p) {
    $id_list = "and id_list = $idl_p";
}
if ($idc_p) {
    $id_cat = "and id_cat = $idc_p";
}
if ($idb_p) {
    $id_brand = "and id_brand = $idb_p";
}
if ($idd_p) {
    $id_doday = "and id_doday = $idd_p";
}
if ($idbl_p) {
    $id_brand_list = "and id_brand REGEXP '" . $idbl_p . "'";
}
if ($idll_p) {
    $id_list_list = "and id_list REGEXP '" . $idll_p . "'";
}
if ($iddl_p) {
    $id_vehicles_list = "and id_doday REGEXP '" . $iddl_p . "'";
}
if ($idodaylist_p) {
    $id_doday_list = "and id_doday_list = $idodaylist_p";
}

if ($order_pr) {
    if ($order_pr == 'adenz') {
        if ($lang == 'vi') {
            $orderby = "ORDER BY tenvi ASC";
        } else {
            $orderby = "ORDER BY tenen ASC";
        }
    } elseif ($order_pr == 'zdena') {
        if ($lang == 'vi') {
            $orderby = "ORDER BY tenvi DESC";
        } else {
            $orderby = "ORDER BY tenen DESC";
        }
    } elseif ($order_pr == 'giathap') {
        $orderby = "ORDER BY gia ASC";
    } elseif ($order_pr == 'giacao') {
        $orderby = "ORDER BY gia DESC";
    } else {
        // if ($lang == 'vi') {
        //     $orderby = "ORDER BY tenvi ASC";
        // } else {
        //     $orderby = "ORDER BY tenen ASC";
        // }
        $orderby = 'order by stt,id desc';
    }
} elseif ($order_p) {
    if ($order_p == 'adenz') {
        if ($lang == 'vi') {
            $orderby = "ORDER BY tenvi ASC";
        } else {
            $orderby = "ORDER BY tenen ASC";
        }
    } elseif ($order_p == 'zdena') {
        if ($lang == 'vi') {
            $orderby = "ORDER BY tenvi DESC";
        } else {
            $orderby = "ORDER BY tenen DESC";
        }
    } elseif ($order_p == 'giathap') {
        $orderby = "ORDER BY gia ASC";
    } elseif ($order_p == 'giacao') {
        $orderby = "ORDER BY gia DESC";
    } else {
        // if ($lang == 'vi') {
        //     $orderby = "ORDER BY tenvi ASC";
        // } else {
        //     $orderby = "ORDER BY tenen ASC";
        // }
        $orderby = 'order by stt,id desc';
    }
}

if($com_pr == 'san-pham-khuyenmai'){
    if ($lang == 'vi') {
        $com .= " and giamoi > 0";
    } else {
        $com .= " and giadomoi > 0";
    }
}
if($com_p == 'san-pham-khuyenmai'){
    if ($lang == 'vi') {
        $com .= " and giamoi > 0";
    } else {
        $com .= " and giadomoi > 0";
    }
}
// var_dump("select * from #_product where type = 'san-pham' and hienthi > 0 $id_brand $id_brand_list $id_list_list $id_doday $id_vehicles_list $id_doday_list $id_list $id_cat $orderby");
$sql = "select * from #_product where type = 'san-pham' and hienthi > 0 $com $id_brand $id_brand_list $id_list_list $id_doday $id_vehicles_list $id_doday_list $id_list $id_cat $orderby";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$product = $d->rawQuery($sqlCache);

var_dump($sql);
/* Count all data */
$countItems = count($d->rawQuery($sql));
/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);

$sanpham = $d->rawQuery("select * from #_product where type = 'san-pham' and hienthi > 0 $com $id_brand $id_brand_list $id_list_list $id_vehicles_list $id_doday_list $id_doday $id_list $id_cat order by stt,id desc");

// $arr_rong = [];
// var_dump($order_pr);
// var_dump(count($product));

?>

<?php if (!empty($product)) { ?>
    <div class="load_product mainkhung_product ">
        <?php foreach ($product as $k => $v) {
            $brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $v['id_brand']));
        ?>
            <div class="sanpham_moi_all">
                <div class="img_sp_moi">
                    <a href="<?= $v['tenkhongdau'.$lang] ?>">
                        <img width="300" height="197" data-sizes="auto" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" data-src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="" sizes="308px">
                        <?php if ($v['id_khuyenmai']) { ?>
                            <img class="plabel_img" src="<?= UPLOAD_NEWS_L . $khuyenmai_sanpham_one['icon'] ?>" style="max-height: 80px; max-width: 80px; background: transparent; vertical-align: middle;position: absolute;left: 0px;top: 0px;">
                        <?php } ?>
                    </a>
                </div>
                <div class="all_content_sp_moi">
                    <div class="top_all_content_sp_moi">
                        <div class="brand_sp"><?= $brand_sp['ten' . $lang] ?></div>
                        <a href="<?= $v['tenkhongdau'.$lang] ?>">
                            <div class="name_sp_moi text-split"><?= $v['ten' . $lang] ?></div>
                        </a>
                    </div>
                    <div class="bottom_all_content_sp_moi">
                        <div class="masp_pro">
                            <span>P/N:</span>
                            <span><?= $v['masp'] ?></span>
                            <?php if ($v['cothemua'] <= 0) { ?>
                                <span class="hethang_sp"><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                            <?php } elseif ($v['soluongkho'] <= 0) { ?>
                                <span class="hethang_sp"><?= $lang == 'vi' ? 'Hết hàng' : 'Out of stock' ?></span>
                            <?php } ?>
                        </div>
                        <div class="all_gia_giohang">
                            <div class="all_gia_spmoi">
                                <?= $func->chuyendoitigia($v) ?>
                            </div>
                            <div class="giohang_sp">
                                <input type="hidden" name="cannang" class="cannang" value="<?= $v['cannang'] ?>">
                                <input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $v['kichthuoc'] ?>">
                                <input type="hidden" name="color_detail" class="color_detail" value="<?= $v['id_mau'] ?>">
                                <?php if ($v['soluongkho'] <= 0) { ?>
                                    <?php if ($v['cothemua'] <= 0) { ?>
                                        <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                            <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                            <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                        </a>
                                    <?php } else { ?>
                                        <?php if ($lang == 'vi') { ?>
                                            <?php if ($v['gia'] <= 0) { ?>
                                                <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                    <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                    <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                </a>
                                            <?php } else { ?>
                                                <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                                    <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                </a>
                                            <?php } ?>

                                        <?php } else { ?>
                                            <?php if ($v['giado'] <= 0) { ?>
                                                <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                    <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                    <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                                </a>
                                            <?php } else { ?>
                                                <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                                    <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                                </a>
                                            <?php } ?>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if ($lang == 'vi') { ?>
                                        <?php if ($v['gia'] <= 0) { ?>
                                            <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                            </a>
                                        <?php } else { ?>
                                            <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                <!-- <i class="fas fa-shopping-cart"></i> -->
                                                <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                            </a>
                                        <?php } ?>

                                    <?php } else { ?>
                                        <?php if ($v['giado'] <= 0) { ?>
                                            <a href="<?= $config_base ?>" onclick="event.preventDefault();" class="muangay1">
                                                <!-- <i class="fas fa-shopping-cart cart_hethang"></i> -->
                                                <img src="./assets/images/cart_pro_het.svg" width="16" alt="">
                                            </a>
                                        <?php } else { ?>
                                            <a data-toggle="modal" class="muangay1 addcart" data-action="addnow" data-lang="<?= $lang ?>" data-id_vip="<?= $_SESSION[$login_member]['id_vip'] ?>" data-tigia="<?= $optsetting['tigia'] ?>" data-id="<?= $v['id'] ?>" href="#popup-detail">
                                                <!-- <i class="fas fa-shopping-cart"></i> -->
                                                <img src="./assets/images/cart_pro.svg" width="16" alt="">
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
    <div class="paging_ajax">
        <?= $pagingItems ?>
    </div>
<?php } else { ?>
    <div class="alert alert-warning" role="alert">
        <strong><?= khongtimthayketqua ?></strong>
    </div>
<?php } ?>

<!-- </div> -->