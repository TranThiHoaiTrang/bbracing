<?php
$linkMan = "index.php?com=user&act=man&p=" . $curPage;
$linkSave = "index.php?com=user&act=save&p=" . $curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item active">Chi tiết tài khoản khách</li>
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
				<h3 class="card-title"><?= ($act == "edit") ? "Cập nhật" : "Thêm mới"; ?> tài khoản</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="username">Tài khoản: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="data[username]" id="username" placeholder="Tài khoản" value="<?= @$item['username'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
					</div>
					<div class="form-group col-md-4">
						<label for="vip">Vip:</label>
						<?php
						$item_vip = $d->rawQuery("select * from #_member_vip");
						?>
						<select class="form-control" name="data[id_vip]" id="id_vip">
							<option value="0">Select Vip</option>
							<?php foreach ($item_vip as $v) { ?>
								<option <?= (@$item['id_vip'] == $v['id']) ? "selected" : "" ?> value="<?= $v['id'] ?>">
									<?= $v['ten'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="mahopdong">Mã hợp đồng: </label>
						<input type="text" class="form-control" name="data[mahopdong]" id="mahopdong" placeholder="Mã hợp đồng" value="<?= @$item['mahopdong'] ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="ngayketthuc">Ngày kết thúc:</label>
						<input type="text" class="form-control" name="data[ngayketthuc]" id="ngayketthuc" placeholder="Ngày kết thúc" value="<?= (@$item['ngayketthuc']) ? date('d/m/Y', @$item['ngayketthuc']) : ""; ?>">
					</div>

					<!-- <div class="form-group col-md-4">
						<label for="password">Mật khẩu:</label>
						<input type="password" class="form-control" name="data[password]" id="password" placeholder="Mật khẩu" <?= ($act == "add") ? 'required' : ''; ?>>
					</div>
					<div class="form-group col-md-4">
						<label for="confirm_password">Nhập lại mật khẩu:</label>
						<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" <?= ($act == "add") ? 'required' : ''; ?>>
					</div> -->

					<!-- <div class="form-group col-md-4">
						<label for="gioitinh">Giới tính:</label>
						<select class="form-control" name="data[gioitinh]" id="gioitinh">
							<option value="0">Chọn giới tính</option>
							<option <?= (@$item['gioitinh'] == 1) ? "selected" : "" ?> value="1">Nam</option>
							<option <?= (@$item['gioitinh'] == 2) ? "selected" : "" ?> value="2">Nữ</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="ngaysinh">Ngày sinh:</label>
						<input type="text" class="form-control" name="data[ngaysinh]" id="ngaysinh" placeholder="Ngày sinh" value="<?= (@$item['ngaysinh']) ? date('d/m/Y', @$item['ngaysinh']) : ""; ?>" readonly>
					</div> -->


				</div>
				<?php if ($item['id_vip'] != 0) { ?>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="ten">Đại diện: </label>
							<input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Đại diện" value="<?= @$item['ten'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="chucvu">Chức vụ: </label>
							<input type="text" class="form-control" name="data[chucvu]" id="chucvu" placeholder="Chức vụ" value="<?= @$item['chucvu'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="tencongty">Tên công ty: </label>
							<input type="text" class="form-control" name="data[tencongty]" id="tencongty" placeholder="Tên công ty" value="<?= @$item['tencongty'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="diachi">Địa chỉ:</label>
							<input type="text" class="form-control" name="data[diachi]" id="diachi" placeholder="Địa chỉ" value="<?= @$item['diachi'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?>>
						</div>
						<div class="form-group col-md-4">
							<label for="email">Email:</label>
							<input type="email" class="form-control" name="data[email]" id="email" placeholder="Email" value="<?= @$item['email'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?>>
						</div>
						<div class="form-group col-md-4">
							<label for="dienthoai">Hotline:</label>
							<input type="text" class="form-control" name="data[dienthoai]" id="dienthoai" placeholder="Hotline" value="<?= @$item['dienthoai'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?>>
						</div>
						<div class="form-group col-md-4">
							<label for="mst">MST: </label>
							<input type="text" class="form-control" name="data[mst]" id="mst" placeholder="MST" value="<?= @$item['mst'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="doanh_so">Doanh số: </label>
							<input type="text" class="form-control format-price" name="data[doanh_so]" id="doanh_so" placeholder="Doanh số" value="<?= @$item['doanh_so'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="thuong_hieu">Thương hiệu: </label>
							<input type="text" class="form-control" name="data[thuong_hieu]" id="thuong_hieu" placeholder="Thương hiệu" value="<?= @$item['thuong_hieu'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="thuong_hieu_khac">Thương hiệu khác: </label>
							<input type="text" class="form-control" name="data[thuong_hieu_khac]" id="thuong_hieu_khac" placeholder="Thương hiệu khác" value="<?= @$item['thuong_hieu_khac'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="website">Website: </label>
							<input type="text" class="form-control" name="data[website]" id="website" placeholder="Website" value="<?= @$item['website'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="link_facebook">Link facebook: </label>
							<input type="text" class="form-control" name="data[link_facebook]" id="link_facebook" placeholder="Link facebook" value="<?= @$item['link_facebook'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="quocgia">Quốc gia: </label>
							<input type="text" class="form-control" name="data[quocgia]" id="quocgia" placeholder="Quốc gia" value="<?= @$item['quocgia'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="zip_code">Zip code: </label>
							<input type="text" class="form-control" name="data[zip_code]" id="zip_code" placeholder="Zip code" value="<?= @$item['zip_code'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="nganhang">Ngân hàng: </label>
							<input type="text" class="form-control" name="data[nganhang]" id="nganhang" placeholder="Ngân hàng" value="<?= @$item['nganhang'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
						<div class="form-group col-md-4">
							<label for="sotaikhoan">Số tài khoản: </label>
							<input type="text" class="form-control" name="data[sotaikhoan]" id="sotaikhoan" placeholder="Số tài khoản" value="<?= @$item['sotaikhoan'] ?>" <?= ($act == "edit") ? 'readonly' : ''; ?> required>
						</div>
					</div>
					<div class="card card-primary card-outline text-sm">
						<div class="card-header">
							<h3 class="card-title">Hình ảnh </h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">
							<div class="photoUpload-detail" id="photoUpload-preview"><img style="width: 100%;" class="rounded" src="<?= UPLOAD_PHOTO . @$item['banner'] ?>" onerror="src='assets/images/noimage.png'" alt="Alt Photo" /></div>
						</div>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Kích hoạt:</label>
					<div class="custom-control custom-checkbox d-inline-block align-middle">
						<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked' : '' ?>>
						<label for="hienthi-checkbox" class="custom-control-label"></label>
					</div>
				</div>
				<div class="form-group">
					<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
					<input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>">
				</div>
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

<!-- User js -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#ngaysinh').datetimepicker({
			timepicker: false,
			format: 'd/m/Y',
			formatDate: 'd/m/Y',
			// minDate: '1950/01/01',
			maxDate: '<?= date("Y/m/d", time()) ?>'
		});
	});
</script>