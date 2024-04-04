<div class="container">
    <h1 class="text-center">Danh sách hình ảnh thuộc các sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Chọn sản phẩm muốn thêm ảnh</h2>
        <div class="row">
            <div class="col-6">
                <select name="pro_id" id="" class=form-control>
                    <?php foreach ($product as $key => $value) : ?>
                        <?php if ($value['id'] == $image['pro_id']) {         ?>
                            <option selected value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php  } else { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php } ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" name="image" id="" class="form-control">
                <img src="<?= ROOT_UPLOAD_URL ?><?= $image['image'] ?>" alt="" width="50">
            </div>
        </div>

        <button class="btn bg-primary text-white mt-3">Update</button>

    </form>
    <a href="<?= ROOT_URL_ADMIN ?>?act=images" class="btn btn-secondary">Quay lại</a>
</div>
<?php
echo "<pre/>";
print_r($image);
echo "<pre/>";
?>