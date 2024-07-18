<?php
$baohanh = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array('tt_baohanh'));
?>
<div class="fixwidth">
    <div class="all_sp_row">
        <div class="all_phantrang_show">
            <div class="all_danhmuc_phantrang">
                <div class="all_bread">
                    <div class="breadCrumbs">
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-decoration-none" href=""><span><?= trangchu ?></span></a></li>
                                <li class="breadcrumb-item active"><a class="text-decoration-none" href="bao-hanh"><span><?= $lang == 'vi' ? 'Kiểm tra bảo hành' : 'Warranty Check' ?></span></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="img_gioithieu">
            <img src="<?= UPLOAD_NEWS_L . $baohanh['photo'] ?>" alt="">
        </div>

        <div class="baohanh">
            <div class="form form_nhap active">
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Cảm ơn bạn đã chọn mua sản phẩm chính hãng của BBRacing!' : 'Thanks for choosing a genuine Bbracing product!' ?></p>
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Bằng cách điền số seri có trong thẻ bảo hành bạn sẽ kích hoạt được chế độ bảo hành và kiểm tra thông tin, xuất xứ cũng như là thời gian bảo hành sản phẩm mà bạn mua.' : 'By entering the serial number in the warranty card, you will activate the warranty mode and view the information, origin as well as know the warranty period of the product you purchase.' ?></p>
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Vui lòng liên hệ hotline ' . $optsetting['hotline'] . ' để được hỗ trợ thêm về thông tin kích hoạt và bảo hành' : 'Please contact hotline ' . $optsetting['hotline'] . ' for further support on activation and warranty information.' ?></p>
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Vui lòng nhập số thẻ của bạn:' : 'Please enter your card number:' ?></p>
                <input type="text" class="input_the_baohanh" name="id" placeholder="47YK5XY117XQ-J">
                <div>
                    <p><?= $lang == 'vi' ? 'Bạn có thể tìm thấy số seri ở mặt sau của thẻ bảo hành' : 'The Serial number can be found on the back of the warranty card.' ?></p>
                    <p><?= $lang == 'vi' ? 'Ví dụ: 47YK5XY117XQ-J, 324JSJSNEDM90' : 'For example: 47YK5XY117XQ-J, 324JSJSNEDM90' ?></p>
                </div>
                <button class="submit_baohanh_the"><?= gui ?></button>
            </div>
            <div class="form_nhapsai">
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Xin lỗi, số Sê-ri không hợp lệ' : 'Sorry, but the serial number entered is not valid.' ?></p>
                <p class="baohanh_fort"><?= $lang == 'vi' ? 'Vui lòng kiểm tra thông tin của bạn và thử lại lần nữa.' : 'Please check your information and try again.' ?></p>
                <button class="submit_baohanh_the submit_baohanh_the_thulai"><?= $lang == 'vi' ? 'Thử lại' : 'Try Again' ?></button>
            </div>
            <div id="details-product" class="text-center">
                <div class="kq_baohanh">Kết quả</div>
                <!-- <div class="item">
                    <p style="color: #FF0000;font-size: 20px;">
                        <b>Serial Number (S/N):
                            <span class="imei">Đang cập nhật</span>
                        </b>
                    </p>
                </div> -->
                <!-- <a style="color: #0071e3;font-size: 17px;" href="javascript:;" onclick="return_form()">Kiểm tra số serial của sản phẩm khác</a> -->
                <div class="info">
                    <div class="all_name_info">
                        <span><?= $lang == 'vi' ? 'Tên sản phẩm' : 'Product Name' ?></span>
                        <div class="name"></div>
                    </div>
                    <div class="all_row_name_info">
                        <div class="all_name_info">
                            <span><?= $lang == 'vi' ? 'Nhà sản xuất' : 'Brand' ?></span>
                            <div class="brand"></div>
                        </div>
                        <div class="all_name_info">
                            <span><?= $lang == 'vi' ? 'Màu' : 'Color' ?></span>
                            <div class="color"></div>
                        </div>
                    </div>
                    <div class="all_row_name_info">
                        <div class="all_name_info">
                            <span><?= $lang == 'vi' ? 'Thời gian bảo hành đến' : 'Warranty Period' ?></span>
                            <div class="date"></div>
                        </div>
                        <div class="all_name_info">
                            <span><?= $lang == 'vi' ? 'Tình trạng' : 'Status' ?></span>
                            <div class="status"></div>
                        </div>
                    </div>
                    <div class="all_name_info">
                        <span><?= $lang == 'vi' ? 'Loại xe' : 'Vehicles' ?></span>
                        <div class="model"></div>
                    </div>
                </div>
                <div class="all_sp_chinhhang_baohanh">
                    <p><?= $lang == 'vi' ? 'Sản phẩm chính hãng' :'Genuine Products' ?></p>
                    <p><?= $lang == 'vi' ? 'Đây là sản phẩm được phân phối và bảo hành chính hãng bởi BBRacing Vui lòng liên hệ hotline '.$optsetting['hotline'].' nếu cần thêm chi tiết.':'This is a genuine product distributed and warrantied by BBRacing. Please contact the hotline '.$optsetting['hotline'].' if you require further information.' ?></p>
                </div>
            </div>
        </div>
    </div>
</div>