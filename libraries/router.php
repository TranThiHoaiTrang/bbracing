<?php
/* Check HTTP */
$func->checkHTTP($http, $config['arrayDomainSSL'], $config_base, $config_url);

/* Validate URL */
$func->checkUrl($config['website']['index']);

/* Check login */
$func->checkLogin();

/* Mobile detect */
$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
if ($deviceType == 'computer') define('TEMPLATE', './templates/');
else define('TEMPLATE', './templates/');

/* Watermark */
$wtmPro = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark', 'photo_static'));
$wtmNews = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark-news', 'photo_static'));

/* Router */
$router->setBasePath($config['database']['url']);
$router->map('GET', array('dangnhap/', 'dangnhap'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . "dangnhap/index.php");
	exit;
});
$router->map('GET', array('dangnhap', 'dangnhap'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . "dangnhap/index.php");
	exit;
});
$router->map('GET|POST', '', 'index', 'home');
$router->map('GET|POST', 'index.php', 'index', 'index');
$router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
$router->map('GET|POST', '[a:com]', 'allpage', 'show');
$router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
$router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
$router->map('GET', THUMBS . '/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func;
	$func->createThumb($w, $h, $z, $src, null, THUMBS);
}, 'thumb');
$router->map('GET', WATERMARK . '/product/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $wtmPro;
	$func->createThumb($w, $h, $z, $src, $wtmPro, "product");
}, 'watermark');
$router->map('GET', WATERMARK . '/news/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $wtmNews;
	$func->createThumb($w, $h, $z, $src, $wtmNews, "news");
}, 'watermarkNews');
$match = $router->match();
if (is_array($match)) {
	if (is_callable($match['target'])) {
		call_user_func_array($match['target'], $match['params']);
	} else {
		$com = (isset($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
		$get_page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
	}
} else {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit;
}

/* Setting */
$sqlCache = "select * from #_setting";
$setting = $cache->getCache($sqlCache, 'fetch', 7200);
$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

/* Lang */
if (isset($match['params']['lang']) && $match['params']['lang'] != '') $_SESSION['lang'] = $match['params']['lang'];
else if (!isset($_SESSION['lang']) && !isset($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
$lang = $_SESSION['lang'];

/* Slug lang */
$sluglang = 'tenkhongdau'.$lang;

/* SEO Lang */
$seolang = "vi";

/* Require datas */
require_once LIBRARIES . "lang/lang$lang.php";
require_once SOURCES . "allpage.php";

/* Tối ưu link */
$requick = array(
	/* Sản phẩm */
	array("tbl" => "product_list", "field" => "idl", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_cat", "field" => "idc", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_item", "field" => "idi", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_brand", "field" => "idb", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_doday", "field" => "idd", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_doday_list", "field" => "iddl", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product_nhomdanhmuc", "field" => "idnd", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),
	array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham", "type" => "san-pham", 'menu' => true),

	array("tbl" => "product", "field" => "id", "source" => "khuyenmai_sp", "com" => "san-pham-khuyenmai", "type" => "san-pham-khuyenmai", 'menu' => true),

	/* Sản phẩm */


	/* Bài viết */
	array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "tintuc", "type" => "tintuc", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tintuc", "type" => "tintuc", 'menu' => true),

	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "chinh-sach", "type" => "chinh-sach", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "card", "com" => "bao-hanh", "type" => "bao-hanh", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "kh_baohanh", "com" => "kich-hoat-bao-hanh", "type" => "kich-hoat-bao-hanh", 'menu' => true),

	array("tbl" => "news", "field" => "id", "source" => "gioithieu", "com" => "huongdantracuu_donhang", "type" => "huongdantracuu_donhang", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "gioithieu", "com" => "gioi-thieu", "type" => "gioi-thieu", 'menu' => true),
	array("tbl" => "news", "field" => "id", "source" => "gioithieu", "com" => "faqs", "type" => "faqs", 'menu' => true),


	/* Trang tĩnh */
	array("tbl" => "static", "field" => "id", "source" => "gioithieu", "com" => "officail", "type" => "officail", 'menu' => true),

	/* Liên hệ */
	array("tbl" => "", "field" => "id", "source" => "", "com" => "lien-he", "type" => "", 'menu' => true),


);

/* Find data */
if ($com != 'tim-kiem' && $com != 'account' && $com != 'sitemap') {
	foreach ($requick as $k => $v) {
		$url_tbl = (isset($v['tbl']) && $v['tbl'] != '') ? $v['tbl'] : '';
		$url_tbltag = (isset($v['tbltag']) && $v['tbltag'] != '') ? $v['tbltag'] : '';
		$url_type = (isset($v['type']) && $v['type'] != '') ? $v['type'] : '';
		$url_field = (isset($v['field']) && $v['field'] != '') ? $v['field'] : '';
		$url_com = (isset($v['com']) && $v['com'] != '') ? $v['com'] : '';

		if ($url_tbl != '' && $url_tbl != 'static' && $url_tbl != 'photo') {
			$row = $d->rawQueryOne("select id from #_$url_tbl where tenkhongdauvi = ? or tenkhongdauen = ? and type = ? and hienthi > 0 limit 0,1", array($com, $com, $url_type));

			if ($row['id']) {
				$_GET[$url_field] = $row['id'];
				$com = $url_com;
				break;
			}
		}
	}
}
// var_dump($com);
/* Switch coms */
switch ($com) {
	case 'lien-he':
		$source = "contact";
		$template = "contact/contact";
		$seo->setSeo('type', 'object');
		$title_crumb = lienhe;
		break;

	case 'gioi-thieu':
		$source = "gioithieu";
		$template = isset($_GET['id']) ? "gioithieu/static" : "gioithieu/static";;
		$type = $com;
		$seo->setSeo('type', 'article');
		$title_crumb = 'Officail';
		break;

	case 'faqs':
		$source = "gioithieu";
		$template = isset($_GET['id']) ? "gioithieu/static" : "gioithieu/static";;
		$type = $com;
		$seo->setSeo('type', 'article');
		$title_crumb = 'FAQS';
		break;

	case 'huongdantracuu_donhang':
		$source = "huongdan";
		$template = isset($_GET['id']) ? "huongdan/static" : "huongdan/static";;
		$type = $com;
		$seo->setSeo('type', 'article');
		$title_crumb = $lang == 'vi' ? 'Tra cứu tracking number' : 'Look up tracking number';
		break;

	case 'officail':
		$source = "static";
		$template = "static/static";
		$type = $com;
		$seo->setSeo('type', 'article');
		$title_crumb = 'Official';
		break;

	case 'tintuc':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = tintuc;
		break;

	case 'chinh-sach':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->setSeo('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$title_crumb = chinhsach;
		break;

	case 'bao-hanh':
		$source = "card";
		$template = "baohanh/news";
		$seo->setSeo('type', 'article');
		$type = $com;
		$title_crumb = $lang == 'vi' ? 'Thẻ bảo hành' : 'Insurance card';
		break;

	case 'kich-hoat-bao-hanh':
		$source = "kh_baohanh";
		$template = "khbaohanh/news";
		$seo->setSeo('type', 'article');
		$type = $com;
		$title_crumb = $lang == 'vi' ? 'Kích hoạt bảo hành' : 'Warranty Activation';
		break;

	case 'san-pham-khuyenmai':
		$source = "khuyenmai_sp";
		$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = sanpham;
		break;

	case 'sp_sale':
		$source = "sp_sale";
		$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = sanpham;
		break;

	case 'san-pham':
		$source = "product";
		$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = sanpham;
		break;

	case 'brand':
		$source = "brand";
		$template = isset($_GET['id']) ? "brand/product_detail" : "brand/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = 'Brand';
		break;

	case 'catalogue':
		$source = "catalogue";
		$template = isset($_GET['id']) ? "catalogue/product_detail" : "catalogue/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = 'Catalog';
		break;

	case 'vehicles':
		$source = "vehicles";
		$template = isset($_GET['id']) ? "vehicles/product_detail" : "vehicles/product";
		$seo->setSeo('type', 'article');
		$type = 'san-pham';
		$title_crumb = 'vehicles';
		break;

	case 'tim-kiem':
		$source = "search";
		$template = "product/product";
		$seo->setSeo('type', 'object');
		$title_crumb = timkiem;
		break;

	case 'tim-kiem-sp':
		$source = "search_sp";
		$template = "product/product";
		$seo->setSeo('type', 'object');
		$title_crumb = timkiem;
		break;

	case 'gio-hang':
		$source = "order";
		$template = 'order/order';
		$title_crumb = giohang;
		$seo->setSeo('type', 'object');
		break;

	case 'thanh-toan':
		$source = "order";
		$template = 'thanhtoan/order';
		$title_crumb = thanhtoan;
		$seo->setSeo('type', 'object');
		break;

	case 'account':
		$source = "user";
		break;

	case 'ngon-ngu':
		$lang = $_GET["lang"];
		if (isset($lang)) {
			switch ($lang) {
				case 'vi':
					$_SESSION['lang'] = 'vi';
					break;
				case 'en':
					$_SESSION['lang'] = 'en';
					break;
				default:
					$_SESSION['lang'] = 'vi';
					break;
			}
		}
		$func->redirect($_SERVER['HTTP_REFERER']);
		break;

	case 'sitemap':
		include_once LIBRARIES . "sitemap.php";
		exit();

	case '':
	case 'index':
		$source = "index";
		$template = "index/index";
		$seo->setSeo('type', 'website');
		break;

	default:
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
}

/* Include sources */
if ($source != '') include SOURCES . $source . ".php";
if ($template == '') {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}
