<?php
	define('LIBRARIES','./libraries/');
	
	require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $injection = new AntiSQLInjection();
    $d = new PDODb($config['database']);
    $func = new Functions($d);
	
	/* Kiểm tra có đăng nhập chưa */
	if($func->check_login() == false && $act != "login")
	{
		$func->redirect("index.php?com=user&act=login");
	}

	/* Kiểm tra active export excel */
	if(!isset($config['order']['excelall']) || $config['order']['excelall'] == false) $func->transfer("Trang không tồn tại", "index.php", false);
	
	/* Setting */
	$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
	$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;
		
	/* Thông tin đơn hàng */
	$sql = "select * from #_member where newsletter = 1";

	$sql .= " order by ngaytao desc";
	$donhang = $d->rawQuery($sql);
	
	/* PHPExcel */
	require_once LIBRARIES.'PHPExcel.php';

	/* Khởi tọa đối tượng */
	$PHPExcel = new PHPExcel();
	$PHPExcelStyleTitle = new PHPExcel_Style();
	$PHPExcelStyleContent = new PHPExcel_Style();

	/* Khởi tạo thông tin người tạo */
	$PHPExcel->getProperties()->setCreator($setting['tenvi']);
	$PHPExcel->getProperties()->setLastModifiedBy($setting['tenvi']);
	$PHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
	$PHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
	$PHPExcel->getProperties()->setDescription("Document for Office 2007 XLSX, generated using PHP classes.");

	/* Merge cells */
	$PHPExcel->setActiveSheetIndex(0);
	$PHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
	$PHPExcel->setActiveSheetIndex(0)->mergeCells('A2:E2');
	$PHPExcel->setActiveSheetIndex(0)->mergeCells('A3:E3');
	$PHPExcel->setActiveSheetIndex(0)->mergeCells('A4:E4');

	/* set Cell Value */
	$PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('A1',$setting['tenvi']);
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('A2','Hotline: '.$optsetting['hotline']);
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('A3','Email: '.$optsetting['email']);
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('A4','Địa chỉ: '.$optsetting['diachi']);
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('A6','STT');
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('B6','First Name');
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('C6','Last Name');
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('D6','Email');
	$PHPExcel->setActiveSheetIndex(0)->setCellValue('E6','Hotline');

	/* Style */
	$PHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
		array(
			'font'=>array(
				'color'=>array(
					'rgb'=>'000000'
				),
				'name'=>'Arial',
				'bold'=>true,
				'italic'=>false,
				'size' => 14
			),
			'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			)
		)
	);
	$PHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray(
		array(
			'font'=>array(
				'size'=>11
			),
			'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			)
		)
	);
	$PHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray(
		array(
			'font'=>array(
				'size'=>11
			),
			'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			)
		)
	);
	$PHPExcel->getActiveSheet()->getStyle('A4')->applyFromArray(
		array(
			'font'=>array(
				'size'=>11
			),
			'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			)
		)
	);
	$PHPExcelStyleTitle->applyFromArray(
		array(
			'font'=>array(
				'color'=>array('rgb'=>'000000'),
				'name'=>'Calibri',
				'bold'=>true,
				'italic'=>false,
				'size'=> 10
			),
			'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			),
			'borders'=>array(
				'top'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'right'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'bottom'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'left'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
			)
		)
	);
	$PHPExcel->getActiveSheet()->setSharedStyle($PHPExcelStyleTitle, 'A6:E6');

	/* Lấy và Xuất dữ liệu */
	$vitri = 7;
	for($i=0;$i<count($donhang);$i++)
	{
	
		/* Gán giá trị */
		$PHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$vitri, $i+1)
		->setCellValue('B'.$vitri, htmlspecialchars_decode(@$donhang[$i]['username']))
		->setCellValue('C'.$vitri, htmlspecialchars_decode(@$donhang[$i]['ten']))
		->setCellValue('D'.$vitri, htmlspecialchars_decode(@$donhang[$i]['email']))
		->setCellValue('E'.$vitri, htmlspecialchars_decode(@$donhang[$i]['hotline']));

		$PHPExcelStyleContent->applyFromArray(
			array(
				'alignment'=>array(
					'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap'=>true
				),
				'borders'=>array(
					'top'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'right'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'bottom'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
					'left'=>array('style' => PHPExcel_Style_Border::BORDER_THIN),
				)
			)
		);
		$PHPExcel->getActiveSheet()->setSharedStyle($PHPExcelStyleContent, 'A'.$vitri.':E'.$vitri);
		$vitri++;
	}

	/* Rename title */
	$PHPExcel->getActiveSheet()->setTitle('Orders List');

	/* Khởi tạo chỉ mục ở đầu sheet */
	$PHPExcel->setActiveSheetIndex(0);

	/* Xuất file */
	$time = time();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="newsletter_member_'.date('h_i').'_'.date('d_m_Y').'.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit();
?>