<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <?php include TEMPLATE . LAYOUT . "head.php"; ?>
    <?php include TEMPLATE . LAYOUT . "css.php"; ?>
</head>

<body>
    <div id="wrapper" class="<?= ($source == 'index') ? 'all_wrapper' : '' ?>">
        <div class="scrollToBottom">
            <i class="fas fa-arrow-to-bottom"></i>
        </div>
        <div class="scrollToTop">
            <i class="fas fa-arrow-to-top"></i>
        </div>
        <?php
        include TEMPLATE . LAYOUT . "seo.php";
        include TEMPLATE . LAYOUT . "menu.php";
        include TEMPLATE . LAYOUT . "slide.php";
        // if($source!='index') include TEMPLATE.LAYOUT."breadcrumb.php";
        ?>
        <div class="<?= ($source == 'index') ? 'wrap-home' : 'wrap-main' ?> w-clear"><?php include TEMPLATE . $template . "_tpl.php"; ?></div>
        <?php
        include TEMPLATE . LAYOUT . "footer.php";
        //include TEMPLATE.LAYOUT."mmenu.php";
        include TEMPLATE . LAYOUT . "phone3.php";
        include TEMPLATE . LAYOUT . "modal.php";
        include TEMPLATE . LAYOUT . "js.php";
        // if($deviceType=='mobile') include TEMPLATE.LAYOUT."phone.php";
        ?>

    </div>
</body>

</html>