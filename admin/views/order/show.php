<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Order</h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="d-flex justify-content-end mt-2 mr-4">

        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
            <?php }
            unset($_SESSION['success'])
            ?>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Kích thước</th>
                            <th>Màu sắc</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Danh mục</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($listProductByOrderID as $item) :
                            $colorName  = getColorName($item['color_id']);
                            $sizeName   = getSizeName($item['size_id']);

                        ?>
                            <tr style="text-align: center;">
                                <td><?= $item['code_order'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><img width="60px" src="<?= ROOT_UPLOAD_URL . $item['image'] ?>" alt=""></td>
                                <td><?= $sizeName['name'] ?></td>
                                <td><?= $colorName['name'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= number_format($item['price']) ?></td>
                                <td><?= $item['cate_name'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php
                $total = 0;
                foreach ($listProductByOrderID as $key => $value) {
                    $total += $value['quantity'] * $value['price'];
                }

                if ($statusDelivery['status_delivery'] == 0) {
                    $message = "chờ xác nhận";
                } else if ($statusDelivery['status_delivery'] == 1) {
                    $message = "Chờ lấy hàng";
                } else if ($statusDelivery['status_delivery'] == 2) {
                    $message = "Chờ giao hàng";
                } else if ($statusDelivery['status_delivery'] == 3) {
                    $message = "Đã giao hàng thành công";
                } else if ($statusDelivery['status_delivery'] == -1) {
                    $message = "Đơn hàng đã bị hủy";
                }


                ?>
                <div style="display: flex; flex-direction: column; align-items:end">
                    <div>

                        <p>Trạng thái đơn hàng: <b><?= $message ?></b></p>
                        <p>Tổng giá tiền của đơn hàng: <b><?= number_format($total) ?></b></p>
                    </div>
                </div>
                <a href="<?= ROOT_URL_ADMIN ?>?act=orders" class="btn btn-success">Back List</a>
            </div>
        </div>
    </div>

</div>

<?php
