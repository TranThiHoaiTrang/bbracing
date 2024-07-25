<!-- Js Config -->
<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var CONFIG_BASE = '<?= $config_base ?>';
    var WEBSITE_NAME =
        '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
    var TIMENOW = '<?= date("d/m/Y", time()) ?>';
    var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
    var GOTOP = 'assets/images/top.png';
    var LANG = {
        'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
        'no_select': "<?= $lang == 'vi' ? 'Bạn phải chọn trường tìm kiếm' : 'You must select a search field' ?>",
        'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
        'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
        'wards': "<?= phuongxa ?>",
        'back_to_home': "<?= vetrangchu ?>",
    };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<!-- <script type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=1719171225253796" id="facebook-jssdk"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script> -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AVe4HtYg2CbjhoYDaN4A3PNdU6F3IBGUmjr2eFaIs2SkX1oQrs0cryHyscneB8_QEDyXgLikg-9agRVL&currency=USD"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.js" integrity="sha512-M0cjXJTonbWEdLI3HJIoJSQBb9980RWmOCk+tvWkhgFrAZqSSIg1+1Db/vDu7Qk9W3L90gBynve17PYvarjfQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Js Files -->
<?php
$js->setCache("cached");
$js->setJs("./assets/js/jquery.min.js");
$js->setJs("./assets/bootstrap/bootstrap.js");
$js->setJs("./assets/js/wow.min.js");
$js->setJs("./assets/owlcarousel2/owl.carousel.js");
if($source == 'product'){
$js->setJs("./assets/magiczoomplus/magiczoomplus.js");
}
$js->setJs("./assets/simplyscroll/jquery.simplyscroll.js");
$js->setJs("./assets/slick/slick.js");
$js->setJs("./assets/fancybox3/jquery.fancybox.js");
$js->setJs("./assets/toc/toc.js");
$js->setJs("./assets/js/lazyload.min.js");
$js->setJs("./assets/js/flipclock.js");
$js->setJs("./assets/js/easepick_bundle.js");
$js->setJs("./assets/js/select2.js");
$js->setJs("./assets/js/functions.js");
$js->setJs("./assets/js/apps.js");
$js->setJs("./assets/js/webhd.js");
echo $js->getJs();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    AOS.init();
</script>

<script type="text/javascript">
    // TIME
    var clock;
    var id_flash = "1";
    // Set dates.
    if (document.getElementById('ngayktsukien')) {
        var tet = document.getElementById('ngayktsukien').value;
        var futureDate = new Date(tet);
        var currentDate = new Date();

        // Calculate the difference in seconds between the future and current date
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        // Calculate day difference and apply class to .clock for extra digit styling.
        function dayDiff(first, second) {
            return (second - first) / (1000 * 60 * 60 * 24);
        }

        if (dayDiff(currentDate, futureDate) < 100)
            $('#Countdown_' + id_flash).addClass('twoDayDigits');
        else
            $('#Countdown_' + id_flash).addClass('threeDayDigits');

        // console.log(diff);
        if (diff < i) {
            diff = 0;
            var id_khuyenmai = "";
            var check_idkm = $(".id_khuyenmai");
            check_idkm.each(function() {
                id_khuyenmai = id_khuyenmai + "|" + $(this).val();
            });
            if ((id_khuyenmai.length = 1)) {
                id_khuyenmai = id_khuyenmai.substring(1);
            }
            // console.log(id_khuyenmai);
            $.ajax({
                url: "ajax/ajax_capnhat_data.php",
                type: "POST",
                data: {
                    idkhuyenmai: id_khuyenmai,
                },
                dataType: "html",
                success: function(result) {
                    $('.text').html(result)
                },
            });

        }
        // Instantiate a coutdown FlipClock
        clock = $('#Countdown_' + id_flash).FlipClock(diff, {
            clockFace: 'DailyCounter',
            countdown: true
        });
    }

    if (typeof loginMessage !== 'undefined' && loginMessage !== '' && loginMessage !== null) {
        // console.log(loginMessage);
        var icontranfer = '';
        if (stt == false) {
            icontranfer = '<i class="fas fa-exclamation-triangle fadanger"></i>';
        } else {
            if(message_botro){
                icontranfer = '<div style="display: flex;align-items: center;justify-content: center;margin-bottom: 15px;gap: 5px;"><i class="fas fa-check-circle fasuccess" style="margin-bottom: 0;"></i><span style="font-weight: 600;">' + message_botro + '</span></div>';
            }
            else{
                icontranfer = '<i class="fas fa-check-circle fasuccess"></i>';
            }
        }
        var loginMessage_text = '<div>' + loginMessage + '</div>';
        var popupBody = document.querySelector('#popup-transfer .modal-body');
        if (popupBody) {
            popupBody.innerHTML = icontranfer + loginMessage_text;
        } else {
            console.error('Popup body element not found.');
        }
        $('#popup-transfer').modal('show');
        $('#popup-transfer').on('hidden.bs.modal', function(e) {
            loginMessage = '';
            window.location.href = redirectUrl;
        });

    }

    const tocContent = document.getElementById('toc-content');
    if (tocContent) {
        // Lấy tất cả các thẻ a bên trong phần tử này
        const links = tocContent.querySelectorAll('a');

        var name_file = $("input[name=name_file]").val();

        links.forEach(link => {
            // Lấy giá trị của href
            const href = link.getAttribute('href');

            if (href.startsWith('#')) {
                link.setAttribute('href', name_file + href);
            }
        });
    }


    // BAO HANH
    // var arrayJson = [];
    // $(document).ready(function() {
    //     var public_spreadsheet_url = '<?= $optsetting['google_baohanh'] ?>';
    //     var html = init_spreadsheet(public_spreadsheet_url);
    // })

    // // function sortByKey(array, key) {
    // //     console.log(key);
    // //     return array.sort(function(a, b) {
    // //         var x = a[key];
    // //         var y = b[key];
    // //         return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    // //     });
    // // }

    // function init_spreadsheet(public_spreadsheet_url) {
    //     Papa.parse(public_spreadsheet_url, {
    //         download: true,
    //         header: true,
    //         complete: function(results) {
    //             showInfo(results.data);
    //         }
    //     });
    // }

    // function showInfo(data, tabletop) {
    //     var stores_arr = data.reduce(function(acc, item) {
    //         var obj = [];
    //         var key = item.imei.toLowerCase();
    //         obj.imei = item.imei;
    //         obj.ten_sp = item.ten_sp;
    //         obj.brand = item.ho_ten;
    //         obj.model = item.model;
    //         obj.color = item.color;
    //         obj.image = item.image;
    //         obj.status = item.status;
    //         obj.mota = item.mo_ta;
    //         obj.chinhanh = item.chi_nhanh;
    //         obj.guarantee = item.bao_hanh;
    //         if (!acc[key]) {
    //             acc[key] = [];
    //         }
    //         acc[key].push({
    //             imei: obj.imei,
    //             ten_sp: obj.ten_sp,
    //             brand: obj.brand,
    //             model: obj.model,
    //             color: obj.color,
    //             image: obj.image,
    //             status: obj.status,
    //             mota: obj.mota,
    //             chinhanh: obj.chinhanh,
    //             guarantee: obj.guarantee
    //         });
    //         return acc;
    //     }, {});
    //     console.log(stores_arr);

    //     $('.form button').click(function() {
    //         var val = $('.form input').val().toLowerCase();
    //         $('.baohanh #details-product').removeClass('active');
    //         // console.log(val);
    //         if (val == '') {
    //             alert("Nhập mã tra cứu bảo hành");
    //             return false;
    //         }
    //         if (typeof stores_arr[val] === 'undefined') {
    //             $('.form_nhapsai').show();
    //             $('.form_nhap').hide();
    //         } else {
    //             $('.baohanh #details-product').addClass('active');
    //             $('.baohanh .form').removeClass('active');
    //             $('#details-product .item img').attr('src', stores_arr[val][0].image);
    //             $('#details-product .info .name').text(stores_arr[val][0].ten_sp);
    //             $('#details-product .item .imei').text(stores_arr[val][0].imei);
    //             if (stores_arr[val][0].brand == '') {
    //                 $('#details-product .info .brand').text('Đang cập nhật');
    //             } else {
    //                 $('#details-product .info .brand').text(stores_arr[val][0].brand);
    //             }
    //             $('#details-product .info .model').text(stores_arr[val][0].model);
    //             $('#details-product .info .color').text(stores_arr[val][0].color);
    //             $('#details-product .info .status').text(stores_arr[val][0].status);
    //             $('#details-product .info .date').text(stores_arr[val][0].guarantee);

    //             /*$('#details-product .info .chinhanh').text(stores_arr[val][0].chinhanh);*/
    //             if (stores_arr[val][0].chinhanh == '') {
    //                 $('#details-product .info .chinhanh').text('Đang cập nhật');
    //             } else {
    //                 $('#details-product .info .chinhanh').text(stores_arr[val][0].chinhanh);
    //             }
    //             $('#details-product .info .mota').text(stores_arr[val][0].mota);

    //             if (stores_arr[val][0].status == 'Chưa Kích Hoạt Bảo Hành') {
    //                 window.location.href = "kich-hoat-bao-hanh";
    //             }
    //             // console.log(stores_arr[val]);
    //             // console.log(sortByKey(stores_arr[val][0],val.toLowerCase()));
    //         }

    //     })
    // }

    // function return_form() {
    //     $('.baohanh #details-product').removeClass('active');
    //     $('.baohanh .form').addClass('active');
    // }
    // $(document).ready(function() {
    //     $('.submit_baohanh_the_thulai').click(function() {
    //         $('.form_nhapsai').hide();
    //         $('.form_nhap').show();
    //         $('.baohanh #details-product').removeClass('active');
    //     })
    // })
</script>

<?php if ($lang == 'vi') { ?>
    <script>
        $(document).ready(function() {
            $(".mota_question_readmore").readmore({
                speed: 300,
                collapsedHeight: 55,
                moreLink: '<a href="#" class="question_readmore">... (Xem thêm) </a>',
                lessLink: '<a href="#" class="question_readmore">... (Thu ngắn)</a>',
                heightMargin: 20,
            });
            $(".mota_question_read").readmore({
                speed: 300,
                collapsedHeight: 30,
                moreLink: '<a href="#" class="question_readmore">... (Xem thêm) </a>',
                lessLink: '<a href="#" class="question_readmore">... (Thu ngắn)</a>',
                heightMargin: 20,
            });
        });
    </script>
<?php } else { ?>
    <script>
        $(document).ready(function() {
            $(".mota_question_readmore").readmore({
                speed: 300,
                collapsedHeight: 55,
                moreLink: '<a href="#" class="question_readmore">... (Read more) </a>',
                lessLink: '<a href="#" class="question_readmore">... (Read less)</a>',
                heightMargin: 20,
            });
            $(".mota_question_read").readmore({
                speed: 300,
                collapsedHeight: 30,
                moreLink: '<a href="#" class="question_readmore">... (Read more) </a>',
                lessLink: '<a href="#" class="question_readmore">... (Read less)</a>',
                heightMargin: 20,
            });
        });
    </script>
<?php } ?>

<?php if ($source == 'user') { ?>
    <script>
        $(document).ready(function() {
            $(".select_donhang").select2({
                maximumSelectionLength: 2,
            });
        });

        // FB LOGIN
        function statusChangeCallback(response) {
            // console.log('statusChangeCallback');
            // console.log(response);
            if (response.status === 'connected') {
                testAPI();

            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                    statusChangeCallback2(response);
                }, {
                    scope: 'public_profile,email'
                });

            } else {
                // alert("not connected, not logged into facebook, we don't know");
            }
        }

        function statusChangeCallback2(response) {
            // console.log('statusChangeCallback2');
            // console.log(response);
            if (response.status === 'connected') {
                testAPI();

            } else if (response.status === 'not_authorized') {
                console.log('still not authorized!');

            } else {
                // alert("not connected, not logged into facebook, we don't know");
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Successful login for: ' + response.name);
                // document.getElementById('status').innerHTML =
                //     'Thanks for logging in, ' + response.name + '!';
                // console.log(response);
                // console.log(response.authResponse.userID);
                // console.log(response.authResponse.accessToken);
                var name = response.name;
                var user_id = response.id;

                $.ajax({
                    url: "ajax/ajax_loginfb.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        cmd: 'login',
                        name: name,
                        user_id: user_id,
                    },
                    success: function(result) {
                        if (result != "") {
                            // var redirected = sessionStorage.getItem('redirected');
                            // if (!redirected) {
                            //     sessionStorage.setItem('redirected', true);
                            //     window.location.href = 'https://bbracing.vn/account/tongquan';
                            // } else {
                            //     sessionStorage.removeItem('redirected');
                            // }
                        }
                    },
                });
            });
        }

        function FBLogout() {
            event.preventDefault();
            FB.logout(function(response) {
                // $facebook->destroySession();
                $.ajax({
                    url: "ajax/ajax_loginfb.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        cmd: 'logout',
                    },
                    success: function(result) {
                        if (result != "") {
                            // window.location = CONFIG_BASE;
                            // window.location.reload();
                        }
                    },
                });
            });
        }

        $(document).ready(function() {
            FB.init({
                appId: '1719171225253796',
                xfbml: true,
                version: 'v2.2'
            });
            checkLoginState();
        });
    </script>
<?php } ?>

<?php if ($source == 'index') { ?>
    <script>
        // popup
        const body = document.querySelector("body");
        const modal = document.getElementById("popup-all");
        // const modalButton = document.querySelector(".modal-button");
        const closeButton = document.querySelector(".close-button");
        // const scrollDown = document.querySelector(".scroll-down");
        let isOpened = false;

        const openModal = () => {
            modal.classList.add("is-open");
            body.style.overflow = "hidden";
        };

        const closeModal = () => {
            modal.classList.remove("is-open");
            body.style.overflow = "initial";
            clearTimeout(openModal);
        };

        if(closeButton){
            closeButton.addEventListener("click", closeModal);
        }
        // setTimeout(openModal, 5000);
       

        $(window).load(function() {

            if (document.cookie.indexOf("popup") == -1) {
                document.cookie = "popunder1=popup";
                if(modal){
                   setTimeout(openModal, 0); 
                }
            }

        });
    </script>
<?php } ?>

<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
    <!-- Js Google Recaptcha V3 -->
    <?php if ($source == 'contact' || $source == 'product' || $source == 'news') { ?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>">
        </script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                grecaptcha.ready(function() {
                    // grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    //     action: 'contact'
                    // }).then(function(token) {
                    //     var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
                    //     recaptchaResponseContact.value = token;
                    // });
                    grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                        action: 'Newsletter'
                    }).then(function(token) {

                        var recaptchaResponseNewsletter = document.getElementById('recaptchaResponsenewsletter_pro');
                        recaptchaResponseNewsletter.value = token;
                    });
                    grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                        action: 'Newsletter'
                    }).then(function(token) {

                        var recaptchaResponsenewsletter_prodetail = document.getElementById('recaptchaResponsenewsletter_prodetail');
                        recaptchaResponsenewsletter_prodetail.value = token;
                    });
                });
            })
        </script>
    <?php } ?>
<?php } ?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<!-- </?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
</?= $addons->getAddons(); ?> -->

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>