<?php
if (!defined('SOURCES')) die("Error");

/* SEO */
$seo->setSeo('title', $title_crumb);

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();

/* Tỉnh thành */
$city = $d->rawQuery("select ten, id from #_city order by id asc");

/* Hình thức thanh toán */
$httt = $d->rawQuery("select ten$lang, mota$lang, id from #_news where type = ? order by stt,id desc", array('hinh-thuc-thanh-toan'));

if (isset($_POST['thanhtoan'])) {

echo '<script>var thongbaodathang = true;</script>';

	// if ($_POST['payments'] == 'paypal' || $_POST['payments'] == 'visa' || $_POST['payments'] == 'master_card') {

	// 	// For test payments we want to enable the sandbox mode. If you want to put live
	// 	// payments through then this setting needs changing to `false`.
	// 	$enableSandbox = true;

	// 	// PayPal settings. Change these to your account details and the relevant URLs
	// 	// for your site.
	// 	$paypalConfig = [
	// 		'email' => $_POST['email'],
	// 		'return_url' => $config_base,
	// 		'cancel_url' => $config_base . '/gio-hang',
	// 		'notify_url' => 'order.php'
	// 	];

	// 	$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

	// 	// Product being purchased.
	// 	$itemName = 'BBRACING';
	// 	$itemAmount = $_POST['toltal_paypal'];

	// 	// Check if paypal request or response
	// 	if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

	// 		// Grab the post data so that we can set up the query string for PayPal.
	// 		// Ideally we'd use a whitelist here to check nothing is being injected into
	// 		// our post data.
	// 		$data = [];
	// 		foreach ($_POST as $key => $value) {
	// 			$data[$key] = stripslashes($value);
	// 		}

	// 		// Set the PayPal account.
	// 		$data['business'] = $paypalConfig['email'];

	// 		// Set the PayPal return addresses.
	// 		$data['return'] = stripslashes($paypalConfig['return_url']);
	// 		if ($data['cancel_return']) {
	// 			$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	// 			exit;
	// 		}
	// 		$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	// 		// Set the details about the product being purchased, including the amount
	// 		// and currency so that these aren't overridden by the form data.
	// 		$data['item_name'] = $itemName;
	// 		$data['amount'] = $itemAmount;
	// 		$data['currency_code'] = 'USD';

	// 		// Add any custom fields for the query string.
	// 		//$data['custom'] = USERID;

	// 		// Build the query string from the data.
	// 		$queryString = http_build_query($data);
	// 		// var_dump($paypalUrl);
	// 		// Redirect to paypal IPN
	// 		header('location:' . $paypalUrl . '?' . $queryString);
	// 		// exit();

	// 	}
	// }


	/* Gán giá trị gửi email */
	$madonhang = strtoupper($func->stringRandom(6));
	$madonhang_mahoa = openssl_encrypt($madonhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing');
	$hoten = (isset($_POST['ten']) && $_POST['ten'] != '') ? htmlspecialchars($_POST['ten']) : '';
	$first_name = (isset($_POST['first_name']) && $_POST['first_name'] != '') ? htmlspecialchars($_POST['first_name']) : '';
	$email = (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '';
	$dienthoai = (isset($_POST['dienthoai']) && $_POST['dienthoai'] != '') ? htmlspecialchars($_POST['dienthoai']) : '';
	$city = (isset($_POST['city']) && $_POST['city'] > 0) ? htmlspecialchars($_POST['city']) : 0;
	$district = (isset($_POST['district']) && $_POST['district'] > 0) ? htmlspecialchars($_POST['district']) : 0;
	$wards = (isset($_POST['wards']) && $_POST['wards'] > 0) ? htmlspecialchars($_POST['wards']) : 0;
	$diachi = (isset($_POST['diachi_shipping']) && $_POST['diachi_shipping'] != '') ? htmlspecialchars($_POST['diachi_shipping']) : '';
	$district_shipping = (isset($_POST['district_shipping']) && $_POST['district_shipping'] != '') ? htmlspecialchars($_POST['district_shipping']) : '';
	$city_shipping = (isset($_POST['city_shipping']) && $_POST['city_shipping'] != '') ? htmlspecialchars($_POST['city_shipping']) : '';
	$quocgia_shipping = (isset($_POST['quocgia_shipping']) && $_POST['quocgia_shipping'] != '') ? htmlspecialchars($_POST['quocgia_shipping']) : '';
	$httt = (isset($_POST['payments']) && $_POST['payments'] != '') ? htmlspecialchars($_POST['payments']) : '';
	$htttText = ($httt) ? $func->get_payments($httt) : '';
	$yeucaukhac = (isset($_POST['yeucaukhac']) && $_POST['yeucaukhac'] != '') ? htmlspecialchars($_POST['yeucaukhac']) : '';
	$tamtinh = (isset($_POST['price-temp']) && $_POST['price-temp'] > 0) ? htmlspecialchars($_POST['price-temp']) : 0;
	$ship = (isset($_POST['price-ship']) && $_POST['price-ship'] > 0) ? htmlspecialchars($_POST['price-ship']) : 0;
	$total = (isset($_POST['price-total']) && $_POST['price-total'] > 0) ? htmlspecialchars($_POST['price-total']) : 0;
	$kichthuoc = (isset($_POST['kichthuoc-total']) && $_POST['kichthuoc-total'] > 0) ? htmlspecialchars($_POST['kichthuoc-total']) : 0;
	$cannang = (isset($_POST['cannang-total']) && $_POST['cannang-total'] > 0) ? htmlspecialchars($_POST['cannang-total']) : 0;
	$giadiscount = $_POST['price-discount'];
	$zip_code_shipping = $_POST['zip_code_shipping'];
	$tencongty = $_POST['tencongty'];
	$phuongthucvanchuyen = $_POST['ptvc'];
	$phuongthucvanchuyen_note = $_POST['phuongthucvanchuyen_note'];
	$ngaydangky = time();
	$chitietdonhang = '';
	$max = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;

	for ($i = 0; $i < $max; $i++) {
		$pid = $_SESSION['cart'][$i]['productid'];
		$q = $_SESSION['cart'][$i]['qty'];
		$color = $_SESSION['cart'][$i]['mau'];
		$size = $_SESSION['cart'][$i]['size'];
		$code = $_SESSION['cart'][$i]['code'];
		$proinfo = $cart->get_product_info($pid);
		$pmau = $cart->get_product_mau($color);
		$psize = $cart->get_product_size($size);
		$textsm = '';
		if ($pmau != '' && $psize != '') $textsm = $pmau . " - " . $psize;
		else if ($pmau != '') $textsm = $pmau;
		else if ($psize != '') $textsm = $psize;

		$list_sp = $d->rawQueryOne("select id_news from #_product_list where type = 'san-pham' and id = '" . $proinfo['id_list'] . "' and hienthi > 0 order by stt,id desc limit 1");
		$khuyenmai = $d->rawQueryOne("select discount from #_news where type = 'chuong-trinh-giam-gia' and id = '" . $list_sp['id_news'] . "' and hienthi > 0 order by stt,id desc limit 1");
		$khuyenmai_user = $d->rawQueryOne("select discount from table_member_vip_discount where id_brand = '" . $proinfo['id_brand'] . "' and id_vip = '" . $_SESSION[$login_member]['id_vip'] . "' limit 1");
		$brand_sp = $d->rawQueryOne("select * from #_product_brand where type = ? and id = ? and hienthi > 0 order by stt,id desc limit 1", array('san-pham', $proinfo['id_brand']));

		$giakhuyenmai = '';
		if (!empty($list_sp['id_news'])) {
			if ($khuyenmai_user) {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $func->format_money($proinfo['gia'] - $khuyenmai);
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = $func->format_money(round($giakhuyenmai, 2));
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' . $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' .  round($giakhuyenmai, 2);
					}
				}
			} else {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $func->format_money($proinfo['gia'] - $khuyenmai);
					} else {
						$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = $func->format_money(round($giakhuyenmai, 2));
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai['discount']) / 100);
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' .  $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' .  round($giakhuyenmai, 2);
					}
				}
			}
		} else {
			if ($khuyenmai_user) {
				if ($lang == 'vi') {
					if ($proinfo['gia']) {
						$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $func->format_money($proinfo['gia'] - $khuyenmai);
					} else {
						$tigia = $proinfo['gia'] * str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = $func->format_money(round($giakhuyenmai, 2));
					}
				} else {
					if ($proinfo['giado']) {
						$khuyenmai = (($proinfo['giado'] * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' .  $proinfo['giado'] - $khuyenmai;
					} else {
						$tigia = $proinfo['gia'] / str_replace(",", "", $brand_sp['tigia_brand']);
						$tigia_new = round($tigia, 2);
						$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
						$giakhuyenmai = $tigia_new - $khuyenmai;
						$giakhuyenmai = '<i class="fas fa-euro-sign"></i>' .  round($giakhuyenmai, 2);
					}
				}
			}
		}

		if ($q == 0) continue;
		$chitietdonhang .= '<tbody bgcolor="';
		if ($i % 2 == 0) $chitietdonhang .= '#eee';
		else $chitietdonhang .= '#e6e6e6';

		$chitietdonhang .= '" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"><tr>';
		$chitietdonhang .= '<td align="left" style="padding:3px 9px" valign="top">';
		$chitietdonhang .= '<span style="display:block;font-weight:bold">' . $proinfo['ten' . $lang] . '</span>';
		if ($textsm != '') $chitietdonhang .= '<span style="display:block;font-size:12px">' . $textsm . '</span>';
		$chitietdonhang .= '</td>';
		if ($giakhuyenmai) {
			$chitietdonhang .= '<td align="left" style="padding:3px 9px" valign="top">';
			$chitietdonhang .= '<span style="display:block;color:#000;">' . $giakhuyenmai . '</span>';
			$chitietdonhang .= '<span style="display:block;color:#999;text-decoration:line-through;font-size:11px;">' . $giakhuyenmai . '</span>';
			$chitietdonhang .= '</td>';
		} else {
			$chitietdonhang .= '<td align="left" style="padding:3px 9px" valign="top"><span style="color:#000;">' . $func->format_money($proinfo['gia']) . '</span></td>';
		}
		$chitietdonhang .= '<td align="center" style="padding:3px 9px" valign="top">' . $q . '</td>';
		if ($proinfo['giamoi']) {
			$chitietdonhang .= '<td align="right" style="padding:3px 9px" valign="top">';
			$chitietdonhang .= '<span style="display:block;color:#000;">' . $func->format_money($proinfo['giamoi'] * $q) . '</span>';
			$chitietdonhang .= '<span style="display:block;color:#999;text-decoration:line-through;font-size:11px;">' . $func->format_money($proinfo['gia'] * $q) . '</span>';
			$chitietdonhang .= '</td>';
		} else {
			$chitietdonhang .= '<td align="right" style="padding:3px 9px" valign="top"><span style="color:#000;">' . $func->format_money($proinfo['gia'] * $q) . '</span></td>';
		}
		$chitietdonhang .= '</tr></tbody>';
	}

	$chitietdonhang .= '
		<tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
			<tr>
				<td align="right" colspan="3" style="padding:5px 9px">Provisional</td>
				<td align="right" style="padding:5px 9px"><span>' . $func->format_money($tamtinh) . '</span></td>
			</tr>';
	if ($ship) {
		$chitietdonhang .=
			'<tr>
					<td align="right" colspan="3" style="padding:5px 9px">Discount</td>
					<td align="right" style="padding:5px 9px"><span>' . $func->format_money($giadiscount) . '</span></td>
				</tr>';
	}
	$chitietdonhang .= '
			<tr bgcolor="#eee">
				<td align="right" colspan="3" style="padding:7px 9px"><strong><big>Total order value</big> </strong></td>
				<td align="right" style="padding:7px 9px"><strong><big><span>' . $func->format_money($total) . '</span> </big> </strong></td>
			</tr>
		</tfoot>';

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
														<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Dear ' . $hoten . '</h1>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#444;line-height:18px;font-weight:normal">WE RECEIVED YOUR ORDER</p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Thank you for purchasing at BBRacing !</p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">If you have completed registration at the time of purchase you can always check the status of your orders by accessing your account. Receipt of your order below. Please contact us at info@bbracing.vn or call us at (+84) 919999968 if you have any questions. </p>
														<h3 style="font-size:13px;font-weight:bold;color:#000;text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">YOUR ORDER <a style="color:#000;" href="' . $config_base . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a></h3>
														<p style="margin:15px 0;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;line-height:18px;font-weight:normal"letter-spacing: 17px;>Customer’s Information </p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;line-height:18px;font-weight:600">Shipping Information</p>
													</td>
												</tr>
												<tr>
													<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%"></th>
																<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
																	<span style="text-transform:capitalize">Name: ' . $first_name . '</span>
																	<br>
																	<span style="text-transform:capitalize">Last name: ' . $hoten . '</span>
																	<br>
																	<a href="mailto:' . $email . '" target="_blank">Email: ' . $email . '</a>
																	<br>
																	<span style="text-transform:capitalize">Phone: ' . $dienthoai . '</span>
																	<br>
																	<span style="text-transform:capitalize">Company name: </span>
																	<br>
																	<span style="text-transform:capitalize">Address: ' . $diachi . '</span>
																	<br>
																	<span style="text-transform:capitalize">City: ' . $city_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Nation: ' . $quocgia_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Zip code: ' . $zip_code_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Payment method: ' . $htttText . '</span>
																	
																</td>
																<td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
																	<span style="text-transform:capitalize">Ship to: ' . $hoten . '</span>
																	<br>
																	<span style="text-transform:capitalize">Company name: ' . $tencongty . '</span>
																	<br>
																	<span style="text-transform:capitalize">Address: ' . $diachi . '</span>
																	<br>
																	<span style="text-transform:capitalize">City: ' . $city_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Nation: ' . $quocgia_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Zip code: ' . $zip_code_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Shipping method: ' . $phuongthucvanchuyen . '</span>
																</td>
															</tr>
														</tbody>
													</table>
													</td>
												</tr>
												<tr>
													<td>
													<h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:' . $emailer->getEmail('color') . '">ORDER DETAILS</h2>
													<table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
														<thead>
															<tr>
																<th align="left" bgcolor="#eee" style="padding:6px 9px;color:#000;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Product</th>
																<th align="left" bgcolor="#eee" style="padding:6px 9px;color:#000;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Unit price</th>
																<th align="center" bgcolor="#eee" style="padding:6px 9px;color:#000;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;min-width:55px;">Quantity</th>
																<th align="right" bgcolor="#eee" style="padding:6px 9px;color:#000;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Total</th>
															</tr>
														</thead>
														' . $chitietdonhang . '
													</table>
													</td>
												</tr>
												<tr>
													<td>
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:10px;text-align:right"><strong><a href="' . $emailer->getEmail('home') . 'account/donhang" style="color:#fff;background: #000;padding: 8px 15px;text-decoration:none;font-weight: 500;font-size:12px" target="_blank">PURCHASE</a> </strong></p>
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

	/* Nội dung gửi email cho khách hàng */
	$contentCustomer = '
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
														<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Dear ' . $hoten . '</h1>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#444;line-height:18px;font-weight:normal">WE RECEIVED YOUR ORDER</p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Thank you for purchasing at BBRacing !</p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">If you have completed registration at the time of purchase you can always check the status of your orders by accessing your account. Receipt of your order below. Please contact us at ecommerce@bbracing.vn or call us at (+84) 919999968 if you have any questions. </p>
														<h3 style="font-size:13px;font-weight:bold;color:#000;text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">YOUR ORDER <a style="color:#000;" href="' . $config_base . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a></h3>
														<p style="margin:15px 0;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;line-height:18px;font-weight:normal"letter-spacing: 17px;>Customer’s Information </p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;line-height:18px;font-weight:600">Shipping Information</p>
													</td>
												</tr>
												<tr>
													<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%"></th>
																<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
																	<span style="text-transform:capitalize">Name: ' . $first_name . '</span>
																	<br>
																	<span style="text-transform:capitalize">Last name: ' . $hoten . '</span>
																	<br>
																	<a href="mailto:' . $email . '" target="_blank">Email: ' . $email . '</a>
																	<br>
																	<span style="text-transform:capitalize">Phone: ' . $dienthoai . '</span>
																	<br>
																	<span style="text-transform:capitalize">Company name: </span>
																	<br>
																	<span style="text-transform:capitalize">Address: ' . $diachi . '</span>
																	<br>
																	<span style="text-transform:capitalize">City: ' . $city_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Nation: ' . $quocgia_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Zip code: ' . $zip_code_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Payment method: ' . $htttText . '</span>
																</td>
																<td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
																	<span style="text-transform:capitalize">Ship to: ' . $hoten . '</span>
																	<br>
																	<span style="text-transform:capitalize">Company name: ' . $tencongty . '</span>
																	<br>
																	<span style="text-transform:capitalize">Address: ' . $diachi . '</span>
																	<br>
																	<span style="text-transform:capitalize">City: ' . $city_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Nation: ' . $quocgia_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Zip code: ' . $zip_code_shipping . '</span>
																	<br>
																	<span style="text-transform:capitalize">Shipping method: ' . $phuongthucvanchuyen . '</span>
																</td>
															</tr>
														</tbody>
													</table>
													</td>
												</tr>
												<tr>
													<td>
													<h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:' . $emailer->getEmail('color') . '">ORDER DETAILS</h2>
													<table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
														<thead>
															<tr>
																<th align="left" bgcolor="#eee" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Product</th>
																<th align="left" bgcolor="#eee" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Unit price</th>
																<th align="center" bgcolor="#eee" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;min-width:55px;">Quantity</th>
																<th align="right" bgcolor="#eee" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Total</th>
															</tr>
														</thead>
														' . $chitietdonhang . '
													</table>
													</td>
												</tr>
												<tr>
													<td>
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:10px;text-align:right"><strong><a href="' . $emailer->getEmail('home') . 'account/donhang" style="color:#fff;background: #000;padding: 8px 15px;text-decoration:none;font-weight: 500;font-size:12px" target="_blank">PURCHASE</a> </strong></p>
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

	/* lưu đơn hàng */
	$data_donhang = array();
	$data_donhang['id_user'] = (isset($_SESSION[$login_member]['id'])) ? $_SESSION[$login_member]['id'] : 0;
	$data_donhang['madonhang'] = $madonhang;
	$data_donhang['hoten'] = $hoten;
	$data_donhang['dienthoai'] = $dienthoai;
	$data_donhang['diachi'] = $diachi;
	$data_donhang['city_shipping'] = $city_shipping;
	$data_donhang['district_shipping'] = $district_shipping;
	$data_donhang['quocgia_shipping'] = $quocgia_shipping;
	$data_donhang['zip_code_shipping'] = $zip_code_shipping;
	$data_donhang['tencongty'] = $tencongty;
	$data_donhang['email'] = $email;
	$data_donhang['httt'] = $httt;
	$data_donhang['phiship'] = $ship;
	if ($lang == 'vi') {
		$data_donhang['tamtinh'] = $tamtinh;
		$data_donhang['tonggia'] = $total;
		$data_donhang['giadiscount'] = $giadiscount;
	} else {
		$data_donhang['tamtinhen'] = $tamtinh;
		$data_donhang['tonggiaen'] = round($total, 2);
		$data_donhang['giadiscounten'] = $giadiscount;
	}

	$data_donhang['kichthuoc'] = $kichthuoc;
	$data_donhang['cannang'] = $cannang;
	$data_donhang['yeucaukhac'] = $yeucaukhac;
	$data_donhang['ngaytao'] = $ngaydangky;
	if ($phuongthucvanchuyen == 'viettel_post' || $phuongthucvanchuyen == 'vn_post') {
		$vanchuyen = 'trongnuoc';
	} else {
		$vanchuyen = 'ngoainuoc';
	}

	if ($lang == 'vi') {
		if ($vanchuyen == 'trongnuoc' && $total >= '900000') {
			$data_donhang['tinhtrang'] = 2;
			$data_donhang['ngay_shipcost'] = $ngaydangky;
			$data_donhang['ngay_waiting_payment'] = $ngaydangky;
		} else {
			$data_donhang['tinhtrang'] = 1;
		}
	} else {
		if ($vanchuyen == 'trongnuoc' && $total >= '33.76') {
			$data_donhang['tinhtrang'] = 2;
			$data_donhang['ngay_shipcost'] = $ngaydangky;
			$data_donhang['ngay_waiting_payment'] = $ngaydangky;
		} else {
			$data_donhang['tinhtrang'] = 1;
		}
	}

	$data_donhang['city'] = $city;
	$data_donhang['district'] = $district;
	$data_donhang['wards'] = $wards;
	$data_donhang['phuongthucvanchuyen'] = $phuongthucvanchuyen;
	$data_donhang['phuongthucvanchuyen_note'] = $phuongthucvanchuyen_note;
	$data_donhang['stt'] = 1;
	if (!isset($_SESSION[$login_member]['id'])) {
		$session = session_id();
		$data_donhang['session_id'] = $session;
	}
	$id_insert = $d->insert('order', $data_donhang);

	/* lưu đơn hàng chi tiết */
	if ($id_insert) {
		for ($i = 0; $i < $max; $i++) {
			$pid = $_SESSION['cart'][$i]['productid'];
			$q = $_SESSION['cart'][$i]['qty'];
			$proinfo = $cart->get_product_info($pid);
			$gia = $proinfo['gia'];
			$giamoi = $proinfo['giamoi'];
			$color = $cart->get_product_mau($_SESSION['cart'][$i]['mau']);
			$size = $cart->get_product_size($_SESSION['cart'][$i]['size']);
			$code = $_SESSION['cart'][$i]['code'];

			if ($q == 0) continue;

			$list_sp = $cart->get_product_list($proinfo['id_list']);
			$khuyenmai = $cart->get_product_khuyenmai($list_sp['id_news']);
			$khuyenmai_user = $cart->get_product_khuyenmai_user($proinfo['id_brand'], $_SESSION[$login_member]['id_vip']);
			$khuyenmai_sanpham_one = $cart->get_khuyenmai_sanpham_one($proinfo['id_khuyenmai']);
			$brand_sp = $cart->get_brand_sp($proinfo['id_brand']);

			$giakhuyenmai = '';
			if (!empty($list_sp['id_news'])) {
				if ($khuyenmai_user) {
					if ($lang == 'vi') {
						if ($proinfo['gia']) {
							$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
							$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
						} else {
							$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
							$tigia_new = round($tigia, 2);
							$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
							$giakhuyenmai = $tigia_new - $khuyenmai;
							$giakhuyenmai = round($giakhuyenmai, 2);
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
							$giakhuyenmai = round($giakhuyenmai, 2);
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
				if ($khuyenmai_user) {
					if ($lang == 'vi') {
						if ($proinfo['gia']) {
							$khuyenmai = (($proinfo['gia'] * $khuyenmai_user['discount']) / 100);
							$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
						} else {
							$tigia = $proinfo['giado'] * str_replace(",", "", $brand_sp['tigia_brand']);
							$tigia_new = round($tigia, 2);
							$khuyenmai = (($tigia_new * $khuyenmai_user['discount']) / 100);
							$giakhuyenmai = $tigia_new - $khuyenmai;
							$giakhuyenmai = round($giakhuyenmai, 2);
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
				}
			}
			$data_donhangchitiet = array();
			$data_donhangchitiet['id_product'] = $pid;
			$data_donhangchitiet['id_order'] = $id_insert;
			$data_donhangchitiet['photo'] = $proinfo['photo'];
			$data_donhangchitiet['ten'] = $proinfo['ten' . $lang];
			$data_donhangchitiet['code'] = $code;
			$data_donhangchitiet['mau'] = $color;
			$data_donhangchitiet['size'] = $size;
			$data_donhangchitiet['gia'] = $gia;
			if ($giakhuyenmai) {
				if ($lang == 'vi') {
					$data_donhangchitiet['giamoi'] = $giakhuyenmai;
				} else {
					$data_donhangchitiet['giamoien'] = $giakhuyenmai;
				}
			} else {
				if ($lang == 'vi') {
					$data_donhangchitiet['giamoi'] = $giamoi;
				} else {
					$data_donhangchitiet['giamoien'] = $giamoi;
				}
			}
			$data_donhangchitiet['soluong'] = $q;
			$soluongkhoconlai = $proinfo['soluongkho'] - $q;
			$d->insert('order_detail', $data_donhangchitiet);
			$d->rawQuery("update #_product set soluongkho = '" . $soluongkhoconlai . "' where id = '" . $pid . "'");
		}
	}

	/* Send email admin */
	$arrayEmail = null;
	$subject = "Order information from " . $setting['ten' . $lang];
	$message = $contentAdmin;
	$file = '';
	$emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file);

	/* Send email customer */
	$arrayEmail = array(
		"dataEmail" => array(
			"name" => $hoten,
			"email" => $email,
			// "emailCC" => 'ecommerce@bbracing.vn'
		)
	);
	$subject = "Order information from " . $setting['ten' . $lang];
	$message = $contentCustomer;
	$file = '';
	$emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file);

	/* Xóa giỏ hàng */
	unset($_SESSION['cart']);
	if ($lang == 'vi') {
		$thongtin = "Thông tin đơn hàng đã được gửi thành công.";
	} else {
		$thongtin = "Order information has been sent successfully.";
	}
	// $func->transfer($thongtin, $config_base);
	$login_message = $thongtin;
	$redirect_url = $config_base;
	$stt = true;
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}
