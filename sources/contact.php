<?php
if (!defined('SOURCES')) die("Error");

if (isset($_POST['submit-contact'])) {
	$responseCaptcha = $_POST['recaptcha_response_contact'];
	$resultCaptcha = $func->checkRecaptcha($responseCaptcha);
	$scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
	$actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
	$testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

	if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'contact') || $testCaptcha == true) {
		$data = array();
		if (isset($_FILES["file"])) {
			$file_name = $func->uploadName($_FILES["file"]["name"]);
			if ($file = $func->uploadImage("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', UPLOAD_FILE_L, $file_name)) {
				$data['taptin'] = $file;
			}
		}

		$data['ten'] = (isset($_POST['ten']) && $_POST['ten'] != '') ? htmlspecialchars($_POST['ten']) : '';
		$data['diachi'] = (isset($_POST['diachi']) && $_POST['diachi'] != '') ? htmlspecialchars($_POST['diachi']) : '';
		$data['dienthoai'] = (isset($_POST['dienthoai']) && $_POST['dienthoai'] != '') ? htmlspecialchars($_POST['dienthoai']) : '';
		$data['email'] = (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '';
		$data['tieude'] = (isset($_POST['tieude']) && $_POST['tieude'] != '') ? htmlspecialchars($_POST['tieude']) : '';
		$data['noidung'] = (isset($_POST['noidung']) && $_POST['noidung'] != '') ? htmlspecialchars($_POST['noidung']) : '';
		$data['ngaytao'] = time();
		$data['type'] = $_POST['type'];
		$data['id_sanpham'] = $_POST['id_sanpham'];
		$data['stt'] = 1;
		$d->insert('contact', $data);

		if ($data['type'] == 'contact' || $data['type'] == 'thongbao_cohang') {
			/* Gán giá trị gửi email */
			$strThongtin = '';
			$emailer->setEmail('tennguoigui', $data['ten']);
			$emailer->setEmail('emailnguoigui', $data['email']);
			$emailer->setEmail('dienthoainguoigui', $data['dienthoai']);
			$emailer->setEmail('diachinguoigui', $data['diachi']);
			$emailer->setEmail('tieudelienhe', $data['tieude']);
			$emailer->setEmail('noidunglienhe', $data['noidung']);
			if ($emailer->getEmail('tennguoigui')) {
				$strThongtin .= '<span style="text-transform:capitalize">' . $emailer->getEmail('tennguoigui') . '</span><br>';
			}
			if ($emailer->getEmail('emailnguoigui')) {
				$strThongtin .= '<a href="mailto:' . $emailer->getEmail('emailnguoigui') . '" target="_blank">' . $emailer->getEmail('emailnguoigui') . '</a><br>';
			}
			if ($emailer->getEmail('diachinguoigui')) {
				$strThongtin .= '' . $emailer->getEmail('diachinguoigui') . '<br>';
			}
			if ($emailer->getEmail('dienthoainguoigui')) {
				$strThongtin .= 'Tel: ' . $emailer->getEmail('dienthoainguoigui') . '';
			}
			$emailer->setEmail('thongtin', $strThongtin);

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
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr style="background:#fff">
										<td align="left" height="auto" style="padding:15px" width="600">
											<table>
												<tbody>
													<tr>
														<td>
															<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Welcome</h1>
															<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">You receive a contact letter from a customer <span style="text-transform:capitalize">' . $emailer->getEmail('tennguoigui') . '</span> tại website ' . $emailer->getEmail('company:website') . '.</p>
															<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">Contact Info <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Day ' . date('d', $emailer->getEmail('datesend')) . ' month ' . date('m', $emailer->getEmail('datesend')) . ' year ' . date('Y H:i:s', $emailer->getEmail('datesend')) . ')</span></h3>
														</td>
													</tr>
												<tr>
												<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">' . $emailer->getEmail('thongtin') . '</td>
														</tr>
														<tr>
															<td colspan="2" style="border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">&nbsp;
															<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:0"><strong>Title: </strong> ' . $emailer->getEmail('tieudelienhe') . '<br>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
											<tr>
												<td>
												<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>' . $emailer->getEmail('noidunglienhe') . '</i></p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px ' . $emailer->getEmail('color') . ' dashed;padding:10px;list-style-type:none">Do you need immediate assistance? Just send email <a href="mailto:' . $emailer->getEmail('company:email') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none" target="_blank"> <strong>' . $emailer->getEmail('company:email') . '</strong> </a>,or call the hotline <strong style="color:' . $emailer->getEmail('color') . '">' . $emailer->getEmail('company:hotline') . '</strong> ' . $emailer->getEmail('company:worktime') . '. ' . $emailer->getEmail('company:website') . ' always ready to support you at any time.</p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Once again ' . $emailer->getEmail('company:website') . ' thank you.</p>
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="' . $emailer->getEmail('home') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none;font-size:14px" target="_blank">' . $emailer->getEmail('company') . '</a> </strong></p>
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
									<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">You received this email because you contacted us at ' . $emailer->getEmail('company:website') . '.<br>
									To be sure to always receive email notifications and responses from ' . $emailer->getEmail('company:website') . ', Please add your address <strong><a href="mailto:' . $emailer->getEmail('email') . '" target="_blank">' . $emailer->getEmail('email') . '</a></strong> enter the address number (Address Book, Contacts) of email box.<br>
									<b>Address:</b> ' . $emailer->getEmail('company:address') . '</p>
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
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr style="background:#fff">
										<td align="left" height="auto" style="padding:15px" width="600">
											<table>
												<tbody>
													<tr>
														<td>
															<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Welcome</h1>
															<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Your contact information has been received. ' . $emailer->getEmail('company:website') . ' will respond as soon as possible.</p>
															<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">Contact Info <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(Day ' . date('d', $emailer->getEmail('datesend')) . ' month ' . date('m', $emailer->getEmail('datesend')) . ' year ' . date('Y H:i:s', $emailer->getEmail('datesend')) . ')</span></h3>
														</td>
													</tr>
												<tr>
												<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">' . $emailer->getEmail('thongtin') . '</td>
														</tr>
														<tr>
															<td colspan="2" style="border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">&nbsp;
															<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:0"><strong>Title: </strong> ' . $emailer->getEmail('tieudelienhe') . '<br>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
											<tr>
												<td>
												<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>' . $emailer->getEmail('noidunglienhe') . '</i></p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
													<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px ' . $emailer->getEmail('color') . ' dashed;padding:10px;list-style-type:none">Do you need immediate assistance? Just send email <a href="mailto:' . $emailer->getEmail('company:email') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none" target="_blank"> <strong>' . $emailer->getEmail('company:email') . '</strong> </a>, or call the hotline <strong style="color:' . $emailer->getEmail('color') . '">' . $emailer->getEmail('company:hotline') . '</strong> ' . $emailer->getEmail('company:worktime') . '. ' . $emailer->getEmail('company:website') . ' always ready to support you at any time.</p>
												</td>
											</tr>
											<tr>
												<td>&nbsp;
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Once again ' . $emailer->getEmail('company:website') . ' Thank you.</p>
												<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right"><strong><a href="' . $emailer->getEmail('home') . '" style="color:' . $emailer->getEmail('color') . ';text-decoration:none;font-size:14px" target="_blank">' . $emailer->getEmail('company') . '</a> </strong></p>
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
									<p align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">You received this email because you contacted us at ' . $emailer->getEmail('company:website') . '.<br>
									To be sure to always receive email notifications and responses from ' . $emailer->getEmail('company:website') . ', Please add your address <strong><a href="mailto:' . $emailer->getEmail('email') . '" target="_blank">' . $emailer->getEmail('email') . '</a></strong> enter the address number (Address Book, Contacts) of email box.<br>
									<b>Addres:</b> ' . $emailer->getEmail('company:address') . '</p>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>';

			if ($lang == 'vi') {
				$thanhcong = 'Gửi liên hệ thành công';
				$thatbai = 'Gửi liên hệ thất bại. Vui lòng thử lại sau';
			} else {
				$thanhcong = 'Contact sent successfully';
				$thatbai = 'Contact sending failed. Please try again later';
			}
			/* Send email admin */
			$arrayEmail = null;
			$subject = "Contact letter from " . $setting['ten' . $lang];
			$message = $contentAdmin;
			$file = 'file';

			if ($emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file)) {
				/* Send email customer */
				$arrayEmail = array(
					"dataEmail" => array(
						"name" => $emailer->getEmail('tennguoigui'),
						"email" => $emailer->getEmail('emailnguoigui'),
						// "emailCC" => 'tranhoaitrang3001@gmail.com'
						"emailCC" => 'ecommerce@bbracing.vn'
					)
				);
				$subject = "Contact letter from " . $setting['ten' . $lang];
				$message = $contentCustomer;
				$file = 'file';

				if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) {
					// $func->transfer($thanhcong, $config_base);
					$login_message = $thanhcong;
					$redirect_url = $config_base;
					$stt = true;
				}
			} else {
				// $func->transfer($thatbai, $config_base, false);
				$login_message = $thatbai;
				$redirect_url = $config_base;
				$stt = false;
			}
		} else {
			// $func->transfer($thanhcong, $config_base);
			$login_message = $thanhcong;
			$redirect_url = $config_base;
			$stt = true;
		}
	} else {
		// $func->transfer($thatbai, $config_base, false);
		$login_message = $thatbai;
		$redirect_url = $config_base;
		$stt = false;
	}
	$message_botro = '';
	echo "<script>var loginMessage = " . json_encode($login_message) . "; var redirectUrl = " . json_encode($redirect_url) . ";var stt = " . json_encode($stt) . ";var message_botro = " . json_encode($message_botro) . ";</script>";
}

/* SEO */
$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array('lien-he'));
$banner = $seopage['banner'];
$seo->setSeo('h1', $title_crumb);
if (!empty($seopage['title' . $seolang])) $seo->setSeo('title', $seopage['title' . $seolang]);
else $seo->setSeo('title', $title_crumb);
if (!empty($seopage['keywords' . $seolang])) $seo->setSeo('keywords', $seopage['keywords' . $seolang]);
if (!empty($seopage['description' . $seolang])) $seo->setSeo('description', $seopage['description' . $seolang]);
$seo->setSeo('url', $func->getPageURL());
$img_json_bar = (isset($seopage['options']) && $seopage['options'] != '') ? json_decode($seopage['options'], true) : null;
if (!empty($seopage['photo'])) {
	if ($img_json_bar == null || ($img_json_bar['p'] != $seopage['photo'])) {
		$img_json_bar = $func->getImgSize($seopage['photo'], UPLOAD_SEOPAGE_L . $seopage['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar), 'seopage', $seopage['id']);
	}
	if (count($img_json_bar) > 0) {
		$seo->setSeo('photo', $config_base . THUMBS . '/' . $img_json_bar['w'] . 'x' . $img_json_bar['h'] . 'x2/' . UPLOAD_SEOPAGE_L . $seopage['photo']);
		$seo->setSeo('photo:width', $img_json_bar['w']);
		$seo->setSeo('photo:height', $img_json_bar['h']);
		$seo->setSeo('photo:type', $img_json_bar['m']);
	}
}

$lienhe = $d->rawQueryOne("select noidung$lang from #_static where type = ? limit 0,1", array('lienhe'));

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
