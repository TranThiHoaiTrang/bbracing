<?php
	include "ajax_config.php";
    $idkhuyenmai = $_POST['idkhuyenmai'];
    
    // var_dump("update #_product set id_khuyenmai = ''  where id_khuyenmai  REGEXP '($idkhuyenmai)$'");
    $d->rawQuery("update #_product set id_khuyenmai = null  where id_khuyenmai  REGEXP '($idkhuyenmai)$'");