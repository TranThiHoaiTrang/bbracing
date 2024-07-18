<?php
include "ajax_config.php";


$code = $_POST['code_dh'];

$donhang = $d->rawQueryOne("select * from #_order where madonhang = '$code' ");

if (!empty($donhang)) { ?>
	<div class="all_table_order">
		<div class="table_order_top">
			<div class="table_order_top_left">
				<div>
					<span>Mã đơn hàng: <?= $donhang['madonhang'] ?></span><br>
					<span>Người mua: <?= $donhang['hoten'] ?></span><br>
					<span>Email: <?= $donhang['email'] ?></span><br>
					<span>dienthoai: <?= $donhang['dienthoai'] ?></span>
				</div>
			</div>
			<div class="table_order_top_right">
				<div>
					<span>Ngày mua hàng: <?= date("d/m/Y", $donhang['ngaytao']) ?></span><br>
					<span>Địa chỉ: <?= $donhang['diachi'] ?></span>
				</div>
			</div>
		</div>
		<div class="table_order_bottom">
			<?php
			$chitiet_donhang = $d->rawQuery("select * from #_order_detail where id_order = '" . $donhang['id'] . "' ");
			?>
			<?php foreach ($chitiet_donhang as $dh) { ?>
				<div>
					<span><?= $dh['ten'] ?></span><br>
					<?php if ($lang == 'vi') { ?>
						<span>Giá tiền: <?= $func->format_money($dh['gia']) ?></span>
					<?php } else { ?>
						<span>Giá tiền: <?= $func->format_money_erou($dh['giaen']) ?></span>
					<?php } ?>
					<span> - Số lượng: <?= $dh['soluong'] ?></span><br>
				</div>
			<?php } ?>
		</div>
		<div class="table_order_kq">
			<div class="order_check"><i class="fas fa-check"></i></div>
			<div class="ketqua_check">
				<?php if ($donhang['tinhtrang'] == '5') { ?>
					<span><?= $lang == 'vi' ? 'Đã hủy' : 'Cancelled' ?></span>
				<?php } ?>
				<?php if ($donhang['tinhtrang'] == '4') { ?>
					<?php if($lang == 'vi') {?>
						<span>Mới đặt | Đã xác nhận | Đang giao hàng | Đã giao</span>
					<?php }else{ ?>
						<span>New Order | Confirmed | Shipping | Delivered</span>
					<?php } ?>
				<?php } ?>
				<?php if ($donhang['tinhtrang'] == '3') { ?>
					<?php if($lang == 'vi') {?>
						<span>Mới đặt | Đã xác nhận | Đang giao hàng</span>
					<?php }else{ ?>
						<span>New Order | Confirmed | Shipping</span>
					<?php } ?>
				<?php } ?>
				<?php if ($donhang['tinhtrang'] == '2') { ?>
					<?php if($lang == 'vi') {?>
						<span>Mới đặt | Đã xác nhận</span>
					<?php }else{ ?>
						<span>New Order | Confirmed</span>
					<?php } ?>
				<?php } ?>
				<?php if ($donhang['tinhtrang'] == '1') { ?>
					<?php if($lang == 'vi') {?>
						<span>Mới đặt</span>
					<?php }else{ ?>
						<span>New Order</span>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>

<?php } else {
	$html = '<div class="row text-center" ng-show="ShowError">
                        <div class="col-md-12">
                            <p class="_str_error ng-binding" ng-bind="Message">Thông tin tra cứu không đúng vui lòng kiểm tra lại !</p>
                        </div>
                    </div>';
}

echo $html;
?>