<?php
	include "ajax_config.php";

	if(isset($_POST["id"]))
	{
		$table = (isset($_POST["table"])) ? htmlspecialchars($_POST["table"]) : '';
		// $id = (isset($_POST["id"])) ? htmlspecialchars($_POST["id"]) : 0;
		$type = (isset($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
		$row = null;

		if(isset($_POST['id']) && ($_POST['id'] != '')) $id = implode("|", $_POST['id']);
		else $id = "";

		if($id)
		{
			// var_dump("select tenvi, id from table_product_option_list where id_option REGEXP (" . $id . ") and type = ? order by stt,id desc",array($type));
			$row = $d->rawQuery("select tenvi, id from table_product_option_list where id_option REGEXP ('" . $id . "') and type = ? order by stt,id desc",array($type));
		}

		$str = '<option value="0">Chọn option list</option>';
		if($row)
		{
			foreach($row as $v)
			{
				$str .= '<option value='.$v["id"].'>'.$v["tenvi"].'</option>';
			}
		}
		echo $str;
	}
?>