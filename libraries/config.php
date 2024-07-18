<?php
	if(!defined('LIBRARIES')) die("Error");
	
	/* Root */
	define('ROOT',__DIR__);

	/* Timezone */
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	/* Cấu hình coder */
	define('NN_MSHD','xxxx');
	define('NN_AUTHOR','');

	/* Cấu hình chung */
	$config = array(
		'customEmail' => 'info@webhd.vn', //email nhận mật khẩu
		'copright' => array(// thông tin công ty tts
			'name' => 'CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ HD',
			'email' => 'info@webhd.vn',
			'dienthoai' => '0938 002 776',
			'diachi' => '4B Nhất Chi Mai, Phường 13, Quận Tân Bình, TPHCM',
			'website' => 'sotagroup.vn',
			'worktime' => '8h - 17h từ thứ 2 đến thứ sáu, 8h - 12h sáng thứ bảy'
		),
		'author' => array(
			'name' => 'CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ HD',
			'email' => 'info@webhd.vn',
			'timefinish' => 'Unknown'
		),
		'arrayDomainSSL' => array(""),
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"],
			'url' => '/',
			'type' => 'mysql',
			'host' => 'localhost',
			// 'username' => 'tranghdweb_bbracing',
			// 'password' => 'XTzGWjJKb',
			// 'dbname' => 'tranghdweb_bbracing',
			'username' => 'root',
			'password' => '',
			'dbname' => 'bbracing',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8'
		),
		'website' => array(
			'sendmail' => false,
			'error-reporting' => false,
			'secret' => '$tts@',
			'salt' => 'swKJaajeS!t',
			'debug-developer' => false,
			'debug-css' => true,
			'debug-js' => true,
			'index' => false,
			'upload' => array(
				'max-width' => 1600,
				'max-height' => 1600
			),
			'lang' => array(
				'vi'=>'Tiếng Việt',
				'en'=>'Tiếng Anh'
			),
			'lang-doc' => 'vi|en',
			'slug' => array(
				'vi'=>'Tiếng Việt',
				'en'=>'Tiếng Anh'
			),
			'seo' => array(
				'vi'=>'Tiếng Việt',
				'en'=>'Tiếng Anh'
			),
			'comlang' => array(
				"gioi-thieu" => array("vi"=>"gioi-thieu"),
				"tin-tuc" => array("vi"=>"tin-tuc"),
				"san-pham" => array("vi"=>"san-pham"),
				"cong-trinh" => array("vi"=>"cong-trinh"),
				"dich-vu" => array("vi"=>"dich-vu"),
				"lien-he" => array("vi"=>"lien-he")
			)
		),
		'order' => array(
			'ship' => true,
		),
		'login' => array(
			'admin' => 'LoginAdmin'.NN_MSHD,
			'member' => 'LoginMember'.NN_MSHD,
			'attempt' => 5,
			'delay' => 15
		),
		'googleAPI' => array(
			'recaptcha' => array(
				'active' => false,
				'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
				'sitekey' => '6LdSoNUpAAAAAGjX8EgQ6eBh-dk8P6PnUUXqRTIF',
				'secretkey' => '6LdSoNUpAAAAAERODQ6FGT8HSzlVl8yM7aAgRVDe'
				//'sitekey' => '6Ld05qcZAAAAAJedNSmLEe1NOZdDtlYhwmltTIDC',
				//'secretkey' => '6Ld05qcZAAAAAABH8BWbSiLnPoXTRXFReFDM7b8t'
			)
		),
		'oneSignal' => array(
			'active' => false,
			'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
			'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
		),
		'license' => array(
			'version' => "7.0.0",
			'powered' => "tts@congnghetts.vn"
		)
	);

	/* Error reporting */
	error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

	/* Cấu hình base */
	$http = 'http://';
	$config_url = $config['database']['server-name'].$config['database']['url'];
	$config_base = $http.$config_url;

	/* Cấu hình login */
	$login_admin = $config['login']['admin'];
	$login_member = $config['login']['member']; 

	/* Cấu hình upload */
	require_once LIBRARIES."constant.php";
?>