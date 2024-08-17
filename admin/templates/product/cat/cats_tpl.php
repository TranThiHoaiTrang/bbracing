<?php
$linkMan = $linkFilter = "index.php?com=product&act=man_cat&type=" . $type . "&p=" . $curPage;
$linkAdd = "index.php?com=product&act=add_cat&type=" . $type . "&p=" . $curPage;
$linkEdit = "index.php?com=product&act=edit_cat&type=" . $type . "&p=" . $curPage;
$linkDelete = "index.php?com=product&act=delete_cat&type=" . $type . "&p=" . $curPage;
?>
<?php

$token = (isset($_SESSION[$login_admin]['token'])) ? $_SESSION[$login_admin]['token'] : '';
$id_nhomquyen = $d->rawQueryOne("select id_nhomquyen from #_user where quyen = ? and hienthi>0", array($token));

$quyen_all = $d->rawQuery("select quyen from #_permission where ma_nhom_quyen = '" . $id_nhomquyen['id_nhomquyen'] . "'");
$none_add = "d-none";
$none_edit = "d-none";
$none_delete = "d-none";

foreach ($quyen_all as $a) {
    if ($a['quyen'] === 'product_add_cat_' . $type . '') {
        $none_add = "";
        // break;
    } elseif ($a['quyen'] === 'product_edit_cat_' . $type . '') {
        $none_edit = "";
        // break;
    } elseif ($a['quyen'] === 'product_delete_cat_' . $type . '') {
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
                <li class="breadcrumb-item active">Quản lý <?= $config['product'][$type]['title_main_cat'] ?></li>
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
    <div class="card-footer form-group-category text-sm bg-light row">
        <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->get_link_category('product', 'list', $type) ?></div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h3 class="card-title" style="width: 90%;">Danh sách <?= $config['product'][$type]['title_main_cat'] ?></h3>
            <select name="limit_sp" id="limit" class="form-control filer-limit select2" onchange="onLimit('limit','<?= $linkMan ?>')" style="width: 10%;">
                <option value="20" <?= $_REQUEST['limit'] == '20' ? 'selected' : '' ?>>20 sản phẩm</option>
                <option value="50" <?= $_REQUEST['limit'] == '50' ? 'selected' : '' ?>>50 sản phẩm</option>
                <option value="100" <?= $_REQUEST['limit'] == '100' ? 'selected' : '' ?>>100 sản phẩm</option>
                <option value="150" <?= $_REQUEST['limit'] == '150' ? 'selected' : '' ?>>150 sản phẩm</option>
                <option value="200" <?= $_REQUEST['limit'] == '200' ? 'selected' : '' ?>>200 sản phẩm</option>
            </select>
        </div>
        <div class="card-body table-responsive p-0">
            <input type="hidden" name="limit" id="limit_nhomdanhmuc" value="<?= !empty($_REQUEST['limit']) ? $_REQUEST['limit'] : $per_page ?>">
            <input type="hidden" name="p" id="p_nhomdanhmuc" value="<?= $_REQUEST['p'] ?>">
            <input type="hidden" name="p" id="id_list" value="<?= $_REQUEST['id_list'] ?>">
            <input type="hidden" name="table" id="table_nhomdanhmuc" value="product_cat">
            <table class="table table-hover table_nhomdanhmuc">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle text-center" width="10%">STT</th>
                        <?php if (isset($config['product'][$type]['show_images_cat']) && $config['product'][$type]['show_images_cat'] == true) { ?>
                            <th class="align-middle">Hình</th>
                        <?php } ?>
                        <th class="align-middle" style="width:30%">Tiêu đề</th>
                        <?php if (isset($config['product'][$type]['check_cat'])) {
                            foreach ($config['product'][$type]['check_cat'] as $key => $value) { ?>
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
                            $linkID = "";
                            if ($items[$i]['id_list']) $linkID .= "&id_list=" . $items[$i]['id_list']; ?>
                            <tr id="post-<?= $items[$i]['id'] ?>">
                                <td class="align-middle">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>">
                                        <label for="select-checkbox-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?= $items[$i]['stt'] ?>" data-id="<?= $items[$i]['id'] ?>" data-table="product_cat" readonly>
                                </td>
                                <?php if (isset($config['product'][$type]['show_images_cat']) && $config['product'][$type]['show_images_cat'] == true) { ?>
                                    <td class="align-middle">
                                        <a href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?= THUMBS ?>/<?= $config['product'][$type]['thumb_cat'] ?>/<?= UPLOAD_PRODUCT_L . $items[$i]['photo'] ?>" alt="<?= $items[$i]['tenvi'] ?>"></a>
                                    </td>
                                <?php } ?>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><?= $items[$i]['tenvi'] ?></a>
                                    <div class="tool-action mt-2 w-clear">
                                        <?php
                                        $sql = "select id,(select tenvi from #_product_list where id=" . $items[$i]['id_list'] . ") as namelist from #_product_cat where id=" . $items[$i]['id'] . " ";
                                        $itemcat = $d->rawQueryOne($sql);

                                        ?>
                                        <?= $itemcat['namelist'] != '' ? '<span class="text-primary">' . $itemcat['namelist'] . '</span>' : '' ?>
                                    </div>
                                </td>
                                <?php if (isset($config['product'][$type]['check_cat'])) {
                                    foreach ($config['product'][$type]['check_cat'] as $key => $value) { ?>
                                        <td class="align-middle text-center">
                                            <div class="custom-control custom-checkbox my-checkbox">
                                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" data-table="product_cat" data-id="<?= $items[$i]['id'] ?>" data-loai="<?= $key ?>" <?= ($items[$i][$key]) ? 'checked' : '' ?>>
                                                <label for="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                            </div>
                                        </td>
                                <?php }
                                } ?>
                                <td class="align-middle text-center">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?= $items[$i]['id'] ?>" data-table="product_cat" data-id="<?= $items[$i]['id'] ?>" data-loai="hienthi" <?= ($items[$i]['hienthi']) ? 'checked' : '' ?>>
                                        <label for="show-checkbox-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
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
        <div class="card-footer text-sm pb-0">
            <?= $paging ?>
        </div>
    <?php } ?>
    <div class="card-footer text-sm">
        <a class="btn btn-sm bg-gradient-primary text-white <?= $none_add ?>" href="<?= $linkAdd ?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white <?= $none_delete ?>" id="delete-all" data-url="<?= $linkDelete ?><?= $strUrl ?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
    </div>
</section>