<?php
include "ajax_config.php";

$id_order = (isset($_POST['id_order']) && $_POST['id_order'] > 0) ? htmlspecialchars($_POST['id_order']) : 0;
$order = $d->rawQueryOne("select * from #_order where id = ? limit 0,1", array($id_order));
$order_detail = $d->rawQuery("select * from #_order_detail where id_order = ? ", array($id_order));
?>
<div class="all_sanpham_giohang list-procart">
	<?php $max = count($order_detail);
	for ($i = 0; $i < $max; $i++) {
		$pid = $order_detail[$i]['id_product'];
		$quantity = $order_detail[$i]['soluong'];
		$mau = ($order_detail[$i]['mau']) ? $order_detail[$i]['mau'] : '';
		$size = ($order_detail[$i]['size']) ? $order_detail[$i]['size'] : '';
		$code = ($order_detail[$i]['code']) ? $order_detail[$i]['code'] : '';
		$proinfo = $cart->get_product_info($pid);
		$brand_sp = $cart->get_brand_sp($proinfo['id_brand']);
		if ($proinfo['gia']) {
			$pro_price = $proinfo['gia'];
		} else {
			$do_gia_pri = ($proinfo['giado']) / str_replace(",", "", $brand_sp['tigia_brand']);
			$giado_pri = round($do_gia_pri, 2);
			$pro_price = $giado_pri;
		}
		if ($proinfo['giamoi']) {
			$pro_price_new = $proinfo['giamoi'];
		} else {
			$do_gia_pri_new = ($proinfo['giadomoi']) / str_replace(",", "", $brand_sp['tigia_brand']);
			$giado_pri_new = round($do_gia_pri_new, 2);
			$pro_price_new = $giado_pri_new;
		}
		$pro_price_qty = $pro_price * $quantity;
		$pro_price_new_qty = $pro_price_new * $quantity;
		if ($proinfo['giado']) {
			$pro_price_do = $proinfo['giado'];
			$pro_price_new_do = $proinfo['giadomoi'];
			$pro_price_qty_do = $pro_price_do * $quantity;
			$pro_price_new_qty_do = $pro_price_new_do * $quantity;
		} else {
			$do_gia = ($proinfo['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
			$giado = round($do_gia, 2);

			$do_gia_moi = ($proinfo['giado']) / str_replace(",", "", $brand_sp['tigia_brand']);
			$giado_moi = round($do_gia_moi, 2);

			$pro_price_do = $giado;
			$pro_price_new_do = $giado_moi;
			$pro_price_qty_do = $pro_price_do * $quantity;
			$pro_price_new_qty_do = $pro_price_new_do * $quantity;
		}

		$list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $proinfo['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
		$khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
		$khuyenmai_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_brand = '" . $proinfo['id_brand'] . "' and id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' limit 1");
		$khuyenmai_sanpham_one = $d->rawQueryOne("select discount from table_news where id = '" . $proinfo['id_khuyenmai'] . "' limit 1");
		$giakhuyenmai = '';
		if (!empty($list_sp['id_news'])) {
			if ($khuyenmai_user['discount'] != 0) {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new_us - $khuyenmai;
						$giakhuyenmai = round($giakhuyenmai, 2);
					}
				}
			} elseif ($khuyenmai_sanpham_one['discount'] != 0) {

				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_sanpham_one_us['discount']) / 100);
						$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia_t = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia_t, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = round($giakhuyenmai, 2);
					}
				}
			} else {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = round($giakhuyenmai, 2);
					}
				}
			}
		} else {
			if ($khuyenmai_user['discount'] != 0) {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = round($giakhuyenmai, 2);
					}
				}
			} elseif ($khuyenmai_sanpham_one['discount'] != 0) {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
					} else {
						$tigia = $proinfo['giado'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia_t = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia_t, 2);

						$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = round($giakhuyenmai, 2);
					}
				}
			}
		}
		$giakhuyenmai_qty = $giakhuyenmai * $quantity;

	?>
		<div class="sanpham_giohang procart-<?= $code ?>">
		<input type="hidden" name="color_detail" class="color_detail" value="<?= $mau ?>">
		<input type="hidden" name="id" class="id" value="<?= $proinfo['id'] ?>">
		<input type="hidden" name="cannang" class="cannang" value="<?= $proinfo['cannang'] ?>">
		<input type="hidden" name="kichthuoc" class="kichthuoc" value="<?= $proinfo['kichthuoc'] ?>">
		<input type="hidden" name="action" class="action" value="buynow">
		<input type="hidden" name="lang" class="lang" value="<?= $lang ?>">
		<input type="hidden" name="quantity" class="quantity" value="<?= $quantity ?>">
		<input type="hidden" name="id_vip" class="id_vip" value="<?= $_SESSION[$login_member]['id_vip'] ?>">
			<div class="img_sanpham_giohang">
				<a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
					<img onerror="this.src='<?= THUMBS ?>/600x395x1/assets/images/noimage.png';" src="<?= THUMBS ?>/600x395x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>" width="300" height="197" sizes="308px">
				</a>
			</div>
			<div class="all_content_sanpham_giohang">
				<div class="content_sanpham_giohang">
					<div class="name_sanpham_giohang"><?= $proinfo['ten' . $lang] ?></div>
					<div class="pa_sanpham_giohang">P/A: <strong><?= $proinfo['masp'] ?></strong></div>
					<?php if ($mau) { ?>
						<div>Màu: <strong><?= $mau ?></strong></div>
					<?php } ?>
					<div class="price-procart d-flex align-items-center">
						<?php if ($lang == 'vi') { ?>
							<?php if ($giakhuyenmai_qty) { ?>
								<p class="price-new-cart load-price-new-<?= $code ?>">
									<?= $func->format_money($giakhuyenmai_qty) ?>
								</p>
								<p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
									<?= $func->format_money($pro_price_qty) ?>
								</p>
							<?php } elseif ($proinfo['giamoi']) { ?>
								<p class="price-new-cart load-price-new-<?= $code ?>">
									<?= $func->format_money($pro_price_new_qty) ?>
								</p>
								<p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
									<?= $func->format_money($pro_price_qty) ?>
								</p>
							<?php } else { ?>
								<p class="price-new-cart load-price-<?= $code ?>">
									<?= $func->format_money($pro_price_qty) ?>
								</p>
							<?php } ?>
						<?php } else { ?>
							<?php if ($giakhuyenmai_qty) { ?>
								<p class="price-new-cart load-price-new-<?= $code ?>">
									<i class="fas fa-euro-sign"></i><?= $giakhuyenmai_qty ?>
								</p>
								<p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
									<i class="fas fa-euro-sign"></i><?= $pro_price_qty_do ?>
								</p>
							<?php } elseif ($proinfo['giamoi']) { ?>
								<p class="price-new-cart load-price-new-<?= $code ?>">
									<i class="fas fa-euro-sign"></i><?= $pro_price_new_qty_do ?>
								</p>
								<p class="price-old-cart load-price-<?= $code ?>" style="margin-bottom: 0;font-size: 12px; margin-left: 5px;">
									<i class="fas fa-euro-sign"></i><?= $pro_price_qty_do ?>
								</p>
							<?php } else { ?>
								<p class="price-new-cart load-price-<?= $code ?>">
									<i class="fas fa-euro-sign"></i><?= $pro_price_qty_do ?>
								</p>
							<?php } ?>
						<?php } ?>

					</div>
				</div>
				<div class="plus_sanpham_giohang">
					<input type="hidden" name="lang" class="lang" value="<?= $lang ?>">
					<input type="hidden" name="tigia" class="tigia" value="<?= $optsetting['tigia'] ?>">
					<div class="quantity-counter-procart quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
						<?php if ($proinfo['cothemua']) { ?>
							<?php if ($proinfo['cothemua'] < $proinfo['soluongkho']) { ?>
								<!-- <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">-</span> -->
								<input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['cothemua'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" readonly />
								<!-- <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">+</span> -->
							<?php } else { ?>
								<!-- <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">-</span> -->
								<input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['soluongkho'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" readonly />
								<!-- <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">+</span> -->
							<?php } ?>
						<?php } else { ?>
							<!-- <span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">-</span> -->
							<input type="number" class="quantity-procat testinput" min="1" max="<?= $proinfo['soluongkho'] ?>" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>"readonly  />
							<!-- <span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['soluongkho'] ?>">+</span> -->
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<div class="muahang_ngay">
	<button class="table_matrix_add_to_cart">
		Reorder
		<i class="fas fa-shopping-cart"></i>
	</button>
</div>