<?php
include "ajax_config.php";

$id_news = (isset($_POST['id_news']) && $_POST['id_news'] > 0) ? htmlspecialchars($_POST['id_news']) : 0;
$id_user = (isset($_POST['id_user']) && $_POST['id_user'] > 0) ? htmlspecialchars($_POST['id_user']) : 0;

$follow = $d->rawQueryOne("select follow from #_member where id = '$id_user'");

$user = $id_news . ',' . $follow['follow'];
$user_ex = explode(',', $user);


$user_count = array_count_values($user_ex);
if ($user_count[$id_news] >= 2) {
	$user2 = array_diff($user_ex, array($id_news));
} else {
	$user2 = $user_ex;
}
$user = implode(',',$user2);

$data['follow'] = $user;
$d->where('id', $id_user);
$d->update('member', $data);

