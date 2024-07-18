<?php
class Cart
{
	private $d;

	function __construct($d)
	{
		$this->d = $d;
	}

	public function get_product_info($pid = 0)
	{
		$row = null;
		if ($pid) {
			$row = $this->d->rawQueryOne("select * from #_product where id = ? limit 0,1", array($pid));
		}
		return $row;
	}

	public function get_product_list($pid = 0)
	{
		$row = null;
		if ($pid) {
			$row = $this->d->rawQueryOne("select * from #_product_list where id = ? limit 0,1", array($pid));
		}
		return $row;
	}

	public function get_brand_sp($pid = 0)
	{
		$row = null;
		if ($pid) {
			$row = $this->d->rawQueryOne("select * from #_product_brand where id = ? limit 0,1", array($pid));
		}
		return $row;
	}

	public function get_product_khuyenmai($pid = 0)
	{
		$row = null;
		if ($pid) {
			$row = $this->d->rawQueryOne("select * from #_news where type = 'chuong-trinh-giam-gia' and id = ? and hienthi > 0 order by stt,id desc limit 1", array($pid));
		}
		return $row;
	}
	public function get_product_khuyenmai_user($idb = 0, $idv = 0)
	{
		$row = null;
		if ($idb) {
			$row = $this->d->rawQueryOne("select * from table_member_vip_discount where id_brand = ? and id_vip = ? limit 1", array($idb, $idv));
		}
		return $row;
	}

	public function get_khuyenmai_sanpham_one($idb = 0)
	{
		$row = null;
		if ($idb) {
			$row = $this->d->rawQueryOne("select * from table_news where id = ? limit 1", array($idb));
		}
		return $row;
	}

	public function get_product_mau($mau = 0)
	{
		global $lang;
		$str = '';
		if ($mau) {
			$row = $this->d->rawQueryOne("select * from #_product_mau where id = ? limit 0,1", array($mau));
			$str = $row['ten'.$lang];
		}
		return $str;
	}

	public function get_product_size($size = 0)
	{
		global $lang;
		$str = '';
		if ($size) {
			$row = $this->d->rawQueryOne("select * from #_product_size where id = ? limit 0,1", array($size));
			$str = $row['ten'.$lang];
		}
		return $str;
	}

	public function remove_product($code = '')
	{
		if (isset($_SESSION['cart']) && $code != '') {
			$max = count($_SESSION['cart']);

			for ($i = 0; $i < $max; $i++) {
				if ($code == $_SESSION['cart'][$i]['code']) {
					unset($_SESSION['cart'][$i]);
					break;
				}
			}

			$_SESSION['cart'] = array_values($_SESSION['cart']);
		}
	}

	public function get_order_total()
	{
		global $login_member, $lang;
		$sum = 0;

		if (isset($_SESSION['cart'])) {
			$max = count($_SESSION['cart']);

			for ($i = 0; $i < $max; $i++) {
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
				$proinfo = $this->get_product_info($pid);
				$list_sp = $this->get_product_list($proinfo['id_list']);
				$khuyenmai = $this->get_product_khuyenmai($list_sp['id_news']);
				$khuyenmai_sanpham_one = $this->get_khuyenmai_sanpham_one($list_sp['id_khuyenmai']);
				$dis_user = $this->get_product_khuyenmai_user($proinfo['id_brand'], $_SESSION[$login_member]['id_vip']);
				$pro_brand = $this->get_brand_sp($proinfo['id_brand']);
				
				if (!empty($list_sp['id_news'])) {
					if ($dis_user['discount'] != 0) {
						if ($lang == 'vi') {
							if ($proinfo['gia']) {
								$khuyenmai = (($proinfo['gia'] * $dis_user['discount']) / 100);
								$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
							} else {
								$tigia = $proinfo['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = round($giakhuyenmai, 2);
							}
						} else {
							if ($proinfo['giado']) {
								$khuyenmai = (($proinfo['giado'] * $dis_user['discount']) / 100);
								$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
							} else {
								$tigia = $proinfo['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = $giakhuyenmai;
							}
						}
					} else {
						
						if ($lang == 'vi') {
							if ($proinfo['gia']) {
								$khuyenmai = (($proinfo['gia'] * $khuyenmai['discount']) / 100);
								$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
							} else {
								$tigia = $proinfo['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
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
								$tigia = $proinfo['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = $giakhuyenmai;
							}
						}
					}
				} elseif (!empty($proinfo['id_khuyenmai'])) {
					if ($khuyenmai_sanpham_one['discount'] != 0) {
						if ($lang == 'vi') {
							if ($proinfo['gia']) {
								$khuyenmai = (($proinfo['gia'] * $khuyenmai_sanpham_one['discount']) / 100);
								$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
							} else {
								$tigia = $proinfo['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = round($giakhuyenmai, 2);
							}
						} else {
							if ($proinfo['giado']) {
								$khuyenmai = (($proinfo['giado'] * $khuyenmai_sanpham_one['discount']) / 100);
								$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
							} else {
								$tigia = $proinfo['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $khuyenmai_sanpham_one['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = $giakhuyenmai;
							}
						}
					} else {
						if ($lang == 'vi') {
							if ($proinfo['gia']) {
								$khuyenmai = (($proinfo['gia'] * $khuyenmai['discount']) / 100);
								$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
							} else {
								$tigia = $proinfo['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
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
								$tigia = $proinfo['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
								$tigia_new = round($tigia, 2);
		
								$khuyenmai = (($tigia_new * $khuyenmai['discount']) / 100);
								$giakhuyenmai = $tigia_new - $khuyenmai;
								$giakhuyenmai = $giakhuyenmai;
							}
						}
					}
				} elseif ($dis_user['discount'] != 0) {
					if ($lang == 'vi') {
						if ($proinfo['gia']) {
							$khuyenmai = (($proinfo['gia'] * $dis_user['discount']) / 100);
							$giakhuyenmai = $proinfo['gia'] - $khuyenmai;
						} else {
							$tigia = $proinfo['giado'] * str_replace(",", "", $pro_brand['tigia_brand']);
							$tigia_new = round($tigia, 2);
		
							$khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
							$giakhuyenmai = $tigia_new - $khuyenmai;
							$giakhuyenmai = round($giakhuyenmai, 2);
						}
					} else {
						if ($proinfo['giado']) {
							$khuyenmai = (($proinfo['giado'] * $dis_user['discount']) / 100);
							$giakhuyenmai = $proinfo['giado'] - $khuyenmai;
						} else {
							$tigia = $proinfo['gia'] / str_replace(",", "", $pro_brand['tigia_brand']);
							$tigia_new = round($tigia, 2);
		
							$khuyenmai = (($tigia_new * $dis_user['discount']) / 100);
							$giakhuyenmai = $tigia_new - $khuyenmai;
							$giakhuyenmai = $giakhuyenmai;
						}
					}
				}
		
				// var_dump($giakhuyenmai);

				if($lang == 'vi'){
					if ($giakhuyenmai) {
						$price = $giakhuyenmai;
					} elseif ($proinfo['giamoi']) {
						$price = $proinfo['giamoi'];
					} else {
						$price = $proinfo['gia'];
					}
				}
				else{
					if ($giakhuyenmai) {
						$price = $giakhuyenmai;
					} elseif ($proinfo['giadomoi']) {
						$price = $proinfo['giadomoi'];
					} else {
						$price = $proinfo['giado'];
					}
				}
				// var_dump($price);
				$sum += ($price * $q);
			}
		}

		return $sum;
	}

	public function get_cannang_total()
	{
		$sum = 0;

		if (isset($_SESSION['cart'])) {
			$max = count($_SESSION['cart']);

			for ($i = 0; $i < $max; $i++) {
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
				$proinfo = $this->get_product_info($pid);

				$cannang = $proinfo['cannang'];

				$sum += ($cannang * $q);
			}
		}

		return $sum;
	}
	public function get_kichthuoc_total()
	{
		$sum = 0;

		if (isset($_SESSION['cart'])) {
			$max = count($_SESSION['cart']);

			for ($i = 0; $i < $max; $i++) {
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
				$proinfo = $this->get_product_info($pid);

				$kichthuoc = $proinfo['kichthuoc'];

				$sum += ($kichthuoc * $q);
			}
		}

		return $sum;
	}

	public function addtocart($q = 0, $pid = 0, $mau = 0, $size = 0, $cannang = 0, $kichthuoc = 0)
	{
		if ($pid < 1 or $q < 1) return;

		$code = md5($pid . $mau . $size);

		if (isset($_SESSION['cart'])) {
			if (!$this->product_exists($code, $q)) {
				$max = count($_SESSION['cart']);
				$_SESSION['cart'][$max]['productid'] = $pid;
				$_SESSION['cart'][$max]['qty'] = $q;
				$_SESSION['cart'][$max]['mau'] = $mau;
				$_SESSION['cart'][$max]['size'] = $size;
				$_SESSION['cart'][$max]['cannang'] = $cannang;
				$_SESSION['cart'][$max]['kichthuoc'] = $kichthuoc;
				$_SESSION['cart'][$max]['code'] = $code;
			}
		} else {
			$_SESSION['cart'] = array();
			$_SESSION['cart'][0]['productid'] = $pid;
			$_SESSION['cart'][0]['qty'] = $q;
			$_SESSION['cart'][0]['mau'] = $mau;
			$_SESSION['cart'][0]['size'] = $size;
			$_SESSION['cart'][0]['cannang'] = $cannang;
			$_SESSION['cart'][0]['kichthuoc'] = $kichthuoc;
			$_SESSION['cart'][0]['code'] = $code;
		}
	}

	private function product_exists($code = '', $q = 1)
	{
		$flag = 0;

		if (isset($_SESSION['cart']) && $code != '') {
			$q = ($q > 1) ? $q : 1;
			$max = count($_SESSION['cart']);

			for ($i = 0; $i < $max; $i++) {
				if ($code == $_SESSION['cart'][$i]['code']) {
					$_SESSION['cart'][$i]['qty'] += $q;
					$flag = 1;
				}
			}
		}

		return $flag;
	}
}
