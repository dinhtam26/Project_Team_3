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

                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <!-- <th>Email</th> -->
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <!-- <th>Email</th> -->
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($listOrder as $key => $value) :
                            if ($value['status_delivery'] == 0) {
                                $message = "<p style='border-radius: 5px; width: 150px' class= 'bg-secondary p-2 text-white'>chờ xác nhận</p>";
                            } else if ($value['status_delivery'] == 1) {
                                $message = "<p style='border-radius: 5px; width: 150px' class= 'bg-info p-2 text-white'>Chờ lấy hàng</p>";
                            } else if ($value['status_delivery'] == 2) {
                                $message = "<p style='border-radius: 5px;  width: 150px' class= 'bg-primary p-2 text-white'>Chờ giao hàng</p>";
                            } else if ($value['status_delivery'] == 3) {
                                $message = "<p style='border-radius: 5px;  width: 150px' class= 'bg-success p-2 text-white'>Đã giao hàng thành công</p>";
                            } else if ($value['status_delivery'] == -1) {
                                $message = "<p style='border-radius: 5px;  width: 150px' class= 'bg-danger p-2 text-white'>Đơn hàng đã bị hủy</p>";
                            }
                        ?>
                            <tr>
                                <td><?= $value['code_order'] ?></td>
                                <td><?= $value['fullname'] ?></td>
                                <td><?= $value['address'] ?></td>

                                <td><?= $value['phone'] ?> </td>
                                <td style="width: 1px" class="text-nowrap"><?= $value['create_at'] ?></td>
                                <td><?= $value['status_payment'] == 0 ? "Thanh toán sau khi nhận hàng" : "Thanh toán bằng Momo" ?></td>
                                <td class="badge">
                                    <?= $message ?>
                                </td>
                                <td style="width: 1px" class="text-nowrap">
                                    <a href="<?= ROOT_URL_ADMIN ?>?act=order-show&id=<?= $value['id'] ?>" class="text-white btn " style="background: #3ac8c8d6">Show</a>
                                    <?php if ($value['status_delivery'] == -1 || $value['status_delivery'] == 3) { ?>
                                        <a style="pointer-events: none; opacity: 0.5;" href="#" class="text-white btn bg-warning">Update</a>
                                    <?php } else { ?>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=order-update&id=<?= $value['id'] ?>" class="text-white btn bg-warning">Update</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</div>