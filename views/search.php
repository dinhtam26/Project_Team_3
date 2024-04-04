<div class="container" style="background-color: #f6f6f6; margin-bottom: 30px">
    <div style="background: #eeeeee; margin-top: 30px; padding: 20px; border-radius: 16px" class="rounded p-3 mt-5">
        <?php
        echo '<p>Từ khóa vừa tìm kiếm: <b>' . $_POST['keyword'] ?? "" . '</b> </p>';
        ?>
    </div>

    <!--  -->
    <div class="row">
        <!-- Danh mục -->
        <div class="col-3 mt-5">
            <div style="margin-top: 90px">
                <h1 style="font-size: 20px; font-weight: 600">Danh mục</h1>
                <ul class="list-group" style="margin-top: 20px; ">
                    <?php foreach ($listCateParent as $key => $value) : ?>
                        <li style="padding: 10px 0; border-top: 1px solid #ccc"><a style="display: block" href="<?= ROOT_URL ?>?act=categories&id=<?= $value['id'] ?>"><?= $value['name'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <!-- Nội dung sản phẩm -->
        <div class="col-9" style="margin-top: 30px">
            <div class="">
                <div>
                    <?php
                    // foreach ($listCateByParentId as $key => $value) : 
                    ?>
                    <!-- <a href="<?= ROOT_URL ?>?act=categories&id=<?= $value['parent_id'] ?>&cate_son=<?= $value['id'] ?>" style="display: inline-block; min-width: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 999px;text-align: center; margin-left: 8px"><?= $value['name'] ?></a> -->
                    <?php
                    //  endforeach
                    ?>
                </div>
                <div class="row g-3" style="margin-top: 10px">

                    <?php
                    if (!empty($seacherProduct)) :
                        foreach ($seacherProduct as $key => $value) :
                    ?>
                            <div class="col-4">
                                <a style="display: block" href="<?= ROOT_URL ?>?act=product-detail&id=<?= $value['p_id'] ?>">
                                    <div style="background: #fff; padding: 16px;border-radius: 16px">
                                        <div style="display: flex; justify-content:center">
                                            <img width="220" style="height: 212px; object-fit: cover" src="<?= ROOT_UPLOAD_URL ?><?= $value['image'] ?>" alt="" />
                                        </div>
                                        <div style="padding: 8px; margin-top: 12px">
                                            <p style="font-size: 17px"><?= $value['p_name'] ?></p>
                                            <p style="margin-top: 16px; color: #9e9da8"><?= $value['name'] ?></p>
                                            <div style="display:flex; justify-content:space-between; margin-top: 16px">
                                                <p style="font-weight: 600;"><?= $value['price'] ?></p>
                                                <div>
                                                    <span><i class="fa-solid fa-star" style="color: yellow"></i></span>
                                                    <span style="margin-left: 8px">4.3</span>
                                                </div>
                                            </div>
                                            <!-- <p style="margin-top: 10px; text-decoration:line-through">200000</p> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        endforeach;
                    endif ?>
                </div>
            </div>
        </div>
    </div>
</div>