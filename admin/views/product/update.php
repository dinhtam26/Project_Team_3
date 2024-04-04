<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $arrParams['title'] ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update</h6>
        </div>
        <div class="card-body">

            <div class="">
                <!--3. Bên phải nội dung chính -->
                <div class="">
                    <div class="container">
                        <!-- Tiêu đề trang -->
                        <!-- Form nhập liệu -->
                        <?php if (isset($_SESSION['errors'])) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php

                                    foreach ($_SESSION['errors'] as $error) :  ?>
                                        <li><?= $error ?></li>
                                <?php endforeach;
                                } ?>
                                </ul>
                            </div>
                            <?php unset($_SESSION['errors']) ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <!-- Product Name -->
                                    <div class="col-6">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="" class="form-control" value="<?php echo isset($product['p_name']) ? $product['p_name'] : "" ?>">
                                    </div>
                                    <!-- Product Image -->
                                    <div class="col-6">
                                        <label for="name">Product Image</label>
                                        <input type="file" name="image" id="" class="form-control">
                                        <img src="<?= ROOT_UPLOAD_URL ?><?= $product['p_image'] ?>" alt="" width="50">
                                    </div>

                                    <!-- THực hiện foreach cho thực thể -->


                                    <!-- Price -->
                                    <div class="col-6">
                                        <label for="name">Product Price</label>
                                        <input type="text" name="price" id="" class="form-control" value="<?= $variation['0']['price'] ?? "" ?>">
                                    </div>
                                    <!-- Product Quantity -->
                                    <div class="col-6">
                                        <label for="name">Product Quantity</label>
                                        <input type="text" name="quantity" id="" class="form-control" value="<?= $variation['0']['quantity'] ?? '' ?>">
                                    </div>
                                    <!-- Product Color -->
                                    <div class="col-6">
                                        <label for="color">Color</label>
                                        <select name="color[]" class="form-control select-down" multiple>
                                            <?php foreach ($listColor as $color) : ?>
                                                <option <?= in_array($color['id'], $colorId) ? "selected" : null ?> value="<?= $color['id'] ?>"><?= $color['name'] ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- Size -->
                                    <div class="col-6">
                                        <label for="name">Size</label>
                                        <select name="size[]" class="form-control select-down" multiple>

                                            <?php foreach ($listSize as $size) : ?>
                                                <option <?= in_array($size['id'], $sizeId) ? "selected" : null ?> value="<?= $size['id'] ?>"><?= $size['name'] ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>


                                    <!-- Cate -->
                                    <div class="col-6 mt-5">
                                        <label for="name">Categories</label>
                                        <select name="cate_id" class="form-control select-down">
                                            <?php
                                            if (isset($categories) && !empty($categories)) {
                                                foreach ($categories as $key => $value) {
                                                    if ($product['c_name'] == $value['name']) {
                                                        echo '<option value="' . $value['id'] . '" selected>' . $value['name'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Create_at  -->
                                    <div class="col-6 mt-5">
                                        <label for="name">Create_at</label>
                                        <input type="date" name="create_at" class="form-control" id="" value="<?php echo isset($product['p_create_at']) ? $product['p_create_at'] : "" ?>">
                                    </div>
                                    <!-- Product desc -->
                                    <div class="col-12 mt-3">
                                        <label for="">Product Desc</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo isset($product['p_desc']) ? $product['p_desc'] : "" ?> </textarea>
                                    </div>

                                </div>
                                <div class="mt-3 mb-3">
                                    <a href="<?= ROOT_URL_ADMIN ?>?act=products" class="btn btn-secondary">Back List</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                            <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
echo "<pre/>";
print_r($product);
echo "<pre/>";
?>