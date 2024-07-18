<?php
if (!defined('SOURCES')) die("Error");

/* Kiểm tra active đơn hàng */
if (!isset($config['order']['active']) || $config['order']['active'] == false) $func->transfer("Trang không tồn tại", "index.php", false);

/* Cấu hình đường dẫn trả về */
$strUrl = "";
$strUrl .= (isset($_REQUEST['tinhtrang'])) ? "&tinhtrang=" . htmlspecialchars($_REQUEST['tinhtrang']) : "";
$strUrl .= (isset($_REQUEST['httt'])) ? "&httt=" . htmlspecialchars($_REQUEST['httt']) : "";
$strUrl .= (isset($_REQUEST['ngaydat'])) ? "&ngaydat=" . htmlspecialchars($_REQUEST['ngaydat']) : "";
$strUrl .= (isset($_REQUEST['khoanggia'])) ? "&khoanggia=" . htmlspecialchars($_REQUEST['khoanggia']) : "";
$strUrl .= (isset($_REQUEST['city'])) ? "&city=" . htmlspecialchars($_REQUEST['city']) : "";
$strUrl .= (isset($_REQUEST['district'])) ? "&district=" . htmlspecialchars($_REQUEST['district']) : "";
$strUrl .= (isset($_REQUEST['wards'])) ? "&wards=" . htmlspecialchars($_REQUEST['wards']) : "";
$strUrl .= (isset($_REQUEST['keyword'])) ? "&keyword=" . htmlspecialchars($_REQUEST['keyword']) : "";

switch ($act) {
	case "man":
		get_items();
		$template = "order/man/items";
		break;

	case "edit":
		get_item();
		$template = "order/man/item_add";
		break;

	case "save":
		save_item();
		break;

	case "delete":
		delete_item();
		break;

	default:
		$template = "404";
}

/* Get order */
function get_items()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $minTotal, $maxTotal, $giatu, $giaden, $allMoidat, $totalMoidat, $allDaxacnhan, $totalDaxacnhan, $allDagiao, $totalDagiao, $allDahuy, $totalDahuy;

	$where = "";

	$tinhtrang = (isset($_REQUEST['tinhtrang'])) ? htmlspecialchars($_REQUEST['tinhtrang']) : 0;
	$httt = (isset($_REQUEST['httt'])) ? htmlspecialchars($_REQUEST['httt']) : 0;
	$ngaydat = (isset($_REQUEST['ngaydat'])) ? htmlspecialchars($_REQUEST['ngaydat']) : 0;
	$khoanggia = (isset($_REQUEST['khoanggia'])) ? htmlspecialchars($_REQUEST['khoanggia']) : 0;
	$city = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
	$district = (isset($_REQUEST['id_district'])) ? htmlspecialchars($_REQUEST['id_district']) : 0;
	$wards = (isset($_REQUEST['id_wards'])) ? htmlspecialchars($_REQUEST['id_wards']) : 0;

	if ($tinhtrang) $where .= " and tinhtrang=$tinhtrang";
	if ($httt) $where .= " and httt=$httt";
	if ($ngaydat) {
		$ngaydat = explode("-", $ngaydat);
		$ngaytu = trim($ngaydat[0]);
		$ngayden = trim($ngaydat[1]);
		$ngaytu = strtotime(str_replace("/", "-", $ngaytu));
		$ngayden = strtotime(str_replace("/", "-", $ngayden));
		$where .= " and ngaytao<=$ngayden and ngaytao>=$ngaytu";
	}
	if ($khoanggia) {
		$khoanggia = explode(";", $khoanggia);
		$giatu = trim($khoanggia[0]);
		$giaden = trim($khoanggia[1]);
		$where .= " and tonggia<=$giaden and tonggia>=$giatu";
	}
	if ($city) $where .= " and city=$city";
	if ($district) $where .= " and district=$district";
	if ($wards) $where .= " and wards=$wards";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (hoten LIKE '%$keyword%' or email LIKE '%$keyword%' or dienthoai LIKE '%$keyword%' or madonhang LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_order where id<>0 $where order by ngaytao desc $limit";
	$items = $d->rawQuery($sql);
	$sqlNum = "select count(*) as 'num' from #_order where id<>0 $where order by ngaytao desc";
	$count = $d->rawQueryOne($sqlNum);
	$total = $count['num'];
	$url = "index.php?com=order&act=man" . $strUrl;
	$paging = $func->pagination($total, $per_page, $curPage, $url);

	/* Lấy tổng giá min */
	$minTotal = $d->rawQueryOne("select min(tonggia) from #_order");
	if ($minTotal['min(tonggia)']) $minTotal = $minTotal['min(tonggia)'];
	else $minTotal = 0;

	/* Lấy tổng giá max */
	$maxTotal = $d->rawQueryOne("select max(tonggia) from #_order");
	if ($maxTotal['max(tonggia)']) $maxTotal = $maxTotal['max(tonggia)'];
	else $maxTotal = 0;

	/* Lấy đơn hàng - mới đặt */
	$orderMoidat = $d->rawQueryOne("select count(id), sum(tonggia) from #_order where tinhtrang = 1");
	$allMoidat = $orderMoidat['count(id)'];
	$totalMoidat = $orderMoidat['sum(tonggia)'];

	/* Lấy đơn hàng - đã xác nhận */
	$orderDaxacnhan = $d->rawQueryOne("select count(id), sum(tonggia) from #_order where tinhtrang = 2");
	$allDaxacnhan = $orderDaxacnhan['count(id)'];
	$totalDaxacnhan = $orderDaxacnhan['sum(tonggia)'];

	/* Lấy đơn hàng - đã giao */
	$orderDagiao = $d->rawQueryOne("select count(id), sum(tonggia) from #_order where tinhtrang = 4");
	$allDagiao = $orderDagiao['count(id)'];
	$totalDagiao = $orderDagiao['sum(tonggia)'];

	/* Lấy đơn hàng - đã hủy */
	$orderDahuy = $d->rawQueryOne("select count(id), sum(tonggia) from #_order where tinhtrang = 5");
	$allDahuy = $orderDahuy['count(id)'];
	$totalDahuy = $orderDahuy['sum(tonggia)'];
}

/* Edit order */
function get_item()
{
	global $d, $func, $curPage, $item, $chitietdonhang;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&p=" . $curPage, false);

	$item = $d->rawQueryOne("select * from #_order where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=order&act=man&p=" . $curPage, false);

	/* Lấy chi tiết đơn hàng */
	$chitietdonhang = $d->rawQuery("select * from #_order_detail where id_order = ? order by id desc", array($id));
}

/* Save order */
function save_item()
{
	global $d, $func, $curPage, $emailer;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&p=" . $curPage, false);

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
	$item_order = $d->rawQueryOne("select * from #_order where id = ? limit 0,1", array($id));
	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}
	}

	if (isset($_FILES['file-taptin'])) {
		$file_name = $func->uploadName($_FILES['file-taptin']["name"]);
		if ($taptin = $func->uploadImage("file-taptin", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS', UPLOAD_FILE, $file_name)) {
			$data['taptin'] = $taptin;
			$row = $d->rawQueryOne("select id, taptin from #_order  limit 0,1");
			if ($row['id']) $func->delete_file(UPLOAD_FILE . $row['taptin']);
		}
	}
	$data['phiship'] = (isset($data['phiship']) && $data['phiship'] != '') ? str_replace(",", "", $data['phiship']) : 0;
	$data['ngay_shipcost'] = strtotime($data['ngay_shipcost']);
	$data['ngay_waiting_payment'] = strtotime($data['ngay_waiting_payment']);
	$data['ngay_payment'] = strtotime($data['ngay_payment']);
	$data['ngay_shipped'] = strtotime($data['ngay_shipped']);
	$data['ngay_completed'] = strtotime($data['ngay_completed']);
	$data['ngay_cancelled'] = strtotime($data['ngay_cancelled']);

	if ($id) {

		if ($item_order['phiship'] <= 0 || $item_order['phishipen'] <= 0) {
			$d->where('id', $id);
			if ($d->update('order', $data)) {
				if ($data['phiship'] > 0 || $data['phishipen'] > 0) {
					/* Gán giá trị gửi email */
					$madonhang = $item_order['madonhang'];
					$madonhang_mahoa = openssl_encrypt($madonhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing');
					$hoten = $item_order['hoten'];

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
																	<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0;text-align: center;">YOUR ORDER WAS SHIPPED</h1>
																	<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">You have completed your payment successfully!</p>
																	<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">And click your order number <a style="color:#000;" href="' . $emailer->getEmail('home') . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a> to view more details.
																	</p>
																	<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">We know you can’t wait for your package to arrive. That is why you can track your order here:</p>
																	<div style="text-align:center;margin-top:20px">
																		<a style="background:#000;color:#fff;padding:10px 15px;line-height:1.6;text-decoration:none" href="' . $emailer->getEmail('home') . 'account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">TRACK PACKAGE</a>
																	</div>    
																	<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">If there is anything BBRacing can do to improve your experience, please do not hesitate to contact us at info@bbracing.vn and hotline +84 919999968.</p>       
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
												<h3 style="font-size:13px;font-weight:bold;color:#000;text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">YOUR ORDER IS ON ITS WAY!</h3>
												<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">Thank you for purchasing at BBRACING.</p>
												<p>
												Please log in to your account on the BBRacing website at: www.bbracing.vn to track your order Or use the tracking number to check the order at the shipping companys website to know the orders itinerary.
												</p>
												<p>Please refer to the purchasing instructions <a style="color:#000;" href="">here </a>.</p>
												<p>In particular, each order will have an accumulated amount, please check and use according to our instructions on the website. </p>
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

					/* Send email */
					$arrayEmail = array(
						"dataEmail" => array(
							"name" => $item_order['hoten'],
							"email" => $item_order['email'],
							"emailCC" => 'ecommerce@bbracing.vn'
						)
					);
					$subject = "UPDATED SHIPPING FEE! ";
					$message = $contentCustomer;
					$file = 'file';
					$emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file);
					$func->redirect("index.php?com=order&act=man&p=" . $curPage);
				}
				else{
					$func->redirect("index.php?com=order&act=man&p=" . $curPage);
				}
			} else {
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man&p=" . $curPage, false);
			}
		} else {

			$d->where('id', $id);
			if ($d->update('order', $data)) $func->redirect("index.php?com=order&act=man&p=" . $curPage);
			else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man&p=" . $curPage, false);
		}
	} else {
		$func->transfer("Dữ liệu rỗng", "index.php?com=order&act=man&p=" . $curPage, false);
	}
	if ($data['phiship'] > 0 || $data['phishipen'] > 0) {
		var_dump($data['phiship']);
		die();
		/* Gán giá trị gửi email */
		$madonhang = $item_order['madonhang'];
		$madonhang_mahoa = openssl_encrypt($madonhang, 'aes-256-cbc', 'bbracing', 0, $iv = 'bbracing');
		$hoten = $item_order['hoten'];

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
														<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0;text-align: center;">UPDATED SHIPPING FEE</h1>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Your shipping charges have been updated !<br>
														Click your order number <a style="color:#000;" href="' . $emailer->getEmail('home') . ' account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a> to view more details.
														</p>
														<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:20px;">We understand that you have many choices, BBRacing is extremely honored and grateful that you have finally decided to choose us. If there is anything BBRacing can do to improve your experience, please do not hesitate to contact us at info@bbracing.vn and hotline +84 919999968.</p>
														<div style="text-align: center;margin-top: 20px;">
															<a href="' . $emailer->getEmail('home') . ' account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' " target="_blank" style="background: #000;color: #fff;padding: 10px 15px;line-height: 1.6;text-decoration: none;">CONTINE SHOPPING</a>
														</div>
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
									Please pay for order <a style="color:#000;" href="' . $emailer->getEmail('home') . ' account/donhang_chitiet?id_donhang=' . $madonhang_mahoa . ' ">#' . $madonhang . ' </a> at website www.bbracing.com within 30 minutes of receiving this email. 
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

		/* Send email */
		$arrayEmail = array(
			"dataEmail" => array(
				"name" => $item_order['hoten'],
				"email" => $item_order['email'],
				"emailCC" => 'ecommerce@bbracing.vn'
			)
		);
		$subject = "UPDATED SHIPPING FEE! ";
		$message = $contentCustomer;
		$file = 'file';
		if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file))
			$func->redirect("index.php?com=order&act=man&p=" . $curPage);
	}
}

/* Delete order */
function delete_item()
{
	global $d, $func, $curPage;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_order where id = ? limit 0,1", array($id));

		if ($row['id']) {
			$d->rawQuery("delete from #_order_detail where id_order = ?", array($id));
			$d->rawQuery("delete from #_order where id = ?", array($id));
			$func->redirect("index.php?com=order&act=man&p=" . $curPage);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man&p=" . $curPage, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_order where id = ? limit 0,1", array($id));

			if ($row['id']) {
				$d->rawQuery("delete from #_order_detail where id_order = ?", array($id));
				$d->rawQuery("delete from #_order where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=order&act=man&p=" . $curPage);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&p=" . $curPage, false);
}
