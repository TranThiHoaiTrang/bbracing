<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Css Files -->
<?php
    $css->setCache("cached");
    $css->setCss("./assets/css/animate.min.css");
    $css->setCss("./assets/bootstrap/bootstrap.css");
    $css->setCss("./assets/css/font-awesome.css");
    $css->setCss("./assets/fancybox3/jquery.fancybox.css");
    $css->setCss("./assets/fancybox3/jquery.fancybox.style.css");
    $css->setCss("./assets/simplyscroll/jquery.simplyscroll.css");
    $css->setCss("./assets/simplyscroll/jquery.simplyscroll-style.css");
    $css->setCss("./assets/magiczoomplus/magiczoomplus.css");
    $css->setCss("./assets/css/social.css");
    $css->setCss("./assets/owlcarousel2/owl.carousel.css");
    $css->setCss("./assets/owlcarousel2/owl.theme.default.css");
    $css->setCss("./assets/slick/slick.css");
    $css->setCss("./assets/slick/slick-theme.css");
    $css->setCss("./assets/slick/slick-style.css");
    $css->setCss("./assets/css/fonts.css");
    $css->setCss("./assets/css/webhd.css");
    $css->setCss("./assets/css/webhd2.css");
    $css->setCss("./assets/css/style.css");
    $css->setCss("./assets/css/cart.css");
    $css->setCss("./assets/login/login.css");
    $css->setCss("./assets/css/flipclock_front.css");
    $css->setCss("./assets/css/select2.css");
    /*
    $css->setCss("./assets/css/cart.css");
    $css->setCss("./assets/css/style_media.css");
    

    */
    echo $css->getCss();
?>
 
<!-- Background -->
<?php
 
    $bgbody2 = $d->rawQuery("select hienthi, options, photo,type from #_photo where act = ? and ( type = ? or type = ? or type = ? or type = ?) ",array('photo_static','banner_sp_moi','background-footer','background-banner','banner_sp_moi_mobile'));
    
    foreach ($bgbody2 as $key => $value) {
        if($value['hienthi']){
            $bgbodyOptions = json_decode($value['options'],true)['background'];
            if($bgbodyOptions['loaihienthi']) {
                echo '<style type="text/css">#'.$value['type'].'{background: url('.UPLOAD_PHOTO_L.$value['photo'].') '.$bgbodyOptions['repeat'].' '.$bgbodyOptions['position'].' '.$bgbodyOptions['attachment'].' ;background-size:'.$bgbodyOptions['size'].'}</style>';
            }else{
                echo ' <style type="text/css">#'.$value['type'].'{background-color:#'.$bgbodyOptions['color'].'}</style>';
            }
        }
    }
    
     
?>

<!-- Js Google Analytic -->
<?=htmlspecialchars_decode($setting['analytics'])?>

<!-- Js Head -->
<?=htmlspecialchars_decode($setting['headjs'])?>