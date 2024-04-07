<style>
    .container-information td {
        font-size: 18px;
        width: 1000px;
    }

    .container-information {
        height: 50px;
    }

    .label-orderDetail {
        font-weight: 600;
        font-size: 20px;
    }
</style>
<h1 style="text-align: center; font-size: 24px; font-weight: 600; margin-top: 50px; color: #77dae6">Chi tiết đơn hàng</h1>
<div style="width:1340px ; margin-left: auto; margin-right: auto; padding: 50px 0;">

    <div class="row">
        <div class="col-6">
            <h2 style="text-align: center; font-size: 20px;">Thông tin sản phẩm</h2>
            <div style="margin-top: 50px">
                <?php foreach ($listProductByOrderID as $item) : ?>
                    <div style="width: 100%;display: flex; justify-content: space-between; margin-top: 30px">

                        <div style="width: 100%; display: flex; gap: 30px">
                            <!-- Hình ảnh sản phảm -->
                            <div>
                                <img src="<?= ROOT_UPLOAD_URL . $item['image'] ?>" style="width: 120px; height: 120px; object-fit: cover;" alt="">
                            </div>
                            <div>
                                <span style="font-size: 18px;"><?= $item['name'] ?></span>
                                <span style="margin: 15px; font-size: 18px;">x <?= $item['quantity'] ?></span>
                                <p style="margin-top: 15px; color: #a39a9a; font-size: 18px;">Phân loại: <?= $item['cate_name'] ?></p>
                                <div>
                                    <?php $sizeName = getSizeName($item['size_id']) ?>
                                    <p style="margin: 10px 0;">Size: <?= $sizeName['name'] ?></p>
                                    <?php $colorName = getColorName($item['color_id']); ?>
                                    <p>Color: <?= $colorName['name'] ?></p>
                                </div>
                                <p style="font-size: 18px; margin-top: 10px">Giá: <span style="color: #77dae6; font-weight: 600; margin-top: 10px;"><?= $item['price'] ?></span></p>
                            </div>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-6">
            <h2 style="text-align: center; font-size: 20px;">Thông tin nhận hàng</h2>

            <table style="margin-top: 50px">
                <tbody>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Mã đơn hàng: </label>
                        </td>
                        <td>
                            <span><?= $infoOrder['code_order'] ?></span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Họ và tên:</label>
                        </td>
                        <td>
                            <span><?= $infoOrder['fullname'] ?></span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Số điện thoại: </label>
                        </td>
                        <td>
                            <span><?= $infoOrder['phone'] ?> </span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Địa chỉ nhận hàng: </label>
                        </td>
                        <td>
                            <span><?= $infoOrder['address'] ?></span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Phương thức thanh toán: </label>
                        </td>
                        <td>
                            <span><?= $infoOrder['status_payment'] == 0 ? "Thanh toán khi nhận hàng" : "Thanh toán bằng Momo" ?></span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Thời gian đặt hàng</label>
                        </td>
                        <td>
                            <span> <?= $infoOrder['create_at'] ?></span>
                        </td>
                    </tr>
                    <tr class="container-information">
                        <td>
                            <label class="label-orderDetail" for=""> Trạng thái: </label>
                        </td>
                        <td>
                            <span>
                                <?php if ($infoOrder['status_delivery'] == 0) {
                                    echo  $message = "chờ xác nhận";
                                } else if ($infoOrder['status_delivery'] == 1) {
                                    echo  $message = "Chờ lấy hàng";
                                } else if ($infoOrder['status_delivery'] == 2) {
                                    echo  $message = "Chờ giao hàng";
                                } else if ($infoOrder['status_delivery'] == 3) {
                                    echo  $message = "Đã giao hàng thành công";
                                } else if ($infoOrder['status_delivery'] == -1) {
                                    echo  $message = "Đơn hàng đã bị hủy";
                                } ?>

                            </span>
                        </td>
                    </tr>

                    <tr class="container-information">
                        <td>
                            <a href="<?= ROOT_URL ?>?act=order-history" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #77dae6; font-size: 18px; margin-right: 10px">Đơn hàng</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

    <div style="display: flex; justify-content: flex-end;">

    </div>


</div>
<!-- // Mã đơn hàng(order) Hình ảnh(product) Tên sản phẩm(product) Số lượng(order_detail) Giá sản phẩm(order_detail) Phương thức thanh toán -->