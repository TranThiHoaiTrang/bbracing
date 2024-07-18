<?php	
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active export */
	if(isset($config['product']))
	{
		$arrCheck = array();
		foreach($config['product'] as $k => $v) if(isset($v['export']) && $v['export'] == true) $arrCheck[] = $k;
		if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
	}
	else
	{
		$func->transfer("Trang không tồn tại", "index.php", false);
	}

	switch($act)
	{
		case "man":
			$template = "export/man/items";
			break;

		case "exportExcel":
			exportExcel();
			break;

		default:
			$template = "404";
	}

	function exportExcel()
	{
		global $d, $func, $type;

		/* Setting */
		$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
		$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;

		if(isset($_POST['exportExcel']))
		{
			/* PHPExcel */
			require_once LIBRARIES.'PHPExcel.php';
			
			/* Khởi tọa đối tượng */
			$PHPExcel = new PHPExcel();
			
			/* Khởi tạo thông tin người tạo */
			$PHPExcel->getProperties()->setCreator($setting['tenvi']);
			$PHPExcel->getProperties()->setLastModifiedBy($setting['tenvi']);
			$PHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
			$PHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
			$PHPExcel->getProperties()->setDescription("Document for Office 2007 XLSX, generated using PHP classes.");

			/* Khởi tạo mảng column */
			$alphas = range('A','Z');
			$array_file = array(
				// 'stt'=>'STT',
				'id'=>'ID Sản phẩm',
				'masp'=>'Mã SKU',
				// 'tenkhongdauvi'=>'Slug(VI)',
				'tenvi'=>'Tên Sản phẩm(VI)',
				'tenen'=>'Tên Sản phẩm(EN)',
				'id_brand'=>'Brand',
				'id_brand_en'=>'Brand(EN)',
				'id_nhomdanhmuc'=>'Nhóm danh mục cấp 1',
				'id_nhomdanhmuc_en'=>'Nhóm danh mục cấp 1(EN)',
				'id_list'=>'Danh mục cấp 1',
				'id_list_en'=>'Danh mục cấp 1(EN)',
				'id_cat'=>'Danh mục cấp 2',
				'id_cat_en'=>'Danh mục cấp 2(EN)',
				'gia'=>'Giá VND',
				'giamoi'=>'Giá VND mới',
				'giado'=>'Giá EUR',
				'giadomoi'=>'Giá EUR mới',
				'soluongkho'=>'Số lượng kho',
				'cothemua'=>'Số lượng có thể mua'
			);

			/* Khởi tạo và style cho row đầu tiên */
			$i=0;
			foreach($array_file as $k=>$v)
			{
				// if($k=='stt')
				// {
				// 	$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(5);
				// }
				
				if($k=='id')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
				}
				if($k=='masp')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
				}
				else if($k=='id_nhomdanhmuc' || $k=='id_nhomdanhmuc_en' || $k=='id_list' || $k=='id_list_en' || $k=='id_cat' || $k=='id_cat_en')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(30);
				}
				elseif($k=='tenkhongdauvi')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(40);
				}
				else if($k=='tenvi'||$k=='tenen')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(40);
				}
				else if($k=='id_brand' || $k=='id_brand_en')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(20);
				}
				else if($k=='gia' || $k=='giamoi' || $k=='giado' || $k=='giadomoi')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(20);
				}
				else if($k=='soluongkho' || $k=='cothemua')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(10);
				}
				
				$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$i].'1', $v);
				$PHPExcel->getActiveSheet()->getStyle($alphas[$i].'1')->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => 'ffffff' ), 'name' => 'Calibri', 'bold' => true, 'italic' => false, 'size' => 10 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'007BFF'))));
				$i++; 
			}

			/* Lấy và Xuất dữ liệu */
			$whereCategory = "";
			$data = (isset($_POST['data'])) ? $_POST['data'] : null;
			if($data)
			{
				foreach($data as $column => $value)
				{
					if($value > 0)
					{
						$whereCategory .= " and ".$column." = ".$value;
					}
				}
			}

			$product = $d->rawQuery("select * from #_product where type = ? $whereCategory order by stt,id desc",array($type));
			// var_dump("select * from #_product where type = ? $whereCategory order by stt,id desc");die();
			$vitri=2;
			for($i=0;$i<count($product);$i++)
			{
				$j=0;
				foreach($array_file as $k=>$v)
				{
					if($k=='id_nhomdanhmuc')
					{
						$tenlist = $d->rawQueryOne("select id_nhomdanhmuc from #_product_list where id = ? limit 0,1",array($product[$i]['id_list']));
						$tennhomdanhmuc = $d->rawQueryOne("select tenvi from #_product_nhomdanhmuc where id = ? limit 0,1",array($tenlist['id_nhomdanhmuc']));
						// var_dump("select tenen from #_product_list where id = ? limit 0,1",array($product[$i][$k]));
						$datacell = $tennhomdanhmuc['tenvi'];
					}
					else if($k=='id_nhomdanhmuc_en')
					{
						
						$tenlist = $d->rawQueryOne("select id_nhomdanhmuc from #_product_list where id = ? limit 0,1",array($product[$i]['id_list']));
						$tennhomdanhmuc = $d->rawQueryOne("select tenen from #_product_nhomdanhmuc where id = ? limit 0,1",array($tenlist['id_nhomdanhmuc']));
						// var_dump("select tenen from #_product_list where id = ? limit 0,1",array($product[$i][$k]));
						$datacell = $tennhomdanhmuc['tenen'];
					}
					else if($k=='id_list')
					{
						$tenlist = $d->rawQueryOne("select tenvi from #_product_list where id = ? limit 0,1",array($product[$i][$k]));
						// var_dump("select tenen from #_product_list where id = ? limit 0,1",array($product[$i][$k]));
						$datacell = $tenlist['tenvi'];
					}
					else if($k=='id_list_en')
					{
						$tencat = $d->rawQueryOne("select tenen from #_product_list where id = ? limit 0,1",array($product[$i]['id_list']));
						// var_dump("select tenen from #_product_list where id = ? limit 0,1",array($product[$i]['id_list']));
						$datacell = $tencat['tenen'];
					}
					else if($k=='id_cat')
					{
						$tencat = $d->rawQueryOne("select tenvi from #_product_cat where id = ? limit 0,1",array($product[$i][$k]));
						$datacell = $tencat['tenvi'];
					}
					else if($k=='id_cat_en')
					{
						$tencat = $d->rawQueryOne("select tenen from #_product_cat where id = ? limit 0,1",array($product[$i]['id_cat']));
						$datacell = $tencat['tenen'];
					}
					else if($k=='id_brand')
					{
						$tenbrand = $d->rawQueryOne("select tenvi from #_product_brand where id = ? limit 0,1",array($product[$i][$k]));
						$datacell = $tenbrand['tenvi'];
					}
					else if($k=='id_brand_en')
					{
						$tenbrand = $d->rawQueryOne("select tenen from #_product_brand where id = ? limit 0,1",array($product[$i]['id_brand']));
						$datacell = $tenbrand['tenen'];
					}
					else
					{
						$datacell = $product[$i][$k];
					}

					if($k=='masp')
					{
						$PHPExcel->getActiveSheet()->setCellValueExplicit($alphas[$j].$vitri, htmlspecialchars_decode($datacell),  PHPExcel_Cell_DataType::TYPE_STRING);
					}
					else
					{
						$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$j].$vitri, htmlspecialchars_decode($datacell));
					}
					
					$j++;
				}
				$vitri++;
			}

			/* Style cho các row dữ liệu */
			$vitri=2;
			for($i=0;$i<count($product);$i++)
			{
				$j=0;
				foreach($array_file as $k=>$v)
				{
					$PHPExcel->getActiveSheet()->getStyle($alphas[$j].$vitri)->applyFromArray(
						array( 
							'font' => array( 
								'color' => array('rgb' => '000000'), 
								'name' => 'Calibri', 
								'bold' => false, 
								'italic' => false, 
								'size' => 10 
							), 
							'alignment' => array( 
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 
								'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 
								'wrap' => true 
							)
						)
					);
					$j++;
				}
				$vitri++;
			}

			/* Rename title */
			$PHPExcel->getActiveSheet()->setTitle('Products List');

			/* Khởi tạo chỉ mục ở đầu sheet */
			$PHPExcel->setActiveSheetIndex(0);

			/* Xuất file */
			$time = time();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="products_'.$time.'_'.date('d_m_Y').'.xlsx"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit();
		}
		else
		{
			$func->transfer("Dữ liệu rỗng", "index.php?com=export&act=man&type=".$type, false);
		}
	}
?>