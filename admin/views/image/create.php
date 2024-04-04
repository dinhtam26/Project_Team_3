<div class="container">
    <h1 class="text-center">Danh sách hình ảnh thuộc các sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- <h2>Chọn danh mục muốn thêm ảnh</h2>
        <div class="row">
            <div class="col-6">
                <select name="pro_img" id="" class=form-control>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
        </div> -->

        <h2>Chọn sản phẩm muốn thêm ảnh</h2>
        <div class="row">
            <div class="col-6">
                <select name="pro_id" id="" class=form-control>
                    <?php foreach ($product as $key => $value) : ?>
                        <option value="<?= $value['id'] ?>"><?= $value['id'] . ":" . $value['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" name="image[]" id="" multiple class="form-control">
            </div>
        </div>

        <button class="btn bg-primary text-white mt-3">Thêm mới</button>
    </form>
</div>