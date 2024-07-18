<?php
include "ajax_config.php";

$keyword = $_POST['keyword'] ?? '';
$tinhtrang = $_POST['trangthai'] ?? '';
$date_dathang = $_POST['date_dathang'] ?? '';
$id_user = $_POST['id_user'] ?? '';
$action = $_POST['action'] ?? '';

// var_dump($date_dathang);
if ($date_dathang) {
	$date_dathang = explode("-", $date_dathang);
	$ngaytu = trim($date_dathang[0]);
	$ngayden = trim($date_dathang[1]);
	$ngaytu = strtotime(str_replace("/", "-", $ngaytu));
	$ngayden = strtotime(str_replace("/", "-", $ngayden));
	$where .= " and ngaytao<=$ngayden and ngaytao>=$ngaytu";
}
if ($tinhtrang) {
	$tinh_trang = "and tinhtrang = '" . $tinhtrang . "'";
}
if ($keyword) {
	$madon_hang = "and madonhang = '" . $keyword . "'";
}

// var_dump("select * from #_order where id_user = '$id_user' $madon_hang  $tinh_trang $where order by id desc");
$donhang = $d->rawQuery("select * from #_order where id_user = '$id_user' $madon_hang  $tinh_trang $where order by id desc");


?>
<?php if ($action == 'donhang') { ?>
	<table class="table table_donhang">
		<thead>
			<tr>
				<th scope="col"><?= $lang == 'vi' ? 'Mã đơn hàng' : 'Code orders' ?></th>
				<th scope="col"><?= $lang == 'vi' ? 'Ngày đặt' : 'Order date' ?></th>
				<th scope="col"><?= $lang == 'vi' ? 'Thành tiền' : 'Money amount' ?></th>
				<th scope="col">Payment</th>
				<th scope="col"><?= $lang == 'vi' ? 'Tình trạng' : 'Status' ?></th>
				<th scope="col">Invoice</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($donhang as $l) { ?>
				<?php
				$tendonhang = $d->rawQuery("select * from table_order_detail where id_order = ?", array($l['id']));
				?>
				<tr>
					<td><a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>"><?= $l['madonhang'] ?></a></td>
					<th scope="row"><?= date("d/m/Y", $l['ngaytao']) ?></th>

					<?php if ($l['tonggiaen']) { ?>
						<td colspan="1"><strong><i class="fas fa-euro-sign"></i><?= $l['tonggiaen'] ?></strong></td>
					<?php } else { ?>
						<td colspan="1"><strong><?= $func->format_money($l['tonggia']) ?></strong></td>
					<?php } ?>
					<td><?= $func->get_payments($l['httt']) ?></td>
					<?php $tinhtrang = $d->rawQueryOne("select * from table_status where id = ? ", array($l['tinhtrang'])); ?>

					<td><?= $tinhtrang['trangthai'] ?></td>
					<td>
						<a href="<?= $config_base ?>/upload/file/<?= $l['taptin'] ?>" style="color: #000;">
							<i class="far fa-file-pdf"></i>
							<span>PDF</span>
						</a>
					</td>
					<td>
						<a href="account/donhang_chitiet?id_donhang=<?= openssl_encrypt($l['id'], 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing') ?>" style="color: #000;">
							<div class="tracking_donhang">
								<span>Details</span>
								<i class="fas fa-long-arrow-alt-right"></i>
							</div>
						</a>
					</td>
					<td>
						<button type="button" class="btn tracking_Reorder" data-id_order="<?= $l['id'] ?>" data-toggle="modal" data-target=".reo_order">
							<i class="fas fa-th-large"></i>
							<span>Reorder</span>
						</button>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
<?php } else { ?>
	<table class="table table_donhang">
		<thead>
			<tr>
				<th scope="col"><?= $lang == 'vi' ? 'Mã khách hàng' : 'Customer ID' ?></th>
				<th scope="col"><?= $lang == 'vi' ? 'Mã đơn hàng' : 'Order Number' ?></th>
				<th scope="col"><?= $lang == 'vi' ? 'Tình trạng' : 'Status' ?></th>
				<th scope="col">Forwader</th>
				<th scope="col">Tracking Number</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($donhang as $l) { ?>
				<?php
				$tendonhang = $d->rawQuery("select * from table_order_detail where id_order = ?", array($l['id']));
				$tinhtrang = $d->rawQueryOne("select * from table_status where id = ? ", array($l['tinhtrang']));
				?>
				<tr>
					<td>BBR<?= $_SESSION[$login_member]['id_member'] ?></td>
					<td><?= $l['madonhang'] ?></td>
					<td><?= $tinhtrang['trangthai'] ?></td>
					<td>
						<?php
						if (!empty($l['phuongthucvanchuyen'])) {
							echo $l['phuongthucvanchuyen'];
						} elseif (!empty($l['phuongthucvanchuyen_note'])) {
							echo $l['phuongthucvanchuyen_note'];
						}
						?>
					</td>
					<?php $tinhtrang = $d->rawQueryOne("select * from table_status where id = ? ", array($l['tinhtrang'])); ?>

					<td><?= $l['shipping_cost'] ?></td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
<?php } ?>