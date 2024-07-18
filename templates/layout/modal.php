<?php if (isset($popup) && $popup['hienthi'] == 1) { ?>
	<!-- Modal popup -->
	<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="popupModalLabel"><?= $popup['ten' . $lang] ?></div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<a href="<?= $popup['link'] ?>"><img src="<?= THUMBS ?>/800x530x1/<?= UPLOAD_PHOTO_L . $popup['photo'] ?>" alt="Popup"></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<!-- Modal notify -->
<div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="popup-notify-label"><?= thongbao ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?= thoat ?></button>
			</div>
		</div>
	</div>
</div>

<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="popup-cart-label"><?= giohangcuaban ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>

<!-- Modal cart -->
<div class="modal fade" id="popup_card" tabindex="-1" role="dialog" aria-labelledby="popup_card-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="popup_card-label"><?= giohangcuaban ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-user form-user-dktk validation-user" novalidate method="post" action="account/my_cart" enctype="multipart/form-data">
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="all_input_dktk">
								<label for="basic-url"><?= $lang == 'vi' ? 'Tên tài khoản' : 'account name' ?> *</label>
								<div class="input-group input-user">
									<input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" placeholder="...">
								</div>
							</div>
							<div class="all_input_dktk">
								<label for="basic-url"><?= $lang == 'vi' ? 'Ngân hàng' : 'Bank' ?> *</label>
								<div class="input-group input-user">
									<input type="text" class="form-control" id="nganhang" name="nganhang" placeholder="...">
								</div>
							</div>
							<div class="all_input_dktk">
								<label for="basic-url"><?= $lang == 'vi' ? 'Số tài khoản' : 'Account number' ?> *</label>
								<div class="input-group input-user">
									<input type="text" class="form-control" id="sotaikhoan" name="sotaikhoan" placeholder="...">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="button-user-dktk text-align-center">
								<?php if ($lang == 'vi') {
									$cr = 'Tạo thẻ của bạn';
								} else {
									$cr = 'Create your card';
								} ?>
								<input type="submit" class="btn btn-primary btn_card" name="taotaikhoancard" value="<?= $cr ?>" disabled>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade reo_order" id="reo_order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Reorder</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			</div>
		</div>
	</div>
</div>

<!-- popup -->
<?php if ($popup2) { ?>
	<div class="modal" id="popup-all">
		<div class="modal-container">
			<div class="modal-body">
				<a href="<?= $popup2['link'] ?>">
					<img onerror="this.src='<?= THUMBS ?>/0x300x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $popup2['photo'] ?>" width="500px" height="376px">
				</a>
			</div>

			<button class="icon-button close-button">
				<svg viewBox="0 0 16 16" stroke="#EE4D2D" class="home-popup__close-button">
					<path stroke-linecap="round" d="M1.1,1.1L15.2,15.2"></path>
					<path stroke-linecap="round" d="M15,1L0.9,15.1"></path>
				</svg>
			</button>
		</div>
	</div>
<?php } ?>
<div class="modal" id="popup-cart-thongbao">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-body">
			<div class="title"><?= thongbao ?></div>
			<div class="message alert alert-success">
				<?= $lang == 'vi' ? 'Đơn hàng của bạn đang được xác nhận vui lòng chờ ít phút!!' : 'Your order is being confirmed, please wait a few minutes!!' ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="popup-transfer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body text-align-center"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>