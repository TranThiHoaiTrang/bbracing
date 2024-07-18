<?php
include "ajax_config.php";

$cmd = (isset($_POST['cmd']) && $_POST['cmd'] != '') ? htmlspecialchars($_POST['cmd']) : '';
$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$ma = $_POST['ma'];
$lang = $_POST['lang'];
$tigia = $_POST['tigia'];
$id_vip = $_POST['id_vip'];
$cannang = $_POST['cannang'];
$kichthuoc = $_POST['kichthuoc'];
$mau = $_POST['mau'];
$size = (isset($_POST['size']) && $_POST['size'] > 0) ? htmlspecialchars($_POST['size']) : 0;
$quantity = (isset($_POST['quantity']) && $_POST['quantity'] > 0) ? htmlspecialchars($_POST['quantity']) : 1;
$code = (isset($_POST['code']) && $_POST['code'] != '') ? htmlspecialchars($_POST['code']) : '';
$ship = (isset($_POST['ship']) && $_POST['ship'] > 0) ? htmlspecialchars($_POST['ship']) : 0;

if ($cmd == 'add-cart' && $id > 0) {
	if (!empty($_SESSION['cart'])) {
		
		foreach ($_SESSION['cart'] as $v) {
			if ($v['productid'] == $id) {
				$a = $cart->get_product_info($v['productid']);
				
				if ($a['soluongkho'] > 0) {
					if($a['cothemua'] > 0){
						if ($a['cothemua'] > $v['qty']) {
							$cart->addtocart($quantity, $id, $mau, $size, $cannang, $kichthuoc);
						}
					}else{
						if ($a['soluongkho'] > $v['qty']) {
							$cart->addtocart($quantity, $id, $mau, $size, $cannang, $kichthuoc);
						}
					}
				}
			}
		}
		foreach ($_SESSION['cart'] as $v) {
			$mang_id .= $v['productid'] . ',';
		}
		$mang_id = explode(',',$mang_id);
		$check_idpro = in_array($id, $mang_id);
		if($check_idpro == false){
			$cart->addtocart($quantity, $id, $mau, $size, $cannang, $kichthuoc);
		}
	} else {
		$cart->addtocart($quantity, $id, $mau, $size, $cannang, $kichthuoc);
	}
	$max = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
	$data = array('max' => $max);
	echo json_encode($data);
} else if ($cmd == 'update-cart' && $id > 0 && $code != '') {
	if (isset($_SESSION['cart'])) {
		$max = count($_SESSION['cart']);
		for ($i = 0; $i < $max; $i++) {
			if ($code == $_SESSION['cart'][$i]['code']) {
				if ($quantity) $_SESSION['cart'][$i]['qty'] = $quantity;
				break;
			}
		}
	}

	$proinfo = $cart->get_product_info($id);

	$list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $proinfo['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
	$khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
	$khuyenmai_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_brand = '" . $proinfo['id_brand'] . "' and id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' limit 1");
	$khuyenmai_sanpham_one = $d->rawQueryOne("select discount from table_news where id = '" . $proinfo['id_khuyenmai'] . "' limit 1");
	$brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $proinfo['id_brand']));

	$giakhuyenmai = $func->chuyendoitigia_pro_detail($proinfo,$brand_sp);

	$giakhuyenmai_qty = $giakhuyenmai * $quantity;

	$gia = $func->format_money($proinfo['gia'] * $quantity);

	if ($giakhuyenmai) {
		if ($lang == 'vi') {
			if ($proinfo['gia']) {
				$gia = $func->format_money($proinfo['gia'] * $quantity);
			} else {
				$tigia_t = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
				$tigia_new = round($tigia_t, 2);
				$gia = $func->format_money($tigia_new * $quantity);
			}

			$giamoi = $func->format_money(($giakhuyenmai * $quantity));
		} else {
			if ($proinfo['giado']) {
				$gia = $func->format_money_erou(($proinfo['giado'] * $quantity));
			} else {
				$tigia_t = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
				$tigia_new = round($tigia_t, 2);
				$gia = $func->format_money_erou(($tigia_new * $quantity)) ;
			}

			$giamoi =  $func->format_money_erou(($giakhuyenmai * $quantity));
		}
	} else {
		if ($lang == 'vi') {
			if ($proinfo['gia']) {
				$gia = $func->format_money($proinfo['gia'] * $quantity);
			} else {
				$tigia_t = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
				$tigia_new = round($tigia_t, 2);
				$gia = $func->format_money($tigia_new * $quantity);
			}
			if ($proinfo['giamoi']) {
				$giamoi = $func->format_money($proinfo['giamoi'] * $quantity);
			} elseif ($proinfo['giadomoi']) {
				$tigia_t = $proinfo['giadomoi'] * str_replace(",", "", $brand_sp['tigia_brand']);
				$tigia_new = round($tigia_t, 2);
				$gia = $func->format_money($tigia_new * $quantity);
			}
		} else {
			$gia = $func->format_money_erou(($proinfo['giado'] * $quantity), 2) ;
			$giamoi =  $func->format_money_erou(($proinfo['giado'] * $quantity), 2);
		}
	}

	if ($lang == 'vi') {
		$temp = $cart->get_order_total();
		$tempText = $func->format_money(round($temp, 2));
		// $total = $cart->get_order_total();
	} else {

		$temp = $cart->get_order_total();
		$tempText = $func->format_money_erou($temp);
		// $total = $cart->get_order_total();
	}
	// $temp = $cart->get_order_total();
	// $tempText = round($temp, 2);
	// $total = $cart->get_order_total();

	if ($lang == 'vi') {
		$vattotalText = $func->format_money((10 / 100) * $cart->get_order_total());
	} else {
		$vattotalText = $func->format_money_erou(((10 / 100) * $cart->get_order_total())) ;
	}


	$weighttotalText = $cart->get_cannang_total();
	$sizetotalText = $cart->get_kichthuoc_total();

	// if ($ship) $total += $ship;
	if ($lang == 'vi') {
		$vat = (10 / 100) * $cart->get_order_total();
		$total = $cart->get_order_total() ;
		$totalText = $func->format_money($total);
	} else {
		$vat = (10 / 100) * $cart->get_order_total();
		$total = $cart->get_order_total();
		// var_dump($total);
		$totalText =  $func->format_money_erou($total);
	}

	$data = array('vattotalText' => $vattotalText, 'sizetotalText' => $sizetotalText, 'weighttotalText' => $weighttotalText, 'gia' => $gia, 'giamoi' => $giamoi, 'temp' => $temp, 'tempText' => $tempText, 'total' => $total, 'totalText' => $totalText);

	echo json_encode($data);
} else if ($cmd == 'delete-cart' && $code != '') {
	$cart->remove_product($code);
	$max = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
	$temp = $cart->get_order_total();
	$tempText = $func->format_money($temp);
	$total = $cart->get_order_total();
	if ($ship) $total += $ship;
	$totalText = $func->format_money($total);
	$data = array('max' => $max, 'temp' => $temp, 'tempText' => $tempText, 'total' => $total, 'totalText' => $totalText);

	echo json_encode($data);
} else if ($cmd == 'ship-cart') {
	$shipData = array();
	$shipPrice = 0;
	$shipText = '0đ';
	$total = 0;
	$totalText = '';

	if ($id) $shipData = $d->rawQueryOne("select gia from #_wards where id = ? limit 0,1", array($id));
	if ($ma) $discountData = $d->rawQueryOne("select discount from #_news where tenvi = ? limit 0,1", array($ma));
	// var_dump("select discount from #_news where tenvi = ? limit 0,1",array($ma));
	$total = $cart->get_order_total();
	if (isset($shipData['gia']) && $shipData['gia'] > 0) {
		if ($ma) {
			$total_1 = $total;
			$total_1 += $shipData['gia'];
			$shipText = $func->format_money($shipData['gia']);
			// var_dump($total_1);
			// var_dump(($total_1 * $discountData['discount'])/100);
			$discount = round((($total * $discountData['discount']) / 100), 2);
			$total = ($total_1 - $discount);
		} else {
			$total += $shipData['gia'];
			$shipText = $func->format_money($shipData['gia']);
		}
	}
	$totalText = $func->format_money($total);
	$shipPrice = (isset($shipData['gia'])) ? $shipData['gia'] : 0;
	$data = array('shipText' => $shipText, 'ship' => $shipPrice, 'totalText' => $totalText, 'total' => $total);

	echo json_encode($data);
} else if ($cmd == 'discount') {
	$discountData = array();
	$discountPrice = 0;
	$discountText = '0đ';
	$total = 0;
	$totalText = '';

	if ($id) $shipData = $d->rawQueryOne("select gia from #_wards where id = ? limit 0,1", array($id));
	if ($ma) $discountData = $d->rawQueryOne("select discount from #_news where tenvi = ? limit 0,1", array($ma));

	if ($lang == 'vi') {
		$total = $cart->get_order_total();
	} else {

		$tigia_t = ($cart->get_order_total()) / str_replace(",", "", $tigia);
		$total = round($tigia_t, 2);
	}
	if (isset($discountData['discount']) && $discountData['discount'] > 0) {

		if ($id) {
			$total_1 = $total;
			$total_1 += $shipData['gia'];
			$discount = round((($total * $discountData['discount']) / 100), 2);
			$total = ($total_1 - $discount);
		} else {
			if ($lang == 'vi') {
				$discount = round((($total * $discountData['discount']) / 100), 2);
				$total -= $discount;
				$discountText = $func->format_money($discount);
			} else {
				$discount = round((($total * $discountData['discount']) / 100), 2);
				$total -= $discount;
				$discountText = $func->format_money_erou($discount) ;
			}
		}
	}
	if ($lang == 'vi') {
		$totalText = $func->format_money($total);
	} else {
		$totalText = $func->format_money_erou($total) ;
	}
	// var_dump($discount);
	$discountPrice = (isset($discount)) ? $discount : 0;
	$data = array('discountText' => $discountText, 'discount' => $discountPrice, 'totalText' => $totalText, 'total' => $total);
	// var_dump($data);
	echo json_encode($data);
} else if ($cmd == 'popup-cart') { ?>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="wrap-cart">
			<div class="top-cart">
				<div class="list-procart">
					<div class="procart procart-label d-flex align-items-start justify-content-between">
						<div class="pic-procart"><?= hinhanh ?></div>
						<div class="info-procart"><?= tensanpham ?></div>
						<div class="quantity-procart">
							<p><?= soluong ?></p>
							<p><?= thanhtien ?></p>
						</div>
						<div class="price-procart"><?= thanhtien ?></div>
					</div>
					<?php if (isset($_SESSION['cart'])) {
						for ($i = 0; $i < count($_SESSION['cart']); $i++) {
							$pid = $_SESSION['cart'][$i]['productid'];
							$quantity = $_SESSION['cart'][$i]['qty'];
							$mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
							$size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
							$code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : "";
							$proinfo = $cart->get_product_info($pid);

							$brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $proinfo['id_brand']));

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
								$do_gia_us = ($proinfo['gia']) / str_replace(",", "", $brand_sp['tigia_brand']);
								$giado_us = round($do_gia_us, 2);

								$pro_price_do = $giado_us;
								$pro_price_new_do = $proinfo['giadomoi'];
								$pro_price_qty_do = $pro_price_do * $quantity;
								$pro_price_new_qty_do = $pro_price_new_do * $quantity;
							}

							$list_sp_us = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $proinfo['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
							$khuyenmai_us = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp_us['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
							$khuyenmai_user_us = $d->rawQueryOne("select discount from table_member_vip_discount where id_brand = '" . $proinfo['id_brand'] . "' and id_vip = '" . $id_vip . "' limit 1");
							$khuyenmai_sanpham_one_us = $d->rawQueryOne("select discount from table_news where id = '" . $proinfo['id_khuyenmai'] . "' limit 1");
							$giakhuyenmai_us = $func->chuyendoitigia_pro_detail($proinfo,$brand_sp);

							
							$giakhuyenmai_us_qty = $giakhuyenmai_us * $quantity;
					?>
							<div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between">
								<div class="pic-procart">
									<a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x2/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
									<a class="del-procart text-decoration-none" data-code="<?= $code ?>">
										<i class="fa fa-times-circle"></i>
										<span><?= xoa ?></span>
									</a>
								</div>
								<div class="info-procart">
									<h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a></h3>
									<div class="properties-procart">
										<?php if ($mau) {
											$maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
											<p>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></p>
										<?php } ?>
										<?php if ($size) {
											$sizedetail = $d->rawQueryOne("select ten$lang from #_product_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
											<p>Size: <strong><?= $sizedetail['ten' . $lang] ?></strong></p>
										<?php } ?>
									</div>
								</div>
								<div class="quantity-procart">
									<div class="price-procart price-procart-rp">
										<?php if ($lang == 'vi') { ?>
											<?php if ($giakhuyenmai) { ?>
												<p class="price-new-cart load-price-new-<?= $code ?>">
													<?= $func->format_money($giakhuyenmai) ?>
												</p>
												<p class="price-old-cart load-price-<?= $code ?>">
													<?= $func->format_money($pro_price_qty) ?>
												</p>
											<?php } elseif ($proinfo['giamoi']) { ?>
												<p class="price-new-cart load-price-new-<?= $code ?>">
													<?= $func->format_money($pro_price_new_qty) ?>
												</p>
												<p class="price-old-cart load-price-<?= $code ?>">
													<?= $func->format_money($pro_price_qty) ?>
												</p>
											<?php } else { ?>
												<p class="price-new-cart load-price-<?= $code ?>">
													<?= $func->format_money($pro_price_qty) ?>
												</p>
											<?php } ?>
										<?php } else { ?>
											<?php if ($giakhuyenmai) { ?>
												<p class="price-new-cart load-price-new-<?= $code ?>">
													<?= $func->format_money_erou($giakhuyenmai) ?>
												</p>
												<p class="price-old-cart load-price-<?= $code ?>">
													<?= $func->format_money_erou($pro_price_qty_do)  ?>
												</p>
											<?php } elseif ($proinfo['giamoi']) { ?>
												<p class="price-new-cart load-price-new-<?= $code ?>">
													<?= $func->format_money_erou($pro_price_new_qty_do) ?>
												</p>
												<p class="price-old-cart load-price-<?= $code ?>">
													<?= $func->format_money_erou($pro_price_qty_do) ?>
												</p>
											<?php } else { ?>
												<p class="price-new-cart load-price-<?= $code ?>">
													<?= $func->format_money_erou($pro_price_qty_do) ?>
												</p>
											<?php } ?>
										<?php } ?>
									</div>
									<input type="hidden" name="lang" class="lang" value="<?= $lang ?>">
									<input type="hidden" name="tigia" class="tigia" value="<?= $tigia ?>">
									<div class="quantity-counter-procart  quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
										<span class="counter-procart-minus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">-</span>
										<input type="number" class="quantity-procat testinput" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
										<span class="counter-procart-plus counter-procart" data-soluongkho="<?= $proinfo['cothemua'] ?>">+</span>
									</div>
									<div class="pic-procart pic-procart-rp">
										<a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
										<a class="del-procart text-decoration-none" data-code="<?= $code ?>">
											<i class="fa fa-times-circle"></i>
											<span><?= xoa ?></span>
										</a>
									</div>
								</div>
								<div class="price-procart">
									<?php if ($lang == 'vi') { ?>
										<?php if ($giakhuyenmai_us_qty) { ?>
											<p class="price-new-cart load-price-new-<?= $code ?>">
												<?= $func->format_money($giakhuyenmai_us_qty) ?>
											</p>
											<p class="price-old-cart load-price-<?= $code ?>">
												<?= $func->format_money($pro_price_qty) ?>
											</p>
										<?php } elseif ($proinfo['giamoi']) { ?>
											<p class="price-new-cart load-price-new-<?= $code ?>">
												<?= $func->format_money($pro_price_new_qty) ?>
											</p>
											<p class="price-old-cart load-price-<?= $code ?>">
												<?= $func->format_money($pro_price_qty) ?>
											</p>
										<?php } else { ?>
											<p class="price-new-cart load-price-<?= $code ?>">
												<?= $func->format_money($pro_price_qty) ?>
											</p>
										<?php } ?>
									<?php } else { ?>
										<?php if ($giakhuyenmai_us_qty) { ?>
											<p class="price-new-cart load-price-new-<?= $code ?>">
												<?= $func->format_money_erou($giakhuyenmai_us_qty) ?>
											</p>
											<p class="price-old-cart load-price-<?= $code ?>">
												<?= $func->format_money_erou($pro_price_qty_do) ?>
											</p>
										<?php } elseif ($proinfo['giamoi']) { ?>
											<p class="price-new-cart load-price-new-<?= $code ?>">
												<?= $func->format_money_erou($pro_price_new_qty_do) ?>
											</p>
											<p class="price-old-cart load-price-<?= $code ?>">
												<?= $func->format_money_erou($pro_price_qty_do) ?>
											</p>
										<?php } else { ?>
											<p class="price-new-cart load-price-<?= $code ?>">
												<?= $func->format_money_erou($pro_price_qty_do) ?>
											</p>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
					<?php }
					} ?>
				</div>
				<div class="money-procart">
					<div class="total-procart d-flex align-items-center justify-content-between">
						<p><?= tamtinh ?>:</p>
						<?php if ($lang == 'vi') { ?>
							<p class="total-price load-price-temp"><?= $func->format_money($cart->get_order_total()) ?></p>
						<?php } else {
							$tigia_tamtinh = ($cart->get_order_total()) / str_replace(",", "", $tigia);
							$total_tamtinh = round($tigia_tamtinh, 2);
						?>
							<p class="total-price load-price-temp"><i class="fas fa-euro-sign"></i><?= $total_tamtinh ?></p>
						<?php } ?>
					</div>
				</div>
				<div class="modal-footer d-flex align-items-center justify-content-between">
					<a href="san-pham" class="buymore-cart text-decoration-none" title="<?= tieptucmuahang ?>">
						<i class="fa fa-angle-double-left"></i>
						<span><?= tieptucmuahang ?></span>
					</a>
					<a class="btn-cart btn btn-primary" href="thanh-toan" title="<?= thanhtoan ?>"><?= thanhtoan ?></a>
				</div>
			</div>
		</div>
	</form>
<?php }
?>