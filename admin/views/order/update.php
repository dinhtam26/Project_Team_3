<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thay đổi trạng thái Order</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <?php if (isset($_COOKIE['successOrder'])) { ?>
            <div class="alert alert-success">
                <ul>
                    <?php

                    echo '<li> ' . $_COOKIE['successOrder'] . ' </li>';
                    ?>
                </ul>
            </div>
        <?php  } ?>
        <div class="card-body">

            <div class="">
                <!--3. Bên phải nội dung chính -->
                <div class="">
                    <div class="container">
                        <!-- Tiêu đề trang -->
                        <!-- Form nhập liệu -->
                        <!-- Success -->
                        <form action="" method="post">
                            <!-- Khu vực name -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mt-3 mb-3">
                                        <label for="">Trạng thái đơn hàng</label>
                                        <select class="form-control" name="status_delivery" id="">
                                            <?php if ($statusDelivery['status_delivery'] == 0) { ?>
                                                <option <?php if ($statusDelivery['status_delivery'] == 0) echo "style='color: red' selected" ?> value="0">Chờ xác nhận</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 1) echo "style='color: red' selected"  ?> value="1">Chờ lấy hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 2) echo "style='color: red' selected"  ?> value="2">Chờ giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 3) echo "style='color: red' selected"  ?> value="3">Đã giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == -1) echo "style='color: red' selected"  ?> value="-1">Hủy đơn hàng</option>
                                            <?php
                                            } else if ($statusDelivery['status_delivery'] == 1) { ?>
                                                <option disabled style="background: #ccc" value="0">Chờ xác nhận</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 1) echo "style='color: red' selected"  ?> value="1">Chờ lấy hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 2) echo "style='color: red' selected"  ?> value="2">Chờ giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 3) echo "style='color: red' selected"  ?> value="3">Đã giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == -1) echo "style='color: red' selected"  ?> value="-1">Hủy đơn hàng</option>
                                            <?php } else if ($statusDelivery['status_delivery'] == 2) {  ?>
                                                <option disabled style="background: #ccc" value="0">Chờ xác nhận</option>
                                                <option disabled style="background: #ccc" value="1">Chờ lấy hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 2) echo "style='color: red' selected"  ?> value="2">Chờ giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 3) echo "style='color: red' selected"  ?> value="3">Đã giao hàng</option>
                                                <option disabled style="background: #ccc" value="-1">Hủy đơn hàng</option>

                                            <?php } else if ($statusDelivery['status_delivery'] == 3) {  ?>

                                                <option disabled style="background: #ccc" value="0">Chờ xác nhận</option>
                                                <option disabled style="background: #ccc" value="1">Chờ lấy hàng</option>
                                                <option disabled style="background: #ccc" value="2">Chờ giao hàng</option>
                                                <option <?php if ($statusDelivery['status_delivery'] == 3) echo "style='color: red' selected"  ?> value="3">Đã giao hàng</option>
                                                <option disabled style="background: #ccc" value="-1">Hủy đơn hàng</option>

                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Khu vực button submit -->
                                <div class="col-lg-6">
                                    <div class="mt-3 mb-3">
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=orders" class="btn btn-secondary">Quay lại</a>
                                        <button type="submit" class="btn btn-success">Update</button>
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
$_SESSION['status_delivery'] = $statusDelivery['status_delivery'];
?>