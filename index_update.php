<?php
    session_start();
    define('LIBRARIES','./libraries/');
    define('SOURCES','./sources/');
    define('LAYOUT','layout/');
    define('THUMBS','thumbs');
    define('WATERMARK','watermark');

    /* Config */
    require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $injection = new AntiSQLInjection();
    $d = new PDODb($config['database']);
    $seo = new Seo($d);
    $emailer = new Email($d);
    $router = new AltoRouter();
    $cache = new FileCache($d);
    $func = new Functions($d);
    $breadcr = new BreadCrumbs($d);
    $statistic = new Statistic($d, $cache);
    $cart = new Cart($d);
    $detect = new MobileDetect();
    $addons = new AddonsOnline();
    $css = new CssMinify($config['website']['debug-css'], $func);
    $js = new JsMinify($config['website']['debug-js'], $func);

// $d->rawQuery("update #_contact set ten = 'Trang1' where id = '334'");
$pro = $d->rawQuery("select tenkhongdauvi,tenkhongdauen,id from #_product where type = 'san-pham' order by stt,id desc");
foreach($pro as $v){
    $tenkhongdauvi = str_replace('-', '', $v['tenkhongdauvi']);
    $tenkhongdauen = str_replace('-', '', $v['tenkhongdauen']);
    // $tenkhongdauvi = json_encode(explode('-', $v['tenkhongdauvi']));
    // $tenkhongdauen = json_encode(explode('-', $v['tenkhongdauen']));

    $d->rawQuery("update #_product set slugvi = '$tenkhongdauvi',slugen = '$tenkhongdauen' where id = '".$v['id']."'");
}