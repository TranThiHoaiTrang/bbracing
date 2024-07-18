<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="home_title">GÓI CƯỚC 4G MỚI NHẤT</div>
        <div class="loadkhung_product1">
            <?php foreach($product as $v) {?>
            <div class="item__product">
                <div class="pack__img">
                    <img src="./assets/images/img__pack.png" alt="Images" width="50px" height="54px">
                </div>
                <div class="pack_intro">
                    <div class="pack__name pack__name_<?=$v['id']?>" data-name="<?= $v['ten'.$lang] ?>">
                        <?= $v['ten'.$lang] ?>
                    </div>
                    <div class="pack_mota pack_mota_<?=$v['id']?>" data-name="<?=$v['motangan'.$lang]?>"><?=$v['motangan'.$lang]?></div>
                    <div class="pack__desc pack__desc_<?=$v['id']?>" data-name="<?=htmlspecialchars_decode($v['mota'.$lang])?>">
                        <?=htmlspecialchars_decode($v['mota'.$lang])?>
                    </div>

                </div>
                <div class="pack__btn">
                    <a href="<?=$v['link']?>"  class="btn-pack btn-pack_173 btn-systax">
                        ĐĂNG KÝ
                    </a>
                    <button type="button" data-id="<?=$v['id']?>" class="btn-packDt btn-pack" data-toggle="modal" data-target="#exampleModalCenter">
                    Chi tiết
                    </button>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>