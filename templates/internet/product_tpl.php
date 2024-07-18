<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="home_title">DỊCH VỤ INTERNET</div>
        <div class="loadkhung_product3">
            <?php foreach($product as $v) {?>
            <div class="lists-slider__item">
                <div class="internet-tele"><a href="<?=$v['tenkhongdauvi']?>" class="internet-tele__images img-hover">
                        <img src="./assets/images/img-supernet.svg" alt="img">
                        <div class="internet-tele__images-info">
                            <h5 class="internet-tele__images-name pack__name_<?=$v['id']?>" data-name="<?=$v['ten'.$lang]?>">
                                <?=$v['ten'.$lang]?>
                            </h5>
                        </div>
                    </a>
                    <div class="internet-tele__intro">
                        <div class="internet-tele__thumbnail">
                            <img src="./assets/images/img-it-thumbnail.svg" alt="img">
                        </div>
                        <div class="internet-tele__capacity">
                            <span class="internet-tele__capacity-value pack_mota_<?=$v['id']?>" data-name="<?=$v['motangan'.$lang]?>">
                                <?=$v['motangan'.$lang]?>
                            </span>
                        </div>
                        <div class="internet-tele__price">
                            <span class="internet-tele__price-new internet-tele__price-new_<?=$v['id']?>"><?=$func->format_money($v['gia'])?><span>/Tháng</span></span>
                            <!---->
                        </div>
                        <div class="internet-tele__detail">
                            <ul class="internet-tele__list">
                                <li class="internet-tele__item">
                                    <span class="internet-tele__img">
                                        <img src="./assets/images/ic-it-3.svg" alt="img">
                                    </span>
                                    <span class="internet-tele__txt pack__desc_<?=$v['id']?>" data-name="<?=htmlspecialchars_decode($v['noidung'.$lang])?>"><?=htmlspecialchars_decode($func->sub_str($v['noidung'.$lang],200))?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="internet-tele__btn">
                            <button type="button" class="button button--dangky" data-id="<?=$v['id']?>" data-toggle="modal" data-target="#dangky_internet">Đăng ký</button>
                            <button type="button" data-id="<?=$v['id']?>" class="button button--normal"
                                data-toggle="modal" data-target="#exampleModalCenter">
                                Chi tiết gói cước
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>