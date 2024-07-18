<?php
include "ajax_config.php";

$idbrand = $_POST['id_brand'];
$type = $_POST['type'];
$idlist = $_POST['idlist'];
$orderby = $_POST['orderby'];
$date_tintuc = $_POST['date_tintuc'] ?? '';

$where = '';

if ($idlist) {
    $id_list = "and id_list = " . $idlist;
}
if ($idbrand) {
    $id_brand = "and id_brand = " . $idbrand;
}

if ($orderby == 'moinhat') {
    $order = 'order by id DESC';
} elseif ($orderby == 'cunhat') {
    $order = 'order by id ASC';
} else {
    $order = 'order by stt,id desc';
}

if ($date_tintuc) {
    $date_tintuc = explode("-", $date_tintuc);
    $ngaytu = trim($date_tintuc[0]);
    $ngayden = trim($date_tintuc[1]);
    $ngaytu = strtotime(str_replace("/", "-", $ngaytu));
    $ngayden = strtotime(str_replace("/", "-", $ngayden));
    $where .= " and ngaytao<=$ngayden and ngaytao>=$ngaytu";
}

$news = $d->rawQuery("select * from #_news where type = '$type' $where $id_brand  $id_list $order");
// var_dump("select * from #_news where type = '$type' $id_brand  $id_list order by stt,id desc");
?>
<?php if ($news) { ?>
    <div class="content-main w-clear ">
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
                        <span><?= date("D m Y", $v['ngaytao']) ?></span>
                    </div>
                    <div class="mota_news"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="alert alert-warning" role="alert">
        <strong><?= khongtimthayketqua ?></strong>
    </div>
<?php } ?>