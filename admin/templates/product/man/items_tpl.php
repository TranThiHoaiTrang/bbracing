<?php
$linkView = $config_base;
$linkMan = $linkFilter = "index.php?com=product&act=man&type=" . $type . "&p=" . $curPage;
$linkAdd = "index.php?com=product&act=add&type=" . $type . "&p=" . $curPage;
$linkCopy = "index.php?com=product&act=copy&type=" . $type . "&p=" . $curPage;
$linkEdit = "index.php?com=product&act=edit&type=" . $type . "&p=" . $curPage;
$linkDelete = "index.php?com=product&act=delete&type=" . $type . "&p=" . $curPage;
$linkMulti = "index.php?com=product&act=man_photo&kind=man&type=" . $type . "&p=" . $curPage;
$copyImg = (isset($config['product'][$type]['copy_image']) && $config['product'][$type]['copy_image'] == true) ? TRUE : FALSE;
?>
<?php

$token = (isset($_SESSION[$login_admin]['token'])) ? $_SESSION[$login_admin]['token'] : '';
$id_nhomquyen = $d->rawQueryOne("select id_nhomquyen from #_user where quyen = ? and hienthi>0", array($token));

$quyen_all = $d->rawQuery("select quyen from #_permission where ma_nhom_quyen = '" . $id_nhomquyen['id_nhomquyen'] . "'");
$none_add = "d-none";
$none_edit = "d-none";
$none_delete = "d-none";

foreach ($quyen_all as $a) {
    if ($a['quyen'] === 'product_add_' . $type . '') {
        $none_add = "";
        // break;
    } elseif ($a['quyen'] === 'product_edit_' . $type . '') {
        $none_edit = "";
        // break;
    } elseif ($a['quyen'] === 'product_delete_' . $type . '') {
        $none_delete = "";
        // break;
    }
}



?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý <?= $config['product'][$type]['title_main'] ?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white <?= $none_add ?>" href="<?= $linkAdd ?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white <?= $none_delete ?>" id="delete-all" data-url="<?= $linkDelete ?><?= $strUrl ?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" onkeypress="doEnter(event,'keyword','<?= $linkMan ?>')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','<?= $linkMan ?>')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php if (
        (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) ||
        (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true)
    ) { ?>
        <div class="card-footer form-group-category text-sm bg-light row">
            <?php if (isset($config['product'][$type]['list']) && $config['product'][$type]['list'] == true) { ?>
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'list', $type) ?></div>
            <?php } ?>
            <?php if (isset($config['product'][$type]['cat']) && $config['product'][$type]['cat'] == true) { ?>
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'cat', $type) ?></div>
            <?php } ?>
            <?php if (isset($config['product'][$type]['item']) && $config['product'][$type]['item'] == true) { ?>
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'item', $type) ?></div>
            <?php } ?>
            <?php if (isset($config['product'][$type]['sub']) && $config['product'][$type]['sub'] == true) { ?>
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'sub', $type) ?></div>
            <?php } ?>
            <?php if (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) { ?>
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'brand', $type, 'Chọn hãng') ?></div>
            <?php } ?>

        </div>
    <?php } ?>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h3 class="card-title" style="width: 90%;">Danh sách <?= $config['product'][$type]['title_main'] ?></h3>
            <select name="limit_sp" id="limit" class="form-control filer-limit select2" onchange="onLimit('limit','<?= $linkMan ?>')" style="width: 10%;">
                <option value="20" <?= $_REQUEST['limit'] == '20' ? 'selected' : '' ?>>20 sản phẩm</option>
                <option value="50" <?= $_REQUEST['limit'] == '50' ? 'selected' : '' ?>>50 sản phẩm</option>
                <option value="100" <?= $_REQUEST['limit'] == '100' ? 'selected' : '' ?>>100 sản phẩm</option>
                <option value="150" <?= $_REQUEST['limit'] == '150' ? 'selected' : '' ?>>150 sản phẩm</option>
                <option value="200" <?= $_REQUEST['limit'] == '200' ? 'selected' : '' ?>>200 sản phẩm</option>
                <option value="500" <?= $_REQUEST['limit'] == '500' ? 'selected' : '' ?>>500 sản phẩm</option>
                <option value="1000" <?= $_REQUEST['limit'] == '1000' ? 'selected' : '' ?>>1000 sản phẩm</option>
            </select>
        </div>
        <div class="card-body table-responsive p-0">
            <input type="hidden" name="limit" id="limit_nhomdanhmuc" value="<?= !empty($_REQUEST['limit']) ? $_REQUEST['limit'] : $per_page ?>">
            <input type="hidden" name="p" id="p_nhomdanhmuc" value="<?= $_REQUEST['p'] ?>">
            <input type="hidden" name="p" id="id_list" value="<?= $_REQUEST['id_list'] ?>">
            <input type="hidden" name="p" id="id_cat" value="<?= $_REQUEST['id_cat'] ?>">
            <input type="hidden" name="p" id="id_brand" value="<?= $_REQUEST['id_brand'] ?>">
            <input type="hidden" name="table" id="table_nhomdanhmuc" value="product">
            <table class="table table-hover table_nhomdanhmuc">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <!-- <th class="align-middle text-center" width="10%">STT</th> -->
                        <?php if (isset($config['product'][$type]['show_images']) && $config['product'][$type]['show_images'] == true) { ?>
                            <th class="align-middle">Hình</th>
                        <?php } ?>
                        <th class="align-middle" style="width:30%">Tiêu đề</th>
                        <?php if (isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) { ?>
                            <th class="align-middle">Gallery</th>
                        <?php } ?>
                        <?php if (isset($config['product'][$type]['id_khuyenmai'])) { ?>
                            <th class="align-middle text-center">Khuyến mãi</th>
                        <?php } ?>
                        <?php if (isset($config['product'][$type]['check'])) {
                            foreach ($config['product'][$type]['check'] as $key => $value) { ?>
                                <th class="align-middle text-center"><?= $value ?></th>
                        <?php }
                        } ?>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if (empty($items)) { ?>
                    <tbody>
                        <tr>
                            <td colspan="100" class="text-center">Không có dữ liệu</td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <tbody id="the-list">
                        <?php for ($i = 0; $i < count($items); $i++) {
                            // var_dump($items[$i]);
                            $linkID = "";
                            if ($items[$i]['id_list']) $linkID .= "&id_list=" . $items[$i]['id_list'];
                            if ($items[$i]['id_cat']) $linkID .= "&id_cat=" . $items[$i]['id_cat'];
                            if ($items[$i]['id_item']) $linkID .= "&id_item=" . $items[$i]['id_item'];
                            if ($items[$i]['id_sub']) $linkID .= "&id_sub=" . $items[$i]['id_sub'];
                            if ($items[$i]['id_brand']) $linkID .= "&id_brand=" . $items[$i]['id_brand'];
                            if ($items[$i]['id_doday']) $linkID .= "&id_doday=" . $items[$i]['id_doday'];
                            if ($items[$i]['id_doday_list']) $linkID .= "&id_doday_list=" . $items[$i]['id_doday_list'];
                            if ($items[$i]['id_doday_onmybike']) $linkID .= "&id_doday_onmybike=" . $items[$i]['id_doday_onmybike']; ?>
                            <tr id="post-<?= $items[$i]['id'] ?>">
                                <td class="align-middle">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>">
                                        <label for="select-checkbox-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <!-- <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?= $items[$i]['stt'] ?>" data-id="<?= $items[$i]['id'] ?>" data-table="product" readonly>
                                </td> -->
                                <?php if (isset($config['product'][$type]['show_images']) && $config['product'][$type]['show_images'] == true) { ?>
                                    <td class="align-middle">
                                        <a href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?= THUMBS ?>/<?= $config['product'][$type]['thumb'] ?>/<?= UPLOAD_PRODUCT_L . $items[$i]['photo'] ?>" alt="<?= $items[$i]['tenvi'] ?>"></a>
                                    </td>
                                <?php } ?>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><?= $items[$i]['tenvi'] ?></a>
                                    <div class="tool-action mt-2 w-clear">
                                        <?php
                                        $sql = "select id,(select tenvi from #_product_list where id=" . $items[$i]['id_list'] . ") as namelist,(select tenvi from #_product_cat where id=" . $items[$i]['id_cat'] . ") as namecat,(select tenvi from #_product_item where id=" . $items[$i]['id_item'] . ") as nameitem from #_product where id=" . $items[$i]['id'] . " ";
                                        $itemcat = $d->rawQueryOne($sql);
                                        ?>
                                        <?= $itemcat['namelist'] != '' ? '<span class="text-primary">' . $itemcat['namelist'] . '</span>' : '' ?>
                                        <?= $itemcat['namecat'] != '' ? ' <i class="far fa-angle-right"></i> <span class="text-info">' . $itemcat['namecat'] . '</span>' : '' ?>
                                        <?= $itemcat['nameitem'] != '' ? ' <i class="far fa-angle-right"></i> <span class="text-danger">' . $itemcat['nameitem'] . '</span>' : '' ?>
                                    </div>
                                    <div class="tool-action mt-2 w-clear">
                                        <?php if (isset($config['product'][$type]['view']) && $config['product'][$type]['view'] == true) { ?>
                                            <a class="text-primary mr-3" href="<?= $linkView ?><?= $items[$i]['tenkhongdauvi'] ?>" target="_blank" title="<?= $items[$i]['tenvi'] ?>"><i class="far fa-eye mr-1"></i>View</a>
                                        <?php } ?>
                                        <a class="text-info mr-3" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><i class="far fa-edit mr-1"></i>Edit</a>
                                        <?php if (isset($config['product'][$type]['copy']) && $config['product'][$type]['copy'] == true) { ?>
                                            <div class="dropdown">
                                                <a id="dropdownCopy" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success p-0 pr-3"><i class="far fa-clone mr-1"></i>Copy</a>
                                                <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
                                                    <li><a href="#" class="dropdown-item copy-now" data-id="<?= $items[$i]['id'] ?>" data-table="product" data-copyimg="<?= $copyImg ?>"><i class="far fa-caret-square-right text-secondary mr-2"></i>Sao chép ngay</a></li>
                                                    <li><a href="<?= $linkCopy ?><?= $linkID ?>&id_copy=<?= $items[$i]['id'] ?>" class="dropdown-item"><i class="far fa-caret-square-right text-secondary mr-2"></i>Chỉnh sửa thông tin</a></li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <a class="text-danger" id="delete-item" data-url="<?= $linkDelete ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                    </div>
                                </td>
                                <?php if (isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) { ?>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle" id="dropdown-gallery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thêm</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-gallery">
                                                <?php foreach ($config['product'][$type]['gallery'] as $key => $value) { ?>
                                                    <a class="dropdown-item text-dark" href="<?= $linkMulti ?>&idc=<?= $items[$i]['id'] ?>&val=<?= $key ?>" title="<?= $value['title_sub_photo'] ?>"><i class="far fa-caret-square-right text-secondary mr-2"></i><?= $value['title_sub_photo'] ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                <?php } ?>
                                <?php if (isset($config['product'][$type]['id_khuyenmai']) && $config['product'][$type]['id_khuyenmai'] == true) { ?>
                                    <td class="align-middle">
                                        <?php
                                        $khuyenmai = $d->rawQuery("select * from #_news where type = 'khuyenmai' and hienthi > 0 order by stt,id desc");
                                        ?>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle" id="dropdown-gallery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Khuyến mãi</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-gallery">
                                                <div class="check_km" data-idkhuyenmai="0" data-id="<?= $items[$i]['id'] ?>">
                                                    <input type="radio" class="custom-control-input show-checkbox" id="show-checkbox-0" data-id="0" <?= $items[$i]['id_khuyenmai'] == 0 ? 'checked' : '' ?>>
                                                    <label for="show-checkbox-0" class="custom-control-label-ck">Không chọn</label>
                                                </div>
                                                <?php foreach ($khuyenmai as $key => $value) { ?>
                                                    <div class="check_km" data-idkhuyenmai="<?= $value['id'] ?>" data-id="<?= $items[$i]['id'] ?>">
                                                        <input type="radio" class="custom-control-input show-checkbox" id="show-checkbox-<?= $value['id'] ?>" data-id="<?= $value['id'] ?>" <?= $value['id'] == $items[$i]['id_khuyenmai'] ? 'checked' : '' ?>>
                                                        <label for="show-checkbox-<?= $value['id'] ?>" class="custom-control-label-ck"><?= $value['tenvi'] ?></label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                <?php }  ?>
                                <?php if (isset($config['product'][$type]['check'])) {
                                    foreach ($config['product'][$type]['check'] as $key => $value) { ?>
                                        <td class="align-middle text-center">
                                            <div class="custom-control custom-checkbox my-checkbox">
                                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" data-table="product" data-id="<?= $items[$i]['id'] ?>" data-loai="<?= $key ?>" <?= ($items[$i][$key]) ? 'checked' : '' ?>>
                                                <label for="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                            </div>
                                        </td>
                                <?php }
                                } ?>
                                <td class="align-middle text-center">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?= $items[$i]['id'] ?>" data-table="product" data-id="<?= $items[$i]['id'] ?>" data-loai="hienthi" <?= ($items[$i]['hienthi']) ? 'checked' : '' ?>>
                                        <label for="show-checkbox-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <?php if (isset($config['product'][$type]['copy']) && $config['product'][$type]['copy'] == true) { ?>
                                        <div class="dropdown d-inline-block align-middle">
                                            <a id="dropdownCopy" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success p-0 pr-2"><i class="far fa-clone"></i></a>
                                            <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item copy-now" data-id="<?= $items[$i]['id'] ?>" data-table="product"><i class="far fa-caret-square-right text-secondary mr-2"></i>Sao chép ngay</a></li>
                                                <li><a href="<?= $linkCopy ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" class="dropdown-item"><i class="far fa-caret-square-right text-secondary mr-2"></i>Chỉnh sửa thông tin</a></li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <a class="text-primary mr-2 <?= $none_edit ?>" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger <?= $none_delete ?>" id="delete-item" data-url="<?= $linkDelete ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if ($paging) { ?>
        <div class="card-footer text-sm pb-0"><?= $paging ?></div>
    <?php } ?>
    <div class="card-footer text-sm">
        <a class="btn btn-sm bg-gradient-primary text-white <?= $none_add ?>" href="<?= $linkAdd ?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white <?= $none_delete ?>" id="delete-all" data-url="<?= $linkDelete ?><?= $strUrl ?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
    </div>
</section>
<style>
    .check_km {
        padding: .375rem .75rem;
    }

    .check_km label {
        font-weight: 300 !important;
        margin-bottom: 0;
        padding-left: 25px;
        position: relative;
    }

    .custom-control-label-ck::before {
        position: absolute;
        top: .25rem;
        left: 0;
        display: block;
        width: 1rem;
        height: 1rem;
        pointer-events: none;
        content: "";
        background-color: #dee2e6;
        border: #adb5bd solid 1px;
        box-shadow: inset 0 .25rem .25rem rgba(0, 0, 0, .1);
    }

    .custom-control-label-ck::after {
        position: absolute;
        left: 0;
        top: .25rem;
        display: block;
        width: 1rem;
        height: 1rem;
        content: "";
        background: no-repeat 50%/50% 50%;
    }

    .custom-control-label-ck.active::before {
        color: #fff;
        border-color: #007bff;
        background-color: #007bff;
        box-shadow: none;
    }

    .check_km .custom-control-input:checked~.custom-control-label-ck::before {
        color: #fff;
        border-color: #007bff;
        background-color: #007bff;
        box-shadow: none;
    }
</style>
<script>
    $('.check_km').click(function() {
        $(this).closest(".dropdown-menu").find('.custom-control-label-ck').removeClass('active');

    });
    $('.check_km').click(function() {
        $(this).find('.custom-control-label-ck').addClass('active');

    });
    $(".check_km").click(function() {
        $(this).closest(".dropdown-menu").find(".show-checkbox").removeAttr('checked');

        var idkhuyenmai = $(this).data('idkhuyenmai');
        var id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: "ajax/ajax_capnhat_data.php",
            type: "POST",
            data: {
                idkhuyenmai: idkhuyenmai,
                id: id
            },
            dataType: "html",
            success: function(result) {},
        });
    });
</script>