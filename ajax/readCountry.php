<?php
include "ajax_config.php";

if (!empty($_POST["keyword"])) {
    $tukhoa = htmlspecialchars($_POST['keyword']);
    // $tukhoa = $func->url_title($tukhoa, ' ');

    $product_test = $d->rawQuery("select * from #_product where  masp = '$tukhoa' order by stt,id desc ");

    if ($product_test) {
        $where .= "  masp = '$tukhoa'";
    } else {
        $where = ' ( 1=1';
        $tukhoa_sp = preg_split("/[\s,-]+/", $tukhoa);

        if ($lang == 'vi') {
            foreach ($tukhoa_sp as $k) {
                $tk_m = str_split($k, 4);
                // $all_tk = implode('|',$tk_m);
                // var_dump($tukhoa_sp);
                $where .= " and (tenvi LIKE CONCAT('%', '" . $k . "', '%'))";
                // foreach($tk_m as $tk){
                //     // var_dump($tk);
                //     $where .= " and (slugvi LIKE CONCAT('%', '" . $tk . "', '%'))";
                //     // $where .= " and (slugvi LIKE '%$tk%' or slugen LIKE '%$tk%')";
                // }

            }
        } else {
            foreach ($tukhoa_sp as $k) {
                $tk_m = str_split($k, 4);
                // $all_tk = implode('|',$tk_m);
                // var_dump($all_tk);
                $where .= " and (tenen LIKE CONCAT('%', '" . $k . "', '%'))";
                // foreach($tk_m as $tk){
                //     // var_dump($tk);
                //     $where .= " and (slugen LIKE CONCAT('%', '" . $tk . "', '%'))";
                //     // $where .= " and (slugvi LIKE '%$tk%' or slugen LIKE '%$tk%')";
                // }

            }
        }

        $where .= ')';
    }


    // $where .= " or slugvi LIKE '%$tukhoa%' or slugen LIKE '%$tukhoa%'";
    // var_dump($where);
    $data = $d->rawQuery("select * from #_product where type = 'san-pham' and $where ");
    // var_dump("select * from #_product where masp LIKE '%$tukhoa%' $where and type = 'san-pham'");

    if (!empty($data)) { ?>
        <ul id="country-list">
            <?php
            foreach ($data as $v) {
            ?>
                <li class="country_sanpham">
                    <a href="<?= $v['tenkhongdauvi'] ?>">
                        <!-- <img src="<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>"> -->
                        <span><?= $v['ten' . $lang] ?></span>
                    </a>
                </li>
            <?php
            } // end for
            ?>
        </ul>
<?php
    } // end if not empty
}
?>