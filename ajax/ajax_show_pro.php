<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES."class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = 28;
$eShow = '.all_sp_search';

$catpro = (isset($_POST['catpro']) && $_POST['catpro'] > 0) ? htmlspecialchars($_POST['catpro']) : 0;
$dodaylistpro = (isset($_POST['dodaylistpro']) && $_POST['dodaylistpro'] > 0) ? htmlspecialchars($_POST['dodaylistpro']) : 0;


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

if ($listpr) {
    $per = "?idl=$listpr" . "&perpage=" . $pagingAjax->perpage;
} elseif ($catpro) {
    $per = "?idodaylist=$catpro" . "&perpage=" . $pagingAjax->perpage;
} elseif ($dodaylistpro) {
    $per = "?idc=$dodaylistpro" . "&perpage=" . $pagingAjax->perpage;
} elseif ($brandpro) {
    $per = "?idb=$brandpro" . "&perpage=" . $pagingAjax->perpage;
} elseif ($dodaypro) {
    $per = "?idd=$dodaypro" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idbrand_list) {
    $per = "?idbrl=$idbrand_list" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idlist_list) {
    $per = "?idll=$idlist_list" . "&perpage=" . $pagingAjax->perpage;
} elseif ($vehicles_list) {
    $per = "?iddl=$vehicles_list" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idl_p) {
    $per = "?idl=$idl_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idc_p) {
    $per = "?idc=$idc_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idodaylist_p) {
    $per = "?idodaylist=$idodaylist_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idb_p) {
    $per = "?idb=$idb_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idd_p) {
    $per = "?idd=$idd_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idbl_p) {
    $per = "?idbrl=$idbl_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($idll_p) {
    $per = "?idll=$idll_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($iddl_p) {
    $per = "?iddl=$iddl_p" . "&perpage=" . $pagingAjax->perpage;
} elseif ($order_pr) {
    $per = "?order=$order_pr" . "&perpage=" . $pagingAjax->perpage;
} elseif ($order_p) {
    $per = "?order=$order_p" . "&perpage=" . $pagingAjax->perpage;
} else {
    $per = "?perpage=" . $pagingAjax->perpage;
}
// var_dump($_GET['idl']);
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_searchpro.php" . $per;
$tempLink = "";
$tempLink .= "&p=";
$pageLink .= $tempLink;


if ($listpr) {
    $id_list = "and id_list = $listpr";
}
if ($catpro) {
    $id_cat = "and id_cat = $catpro";
}
if ($idodaylist) {
    $id_doday_list = "and id_doday_list = $idodaylist";
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

$sanpham = $d->rawQuery("select * from #_product where type = 'san-pham' and hienthi > 0 $id_brand $id_brand_list $id_doday $id_list $id_cat order by stt,id desc");


?>
<span><?= ceil(count($sanpham) / $pagingAjax->perpage) ?></span>

<!-- </div> -->