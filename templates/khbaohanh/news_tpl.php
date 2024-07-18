<?php
$baohanh = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array('tt_baohanh'));
var_dump("aaaa");
?>
<div class="fixwidth">
    <div class="all_sp_row">
        <div class="all_phantrang_show">
            <div class="all_danhmuc_phantrang">
                <div class="all_bread">
                    <div class="breadCrumbs">
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-decoration-none" href=""><span><?= trangchu ?></span></a></li>
                                <li class="breadcrumb-item active"><a class="text-decoration-none" href="bao-hanh"><span><?= $lang == 'vi' ? 'Kích hoạt bảo hành' : 'Warranty Activation' ?></span></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="img_gioithieu">
            <img src="<?= UPLOAD_NEWS_L . $baohanh['photo'] ?>" alt="">
        </div>

        
    </div>
</div>