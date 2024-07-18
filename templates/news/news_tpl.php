<?php
$backgroud = UPLOAD_NEWS_L . $news_list['photo'];
$tintuc_list = $d->rawQuery("select * from #_news_list where type = ? and hienthi > 0 order by stt,id desc ", array('tintuc'));
?>
<div class="all_banner">
    <div class="fixwidth">
        <div id="background-banner" class="mb-2" style="background: url(<?= $backgroud ?>)  no-repeat center;background-size: cover;">
            <div class="all_noidung_banner">
                <?= htmlspecialchars_decode($noidung_page) ?>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="idlist" class="idlist" value="<?= $idl ?>">
<input type="hidden" name="type" class="type" value="<?= $type ?>">
<div class="fixwidth">
    <?php if ($idl == '48') { ?>
        <div class="all_news_sukien">
            <?php foreach ($news as $k => $v) { ?>
                <div class="event">
                    <div class="img_event">
                        <a href="<?= $v['tenkhongdauvi'] ?>">
                            <img src="<?= THUMBS ?>/800x325x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" width="600" height="244">
                        </a>
                    </div>
                    <div class="content_event" style="opacity: 1;">
                        <div class="name_event_news"><?= $v['ten' . $lang] ?></div>
                        <div class="motangan_event_news"><?= htmlspecialchars_decode($v['motangan' . $lang]) ?></div>
                        <div class="mota_event_news"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                        <a href="<?= $v['tenkhongdauvi'] ?>">
                            <div class="xemthem_sp">
                                <span>Xem thêm</span>
                                <img src="./assets/images/right.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="all_sp_row all_new_ct">
            <div class="col_sp_1">
                <div class="all_fillter">
                    <div class="all_hide_fillter">
                        <div class="hide_search_news">
                            <!-- <span> </span> -->
                            <input type="text" class="filter_news" placeholder="<?= $lang == 'vi' ? 'Ẩn bộ lọc' : 'Hide fillter' ?>" value="">
                            <div class="icon_danhmuc">
                                <i class="fas fa-minus"></i>
                            </div>
                        </div>
                        <div class="all_fillter_danhmuc">
                            <?php if ($idl == '49') { ?>
                                <div class="all_brand_sp">
                                    <?php foreach ($brand as $b) { ?>
                                        <div class="title_brand brand_news" data-idbrand="<?= $b['id'] ?>">
                                            <span><?= $b['ten' . $lang] ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="all_brand_sp">
                                    <?php foreach ($tintuc_list as $b) { ?>
                                        <a href="<?= $b['tenkhongdauvi'] ?>">
                                            <div class="title_brand">
                                                <span><?= $b['ten' . $lang] ?></span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_sp_3">
                <div class="all_phantrang_show">
                    <div class="all_danhmuc_phantrang">
                        <div class="all_bread">
                            <div class="breadCrumbs">
                                <div><?= $breadcrumbs ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="boloc_date_tintuc" style="z-index: 2;">
                        <input class="date_tintuc" placeholder="Chọn ngày ... " id="date_tintuc" name="date_tintuc" value="<?= (isset($_GET['date_tintuc'])) ? $_GET['date_tintuc'] : '' ?>" />
                    </div>
                </div>
                <div class="content-main w-clear all_search_news">
                    <?php if (count($news) > 0) { ?>
                        <div class="content-main w-clear  ">
                            <?php foreach ($news as $k => $v) { ?>

                                <div class="tintuc_news">
                                    <div class="img_tintuc_news">
                                        <a href="<?= $v['tenkhongdauvi'] ?>">
                                            <img src="<?= THUMBS ?>/660x478x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="" width="330" height="239">
                                        </a>
                                    </div>
                                    <div class="content_news">
                                        <a href="<?= $v['tenkhongdauvi'] ?>">
                                            <div class="name_news"><?= $v['ten' . $lang] ?></div>
                                        </a>
                                        <div class="time_tintuc">
                                            <span><?= date("d M Y", $v['ngaytao']) ?></span>
                                        </div>
                                        <div class="mota_news"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                        <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            <strong><?= khongtimthayketqua ?></strong>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col_sp_1">
                <div class="col_loc_news">
                    <div class="outerSort">
                        <div class="borderFilterMobile option browse-tags">
                            <span class="custom-dropdown custom-dropdown--grey">
                                <select class="sort-by orderby_news custom-dropdown__select">
                                    <option value="moinhat"><?= $lang == 'vi' ? 'Sắp xếp theo mới nhất' : 'Sort by newest' ?></option>
                                    <option value="cunhat"><?= $lang == 'vi' ? 'Sắp xếp theo cũ nhất' : 'Sort by oldest' ?></option>
                                    <option value="">Reset </option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                $sp_lk =  $d->rawQuery("select * from #_news where type = ? and id_list = '48' and noibat > 0 and hienthi > 0 order by stt,id desc ", array('tintuc'));
                $sp_tuyendung =  $d->rawQuery("select * from #_news where type = ? and id_list = '47' and noibat > 0 and hienthi > 0 order by stt,id desc ", array('tintuc'));
                ?>
                <div class="all_fillter">
                    <div class="all_hide_fillter hide_fillter_news">
                        <div class="hide_fillter ">
                            <span><?= $lang == 'vi' ? 'Sự kiện giải đua' : 'Racing event' ?></span>
                            <div class="icon_danhmuc">
                                <i class="fas fa-minus"></i>
                            </div>
                        </div>
                        <?php foreach ($sp_lk as $b) { ?>
                            <a href="su-kien">
                                <div class="all_fillter_danhmuc danhmuc_giaidua">
                                    <div class="all_brand_sp">
                                        <div class="img_giaidua">
                                            <img src="<?= THUMBS ?>/660x478x1/<?= UPLOAD_NEWS_L . $b['photo'] ?>" alt="" width="330" height="239">
                                        </div>
                                        <div class="title_brand_news">
                                            <span><?= $b['ten' . $lang] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($idl == '49') { ?>
                    <div class="all_fillter">
                        <div class="all_hide_fillter hide_fillter_news">
                            <div class="hide_fillter ">
                                <span><?= $lang == 'vi' ? 'Tuyển dụng' : 'Recruitment' ?> </span>
                                <div class="icon_danhmuc">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>
                            <?php foreach ($sp_tuyendung as $b) { ?>
                                <a href="tuyen-dung">
                                    <div class="all_fillter_danhmuc danhmuc_giaidua">
                                        <div class="all_brand_sp">
                                            <div class="img_giaidua">
                                                <img src="<?= THUMBS ?>/660x478x1/<?= UPLOAD_NEWS_L . $b['photo'] ?>" alt="" width="330" height="239">
                                            </div>
                                            <div class="title_brand_news">
                                                <span><?= $b['ten' . $lang] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>