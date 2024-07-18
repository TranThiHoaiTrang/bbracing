<?php
include "ajax_config.php";

$cmd = (isset($_POST['cmd']) && $_POST['cmd'] != '') ? htmlspecialchars($_POST['cmd']) : '';
$user_id = (isset($_POST['user_id']) && $_POST['user_id'] > 0) ? htmlspecialchars($_POST['user_id']) : 0;
// var_dump($cmd);
if ($cmd == 'login') {
	$row = $d->rawQueryOne("select * from #_member where user_id = ? and hienthi > 0 limit 0,1", array($user_id));
	// var_dump($row);

	if ($row['user_id']) {
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

		echo('true');
		
		// header('Location: '$config_base);
		// $func->redirect($config_base,'account/tongquan');
	} else {
		$username = (isset($_POST['name']) && $_POST['name'] != '') ? htmlspecialchars($_POST['name']) : '';
		$data['username'] = $username;
		$data['id_vip'] = '';
		$data['ngaytao'] = time();
		$data['hienthi'] = 1;
		$data['user_id'] = $user_id;
		$data['newsletter'] = (isset($_POST['check_newsletter'])) ? htmlspecialchars($_POST['check_newsletter']) : 0;

		$d->insert('member', $data);
		send_active_user($username);
		echo('true');
		// $func->redirect($config_base,'account/tongquan');
	}
} elseif ($cmd == 'logout') {
	unset($_SESSION[$login_member]);
	setcookie('login_member_id', "", -1, '/');
	setcookie('login_member_session', "", -1, '/');
	setcookie('c_user', '', -1, '/');
	$func->redirect($config_base);
	// header("location:$config_base", true);
	// header('Location: $config_base');
	// exit();
}?>
