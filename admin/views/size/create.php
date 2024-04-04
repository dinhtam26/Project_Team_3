<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $arrParams['title'] ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Size</h6>
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
                                    foreach ($_SESSION['errors'] as $key => $error) {
                                        echo  '<li>' . $error . '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php
                        }
                        if (isset($_SESSION['errors'])) unset($_SESSION['errors']);
                        ?>
                        <form action="" method="post">
                            <!-- Khu vực name -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mt-3 mb-3">
                                        <span class="form-label">Name</span>
                                        <input type="text" name="name" class="form-control" value="<?php echo isset($_SESSION['data']) ? $_SESSION['data'] : "" ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Khu vực button submit -->
                                <div class="col-lg-6">
                                    <div class="mt-3 mb-3">
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=size" class="btn btn-secondary">Quay lại</a>
                                        <button type="submit" class="btn btn-success">Thêm mới</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['data'])) unset($_SESSION['data']);
?>