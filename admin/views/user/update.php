<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $arrParams['title'] ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cập nhật User <?= $itemUser['username'] ?></h6>
        </div>
        <div class="card-body">

            <div class="">
                <!--3. Bên phải nội dung chính -->
                <div class="">
                    <div class="container">
                        <!-- Tiêu đề trang -->
                        <!-- Form nhập liệu -->
                        <?php if (isset($_SESSION['success']) && !empty($_SESSION['errors'])) { ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success'] ?>
                            </div>
                        <?php } ?>

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
                                <!-- Khu vực name -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">UserName</span>
                                            <input type="text" name="username" class="form-control" value="<?= $itemUser['username'] ?>" />

                                        </div>
                                        <!-- Khu vực ảnh -->
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Password</span>
                                            <input type="password" name="password" class="form-control" value="<?= $itemUser['password'] ?>" />

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Full Name</span>
                                            <input type="text" name="fullname" class="form-control" value="<?= $itemUser['fullname'] ?>" />

                                        </div>
                                        <!-- Khu vực ảnh -->
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Email</span>
                                            <input type="email" name="email" class="form-control" value="<?= $itemUser['email'] ?>" />

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Phone</span>
                                            <input type="text" name="phone" class="form-control" value="<?= $itemUser['phone'] ?>" />

                                        </div>
                                        <!-- Khu vực ảnh -->
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Address</span>
                                            <input type="text" name="address" class="form-control" value="<?= $itemUser['address'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Avatar</span>
                                            <input type="file" name="avatar" class="form-control" />
                                            <img width="50" src="<?= ROOT_UPLOAD_URL . $itemUser['avatar'] ?>  " alt="">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Khu vực ảnh -->
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Create_at</span>
                                            <input type="text" name="create_at" class="form-control" value="<?= $itemUser['create_at'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6"><!-- Khu vực trạng thái -->
                                        <div class="mt-3 mb-3">
                                            <span class="form-label">Type</span>
                                            <select name="type" id="" class="form-control select-down">
                                                <?php
                                                $data = ['0' => "Member", "1" => "Admin"];
                                                if (!empty($data)) {
                                                    $xhtml = "";
                                                    foreach ($data as $key => $value) {
                                                        if ($itemUser['type'] == $key) {
                                                            $xhtml .=  '<option selected value="' . $key . '">' . $value . '</option>';
                                                        } else {
                                                            $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
                                                        }
                                                    }
                                                }
                                                echo $xhtml;
                                                ?>



                                            </select>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <a href="<?= ROOT_URL_ADMIN ?>?act=users" class="btn btn-secondary">Quay lại</a>
                                            <button type="submit" class="btn btn-success">Update info user</button>
                                        </div>
                                    </div>
                                    <!-- Khu vực button submit -->

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
if (isset($_SESSION['data'])) unset($_SESSION['data']);
?>