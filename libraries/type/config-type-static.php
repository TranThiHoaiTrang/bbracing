<?php
    // /* Giới thiệu */
    $nametype = "officail";
    $config['static'][$nametype]['title_main'] = "Officail";
    $config['static'][$nametype]['images'] = true;
    $config['static'][$nametype]['images2'] = false;
    $config['static'][$nametype]['file'] = false;
    $config['static'][$nametype]['tieude'] = false;
    $config['static'][$nametype]['mota'] = false;
    $config['static'][$nametype]['mota_cke'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    $config['static'][$nametype]['seo'] = false;
    $config['static'][$nametype]['width'] = 465;
    $config['static'][$nametype]['height'] = 315;    
    $config['static'][$nametype]['width1'] = 440;
    $config['static'][$nametype]['height1'] = 325;
    $config['static'][$nametype]['gallery'] = array(
        $nametype => array(
            "title_main_photo" => "Hình ảnh",
            "title_sub_photo" => "Hình ảnh",
            "number_photo" => 3,
            "images_photo" => true,
            "cart_photo" => true,
            "avatar_photo" => true,
            "tieude_photo" => true,
            "width_photo" => 560,
            "height_photo" => 560,
            "thumb_photo" => '100x100x1',
            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
        ),
        
    );
    $config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
    $config['static'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

    /* Liên hệ */
    // $nametype = "lienhe";
    // $config['static'][$nametype]['title_main'] = "Liên hệ";
    // $config['static'][$nametype]['noidung'] = true;
    // $config['static'][$nametype]['noidung_cke'] = true;

    $nametype = "sp_khuyenmai";
    $config['static'][$nametype]['title_main'] = "Sản phẩm khuyến mãi";
    $config['static'][$nametype]['file'] = true;
    $config['static'][$nametype]['mota'] = true;
    $config['static'][$nametype]['mota_cke'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    $config['static'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';
 
    /* Footer */
    // $nametype = "footer";
    // $config['static'][$nametype]['title_main'] = "Footer";
    // $config['static'][$nametype]['tieude'] = false;
    // $config['static'][$nametype]['noidung'] = true;
    // $config['static'][$nametype]['noidung_cke'] = true;

    $nametype = "quyen_loi_taikhoan_canhan";
    $config['static'][$nametype]['title_main'] = "Quyền lợi tài khoản cá nhân";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['link_youtube'] = true;

    $nametype = "quyen_loi_nhaphanphoi";
    $config['static'][$nametype]['title_main'] = "Quyền lợi nhà phân phối";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['link_youtube'] = true;

    $nametype = "tt_baohanh";
    $config['static'][$nametype]['title_main'] = "Thông tin bảo hành";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    $config['static'][$nametype]['images'] = true;
    $config['static'][$nametype]['width'] = 1600;
    $config['static'][$nametype]['height'] = 400; 
    $config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

    $nametype = "link_chitietdonhang";
    $config['static'][$nametype]['title_main'] = "Link chi tiết đơn hàng";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['link_youtube'] = true;

    
    $nametype = "huongdantracuu_donhang";
    $config['static'][$nametype]['title_main'] = "Hướng dẫn tra cứu đơn hàng";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    $config['static'][$nametype]['images'] = true;
    $config['static'][$nametype]['width'] = 1600;
    $config['static'][$nametype]['height'] = 400; 
    $config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

    $nametype = "slogan_chuong_trinh";
    $config['static'][$nametype]['title_main'] = "Slogan chương trình";
    $config['static'][$nametype]['tieude'] = true;
    $config['static'][$nametype]['link_youtube'] = false;
?>