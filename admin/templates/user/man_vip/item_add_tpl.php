<?php
    $linkMan = "index.php?com=user&act=man_vip&p=".$curPage;
    $linkSave = "index.php?com=user&act=save_vip&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Guest account details</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                    class="far fa-save mr-2"></i>Save</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Redo</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Exit</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit")?"Update":"Add new";?> Vip</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="ten">Full name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Họ tên"
                            value="<?=@$item['ten']?>" required>
                    </div>
                    <?php 
                    $brand = $d->rawQuery("select * from #_product_brand where type = ? and hienthi > 0 order by stt,id desc ", array('san-pham'));
                    
                    foreach($brand as $v){
                        $vip_discount = $d->rawQueryOne("select * from table_member_vip_discount where id_vip = '".@$item['id']."' and id_brand = '".$v['id']."'");
                        // var_dump("select * from table_member_vip_discount where id_vip = '".@$item['id']."' and id_brand = '".$v['id']."'");
                    ?>
                    <div class="form-group col-md-4">
                        <label for="diachi">Discount <?= $v['tenvi'] ?>:</label>
                        <div class="input-group">
                            <input type="hidden" name="idvip[]" value="<?=@$item['id']?>">
                            <input type="hidden" name="idbrand[]" value="<?=$v['id']?>">
                            <input type="hidden" name="idmembervip[]" value="<?= $vip_discount['id'] != 0 ? $vip_discount['id']:'0' ?>">
                            <input type="number" class="form-control discount" name="discount[]" id="discount"
                                placeholder="Discount" value="<?= $vip_discount['discount'] != 0 ? $vip_discount['discount']:'0' ?>">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>%</strong></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="congno">Công nợ: </label>
                    <input type="text" class="form-control format-price" name="data[congno]" id="congno" placeholder="Công nợ"
                        value="<?=@$item['congno']?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="thoigian_congno">
                        Thời gian công nợ (tính từ đơn công nợ đầu tiên): <br>
                        <span>(Bao nhiêu ngày)</span>
                    </label>
                    <input type="text" class="form-control format-price" name="data[thoigian_congno]" id="thoigian_congno" placeholder="Thời gian công nợ"
                        value="<?=@$item['thoigian_congno']?>">
                </div>
				<div class="form-group">
					<label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Display:</label>
					<div class="custom-control custom-checkbox d-inline-block align-middle">
                        <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label for="hienthi-checkbox" class="custom-control-label"></label>
                    </div>
				</div>
                <div class="form-group">
                    <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Numerical order:</label>
                    <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0"
                        name="data[stt]" id="stt" placeholder="Numerical order"
                        value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                    class="far fa-save mr-2"></i>Save</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Redo</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Exit</a>
            <input type="hidden" name="id" value="<?=@$item['id']?>">
        </div>
    </form>
</section>