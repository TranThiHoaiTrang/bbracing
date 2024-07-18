<div id="background-banner" class="mb-5">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <!-- <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
</div>
<?php
$iduser = $_SESSION[$login_member]['id'];
$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));

$cap_daily = $d->rawQueryOne("select * from #_member_vip where id = ? limit 0,1", array($row_detail['id_vip']));

$congnodadung = 0;
$order = $d->rawQuery("select * from table_order where id_user = " . $iduser . " and httt = 'congno'");
foreach ($order as $v) {
    $congnodadung += $v['tonggia'];
}

$congnoconlai = $cap_daily['congno'] - $congnodadung;

$donhangcongno_som = $d->rawQueryOne("select Min(id) from table_order where id_user = " . $iduser . " and httt = 'congno'");
$ngaycongno = $d->rawQueryOne("select * from table_order where id = " . $donhangcongno_som['Min(id)'] . "");

$startTime_h = date("H ", $ngaycongno['ngaytao']);
$startTime_i = date("i ", $ngaycongno['ngaytao']);
$startTime_s = date("s ", $ngaycongno['ngaytao']);
$startTime_d = date("d ", $ngaycongno['ngaytao']);
$startTime_m = date("m ", $ngaycongno['ngaytao']);
$startTime_y = date("Y ", $ngaycongno['ngaytao']);
// $thoigiancongno = date('d/m/Y ', strtotime(
//     '+' . $cap_daily['thoigian_congno'] . ' day',
//     strtotime($startTime)
// ));
$thoigiancongno = mktime($startTime_h, $startTime_i, $startTime_s, $startTime_m, ($startTime_d + $cap_daily['thoigian_congno']), $startTime_y);


$today = date("d/m/Y");
$thoigiancongno = date("d/m/Y", $thoigiancongno);

$tg_conlai = $thoigiancongno - $today;

?>
<div class="fixwidth">
    <div class="all_congno">
        <div class="row">
            <div class="col-md-3">
                <div class="name_thongtin"><?= thongtincanhan ?> <?= $_SESSION[$login_member]['ten'] ?></div>
                <div class="all_thongtin_donhang">
                    <a class="iqonic-list-link iqonic-sub-card <?= $title_crumb == capnhatthongtin ? 'active' : '' ?>" href="account/thong-tin">
                        <div class="media align-items-center">
                            <div class="right-icon">
                                <i aria-hidden="true" class="iqonic-user-list-icon far fa-user"></i>
                            </div>
                            <div class="media-body ml-3">
                                <span class="iqonic-menu-title m-0">
                                    <?= thongtincanhan ?> </span>
                            </div>
                        </div>
                    </a>
                    <?php $donhang = $lang == 'vi' ? 'Thông tin đơn hàng' : 'Information line'; ?>
                    <a class="iqonic-list-link iqonic-sub-card <?= $title_crumb == $donhang ? 'active' : '' ?>" href="account/donhang">
                        <div class="media align-items-center">
                            <div class="right-icon">
                                <i aria-hidden="true" class="iqonic-user-list-icon fas fa-barcode"></i>
                            </div>
                            <div class="media-body ml-3">
                                <span class="iqonic-menu-title m-0">
                                    <?= donhang ?> </span>
                            </div>
                        </div>
                    </a>
                    <?php $congno = $lang == 'vi' ? 'Công nợ' : 'Debt'; ?>
                    <a class="iqonic-list-link iqonic-sub-card <?= $title_crumb == $congno ? 'active' : '' ?>" href="account/congno">
                        <div class="media align-items-center">
                            <div class="right-icon">
                                <i aria-hidden="true" class="iqonic-user-list-icon fas fa-barcode"></i>
                            </div>
                            <div class="media-body ml-3">
                                <span class="iqonic-menu-title m-0">
                                    <?= $lang == 'vi' ? 'Công nợ' : 'Debt' ?> </span>
                            </div>
                        </div>
                    </a>
                    <?php if ($_SESSION[$login_member]['user_id'] != '') { ?>
                        <a class="iqonic-list-link iqonic-sub-card" onclick="FBLogout()" href="account/dang-xuat">
                            <div class="media align-items-center">
                                <div class="right-icon">
                                    <i aria-hidden="true" class="iqonic-user-list-icon fas fa-sign-out-alt"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <span class="iqonic-menu-title m-0">
                                        <?= dangxuat ?> </span>
                                </div>
                            </div>
                        </a>
                    <?php } else {  ?>
                        <a class="iqonic-list-link iqonic-sub-card" href="account/dang-xuat">
                            <div class="media align-items-center">
                                <div class="right-icon">
                                    <i aria-hidden="true" class="iqonic-user-list-icon fas fa-sign-out-alt"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <span class="iqonic-menu-title m-0">
                                        <?= dangxuat ?> </span>
                                </div>
                            </div>
                        </a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Tên đại lý' : 'Agent name' ?>: </span>
                            <strong><?= $row_detail['ten'] ?></strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Thông tin cấp đại lý' : 'Dealer level information' ?>: </span>
                            <strong><?= $cap_daily['ten'] ?></strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Thời hạn xử lí công nợ' : 'Debt processing time limit' ?>: </span>
                            <?php if (!empty($ngaycongno)) { ?>
                                <?php if ($tg_conlai > 0) { ?>
                                    <strong><?= $date_time = $thoigiancongno ?></strong><br>
                                    <strong><?= $lang == 'vi' ? 'Thời gian còn lại' : 'Time remaining' ?>: <?= $tg_conlai ?> <?= $lang == 'vi' ? 'ngày' : 'Day' ?></strong>
                                <?php } else { ?>
                                    <strong style="color: #f00;"><?= $lang == 'vi' ? 'Quá thời hạn thanh toán' : 'Payment deadline exceeded' ?> </strong>
                                <?php } ?>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Tổng công nợ' : 'Total debt' ?>: </span>
                            <strong><?= $func->format_money($cap_daily['congno']) ?></strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Công nợ đã dùng' : 'Used debt' ?>: </span>
                            <strong><?= $func->format_money($congnodadung) ?></strong>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title_congno">
                            <span><?= $lang == 'vi' ? 'Công nợ còn lại (Chưa dùng)' : 'Remaining debt (Unused)' ?>: </span>
                            <strong><?= $func->format_money($congnoconlai) ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>