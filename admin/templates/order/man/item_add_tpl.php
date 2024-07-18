<style>
	.text-danger i {
		font-size: 11px;
		margin-right: 3px;
	}

	.cast-money-cart-detail i {
		font-size: 11px;
		margin-right: 3px;
	}
</style>
<?php
$linkMan = "index.php?com=order&act=man&p=" . $curPage;
$linkSave = "index.php?com=order&act=save&p=" . $curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item"><a href="<?= $linkMan ?>" title="Quản lý đơn hàng">Quản lý đơn hàng</a></li>
				<li class="breadcrumb-item active">Thông tin đơn hàng <span class="text-primary">#<?= $item['madonhang'] ?></span></li>
			</ol>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
		<div class="card-footer text-sm sticky-top">
			<button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
		</div>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Thông tin chính</h3>
			</div>
			<div class="card-body row">
				<div class="form-group col-md-4 col-sm-6">
					<label>Mã đơn hàng:</label>
					<p class="text-primary"><?= @$item['madonhang'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Hình thức thanh toán:</label>
					<p class="text-info"><?= $func->get_payments(@$item['httt']) ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Họ tên:</label>
					<p class="font-weight-bold text-uppercase text-success"><?= @$item['hoten'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Điện thoại:</label>
					<p><?= @$item['dienthoai'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Email:</label>
					<p><?= @$item['email'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Địa chỉ:</label>
					<p><?= @$item['diachi'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Quận/Huyện:</label>
					<p><?= @$item['district_shipping'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Thành phố:</label>
					<p><?= @$item['city_shipping'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Quốc gia:</label>
					<p><?= @$item['quocgia_shipping'] ?></p>
				</div>
				<!-- </?php if (isset($config['order']['ship']) && $config['order']['ship'] == true) { ?>
					<div class="form-group col-md-4 col-sm-6">
						<label>Phí vận chuyển:</label>
						<p class="font-weight-bold text-danger">
							<?php if (isset($item['phiship']) && $item['phiship'] > 0) { ?>
								<?= $func->format_money($item['phiship']) ?>
							<?php } else { ?>
								Không
							<?php } ?>
						</p>
					</div>
				</?php } ?> -->
				<div class="form-group col-md-4 col-sm-6">
					<label>Discount:</label>
					<p class="font-weight-bold text-danger">
						<?php if ($item['giadiscounten']) { ?>
							<?php if (isset($item['giadiscounten']) && $item['giadiscounten'] > 0) { ?>
								<?= $item['giadiscounten'] ?>$
							<?php } else { ?>
								Không
							<?php } ?>
						<?php } else { ?>
							<?php if (isset($item['giadiscount']) && $item['giadiscount'] > 0) { ?>
								<?= $func->format_money($item['giadiscount']) ?>
							<?php } else { ?>
								Không
							<?php } ?>
						<?php } ?>

					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Phương thức vận chuyển:</label>
					<p><?= @$item['phuongthucvanchuyen'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Phương thức vận chuyển noted:</label>
					<p><?= @$item['phuongthucvanchuyen_note'] ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Confirm order:</label>
					<p><?= date("d/m/Y", @$item['ngaytao']) ?></p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_shipcost">Shipping Cost:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_shipcost]" id="ngay_shipcost" placeholder="Shipping Cost" value="<?= !empty(@$item['ngay_shipcost']) ? date('Y-m-d', @$item['ngay_shipcost']) : '' ?>">
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_waiting_payment">Awaiting bank wire payment:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_waiting_payment]" id="ngay_waiting_payment" placeholder="Awaiting bank wire payment" value="<?= !empty(@$item['ngay_waiting_payment']) ? date('Y-m-d', @$item['ngay_waiting_payment']) : '' ?>">
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_payment">Completly Payment:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_payment]" id="ngay_payment" placeholder="Completly Payment" value="<?= !empty(@$item['ngay_payment']) ?  date('Y-m-d', @$item['ngay_payment']) : '' ?>">
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_shipped">Shipped:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_shipped]" id="ngay_shipped" placeholder="Shipped" value="<?= !empty(@$item['ngay_shipped']) ? date('Y-m-d', @$item['ngay_shipped']) : '' ?>">
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_completed">Completed:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_completed]" id="ngay_completed" placeholder="Completed" value="<?= !empty(@$item['ngay_completed']) ? date('Y-m-d', @$item['ngay_completed']) : '' ?>">
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label for="ngay_cancelled">Cancelled:</label>
					<input type="date" min="2023-01-01" max="3000-12-31" class="form-control for-seo" name="data[ngay_cancelled]" id="ngay_cancelled" placeholder="Cancelled" value="<?= !empty(@$item['ngay_cancelled']) ? date('Y-m-d', @$item['ngay_cancelled']) : '' ?>">
				</div>
				<!-- <div class="form-group col-12">
					<label for="ghichu">Yêu cầu khác:</label>
					<textarea class="form-control" name="data[yeucaukhac]" id="yeucaukhac" rows="5" placeholder="Yêu cầu khác"><?= @$item['yeucaukhac'] ?></textarea>
				</div> -->
				<div class="form-group col-12">
					<label for="tinhtrang" class="mr-2">Tình trạng:</label>
					<?= $func->orderStatus(@$item['tinhtrang']) ?>
				</div>
				<div class="form-group">
					<label class="change-file mb-1 mr-2" for="file-taptin">
						<p>Upload tập tin:</p>
						<strong class="ml-2">
							<span class="btn btn-sm bg-gradient-success"><i class="fas fa-file-upload mr-2"></i>Chọn tập tin</span>
							<div><b class="text-sm text-split"></b></div>
						</strong>
					</label>
					<strong class="d-block mt-2 mb-2 text-sm"><?php echo $config['static'][$type]['file_type']; ?></strong>
					<div class="custom-file my-custom-file d-none">
						<input type="file" class="custom-file-input" name="file-taptin" id="file-taptin">
						<label class="custom-file-label" for="file-taptin">Chọn file</label>
					</div>
					<?php if (isset($item['taptin']) && $item['taptin'] != '') { ?>
						<div class="name_taptin" style="font-weight: 600;  margin-bottom: 5px;  font-size: 15px;">Name: <?= @$item['taptin'] ?></div>
						<a class="btn btn-sm bg-gradient-primary text-white d-inline-block align-middle p-2 rounded mb-1" href="<?= UPLOAD_FILE . @$item['taptin'] ?>" title="Download tập tin hiện tại"><i class="fas fa-download mr-2"></i>Download tập tin hiện tại</a>
					<?php } ?>
				</div>

				<?php /* ?>
				    <div class="form-group">
	                    <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
	                    <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
	                </div>
	            <?php */ ?>
				<?php
				if (@$item['phuongthucvanchuyen'] == 'viettel_post' || @$item['phuongthucvanchuyen'] == 'vn_post') {
					$vanchuyen = 'trongnuoc';
				} else {
					$vanchuyen = 'ngoainuoc';
				}

				if ($item['tonggia']) {
					if ($vanchuyen == 'trongnuoc' && $item['tonggia'] >= '900000') { ?>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping (miễn phí):</label>
							<input type="text" class="form-control d-inline-block align-middle format-price" min="0" name="data[phiship]" id="phiship" placeholder="Shipping" value="<?= isset($item['phiship']) ? $item['phiship'] : 0 ?>" readonly>
						</div>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping en (miễn phí):</label>
							<input type="text" class="form-control d-inline-block align-middle" min="0" name="data[phishipen]" id="phishipen" placeholder="Shipping en" value="<?= isset($item['phishipen']) ? $item['phishipen'] : 0 ?>" readonly>
						</div>
					<?php } else { ?>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping:</label>
							<input type="text" class="form-control d-inline-block align-middle format-price" min="0" name="data[phiship]" id="phiship" placeholder="Shipping" value="<?= isset($item['phiship']) ? $item['phiship'] : 0 ?>">
						</div>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping en:</label>
							<input type="text" class="form-control d-inline-block align-middle" min="0" name="data[phishipen]" id="phishipen" placeholder="Shipping en" value="<?= isset($item['phishipen']) ? $item['phishipen'] : 0 ?>">
						</div>
					<?php }
				} else {
					if ($vanchuyen == 'trongnuoc' && $item['tonggiaen'] >= '33.76') {
					} else { ?>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping (miễn phí):</label>
							<input type="text" class="form-control d-inline-block align-middle format-price" min="0" name="data[phiship]" id="phiship" placeholder="Shipping" value="<?= isset($item['phiship']) ? $item['phiship'] : 0 ?>" readonly>
						</div>
						<div class="form-group col-12">
							<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Shipping en (miễn phí):</label>
							<input type="text" class="form-control d-inline-block align-middle" min="0" name="data[phishipen]" id="phishipen" placeholder="Shipping en" value="<?= isset($item['phishipen']) ? $item['phishipen'] : 0 ?>" readonly>
						</div>
				<?php }
				}
				?>

				<div class="form-group col-12">
					<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Tracking number:</label>
					<input type="text" class="form-control d-inline-block align-middle" min="0" name="data[shipping_cost]" id="shipping_cost" placeholder="Tracking number" value="<?= isset($item['shipping_cost']) ? $item['shipping_cost'] : '' ?>">
				</div>
				<div class="form-group col-12">
					<label for="ghichu">Ghi chú:</label>
					<textarea class="form-control" name="data[ghichu]" id="ghichu" rows="5" placeholder="Ghi chú"><?= @$item['ghichu'] ?></textarea>
				</div>
			</div>
		</div>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Chi tiết đơn hàng</h3>
			</div>
			<div class="card-body table-responsive p-0">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="align-middle text-center" width="10%">STT</th>
							<th class="align-middle">Hình ảnh</th>
							<th class="align-middle" style="width:30%">Tên sản phẩm</th>
							<th class="align-middle text-center">Đơn giá</th>
							<th class="align-middle text-right">Số lượng</th>
							<th class="align-middle text-right">Tạm tính</th>
						</tr>
					</thead>
					<?php if (empty($chitietdonhang)) { ?>
						<tbody>
							<tr>
								<td colspan="100" class="text-center">Không có dữ liệu</td>
							</tr>
						</tbody>
					<?php } else { ?>
						<tbody>
							<?php foreach ($chitietdonhang as $k => $v) { ?>
								<tr>
									<td class="align-middle text-center"><?= ($k + 1) ?></td>
									<td class="align-middle">
										<a title="<?= $v['ten'] ?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?= THUMBS ?>/<?= $config['order']['thumb'] ?>/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>"></a>
									</td>
									<td class="align-middle">
										<p class="text-primary mb-1"><?= $v['ten'] ?></p>
										<?php if ($v['mau'] != '' || $v['size'] != '') { ?>
											<p class="mb-0">
												<?php if ($v['mau'] != '') { ?>
													<span class="pr-2">Màu: <?= $v['mau'] ?></span>
												<?php } ?>
												<?php if ($v['size'] != '') { ?>
													<span>Size: <?= $v['size'] ?></span>
												<?php } ?>
											</p>
										<?php } ?>
									</td>
									<td class="align-middle text-center">
										<div class="price-cart-detail">
											<?php if ($v['giamoien']) { ?>
												<span class="price-new-cart-detail"><i class="fas fa-euro-sign"></i><?= $v['giamoien'] ?></span>
												<!-- <span class="price-old-cart-detail"></?= $func->format_money($v['gia']) ?></span> -->
											<?php } elseif ($v['giamoi']) { ?>
												<span class="price-new-cart-detail"><?= $func->format_money($v['giamoi']) ?></span>
												<span class="price-old-cart-detail"><?= $func->format_money($v['gia']) ?></span>
											<?php } else { ?>
												<span class="price-new-cart-detail"><?= $func->format_money($v['gia']) ?></span>
											<?php } ?>
										</div>
									</td>
									<td class="align-middle text-right"><?= $v['soluong'] ?></td>
									<td class="align-middle text-right">
										<div class="price-cart-detail">
											<?php if ($v['giamoien']) { ?>
												<span class="price-new-cart-detail"><i class="fas fa-euro-sign"></i><?= $v['giamoien'] * $v['soluong'] ?></span>
											<?php } elseif ($v['giamoi']) { ?>
												<span class="price-new-cart-detail"><?= $func->format_money($v['giamoi'] * $v['soluong']) ?></span>
												<span class="price-old-cart-detail"><?= $func->format_money($v['gia'] * $v['soluong']) ?></span>
											<?php } else { ?>
												<span class="price-new-cart-detail"><?= $func->format_money($v['gia'] * $v['soluong']) ?></span>
											<?php } ?>
										</div>
									</td>
								</tr>
							<?php } ?>
							<?php if (
								(isset($config['order']['ship']) && $config['order']['ship'] == true)
							) { ?>
								<tr>
									<td colspan="5" class="title-money-cart-detail">Tạm tính:</td>
									<?php if ($item['tamtinhen']) { ?>
										<td colspan="1" class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $item['tamtinhen'] ?></td>
									<?php } else { ?>
										<td colspan="1" class="cast-money-cart-detail"><?= $func->format_money($item['tamtinh']) ?></td>
									<?php } ?>
								</tr>
							<?php } ?>
							<!-- </?php if(isset($config['order']['ship']) && $config['order']['ship'] == true) { ?>
								<tr>
									<td colspan="5" class="title-money-cart-detail">Phí vận chuyển:</td>
									<td colspan="1" class="cast-money-cart-detail">
										<?php if ($item['phiship']) { ?>
											<?= $func->format_money($item['phiship']) ?>
										<?php } else { ?>
											Không
										<?php } ?>
									</td>
								</tr>
							</?php } ?> -->
							<tr>
								<td colspan="5" class="title-money-cart-detail">Discount:</td>
								<td colspan="1" class="cast-money-cart-detail">
									<?php if ($item['giadiscounten']) { ?>
										<?php if ($item['giadiscounten']) { ?>
											<i class="fas fa-euro-sign"></i><?= $item['giadiscounten'] ?>
										<?php } else { ?>
											Không
										<?php } ?>
									<?php } else { ?>
										<?php if ($item['giadiscount']) { ?>
											<?= $func->format_money($item['giadiscount']) ?>
										<?php } else { ?>
											Không
										<?php } ?>
									<?php } ?>

								</td>
							</tr>
							<tr>
								<td colspan="5" class="title-money-cart-detail">Tổng giá trị đơn hàng:</td>
								<?php if ($item['tonggiaen']) { ?>
									<td colspan="1" class="cast-money-cart-detail"><i class="fas fa-euro-sign"></i><?= $item['tonggiaen'] ?></td>
								<?php } else { ?>
									<td colspan="1" class="cast-money-cart-detail"><?= $func->format_money($item['tonggia']) ?></td>
								<?php } ?>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="card-footer text-sm">
			<button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
			<input type="hidden" name="id" value="<?= @$item['id'] ?>">
		</div>
	</form>
</section>