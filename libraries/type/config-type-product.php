<?php

/* Sản phẩm */
$nametype = "san-pham";
$config['product'][$nametype]['title_main'] = "Sản phẩm";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['file'] = true;
$config['product'][$nametype]['nhomdanhmuc'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['item'] = false;
$config['product'][$nametype]['sub'] = false;
$config['product'][$nametype]['brand'] = true;
$config['product'][$nametype]['mau'] = true;
$config['product'][$nametype]['size'] = false;
$config['product'][$nametype]['doday'] = true;
$config['product'][$nametype]['doday_list'] = true;
$config['product'][$nametype]['option'] = true;
$config['product'][$nametype]['option_list'] = true;
$config['product'][$nametype]['id_khuyenmai'] = true;
$config['product'][$nametype]['tags'] = false;
$config['product'][$nametype]['import'] = true;
$config['product'][$nametype]['export'] = true;
$config['product'][$nametype]['view'] = false;
$config['product'][$nametype]['copy'] = true;
$config['product'][$nametype]['copy_image'] = true;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("noibat" => "Nổi bật", "hot" => "Mới", "banchay" => "Bán chạy");
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array(
    $nametype => array(
        "title_main_photo" => "Hình ảnh sản phẩm",
        "title_sub_photo" => "Hình ảnh",
        "number_photo" => 3,
        "images_photo" => true,
        "cart_photo" => true,
        "avatar_photo" => true,
        "tieude_photo" => true,
        "width_photo" => 760,
        "height_photo" => 540,
        "thumb_photo" => '100x100x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
    ),
    // "video" => array
    // (
    //     "title_main_photo" => "Video sản phẩm",
    //     "title_sub_photo" => "Video",
    //     "number_photo" => 2,
    //     "video_photo" => true,
    //     "tieude_photo" => true
    // ),
    // "taptin" => array
    // (
    //     "title_main_photo" => "Tập tin sản phẩm",
    //     "title_sub_photo" => "Tập tin",
    //     "number_photo" => 2,
    //     "file_photo" => true,
    //     "tieude_photo" => true,
    //     "file_type_photo" => 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS'
    // )
);
// $config['news'][$nametype]['gallery1'] = array(
//     $nametype => array
//     (
//         "title_main_photo" => "Thư viện ảnh 1",
//         "title_sub_photo" => "Hình ảnh 1",
//         "number_photo" => 2,
//         "images_photo" => true,
//         "avatar_photo" => true,
//         "tieude_photo" => true,
//         "width_photo" => 1600,
//         "height_photo" => 1800,
//         "thumb_photo" => '100x100x1',
//         "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
//     )
// );
$config['product'][$nametype]['video'] = true;
$config['product'][$nametype]['ma'] = true;
$config['product'][$nametype]['gia'] = true;
$config['product'][$nametype]['giamoi'] = true;
$config['product'][$nametype]['giado'] = true;
$config['product'][$nametype]['giadomoi'] = true;
$config['product'][$nametype]['soluongkho'] = true;
$config['product'][$nametype]['cothemua'] = true;
$config['product'][$nametype]['kichthuoc'] = true;
$config['product'][$nametype]['cannang'] = true;
$config['product'][$nametype]['giakm'] = false;
$config['product'][$nametype]['motangan'] = false;
$config['product'][$nametype]['motangan_cke'] = false;
$config['product'][$nametype]['mota'] = true;
$config['product'][$nametype]['mota_cke'] = true;
$config['product'][$nametype]['noidung'] = true;
$config['product'][$nametype]['noidung_cke'] = true;
$config['product'][$nametype]['ungdung'] = true;
$config['product'][$nametype]['ungdung_cke'] = true;
$config['product'][$nametype]['luuy'] = false;
$config['product'][$nametype]['luuy_cke'] = true;
$config['product'][$nametype]['cauhoi'] = false;
$config['product'][$nametype]['cauhoi_cke'] = true;
$config['product'][$nametype]['tintuc'] = false;
$config['product'][$nametype]['tintuc_cke'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 600;
$config['product'][$nametype]['height'] = 395;
$config['product'][$nametype]['thumb'] = '600x395x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
$config['product'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xlsx|XLS|XLSX';

/* Sản phẩm (Màu) *-/
    $config['product'][$nametype]['mau_images'] = false;
    $config['product'][$nametype]['mau_mau'] = false;
    $config['product'][$nametype]['mau_loai'] = false;
    $config['product'][$nametype]['width_mau'] = 30;
    $config['product'][$nametype]['height_mau'] = 30;
    $config['product'][$nametype]['thumb_mau'] = '100x100x1';
    $config['product'][$nametype]['img_type_mau'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

    /* Sản phẩm (List) */
$config['product'][$nametype]['title_main_nhomdanhmuc'] = "Nhóm danh mục";
$config['product'][$nametype]['images_nhomdanhmuc'] = false;
$config['product'][$nametype]['icon_nhomdanhmuc'] = false;
$config['product'][$nametype]['show_images_nhomdanhmuc'] = false;
$config['product'][$nametype]['slug_nhomdanhmuc'] = true;
$config['product'][$nametype]['check_nhomdanhmuc'] = array();
$config['product'][$nametype]['mota_nhomdanhmuc'] = false;
$config['product'][$nametype]['mota_cke_nhomdanhmuc'] = false;
$config['product'][$nametype]['noidung_nhomdanhmuc'] = false;
$config['product'][$nametype]['noidung_cke_nhomdanhmuc'] = false;
$config['product'][$nametype]['seo_nhomdanhmuc'] = false;
$config['product'][$nametype]['width_nhomdanhmuc'] = 465;
$config['product'][$nametype]['height_nhomdanhmuc'] = 268;
$config['product'][$nametype]['width_icon_nhomdanhmuc'] = 1600;
$config['product'][$nametype]['height_icon_nhomdanhmuc'] = 400;
$config['product'][$nametype]['thumb_nhomdanhmuc'] = '465x268x1';
$config['product'][$nametype]['img_type_nhomdanhmuc'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (List) */
$config['product'][$nametype]['title_main_list'] = "Sản phẩm cấp 1";
$config['product'][$nametype]['images_list'] = true;
$config['product'][$nametype]['icon_list'] = true;
$config['product'][$nametype]['show_images_list'] = true;
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['link_banner_list'] = true;
$config['product'][$nametype]['check_list'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['mota_list'] = false;
$config['product'][$nametype]['mota_cke_list'] = false;
$config['product'][$nametype]['noidung_list'] = true;
$config['product'][$nametype]['noidung_cke_list'] = true;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['width_list'] = 465;
$config['product'][$nametype]['height_list'] = 268;
$config['product'][$nametype]['width_icon_list'] = 1600;
$config['product'][$nametype]['height_icon_list'] = 400;
$config['product'][$nametype]['thumb_list'] = '465x268x1';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Cat) */
$config['product'][$nametype]['title_main_cat'] = "Sản phẩm cấp 2";
$config['product'][$nametype]['images_cat'] = false;
$config['product'][$nametype]['show_images_cat'] = false;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = array();
$config['product'][$nametype]['mota_cat'] = false;
$config['product'][$nametype]['mota_cke_cat'] = false;
$config['product'][$nametype]['noidung_cat'] = false;
$config['product'][$nametype]['noidung_cke_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 300;
$config['product'][$nametype]['height_cat'] = 200;
$config['product'][$nametype]['thumb_cat'] = '100x100x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Item) */
$config['product'][$nametype]['title_main_item'] = "Sản phẩm cấp 3";
$config['product'][$nametype]['images_item'] = true;
$config['product'][$nametype]['show_images_item'] = true;
$config['product'][$nametype]['slug_item'] = true;
$config['product'][$nametype]['check_item'] = array();
$config['product'][$nametype]['mota_item'] = false;
$config['product'][$nametype]['seo_item'] = true;
$config['product'][$nametype]['width_item'] = 300;
$config['product'][$nametype]['height_item'] = 200;
$config['product'][$nametype]['thumb_item'] = '100x100x1';
$config['product'][$nametype]['img_type_item'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Sub) */
$config['product'][$nametype]['title_main_sub'] = "Sản phẩm cấp 4";
$config['product'][$nametype]['images_sub'] = true;
$config['product'][$nametype]['show_images_sub'] = true;
$config['product'][$nametype]['slug_sub'] = true;
$config['product'][$nametype]['check_sub'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['mota_sub'] = true;
$config['product'][$nametype]['seo_sub'] = true;
$config['product'][$nametype]['width_sub'] = 300;
$config['product'][$nametype]['height_sub'] = 200;
$config['product'][$nametype]['thumb_sub'] = '100x100x1';
$config['product'][$nametype]['img_type_sub'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Hãng) */
$config['product'][$nametype]['title_main_brand'] = "Hãng sản phẩm";
$config['product'][$nametype]['icon_brand'] = true;
$config['product'][$nametype]['images_brand'] = true;
$config['product'][$nametype]['show_images_brand'] = false;
$config['product'][$nametype]['slug_brand'] = true;
$config['product'][$nametype]['check_brand'] = array();
$config['product'][$nametype]['seo_brand'] = true;
$config['product'][$nametype]['tigia_brand'] = true;
$config['product'][$nametype]['link_banner_brand'] = true;
$config['product'][$nametype]['noidung_brand'] = true;
$config['product'][$nametype]['noidung_cke_brand'] = true;
$config['product'][$nametype]['width_icon_brand'] = 1600;
$config['product'][$nametype]['height_icon_brand'] = 400;
$config['product'][$nametype]['width_brand'] = 1600;
$config['product'][$nametype]['height_brand'] = 400;
$config['product'][$nametype]['thumb_brand'] = '170x40x2';
$config['product'][$nametype]['img_type_brand'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Hãng) */
$config['product'][$nametype]['title_main_doday'] = "Vehicles";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['icon_doday'] = true;
$config['product'][$nametype]['images_doday'] = true;
$config['product'][$nametype]['show_images_doday'] = false;
$config['product'][$nametype]['slug_doday'] = true;
$config['product'][$nametype]['check_doday'] = array();
$config['product'][$nametype]['seo_doday'] = false;
$config['product'][$nametype]['link_banner_doday'] = true;
$config['product'][$nametype]['noidung_doday'] = true;
$config['product'][$nametype]['noidung_cke_doday'] = true;
$config['product'][$nametype]['width_icon_doday'] = 1600;
$config['product'][$nametype]['height_icon_doday'] = 400;
$config['product'][$nametype]['width_doday'] = 170;
$config['product'][$nametype]['height_doday'] = 40;
$config['product'][$nametype]['thumb_doday'] = '170x40x2';
$config['product'][$nametype]['img_type_doday'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';


/* Sản phẩm (Hãng) */
$config['product'][$nametype]['title_main_option'] = "Option";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['icon_option'] = false;
$config['product'][$nametype]['images_option'] = false;
$config['product'][$nametype]['show_images_option'] = false;
$config['product'][$nametype]['slug_option'] = false;
$config['product'][$nametype]['check_option'] = array();
$config['product'][$nametype]['seo_option'] = false;
$config['product'][$nametype]['noidung_option'] = false;
$config['product'][$nametype]['noidung_cke_option'] = false;
$config['product'][$nametype]['width_icon_option'] = 1600;
$config['product'][$nametype]['height_icon_option'] = 400;
$config['product'][$nametype]['width_option'] = 170;
$config['product'][$nametype]['height_option'] = 40;
$config['product'][$nametype]['thumb_option'] = '170x40x2';
$config['product'][$nametype]['img_type_option'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Thư viện ảnh */
/*$nametype = "thu-vien-anh";
    $config['product'][$nametype]['title_main'] = "Thư viện ảnh";
    $config['product'][$nametype]['check'] = array();
    $config['product'][$nametype]['view'] = true;
    $config['product'][$nametype]['slug'] = true;
    $config['product'][$nametype]['images'] = true;
    $config['product'][$nametype]['show_images'] = true;
    $config['product'][$nametype]['gallery'] = array
    (
        $nametype => array
        (
            "title_main_photo" => "Hình ảnh thư viện ảnh",
            "title_sub_photo" => "Hình ảnh",
            "number_photo" => 2,
            "images_photo" => true,
            "avatar_photo" => true,
            "tieude_photo" => true,
            "width_photo" => 540,
            "height_photo" => 540,
            "thumb_photo" => '100x100x1',
            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
        )
    );
    $config['product'][$nametype]['seo'] = true;
    $config['product'][$nametype]['width'] = 270;
    $config['product'][$nametype]['height'] = 270;
    $config['product'][$nametype]['thumb'] = '100x100x1';
    $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';*/
