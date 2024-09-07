<?php
if (!defined('SOURCES')) die("Error");
session_start();
$action = htmlspecialchars($match['params']['action']);
$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
$bandadangnhap = $lang == 'vi' ? 'Bạn đang đăng nhập tài khoản' : 'You are logging in to your account';


switch ($action) {

	case 'dang-nhap':
		$title_crumb = dangnhap;
		$template = "account/dangnhap";
		if (isset($_SESSION[$login_member]['active']) && $_SESSION[$login_member]['active'] == true) $func->transfer($bandadangnhap, $config_base, false);
		if (isset($_POST['dangnhap'])) login();
		break;

	case 'dang-ky':
		$title_crumb = dangky;
		$template = "account/dangky";
		if (isset($_SESSION[$login_member]['active']) && $_SESSION[$login_member]['active'] == true) $func->transfer($trangkhongtontai, $config_base, false);
		if (isset($_POST['dangky'])) signup();
		break;

	case 'dai-ly':
		$title_crumb = $lang == 'vi' ? 'Dealers' : 'Đại lí';
		$template = "account/daily";
		if (isset($_SESSION[$login_member]['id_vip']) && $_SESSION[$login_member]['id_vip'] != '0') {
			$er = false;
		} else {
			$er = true;
		}
		if (isset($_POST['dangky_daili'])) {
			signup_daili();
		}
		break;

	case 'dangky_dealer':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/dangky_dealer";
		if (isset($_SESSION[$login_member]['id_vip']) && $_SESSION[$login_member]['id_vip'] != '0') {
			$er = false;
		} else {
			$er = true;
		}
		if (isset($_POST['dangky_daili'])) {
			signup_daili();
		}
		break;

	case 'quen-mat-khau':
		$title_crumb = quenmatkhau;
		$template = "account/quenmatkhau";
		if (isset($_SESSION[$login_member]['active']) && $_SESSION[$login_member]['active'] == true) $func->transfer($trangkhongtontai, $config_base, false);
		if (isset($_POST['quenmatkhau'])) doimatkhau_user();
		break;

	case 'dealer-process':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer Process' : 'Quy trình đăng ký đại lý';
		$template = "account/dealer_process";
		$_SESSION["email_user"] = $_POST['email'];
		if (isset($_SESSION[$login_member]['active']) && $_SESSION[$login_member]['active'] == true) $func->transfer($trangkhongtontai, $config_base, false);
		if (isset($_POST['quytrinhdaily'])) dealer_process();
		break;

	case 'dealer_process_active':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer Process' : 'Quy trình đăng ký đại lý';
		$template = "account/dealer_process_active";
		dealer_process();
		break;

	case 'diachi':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/diachi";
		if (isset($_POST['thaydoidiachi'])) {
			diachi_update();
		}
		break;

	case 'my_question':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/my_question";
		my_question();
		break;

	case 'my_sub':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/my_sub";
		my_sub();
		break;

	case 'my_cart':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/my_cart";
		my_cart();
		break;

	case 'newsletter':
		$title_crumb = $lang == 'vi' ? 'Account for Dealer' : 'Đăng ký trở thành đại lý';
		$template = "account/newsletter";
		newsletter();
		break;

	case 'kich-hoat':
		$title_crumb = kichhoat;
		$template = "account/kichhoat";
		if (isset($_SESSION[$login_member]['active']) && $_SESSION[$login_member]['active'] == true) $func->transfer($trangkhongtontai, $config_base, false);
		if (isset($_POST['kichhoat'])) active_user();
		break;

	case 'thong-tin':
		if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($trangkhongtontai, $config_base, false);
		$template = "account/thongtin";
		$title_crumb = capnhatthongtin;
		info_user();
		if (isset($_POST['thaydoidiachi'])) {
			update_thongtin();
		}
		break;

	case 'tongquan':
		// if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($trangkhongtontai, $config_base, false);
		// $template = "account/tongquan";
		if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($trangkhongtontai, $config_base, false);
		$template = "account/thongtin";
		$title_crumb = capnhatthongtin;
		info_user();
		break;

	case 'tracking':
		// if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base.'account/dang-nhap', false);
		$template = "account/tracking";
		$title_crumb = $lang == 'vi' ? 'Theo dõi đơn hàng' : 'Tracking Order';
		break;

	case 'donhang':
		// if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base.'account/dang-nhap', false);
		$template = "account/donhang";
		$title_crumb = $lang == 'vi' ? 'Thông tin đơn hàng' : 'Information line';
		if ($_REQUEST['PayerID']) {
			thanhtoanthanhcong();
		}
		break;

	case 'donhang_chothanhtoan':
		if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base, false);
		$template = "account/donhang_chothanhtoan";
		$title_crumb = $lang == 'vi' ? 'Đơn hàng chờ thanh toán' : 'Pending payment';
		break;

	case 'donhang_chitiet':
		// if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base.'account/dang-nhap', false);
		$template = "account/donhang_chitiet";
		$title_crumb = $lang == 'vi' ? 'Chi tiết đơn hàng' : 'Order details';
		$id_donhang = openssl_decrypt($_REQUEST['id_donhang'], 'aes-256-cbc', 'bbracing', 0, 'bbracing');
		if (isset($_POST['themghichu'])) {
			donhang_update($id_donhang);
		}
		break;

	case 'congno':
		if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) $func->transfer($lang == 'vi' ? 'Trang không tồn tại' : 'Page does not exist', $config_base, false);
		$template = "account/congno";
		$title_crumb = $lang == 'vi' ? 'Công nợ' : 'Debt';
		info_user();
		break;

	case 'dang-xuat':
		if (!isset($_SESSION[$login_member]['active']) || !$_SESSION[$login_member]['active']) {
			$func->transfer($trangkhongtontai, $config_base, false);
		}
		logout();

	case 'google':
		if (isset($_GET['code'])) google_client_user();
		// google_client();

	default:
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
}



/* SEO */
$seo->setSeo('title', $title_crumb);

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs('', $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();

function info_user()
{
	global $d, $func, $row_detail, $config_base, $login_member, $lang, $datacard;

	$iduser = $_SESSION[$login_member]['id'];

	if ($lang == 'vi') {
		$mk_cukhongdung = "Mật khẩu cũ không chính xác";
		$mk_moikhongdung = "Thông tin mật khẩu mới không chính xác";
		$capnhat_thanhcong = "Cập nhật thông tin thành công";
	} else {
		$mk_cukhongdung = "The old password is incorrect";
		$mk_moikhongdung = "The new password information is incorrect";
		$capnhat_thanhcong = "Successfully updated";
	}

	if ($iduser) {
		$row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
		$datacard = $d->rawQueryOne("select * from #_card where id_user = ? limit 0,1", array($iduser));

		if (isset($_POST['capnhatthongtin'])) {
			$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
			$passwordMD5 = md5($password);
			$new_password = (isset($_POST['new-password'])) ? htmlspecialchars($_POST['new-password']) : '';
			$new_passwordMD5 = md5($new_password);
			$new_password_confirm = (isset($_POST['new-password-confirm'])) ? htmlspecialchars($_POST['new-password-confirm']) : '';

			if ($password) {
				$row = $d->rawQueryOne("select id from #_member where id = ? and password = ? limit 0,1", array($iduser, $passwordMD5));

				if (!$row['id']) {
					// $func->transfer($mk_cukhongdung, "", false);
					$login_message = $mk_cukhongdung;
					$redirect_url = '';
					$stt = false;
				}
				if (!$new_password || ($new_password != $new_password_confirm)) {
					// $func->transfer($mk_moikhongdung, "", false);
					$login_message = $mk_cukhongdung;
					$redirect_url = '';
					$stt = false;
				}

				$data['password'] = $new_passwordMD5;
			}

			$data['ten'] = (isset($_POST['ten'])) ? htmlspecialchars($_POST['ten']) : '';
			$data['diachi'] = (isset($_POST['diachi'])) ? htmlspecialchars($_POST['diachi']) : '';
			$data['dienthoai'] = (isset($_POST['dienthoai'])) ? htmlspecialchars($_POST['dienthoai']) : 0;
			$data['email'] = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
			$data['ngaysinh'] = (isset($_POST['ngaysinh'])) ? strtotime(str_replace("/", "-", htmlspecialchars($_POST['ngaysinh']))) : 0;
			$data['gioitinh'] = (isset($_POST['gioitinh'])) ? htmlspecialchars($_POST['gioitinh']) : 0;
			$data['ngaysua'] = time();

			$d->where('id', $iduser);
			if ($d->update('member', $data)) {
				if ($password) {
					unset($_SESSION[$login_member]);
					setcookie('login_member_id', "", -1, '/');
					setcookie('login_member_session', "", -1, '/');
					// $func->transfer($capnhat_thanhcong, $config_base . "account/dang-nhap");
					$login_message = $capnhat_thanhcong;
					$redirect_url = $config_base . "account/dang-nhap";
					$stt = true;
				}
				// $func->transfer($capnhat_thanhcong, $config_base . "account/thong-tin");
				$login_message = $capnhat_thanhcong;
				$redirect_url = $config_base . "account/thong-tin";
				$stt = true;
			}
		}
	} else {
		$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
		// $func->transfer($trangkhongtontai, $config_base, false);
		$login_message = $trangkhongtontai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}
function my_question()
{
	global $d, $func, $myquestion, $config_base, $login_member, $lang, $get_page, $paging;

	$mail_user = $_SESSION[$login_member]['email'];

	if ($mail_user) {
		$curPage = $get_page;
		$per_page = 2;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit " . $startpoint . "," . $per_page;

		$orderby = "order by stt,id desc";

		$myquestion = $d->rawQuery("select * from #_newsletter where email = '$mail_user' $orderby $limit");

		$sqlNum = "select count(*) as 'num' from #_newsletter a where email = '$mail_user'  $orderby";
		$count = $d->rawQueryOne($sqlNum);
		$total = $count['num'];
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total, $per_page, $curPage, $url);
	} else {
		$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
		// $func->transfer($trangkhongtontai, $config_base, false);
		$login_message = $trangkhongtontai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}
function my_sub()
{
	global $d, $func, $my_sub_list, $config_base, $login_member, $lang;

	$mail_user = $_SESSION[$login_member]['email'];

	if ($mail_user) {
		$orderby = "order by stt,id desc";
		$my_sub_list = $d->rawQuery("select * from #_news_list where type = 'my_sub' $orderby ");
	} else {
		$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
		// $func->transfer($trangkhongtontai, $config_base, false);
		$login_message = $trangkhongtontai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function my_cart()
{
	global $d, $func, $card_chinh, $card_phu, $config_base, $login_member, $lang;

	$mail_user = $_SESSION[$login_member]['email'];
	$id_user = $_SESSION[$login_member]['id'];

	if ($mail_user) {
		$card_chinh = $d->rawQueryOne("select * from #_member where email = '$mail_user' ");

		$card_phu = $d->rawQuery("select * from #_card where id_user = '$id_user' ");
	} else {
		$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
		// $func->transfer($trangkhongtontai, $config_base, false);
		$login_message = $trangkhongtontai;
		$redirect_url = $config_base;
		$stt = false;
	}
	if (isset($_POST['taotaikhoancard'])) {
		$data['tentaikhoan'] = (isset($_POST['tentaikhoan'])) ? htmlspecialchars($_POST['tentaikhoan']) : '';
		$data['nganhang'] = (isset($_POST['nganhang'])) ? htmlspecialchars($_POST['nganhang']) : '';
		$data['sotaikhoan'] = (isset($_POST['sotaikhoan'])) ? htmlspecialchars($_POST['sotaikhoan']) : '';
		$data['id_user'] = $id_user;
		$data['ngaytao'] = time();

		if ($lang == 'vi') {
			$thanhcong = "Thêm tài khoản thẻ thành công";
			$thongbaothatbai = "Thêm tài khoản thẻ thất bại";
		} else {
			$thanhcong = "Added card account successfully";
			$thongbaothatbai = "Adding card account failed";
		}

		if ($d->insert('card', $data)) {
			// $func->transfer($thanhcong, $config_base . "account/my_cart");
			$login_message = $thanhcong;
			$redirect_url = $config_base . "account/my_cart";
			$stt = true;
		} else {
			// $func->transfer($thongbaothatbai, $config_base, false);
			$login_message = $thongbaothatbai;
			$redirect_url = $config_base;
			$stt = false;
		}
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function newsletter()
{
	global $d, $func, $myquestion, $config_base, $login_member, $lang, $get_page, $paging;

	$id_user = $_SESSION[$login_member]['id'] . ',';

	if ($id_user) {
		$curPage = $get_page;
		$per_page = 12;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit " . $startpoint . "," . $per_page;

		$orderby = "order by stt,id desc";

		$myquestion = $d->rawQuery("select * from #_product where id_user REGEXP '$id_user' $orderby $limit");

		$sqlNum = "select count(*) as 'num' from #_product a where email = '$id_user'  $orderby";
		$count = $d->rawQueryOne($sqlNum);
		$total = $count['num'];
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total, $per_page, $curPage, $url);
	} else {
		$trangkhongtontai = $lang == 'vi' ? 'Trang không tồn tại' : 'The page does not exist';
		// $func->transfer($trangkhongtontai, $config_base, false);
		$login_message = $trangkhongtontai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function active_user()
{
	global $d, $func, $row_detail, $config_base, $lang;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
	$maxacnhan = (isset($_POST['maxacnhan'])) ? htmlspecialchars($_POST['maxacnhan']) : '';

	if ($lang == 'vi') {
		$chuanhaptk = "Tài khoản của bạn chưa được kích hoạt.";
		$dn_thanhcong = "Kích hoạt tài khoản thành công.";
		$dn_thatbai = "Mã xác nhận không đúng. Vui lòng nhập lại mã xác nhận.";
	} else {
		$chuanhaptk = "Your account has not been activated.";
		$dn_thanhcong = "Account activation successful.";
		$dn_thatbai = "Incorrect code. Please re-enter the confirmation code.";
	}

	/* Kiểm tra thông tin */
	$row_detail = $d->rawQueryOne("select hienthi, maxacnhan, id from #_member where id = ? limit 0,1", array($id));

	if (!$row_detail['id']) {
		// $func->transfer($chuanhaptk, $config_base, false);
		$login_message = $chuanhaptk;
		$redirect_url = $config_base;
		$stt = false;
	} else if ($row_detail['hienthi']) {
		// $func->transfer($dn_thanhcong, $config_base);
		$login_message = $dn_thanhcong;
		$redirect_url = $config_base;
		$stt = true;
	} else {
		if ($row_detail['maxacnhan'] == $maxacnhan) {
			$data['hienthi'] = 1;
			$data['maxacnhan'] = '';
			$d->where('id', $id);
			if ($d->update('member', $data)) {
				// $func->transfer($dn_thanhcong, $config_base . "account/dang-nhap");
				$login_message = $dn_thanhcong;
				$redirect_url = $config_base . "account/dang-nhap";
				$stt = true;
			}
		} else {
			// $func->transfer($dn_thatbai, $config_base . "account/kich-hoat?id=" . $id, false);
			$login_message = $dn_thatbai;
			$redirect_url = $config_base . "account/kich-hoat?id=" . $id;
			$stt = false;
		}
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function login()
{
	global $d, $func, $login_member, $config_base, $lang;

	$username = (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
	$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
	$passwordMD5 = md5($password);
	$remember = (isset($_POST['remember-user'])) ? htmlspecialchars($_POST['remember-user']) : false;

	if ($lang == 'vi') {
		$chuanhaptk = "Chưa nhập tên tài khoản";
		$chuanhapmk = "Chưa nhập mật khẩu";
		$dn_thanhcong = "Đăng nhập thành công";
		$dn_thatbai = "Tên đăng nhập hoặc mật khẩu không chính xác. Hoặc tài khoản của bạn chưa được xác nhận từ Quản trị website";
	} else {
		$chuanhaptk = "Account name has not been entered";
		$chuanhapmk = "Password has not been entered";
		$dn_thanhcong = "Logged in successfully";
		$dn_thatbai = "Username or password incorrect. Or your account has not been confirmed by the Website Administrator";
	}

	// if (!$username) $func->transfer($chuanhaptk, 'account/dang-nhap', false);
	// if (!$password) $func->transfer($chuanhapmk, 'account/dang-nhap', false);
	if (!$username){
		$login_message = $chuanhaptk;
		$redirect_url = $config_base . "account/dang-nhap";
		$stt = false;
	}
	if (!$password){
		$login_message = $chuanhaptk;
		$redirect_url = $config_base . "account/dang-nhap";
		$stt = false;
	}

	$row = $d->rawQueryOne("select id, password, username, dienthoai, diachi, email, ten from #_member where username = ? and hienthi > 0 limit 0,1", array($username));

	if ($row['id']) {
		if ($row['password'] == $passwordMD5) {
			/* Tạo login session */
			$id_user = $row['id'];
			$lastlogin = time();
			$login_session = md5($row['password'] . $lastlogin);
			$d->rawQuery("update #_member set login_session = ?, lastlogin = ? where id = ?", array($login_session, $lastlogin, $id_user));

			/* Lưu session login */
			$_SESSION[$login_member]['active'] = true;
			$_SESSION[$login_member]['id'] = $row['id'];
			$_SESSION[$login_member]['username'] = $row['username'];
			$_SESSION[$login_member]['dienthoai'] = $row['dienthoai'];
			$_SESSION[$login_member]['diachi'] = $row['diachi'];
			$_SESSION[$login_member]['email'] = $row['email'];
			$_SESSION[$login_member]['ten'] = $row['ten'];
			$_SESSION[$login_member]['user_id'] = $row['user_id'];
			$_SESSION[$login_member]['login_session'] = $login_session;

			/* Nhớ mật khẩu */
			setcookie('login_member_id', "", -1, '/');
			setcookie('login_member_session', "", -1, '/');
			if ($remember) {
				$time_expiry = time() + 3600 * 24;
				setcookie('login_member_id', $row['id'], $time_expiry, '/');
				setcookie('login_member_session', $login_session, $time_expiry, '/');
			}

			// $func->transfer($dn_thanhcong, $config_base . "account/tongquan");
			$login_message = $dn_thanhcong;
			$redirect_url = $config_base . "account/tongquan";
			$stt = true;
		} else {
			// $func->transfer($dn_thatbai, $config_base . "account/dang-nhap", false);
			$login_message = $dn_thatbai;
			$redirect_url = $config_base . "account/dang-nhap";
			$stt = false;
		}
	} else {
		// $func->transfer($dn_thatbai, $config_base . "account/dang-nhap", false);
		$login_message = $dn_thatbai;
		$redirect_url = $config_base . "account/dang-nhap";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function signup()
{
	global $d, $func, $config_base, $lang, $login_member, $login_session;

	$username = (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
	$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
	$passwordMD5 = md5($password);
	$repassword = (isset($_POST['repassword'])) ? htmlspecialchars($_POST['repassword']) : '';
	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
	$maxacnhan = $func->digitalRandom(0, 3, 6);
	if ($lang == 'vi') {
		$mk_khongkhop = "Xác nhận mật khẩu không trùng khớp";
		$tendatontai = "Tên đăng nhập đã tồn tại";
		$emaildatontai = "Địa chỉ email đã tồn tại";
	} else {
		$mk_khongkhop = "Confirm password does not match";
		$tendatontai = "Username available";
		$emaildatontai = "Email address already exists";
	}

	if ($password != $repassword) {
		// $func->transfer($mk_khongkhop, $config_base . "account/dang-ky", false);
		$login_message = $mk_khongkhop;
		$redirect_url = $config_base . "account/dang-ky";
		$stt = false;
	}

	/* Kiểm tra tên đăng ký */
	$row = $d->rawQueryOne("select id from #_member where username = ? limit 0,1", array($username));
	if ($row['id']) {
		// $func->transfer($tendatontai, $config_base . "account/dang-ky", false);
		$login_message = $tendatontai;
		$redirect_url = $config_base . "account/dang-ky";
		$stt = false;
	}

	/* Kiểm tra email đăng ký */
	$row = $d->rawQueryOne("select id from #_member where email = ? limit 0,1", array($email));
	if ($row['id']) {
		// $func->transfer($emaildatontai, $config_base . "account/dang-ky", false);
		$login_message = $emaildatontai;
		$redirect_url = $config_base . "account/dang-ky";
		$stt = false;
	}

	$data['ten'] = (isset($_POST['ten'])) ? htmlspecialchars($_POST['ten']) : '';
	// $data['ten'] = $username;
	$data['username'] = $username;
	$data['password'] = md5($password);
	$data['email'] = $email;
	$data['dienthoai'] = (isset($_POST['dienthoai'])) ? htmlspecialchars($_POST['dienthoai']) : 0;
	$data['hotline'] = (isset($_POST['hotline'])) ? htmlspecialchars($_POST['hotline']) : '';
	$data['diachi'] = (isset($_POST['diachi'])) ? htmlspecialchars($_POST['diachi']) : '';
	$data['gioitinh'] = (isset($_POST['gioitinh'])) ? htmlspecialchars($_POST['gioitinh']) : 0;
	$data['ngaysinh'] = (isset($_POST['ngaysinh'])) ? strtotime(str_replace("/", "-", $_POST['ngaysinh'])) : 0;
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['link_facebook'] = (isset($_POST['link_facebook'])) ? htmlspecialchars($_POST['link_facebook']) : '';
	$data['thuong_hieu_khac'] = (isset($_POST['thuong_hieu_khac'])) ? htmlspecialchars($_POST['thuong_hieu_khac']) : '';
	$data['website'] = (isset($_POST['website'])) ? htmlspecialchars($_POST['website']) : '';
	$data['tencongty'] = (isset($_POST['tencongty'])) ? htmlspecialchars($_POST['tencongty']) : '';
	$data['doanh_so'] = (isset($_POST['doanh_so'])) ? htmlspecialchars($_POST['doanh_so']) : '';
	$data['chucvu'] = (isset($_POST['chucvu'])) ? htmlspecialchars($_POST['chucvu']) : '';
	$data['mst'] = (isset($_POST['mst'])) ? htmlspecialchars($_POST['mst']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['nganhang'] = (isset($_POST['nganhang'])) ? htmlspecialchars($_POST['nganhang']) : '';
	$data['sotaikhoan'] = (isset($_POST['sotaikhoan'])) ? htmlspecialchars($_POST['sotaikhoan']) : '';
	$data['ghichu'] = (isset($_POST['ghichu'])) ? htmlspecialchars($_POST['ghichu']) : '';
	$data['maxacnhan'] = $maxacnhan;
	$data['thuong_hieu'] = (isset($_POST['all_brand'])) ? htmlspecialchars($_POST['all_brand']) : '';
	$data['id_vip'] = '';
	$data['ngaytao'] = time();
	$data['hienthi'] = 0;
	$data['newsletter'] = (isset($_POST['check_newsletter'])) ? htmlspecialchars($_POST['check_newsletter']) : 0;

	$member_id = $d->rawQueryOne("select MAX(id_member) as numb from #_member where hienthi>0 ");
	$count_member_id = $member_id['numb'] + 1;
	// var_dump($count_member_id);die();
	$data['id_member'] = $count_member_id;

	$remember = (isset($_POST['check_remember'])) ? htmlspecialchars($_POST['check_remember']) : false;
	$_SESSION[$login_member]['login_session'] = $login_session;
	/* Nhớ mật khẩu */
	setcookie('login_member_id', "", -1, '/');
	setcookie('login_member_session', "", -1, '/');
	if ($remember) {
		$time_expiry = time() + 3600 * 24;
		setcookie('login_member_id', $row['id'], $time_expiry, '/');
		setcookie('login_member_session', $login_session, $time_expiry, '/');
	}

	if (isset($_FILES['file'])) {
		$file_name = $func->uploadName($_FILES['file']["name"]);
		if ($photo = $func->uploadImage("file", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name)) {
			$data['banner'] = $photo;
		}
	}

	if ($lang == 'vi') {
		$thanhcong = "Đăng ký thành viên thành công. Vui lòng kiểm tra email: " . $data['email'] . " để kích hoạt tài khoản";
		$thongbaothatbai = "Đăng ký thành viên thất bại. Vui lòng thử lại sau.";
	} else {
		$thanhcong = "Member registration successful. Please check your email: " . $data['email'] . " to activate your account";
		$thongbaothatbai = "Member registration failed. Please try again later.";
	}
	if ($d->insert('member', $data)) {
		// $func->transfer($thanhcong, $config_base . "account/dang-nhap");
		$login_message = $thanhcong;
		$redirect_url = $config_base;
		$stt = true;
		send_active_user($username);
	} else {
		// $func->transfer($thongbaothatbai, $config_base, false);
		$login_message = $thongbaothatbai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function signup_daili()
{
	global $d, $func, $config_base, $lang;

	$username = (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
	$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
	$passwordMD5 = md5($password);
	$repassword = (isset($_POST['repassword'])) ? htmlspecialchars($_POST['repassword']) : '';
	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
	$maxacnhan = $func->digitalRandom(0, 3, 6);

	if ($lang == 'vi') {
		$mk_khongkhop = "Xác nhận mật khẩu không trùng khớp";
		$tendatontai = "Tên đăng nhập đã tồn tại";
		$emaildatontai = "Địa chỉ email đã tồn tại";
	} else {
		$mk_khongkhop = "Confirm password does not match";
		$tendatontai = "Username available";
		$emaildatontai = "Email address already exists";
	}

	if ($password != $repassword) {
		// $func->transfer($mk_khongkhop, $config_base . "account/dai-ly", false);
		$login_message = $mk_khongkhop;
		$redirect_url = $config_base . "account/dai-ly";
		$stt = false;
	}

	/* Kiểm tra tên đăng ký */
	$row = $d->rawQueryOne("select id from #_member where username = ? limit 0,1", array($username));
	if ($row['id']) {
		// $func->transfer($tendatontai, $config_base . "account/dai-ly", false);
		$login_message = $tendatontai;
		$redirect_url = $config_base . "account/dai-ly";
		$stt = false;
	}

	/* Kiểm tra email đăng ký */
	$row = $d->rawQueryOne("select id from #_member where email = ? limit 0,1", array($email));
	if ($row['id']) {
		// $func->transfer($emaildatontai, $config_base . "account/dai-ly", false);
		$login_message = $emaildatontai;
		$redirect_url = $config_base . "account/dai-ly";
		$stt = false;
	}

	$data['ten'] = $username;
	$data['username'] = $username;
	$data['password'] = md5($password);
	$data['email'] = $email;
	$data['dienthoai'] = (isset($_POST['dienthoai'])) ? htmlspecialchars($_POST['dienthoai']) : 0;
	$data['hotline'] = (isset($_POST['hotline'])) ? htmlspecialchars($_POST['hotline']) : '';
	$data['diachi'] = (isset($_POST['diachi'])) ? htmlspecialchars($_POST['diachi']) : '';
	$data['gioitinh'] = (isset($_POST['gioitinh'])) ? htmlspecialchars($_POST['gioitinh']) : 0;
	$data['ngaysinh'] = (isset($_POST['ngaysinh'])) ? strtotime(str_replace("/", "-", $_POST['ngaysinh'])) : 0;
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['link_facebook'] = (isset($_POST['link_facebook'])) ? htmlspecialchars($_POST['link_facebook']) : '';
	$data['thuong_hieu_khac'] = (isset($_POST['thuong_hieu_khac'])) ? htmlspecialchars($_POST['thuong_hieu_khac']) : '';
	$data['website'] = (isset($_POST['website'])) ? htmlspecialchars($_POST['website']) : '';
	$data['tencongty'] = (isset($_POST['tencongty'])) ? htmlspecialchars($_POST['tencongty']) : '';
	$data['doanh_so'] = (isset($_POST['doanh_so'])) ? htmlspecialchars($_POST['doanh_so']) : '';
	$data['chucvu'] = (isset($_POST['chucvu'])) ? htmlspecialchars($_POST['chucvu']) : '';
	$data['mst'] = (isset($_POST['mst'])) ? htmlspecialchars($_POST['mst']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['nganhang'] = (isset($_POST['nganhang'])) ? htmlspecialchars($_POST['nganhang']) : '';
	$data['sotaikhoan'] = (isset($_POST['sotaikhoan'])) ? htmlspecialchars($_POST['sotaikhoan']) : '';
	$data['ghichu'] = (isset($_POST['ghichu'])) ? htmlspecialchars($_POST['ghichu']) : '';
	$data['maxacnhan'] = $maxacnhan;
	$data['thuong_hieu'] = (isset($_POST['all_brand'])) ? htmlspecialchars($_POST['all_brand']) : '';;
	$data['id_vip'] = '1';
	$data['ngaytao'] = time();
	$data['hienthi'] = 0;

	$member_id = $d->rawQueryOne("select MAX(id_member) as numb from #_member where hienthi>0 ");
	$count_member_id = $member_id['numb'] + 1;
	$data['id_member'] = $count_member_id;

	if (isset($_FILES['file'])) {
		$file_name = $func->uploadName($_FILES['file']["name"]);
		if ($photo = $func->uploadImage("file", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name)) {
			$data['banner'] = $photo;
		}
	}


	// var_dump($data['thuong_hieu']);die();

	if ($d->insert('member', $data)) {
		if ($lang == 'vi') {
			$thanhcong = "Đăng ký thành viên thành công. Vui lòng đợi chúng tôi xác thực thông tin";
		} else {
			$thanhcong = "Member registration successful. Please wait for us the real information";
		}
		// send_active_user($username);
		// $func->transfer($thanhcong, $config_base . "account/dealer_process_active");
		$login_message = $thanhcong;
		$redirect_url = $config_base . "account/dealer_process_active";
		$stt = true;
	} else {
		if ($lang == 'vi') {
			$thongbaothatbai = "Đăng ký thành viên thất bại. Vui lòng thử lại sau.";
		} else {
			$thongbaothatbai = "Member registration failed. Please try again later.";
		}
		// $func->transfer($thongbaothatbai, $config_base, false);
		$login_message = $thongbaothatbai;
		$redirect_url = $config_base ;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function dealer_process()
{
	global $d, $func, $config_base, $lang, $action;

	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';



	/* Kiểm tra email đăng ký */
	$user_active = $d->rawQueryOne("select * from #_member where email = ? limit 0,1", array($email));

	if ($user_active['id_vip'] != '0') {
		if ($action == 'dealer-process') {
			$func->redirect("dealer_process_active");
		}
	} else {
		if ($lang == 'vi') {
			$chuadkdaily = "Mail này chưa được đăng ký trở thành đại lý";
		} else {
			$chuadkdaily = "This mail has not been registered as an agent";
		}
		// $func->transfer($chuadkdaily, $config_base . "account/dangky_dealer", false);
		$login_message = $chuadkdaily;
		$redirect_url = $config_base . "account/dangky_dealer";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function update_thongtin()
{
	global $d, $func, $config_base, $lang, $login_member;
	// var_dump("aaa");
	// $username = (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
	// $password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';

	// $data['ten'] = $username;
	// $data['username'] = $username;
	// $data['password'] = md5($password);
	$data['email'] = $email;
	$data['dienthoai'] = (isset($_POST['dienthoai'])) ? htmlspecialchars($_POST['dienthoai']) : 0;
	$data['hotline'] = (isset($_POST['hotline'])) ? htmlspecialchars($_POST['hotline']) : '';
	$data['gioitinh'] = (isset($_POST['gioitinh'])) ? htmlspecialchars($_POST['gioitinh']) : 0;
	$data['ngaysinh'] = (isset($_POST['ngaysinh'])) ? strtotime(str_replace("/", "-", $_POST['ngaysinh'])) : 0;
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['link_facebook'] = (isset($_POST['link_facebook'])) ? htmlspecialchars($_POST['link_facebook']) : '';
	$data['thuong_hieu_khac'] = (isset($_POST['thuong_hieu_khac'])) ? htmlspecialchars($_POST['thuong_hieu_khac']) : '';
	$data['website'] = (isset($_POST['website'])) ? htmlspecialchars($_POST['website']) : '';
	$data['tencongty'] = (isset($_POST['tencongty'])) ? htmlspecialchars($_POST['tencongty']) : '';
	$data['doanh_so'] = (isset($_POST['doanh_so'])) ? htmlspecialchars($_POST['doanh_so']) : '';
	$data['chucvu'] = (isset($_POST['chucvu'])) ? htmlspecialchars($_POST['chucvu']) : '';
	$data['mst'] = (isset($_POST['mst'])) ? htmlspecialchars($_POST['mst']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['nganhang'] = (isset($_POST['nganhang'])) ? htmlspecialchars($_POST['nganhang']) : '';
	$data['chinhanh'] = (isset($_POST['chinhanh'])) ? htmlspecialchars($_POST['chinhanh']) : '';
	$data['sotaikhoan'] = (isset($_POST['sotaikhoan'])) ? htmlspecialchars($_POST['sotaikhoan']) : '';
	$data['tentaikhoan'] = (isset($_POST['tentaikhoan'])) ? htmlspecialchars($_POST['tentaikhoan']) : '';
	$data['ghichu'] = (isset($_POST['ghichu'])) ? htmlspecialchars($_POST['ghichu']) : '';
	$data['thuong_hieu'] = (isset($_POST['all_brand'])) ? htmlspecialchars($_POST['all_brand']) : '';
	
	$data['diachi'] = (isset($_POST['diachi'])) ? htmlspecialchars($_POST['diachi']) : '';
	$data['diachi_shipping'] = (isset($_POST['diachi_shipping'])) ? htmlspecialchars($_POST['diachi_shipping']) : '';
	$data['district'] = (isset($_POST['district'])) ? htmlspecialchars($_POST['district']) : '';
	$data['district_shipping'] = (isset($_POST['district_shipping'])) ? htmlspecialchars($_POST['district_shipping']) : '';
	$data['city'] = (isset($_POST['city'])) ? htmlspecialchars($_POST['city']) : '';
	$data['city_shipping'] = (isset($_POST['city_shipping'])) ? htmlspecialchars($_POST['city_shipping']) : '';
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['quocgia_shipping'] = (isset($_POST['quocgia_shipping'])) ? htmlspecialchars($_POST['quocgia_shipping']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['zip_code_shipping'] = (isset($_POST['zip_code_shipping'])) ? htmlspecialchars($_POST['zip_code_shipping']) : '';
	$data['diachi_hoadon'] = (isset($_POST['diachi_hoadon'])) ? htmlspecialchars($_POST['diachi_hoadon']) : '';
	$data['dienthoai_hoadon'] = (isset($_POST['dienthoai_hoadon'])) ? htmlspecialchars($_POST['dienthoai_hoadon']) : '';

	// $data['id_vip'] = '1';
	$data['ngaytao'] = time();
	// $data['hienthi'] = 0;


	$datacard = (isset($_POST['datacard'])) ? $_POST['datacard'] : null;
	if ($datacard) {
		foreach ($datacard as $column => $value) {
			$datacard[$column] = htmlspecialchars($value);
		}
	}



	if (isset($_FILES['file'])) {
		$file_name = $func->uploadName($_FILES['file']["name"]);
		if ($photo = $func->uploadImage("file", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name)) {
			$data['banner'] = $photo;
		}
	}
	// var_dump($_FILES['avatar']);die();
	if (isset($_FILES['avatar'])) {
		$file_name1 = $func->uploadName($_FILES['avatar']["name"]);
		if ($photo1 = $func->uploadImage("avatar", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name1)) {
			$data['avatar'] = $photo1;
		}
	}
	// var_dump($data);die();
	$iduser = $_SESSION[$login_member]['id'];
	$card = $d->rawQueryOne("select * from #_card where id_user = ? limit 0,1", array($iduser));

	// var_dump($card);
	// die();

	if (!empty($card)) {
		$datacard['ngaysua'] = time();
		$datacard['id_user'] = $iduser;
		$d->where('id_user', $iduser);
		$d->update('card', $datacard);
	} else {
		$datacard['ngaytao'] = time();
		$datacard['id_user'] = $iduser;
		$d->insert('card', $datacard);
	}
	/* Kiểm tra email đăng ký */
	$d->where('id', $iduser);
	if ($d->update('member', $data)) {
		if ($lang == 'vi') {
			$thanhcong = "Cập nhật thông tin thành công";
		} else {
			$thanhcong = "Successfully updated";
		}
		// $func->transfer($thanhcong, $config_base . "account/thong-tin");
		$login_message = $thanhcong;
		$redirect_url = $config_base . "account/thong-tin";
		$stt = true;
	} else {
		if ($lang == 'vi') {
			$thongbaothatbai = "Cập nhật thông tin thất bại.";
		} else {
			$thongbaothatbai = "Update information failed.";
		}
		// $func->transfer($thongbaothatbai, $config_base . "account/thong-tin", false);
		$login_message = $thongbaothatbai;
		$redirect_url = $config_base . "account/thong-tin";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function donhang_update($id_donhang)
{
	global $d, $func, $config_base, $lang;
	// var_dump("aaa");

	$data['ghichu'] = (isset($_POST['ghichu'])) ? htmlspecialchars($_POST['ghichu']) : '';

	// $id_donhang = $id_donhang;
	// var_dump($data);
	/* Kiểm tra email đăng ký */
	$d->where('id', $id_donhang);
	if ($d->update('order', $data)) {
		if ($lang == 'vi') {
			$thanhcong = "Thêm ghi chú thành công";
		} else {
			$thanhcong = "Added note successfully";
		}
		// $func->transfer($thanhcong, $config_base . "account/donhang_chitiet?id_donhang=" . openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') . "");
		$login_message = $thanhcong;
		$redirect_url = $config_base . "account/donhang_chitiet?id_donhang=" . openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') . "";
		$stt = true;
	} else {
		if ($lang == 'vi') {
			$thongbaothatbai = "Thêm ghi chú thất bại.";
		} else {
			$thongbaothatbai = "Add failure notes.";
		}
		// $func->transfer($thongbaothatbai, $config_base . "account/donhang_chitiet?id_donhang=" . openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') . "", false);
		$login_message = $thongbaothatbai;
		$redirect_url = $config_base . "account/donhang_chitiet?id_donhang=" . openssl_encrypt($id_donhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') . "";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function diachi_update()
{
	global $d, $func, $config_base, $lang, $login_member;
	// var_dump("aaa");

	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';

	// $data['ten'] = $username;
	// $data['username'] = $username;
	// $data['password'] = md5($password);
	$data['email'] = $email;
	$data['dienthoai'] = (isset($_POST['dienthoai'])) ? htmlspecialchars($_POST['dienthoai']) : 0;
	$data['hotline'] = (isset($_POST['hotline'])) ? htmlspecialchars($_POST['hotline']) : '';
	$data['gioitinh'] = (isset($_POST['gioitinh'])) ? htmlspecialchars($_POST['gioitinh']) : 0;
	$data['ngaysinh'] = (isset($_POST['ngaysinh'])) ? strtotime(str_replace("/", "-", $_POST['ngaysinh'])) : 0;
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['link_facebook'] = (isset($_POST['link_facebook'])) ? htmlspecialchars($_POST['link_facebook']) : '';
	$data['thuong_hieu_khac'] = (isset($_POST['thuong_hieu_khac'])) ? htmlspecialchars($_POST['thuong_hieu_khac']) : '';
	$data['website'] = (isset($_POST['website'])) ? htmlspecialchars($_POST['website']) : '';
	$data['tencongty'] = (isset($_POST['tencongty'])) ? htmlspecialchars($_POST['tencongty']) : '';
	$data['doanh_so'] = (isset($_POST['doanh_so'])) ? htmlspecialchars($_POST['doanh_so']) : '';
	$data['chucvu'] = (isset($_POST['chucvu'])) ? htmlspecialchars($_POST['chucvu']) : '';
	$data['mst'] = (isset($_POST['mst'])) ? htmlspecialchars($_POST['mst']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['nganhang'] = (isset($_POST['nganhang'])) ? htmlspecialchars($_POST['nganhang']) : '';
	$data['chinhanh'] = (isset($_POST['chinhanh'])) ? htmlspecialchars($_POST['chinhanh']) : '';
	$data['sotaikhoan'] = (isset($_POST['sotaikhoan'])) ? htmlspecialchars($_POST['sotaikhoan']) : '';
	$data['tentaikhoan'] = (isset($_POST['tentaikhoan'])) ? htmlspecialchars($_POST['tentaikhoan']) : '';
	$data['ghichu'] = (isset($_POST['ghichu'])) ? htmlspecialchars($_POST['ghichu']) : '';
	$data['thuong_hieu'] = (isset($_POST['all_brand'])) ? htmlspecialchars($_POST['all_brand']) : '';
	
	$data['diachi'] = (isset($_POST['diachi'])) ? htmlspecialchars($_POST['diachi']) : '';
	$data['diachi_shipping'] = (isset($_POST['diachi_shipping'])) ? htmlspecialchars($_POST['diachi_shipping']) : '';
	$data['district'] = (isset($_POST['district'])) ? htmlspecialchars($_POST['district']) : '';
	$data['district_shipping'] = (isset($_POST['district_shipping'])) ? htmlspecialchars($_POST['district_shipping']) : '';
	$data['city'] = (isset($_POST['city'])) ? htmlspecialchars($_POST['city']) : '';
	$data['city_shipping'] = (isset($_POST['city_shipping'])) ? htmlspecialchars($_POST['city_shipping']) : '';
	$data['quocgia'] = (isset($_POST['quocgia'])) ? htmlspecialchars($_POST['quocgia']) : '';
	$data['quocgia_shipping'] = (isset($_POST['quocgia_shipping'])) ? htmlspecialchars($_POST['quocgia_shipping']) : '';
	$data['zip_code'] = (isset($_POST['zip_code'])) ? htmlspecialchars($_POST['zip_code']) : '';
	$data['zip_code_shipping'] = (isset($_POST['zip_code_shipping'])) ? htmlspecialchars($_POST['zip_code_shipping']) : '';
	$data['diachi_hoadon'] = (isset($_POST['diachi_hoadon'])) ? htmlspecialchars($_POST['diachi_hoadon']) : '';
	$data['dienthoai_hoadon'] = (isset($_POST['dienthoai_hoadon'])) ? htmlspecialchars($_POST['dienthoai_hoadon']) : '';

	if (isset($_FILES['file'])) {
		$file_name = $func->uploadName($_FILES['file']["name"]);
		if ($photo = $func->uploadImage("file", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name)) {
			$data['banner'] = $photo;
		}
	}
	// var_dump($_FILES['avatar']);die();
	if (isset($_FILES['avatar'])) {
		$file_name1 = $func->uploadName($_FILES['avatar']["name"]);
		if ($photo1 = $func->uploadImage("avatar", ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF", UPLOAD_PHOTO_L, $file_name1)) {
			$data['avatar'] = $photo1;
		}
	}
	// var_dump($data);die();
	$iduser = $_SESSION[$login_member]['id'];
	/* Kiểm tra email đăng ký */
	$d->where('id', $iduser);
	if ($d->update('member', $data)) {
		if ($lang == 'vi') {
			$thanhcong = "Cập nhật thông tin thành công";
		} else {
			$thanhcong = "Successfully updated";
		}
		// $func->transfer($thanhcong, $config_base . "account/diachi");
		$login_message = $thanhcong;
		$redirect_url = $config_base . "account/diachi";
		$stt = true;
	} else {
		if ($lang == 'vi') {
			$thongbaothatbai = "Cập nhật thông tin thất bại.";
		} else {
			$thongbaothatbai = "Update information failed.";
		}
		// $func->transfer($thongbaothatbai, $config_base . "account/diachi", false);
		$login_message = $thongbaothatbai;
		$redirect_url = $config_base . "account/diachi";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function thanhtoanthanhcong()
{
	global $d, $setting, $emailer, $func, $config_base, $lang, $login_member;

	$iduser = $_SESSION[$login_member]['id'];
	// $row_detail = $d->rawQueryOne("select * from #_member where id = ? limit 0,1", array($iduser));
	$order = $d->rawQueryOne("select * from #_order where id = ? limit 0,1", array($_REQUEST['id_donhang']));
	// var_dump($_REQUEST['PayerID']);
	if ($_REQUEST['PayerID']) {
		/* Gán giá trị gửi email */
		$madonhang = $order['madonhang'];
		$madonhang_mahoa = openssl_encrypt($madonhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing');
		$hoten = $order['hoten'];

		/* Nội dung gửi email cho admin */
		$contentAdmin = '
             <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
                 <tbody>
                     <tr>
                        <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                                <tbody>
                                    <tr>
                                        <td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
                                            <table cellpadding="0" cellspacing="0" style="border-bottom:3px solid ' . $emailer->getEmail('color') . ';padding-bottom:10px;background-color:#fff" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
                                                            <div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
                                                            <div style="display:flex;justify-content:space-between;align-items:center;">
                                                                <table style="width:100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <a href="' . $emailer->getEmail('home') . '" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">' . $emailer->getEmail('logo') . '</a>
                                                                            </td>
                                                                            <td style="padding:15px 20px 0 0;text-align:right">' . $emailer->getEmail('social') . '</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="background:#fff">
                                        <td align="left" height="auto" style="padding:15px" width="600">
                                            <table style="width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0;text-align: center;">THANK YOU FOR PAYMENT SUCCESSFUL</h1>
                                                            <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">You have completed your payment successfully !<br>
															Click your order number <a style="color:#000;" href="' . $config_base . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a> to view more details.
															</p>
                                                            <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">We understand that you have many choices, BBRacing is extremely honored and grateful that you have finally decided to choose us. If there is anything BBRacing can do to improve your experience, please do not hesitate to contact us at info@bbracing.vn and hotline +84 919999968.</p>
															<div style="text-align: center;margin-top: 20px;">
																<a href="' . $config_base . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' " target="_blank" style="background: #000;color: #fff;padding: 10px 15px;line-height: 1.6;text-decoration: none;">CONTINE SHOPPING</a>
															</div>
														</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
						<td align="center">
							<table width="600"style="background: #fff;">
								<tbody style="padding:0 10px;background: #eee;display:block;">
									<tr>
										<td>
										<h3 style="font-size:13px;font-weight:bold;color:#000;text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">ORDER  PENDING !!</h3>
										<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">Thank you for your oder at BBRACING.</p>
										<p>
										Please pay for order <a style="color:#000;" href="' . $config_base . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a> at website www.bbracing.com within 30 minutes of receiving this email. 
										If payment is not made within the specified time, this order will automatically be canceled.
										</p>
										<p>Please refer to the purchasing instructions <a style="color:#000;" href="">here </a>.</p>
										<p>Thank you.</p>
										<p>*BBRacing - Your Trusted Partner!*</p>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
                 </tbody>
             </table>';

		/* Send email admin */

		$arrayEmail = array(
			"dataEmail" => array(
				"name" => $order['hoten'],
				"email" => $order['email']
			)
		);
		$subject = "PAYMENT SUCCESSFUL! " . $setting['ten' . $lang];
		$message = $contentAdmin;
		$file = 'file';
		if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)){
			// $func->transfer("PAYMENT SUCCESSFUL!", $config_base . 'account/donhang');
			$login_message = "PAYMENT SUCCESSFUL!";
			$redirect_url = $config_base;
			$stt = true;
		}
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function send_active_user($username)
{
	global $d, $setting, $emailer, $func, $config_base, $lang;

	/* Lấy thông tin người dùng */
	$row = $d->rawQueryOne("select id, maxacnhan, username, password, ten, email, dienthoai, diachi from #_member where username = ? limit 0,1", array($username));

	/* Gán giá trị gửi email */
	$iduser = $row['id'];
	$maxacnhan = $row['maxacnhan'];
	$tendangnhap = $row['username'];
	$matkhau = $row['password'];
	$tennguoidung = $row['ten'];
	$emailnguoidung = $row['email'];
	$dienthoainguoidung = $row['dienthoai'];
	$diachinguoidung = $row['diachi'];
	$linkkichhoat = $config_base . "account/kich-hoat?id=" . $iduser;

	/* Thông tin đăng ký */
	$thongtindangky = '<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:normal">Username: ' . $tendangnhap . '</span><br>Mật khẩu: *******' . substr($matkhau, -3) . '<br>Mã kích hoạt: ' . $maxacnhan . '</td><td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">';
	if ($tennguoidung) {
		$thongtindangky .= '<span style="text-transform:capitalize">' . $tennguoidung . '</span><br>';
	}
	if ($emailnguoidung) {
		$thongtindangky .= '<a href="mailto:' . $emailnguoidung . '" target="_blank">' . $emailnguoidung . '</a><br>';
	}
	if ($diachinguoidung) {
		$thongtindangky .= $diachinguoidung . '<br>';
	}
	if ($dienthoainguoidung) {
		$thongtindangky .= 'Tel: ' . $dienthoainguoidung . '</td>';
	}

	$contentMember = '
		<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
			<tbody>
				<tr>
					<td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
							<tbody>
								<tr>
									<td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
										<table cellpadding="0" cellspacing="0" style="border-bottom:3px solid ' . $emailer->getEmail('color') . ';padding-bottom:10px;background-color:#fff" width="100%">
											<tbody>
												<tr>
													<td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
														<div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
														<div style="display:flex;justify-content:space-between;align-items:center;">
															<table style="width:100%;">
																<tbody>
																	<tr>
																		<td>
																			<a href="' . $emailer->getEmail('home') . '" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">' . $emailer->getEmail('logo') . '</a>
																		</td>
																		<td style="padding:15px 20px 0 0;text-align:right">' . $emailer->getEmail('social') . '</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr style="background:#fff">
									<td align="left" height="auto" style="padding:15px" width="600">
										<table>
											<tbody>
												<tr>
													<td>
														<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Thank you for registering at ' . $emailer->getEmail('company:website') . '</h1>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Your account information has been received ' . $emailer->getEmail('company:website') . ' update. Please activate your account by accessing the link below.</p>
														<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">account information </h3>
													</td>
												</tr>
											<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">account information</th>
														<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">User information</th>
													</tr>
												</thead>
												<tbody>
													<tr>' . $thongtindangky . '</tr>
												</tbody>
											</table>
											</td>
										</tr>
										<tr>
											<td>
											<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>Note: Please access the link below to complete the account registration process.</i>
											<div style="margin:auto"><a href="' . $linkkichhoat . '" style="display:inline-block;text-decoration:none;background-color:' . $emailer->getEmail('color') . '!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:38%;margin-top:5px" target="_blank">Active account</a></div>
											</p>
											</td>
										</tr>
										<tr>
											<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px ' . $emailer->getEmail('color') . ' dashed;padding:10px;list-style-type:none">Do you need immediate assistance? Just send email <a href="mailto:' . $emailer->getEmail('company:email') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none" target="_blank"> <strong>' . $emailer->getEmail('company:email') . '</strong> </a>, or call the hotline <strong style="color:' . $emailer->getEmail('color') . '">' . $emailer->getEmail('company:hotline') . '</strong> ' . $emailer->getEmail('company:worktime') . '. ' . $emailer->getEmail('company:website') . ' always ready to support you at any time. Or call the hotline ' . $emailer->getEmail('company:hotline') . ' (8h30.am – 21h.pm). We are always ready to support you best</p>
											</td>
										</tr>
										<tr>
											<td>&nbsp;
											<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Best Regard,</p>
											<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;"><strong><a href="' . $emailer->getEmail('home') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none;font-size:14px" target="_blank">' . $emailer->getEmail('company') . '</a> </strong></p>
											</td>
										</tr>
									</tbody>
								</table>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td align="center">
					<table width="600">
						<tbody>
							<tr>
								<td>
								<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">You received this email because you registered at ' . $emailer->getEmail('company:website') . '.<br>
								To be sure to always receive email notifications and responses from ' . $emailer->getEmail('company:website') . ', Please add your address <strong><a href="mailto:' . $emailer->getEmail('email') . '" target="_blank">' . $emailer->getEmail('email') . '</a></strong> Enter the address number (Address Book, Contacts) of the email box.<br>
								<b>Address:</b> ' . $emailer->getEmail('company:address') . '</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
			</tbody>
		</table>';

	/* Send email admin */
	$arrayEmail = array(
		"dataEmail" => array(
			"name" => $row['username'],
			"email" => $row['email']
		)
	);
	$subject = "Member Account Activation Letter From " . $setting['ten' . $lang];
	$message = $contentMember;
	$file = '';

	if ($lang == 'vi') {
		$loi = "Có lỗi xảy ra trong quá trình kích hoạt tài khoản. Vui lòng liên hệ với chúng tôi.";
	} else {
		$loi = "An error occurred during account activation. Please contact us.";
	}
	if ($lang == 'vi') {
		$thanhcong = "Đăng ký thành viên thành công. Vui lòng kiểm tra email: " . $emailnguoidung . " để kích hoạt tài khoản";
	} else {
		$thanhcong = "Member registration successful. Please check your email: " . $emailnguoidung . " to activate your account";
	}
	// var_dump($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file));die();
	if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) {
		// $func->transfer_tb($thanhcong, $config_base,$stt = true);
		$login_message = $thanhcong;
		$redirect_url = $config_base;
		$stt = true;
		// var_dump($redirect_url);
	} else {
		// $func->transfer($loi, $config_base . "lien-he", false);
		$login_message = $loi;
		$redirect_url = $config_base . "lien-he";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function doimatkhau_user()
{
	global $d, $setting, $emailer, $func, $login_member, $config_base, $lang;

	$username = (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
	$email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
	$newpass = substr(md5(rand(0, 999) * time()), 15, 6);
	$newpassMD5 = md5($newpass);

	if ($lang == 'vi') {
		$chuanhap_tk = "Chưa nhập tên tài khoản";
		$chuanhap_email = "Chưa nhập email đăng ký tài khoản";
		$email_khongtontai = "Email không tồn tại";
	} else {
		$chuanhap_tk = "Account name has not been entered";
		$chuanhap_email = "Haven't entered account registration email yet";
		$email_khongtontai = "Email do not exist";
	}

	// if (!$username) $func->transfer($chuanhap_tk, $config_base . "account/quen-mat-khau", false);
	if (!$email) {
		// $func->transfer($chuanhap_email, $config_base . "account/quen-mat-khau", false);
		$login_message = $chuanhap_email;
		$redirect_url = $config_base . "account/quen-mat-khau";
		$stt = false;
	}

	/* Kiểm tra username và email */
	// $row = $d->rawQueryOne("select id from #_member where username = ? and email = ? limit 0,1", array($username, $email));
	$row = $d->rawQueryOne("select id from #_member where  email = ? limit 0,1", array($email));
	if (!$row['id']) {
		// $func->transfer($email_khongtontai, $config_base . "account/quen-mat-khau", false);
		$login_message = $email_khongtontai;
		$redirect_url = $config_base . "account/quen-mat-khau";
		$stt = false;
	}
	// var_dump($newpassMD5);die();
	/* Cập nhật mật khẩu mới */
	$data['password'] = $newpassMD5;
	// $d->where('username', $username);
	$d->where('email', $email);
	$d->update('member', $data);

	/* Lấy thông tin người dùng */
	$row = $d->rawQueryOne("select id, username, password, ten, email, dienthoai, diachi from #_member where email = ? limit 0,1", array($email));

	/* Gán giá trị gửi email */
	$iduser = $row['id'];
	$tendangnhap = $row['username'];
	$matkhau = $row['password'];
	$tennguoidung = $row['ten'];
	$emailnguoidung = $row['email'];
	$dienthoainguoidung = $row['dienthoai'];
	$diachinguoidung = $row['diachi'];

	/* Thông tin đăng ký */
	$thongtindangky = '<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:normal">Username: ' . $tendangnhap . '</span><br>Mật khẩu: *******' . substr($matkhau, -3) . '</td><td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">';
	if ($tennguoidung) {
		$thongtindangky .= '<span style="text-transform:capitalize">' . $tennguoidung . '</span><br>';
	}

	if ($emailnguoidung) {
		$thongtindangky .= '<a href="mailto:' . $emailnguoidung . '" target="_blank">' . $emailnguoidung . '</a><br>';
	}

	if ($diachinguoidung) {
		$thongtindangky .= $diachinguoidung . '<br>';
	}

	if ($dienthoainguoidung) {
		$thongtindangky .= 'Tel: ' . $dienthoainguoidung . '</td>';
	}

	$contentMember = '
		<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
			<tbody>
				<tr>
					<td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
							<tbody>
								<tr>
									<td align="center" id="m_-6357629121201466163headerImage" valign="bottom">
										<table cellpadding="0" cellspacing="0" style="border-bottom:3px solid ' . $emailer->getEmail('color') . ';padding-bottom:10px;background-color:#fff" width="100%">
											<tbody>
												<tr>
													<td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
														<div style="color:#fff;background-color:f2f2f2;font-size:11px">&nbsp;</div>
														<table style="width:100%;">
															<tbody>
																<tr>
																	<td>
																		<a href="' . $emailer->getEmail('home') . '" style="border:medium none;text-decoration:none;color:#007ed3;margin:0px 0px 0px 20px" target="_blank">' . $emailer->getEmail('logo') . '</a>
																	</td>
																	<td style="padding:15px 20px 0 0;text-align:right">' . $emailer->getEmail('social') . '</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr style="background:#fff">
									<td align="left" height="auto" style="padding:15px" width="600">
										<table>
											<tbody>
												<tr>
													<td>
														<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Welcome</h1>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Your request to re-provide your password has been received and is being processed. Please confirm the link below to receive a new password.</p>
														<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">account information <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Day ' . date('d', $emailer->getEmail('datesend')) . ' month ' . date('m', $emailer->getEmail('datesend')) . ' year ' . date('Y H:i:s', $emailer->getEmail('datesend')) . ')</span></h3>
													</td>
												</tr>
											<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">account information</th>
														<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">User information</th>
													</tr>
												</thead>
												<tbody>
													<tr>' . $thongtindangky . '</tr>
												</tbody>
											</table>
											</td>
										</tr>
										<tr>
											<td>
											<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>Note: Please change your password immediately after logging in with the new password below.</i>
											<div style="margin:auto"><p style="display:inline-block;text-decoration:none;background-color:' . $emailer->getEmail('color') . '!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:33%;margin-top:5px" target="_blank">A new password: ' . $newpass . '</p></div>
											</p>
											</td>
										</tr>
										<tr>
											<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px ' . $emailer->getEmail('color') . ' dashed;padding:10px;list-style-type:none">Do you need immediate assistance? Just send email <a href="mailto:' . $emailer->getEmail('company:email') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none" target="_blank"> <strong>' . $emailer->getEmail('company:email') . '</strong> </a>, or call the hotline <strong style="color:' . $emailer->getEmail('color') . '">' . $emailer->getEmail('company:hotline') . '</strong> ' . $emailer->getEmail('company:worktime') . '. ' . $emailer->getEmail('company:website') . ' always ready to support you at any time.</p>
											</td>
										</tr>
										<tr>
											<td>&nbsp;
											<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Once again ' . $emailer->getEmail('company:website') . ' Thank you.</p>
											<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="' . $emailer->getEmail('home') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none;font-size:14px" target="_blank">' . $emailer->getEmail('company') . '</a> </strong></p>
											</td>
										</tr>
									</tbody>
								</table>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td align="center">
					<table width="600">
						<tbody>
							<tr>
								<td>
								<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">You received this email because you contacted us at ' . $emailer->getEmail('company:website') . '.<br>
								To be sure to always receive email notifications and responses from ' . $emailer->getEmail('company:website') . ', Please add your address <strong><a href="mailto:' . $emailer->getEmail('email') . '" target="_blank">' . $emailer->getEmail('email') . '</a></strong> Enter the address number (Address Book, Contacts) of the email box.<br>
								<b>Address:</b> ' . $emailer->getEmail('company:address') . '</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
			</tbody>
		</table>';

	/* Send email admin */
	$arrayEmail = array(
		"dataEmail" => array(
			"name" => $tennguoidung,
			"email" => $email
		)
	);
	$subject = "Password reset letter from " . $setting['ten' . $lang];
	$message = $contentMember;
	$file = '';
	if ($lang == 'vi') {
		$thatbai = "Có lỗi xảy ra trong quá trình cấp lại mật khẩu. Vui lòng liện hệ với chúng tôi";
	} else {
		$thatbai = "An error occurred during the password reset process. Please contact us";
	}

	if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) {
		unset($_SESSION[$login_member]);
		setcookie('login_member_id', "", -1, '/');
		setcookie('login_member_session', "", -1, '/');

		if ($lang == 'vi') {
			$thanhcong = "Cấp lại mật khẩu thành công. Vui lòng kiểm tra email";
		} else {
			$thanhcong = "Reissued password successfully. Please check your email";
		}

		// $func->transfer($thanhcong . $email, $config_base);
		$login_message = $thanhcong . $email;
		$redirect_url = $config_base;
		$stt = true;
	} else {
		// $func->transfer($thatbai, $config_base . "account/quen-mat-khau", false);
		$login_message = $thatbai;
		$redirect_url = $config_base . "account/quen-mat-khau";
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

function logout()
{
	global $d, $func, $login_member, $config_base;

	unset($_SESSION[$login_member]);
	setcookie('login_member_id', "", -1, '/');
	setcookie('login_member_session', "", -1, '/');
	setcookie('c_user', '', -1, '/');


	$func->redirect($config_base);
}
function google_client_user()
{
	global $d, $func, $login_member, $config_base;

	// session_start();


	// client

	$client = $func->clientGoogle();

	// Tạo ra 1 biến mới để lấy thông tin người dùng

	$service = new Google\Service\Oauth2($client);

	// Kiểm tra xem có $_GET[‘code’] không. nếu không thì trở về login còn không thì tiếp tục xử lý

	if (isset($_GET['code'])) {

		// Kiểm tra mã code có hợp lệ hay không

		$check = $client->authenticate($_GET['code']);

		// Mã code sẽ phát sinh trong lần request đầu tiên lần phát sinh sau sẽ lỗi.

		// Và mã code sẽ sinh ra 1 đoạn array có các key là: error(mã lỗi), error_description(Thông báo lỗi)

		if (isset($check['error'])) {

			echo $check['error_description'];
		} else {

			// Thông tin người dùng

			$user = $service->userinfo->get();


			$info = $func->checkThongTin($user->email); // lấy token bằng hàm getAccessToken


			if (!$info) {

				// Nếu không có tài khoản thì thêm 1 tài khoản mới

				$email = $user->email; // var_dump($user) ra xem

				$name = $user->name; // var_dump($user) ra xem

				// $avatar = $user->picture; // var_dump($user) ra xem

				// $password = $user->name; // password tạo ra cho vui nên mình gán luôn là fullname nha ^^

				// $token = mt_rand(1000, 50000); // hàm getAccessToken của thư viện

				// $func->insertUser($email, $name); // thêm người dùng vào nè
				$data['username'] = $name;
				$data['email'] = $email;
				$data['id_vip'] = '';
				$data['ngaytao'] = time();
				$data['hienthi'] = 1;

				$d->insert('member', $data);
				// send_active_user($name);
				// var_dump($d->insert('member', $data));
				// die();
				// SET SESSION[‘id’] và trở về trang chủ

				$row = $d->rawQueryOne("select * from #_member where email = ? and hienthi > 0 limit 0,1", array($email));

				$id_user = $row['id'];
				$lastlogin = time();
				$login_session = md5($row['user_id'] . $lastlogin);
				$d->rawQuery("update #_member set login_session = ?, lastlogin = ? where id = ?", array($login_session, $lastlogin, $id_user));

				/* Lưu session login */
				$_SESSION[$login_member]['active'] = true;
				$_SESSION[$login_member]['id'] = $row['id'];
				$_SESSION[$login_member]['username'] = $row['username'];
				$_SESSION[$login_member]['dienthoai'] = $row['dienthoai'];
				$_SESSION[$login_member]['diachi'] = $row['diachi'];
				$_SESSION[$login_member]['email'] = $row['email'];
				$_SESSION[$login_member]['ten'] = $row['ten'];
				$_SESSION[$login_member]['user_id'] = $row['user_id'];
				$_SESSION[$login_member]['login_session'] = $login_session;

				$func->redirect($config_base);
			} else {

				// Nếu đã có tài khoản thì set SESSION[‘id’] và trở về lại trang chủ
				$name = $user->email;
				$row = $d->rawQueryOne("select * from #_member where email = ? and hienthi > 0 limit 0,1", array($name));

				$id_user = $row['id'];
				$lastlogin = time();
				$login_session = md5($row['user_id'] . $lastlogin);
				$d->rawQuery("update #_member set login_session = ?, lastlogin = ? where id = ?", array($login_session, $lastlogin, $id_user));

				/* Lưu session login */
				$_SESSION[$login_member]['active'] = true;
				$_SESSION[$login_member]['id'] = $row['id'];
				$_SESSION[$login_member]['username'] = $row['username'];
				$_SESSION[$login_member]['dienthoai'] = $row['dienthoai'];
				$_SESSION[$login_member]['diachi'] = $row['diachi'];
				$_SESSION[$login_member]['email'] = $row['email'];
				$_SESSION[$login_member]['ten'] = $row['ten'];
				$_SESSION[$login_member]['user_id'] = $row['user_id'];
				$_SESSION[$login_member]['login_session'] = $login_session;
				// var_dump($_SESSION[$login_member]);die();
				$func->redirect($config_base);
			}
		}
	} else {

		$func->redirect($config_base);
	}
}
