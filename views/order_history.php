<style>
    a {
        font-size: 20px;
    }

    .E_bb9k {
        background-image: url(https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/orderlist/5fafbb923393b712b964.png);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: contain;
        height: 100px;
        width: 100px;
    }
</style>
<?php
foreach ($listOrderByStatus as $key => $value) {
    $listOrderByOrder[$value['order_id']] = getProductByOrderId($value['order_id']);
}


?>

<div class="container">
    <div style="width: 1300px; margin: 0 auto;">
        <div class="checkout-container">
            <div class="row gy-xl-3">
                <div class="col-12 col-xl-12 col-lg-12">
                    <!-- Chi tiết đơn hàng -->
                    <div class="cart-info">
                        <div class="cart-info__top">
                            <ul style="width: 100%;display: flex; justify-content: space-around;">
                                <?php if (!isset($_GET['status'])) { ?>

                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=all">Tất cả</a>
                                    </li>

                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=0">Chờ xác nhận </a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=1">Vận chuyển </a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=2">Chờ giao hàng </a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=3">Hoàn thành </a>
                                    </li>
                                    <li>
                                        <a href="<?= ROOT_URL ?>?act=order-history&status=-1">Đã Hủy </a>
                                    </li>


                                <?php } else { ?>

                                    <li>
                                        <a <?php if ($_GET['status'] == 'all') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=all">Tất cả</a>
                                    </li>
                                    <li>
                                        <a <?php if ($_GET['status'] == '0') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=0">Chờ xác nhận </a>
                                    </li>
                                    <li>
                                        <a <?php if ($_GET['status'] == '1') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=1">Vận chuyển </a>
                                    </li>
                                    <li>
                                        <a <?php if ($_GET['status'] == '2') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=2">Chờ giao hàng </a>
                                    </li>
                                    <li>
                                        <a <?php if ($_GET['status'] == '3') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=3">Hoàn thành </a>
                                    </li>
                                    <li>
                                        <a <?php if ($_GET['status'] == '-1') {
                                                echo 'style="color: red"';
                                            } ?> href="<?= ROOT_URL ?>?act=order-history&status=-1">Đã Hủy </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 1300px; margin: 0 auto;">
        <div class="checkout-container">
            <div class="row gy-xl-3">
                <div class="col-12 col-xl-12 col-lg-12">
                    <?php

                    $listOrderByOrder = [];
                    foreach ($listHistoryOrder as $key => $value) {
                        $listOrderByOrderID[$value['order_id']] = getProductByOrderId($value['order_id']);
                    }
                    ?>
                    <!-- Chi tiết đơn hàng -->
                    <?php if (!isset($_GET['status']) || (isset($_GET['status']) && $_GET['status'] == "all")) {

                    ?>
                        <?php

                        foreach ($listOrderByOrderID as $key1 => $items) {


                            $status = $items['0']['status_delivery'];
                            $message = "";
                            if ($status == 0) {
                                $message = "chờ xác nhận";
                            } else if ($status == 1) {
                                $message = "Chờ lấy hàng";
                            } else if ($status == 2) {
                                $message = "Chờ giao hàng";
                            } else if ($status == 3) {
                                $message = "Đã giao hàng thành công";
                            } else if ($status == -1) {
                                $message = "Đơn hàng đã bị hủy";
                            }
                        ?>
                            <div class="cart-info">
                                <!-- Ngày mua đơn hàng -->
                                <div class="cart-info__top" style="border-bottom: 1px solid #ccc;padding-bottom: 10px">
                                    <div style="display: flex; justify-content: space-between; width: 100%;">
                                        <p>Ngày mua đơn hàng: <b><?= $items['0']['create_at'] ?></b></p>
                                        <p>
                                            <i class="fa-solid fa-truck" style="color: #34c6dc; margin-right: 10px"></i>
                                            <?= $message ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                $total = 0;
                                foreach ($items as $key => $value) {



                                    $total += $items[$key]['price'] * $items[$key]['quantity'];
                                    if ($items[$key]['code_order'] == $value['code_order']) {

                                ?>
                                        <!-- Thông tin đơn hàng -->
                                        <div class="cart-info__top" style="padding-bottom: 10px; margin-top: 40px; border-bottom: 1px solid #ccc">
                                            <div style="width: 100%;display: flex; justify-content: space-between;">
                                                <div style="width: 100%; display: flex; gap: 30px">
                                                    <!-- Hình ảnh sản phảm -->
                                                    <div>
                                                        <img src="<?= ROOT_UPLOAD_URL . $value['image'] ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                                    </div>
                                                    <div>
                                                        <span><?= $value['name'] ?></span>
                                                        <span style="margin: 10px; ">x<?= $value['quantity'] ?></span>
                                                        <p style="margin-top: 10px; color: #a39a9a">Phân loại:<?= $value['cate_name'] ?></p>
                                                        <?php
                                                        $sizeName = getSizeName($value['size_id']);
                                                        $colorName = getColorName($value['color_id']);
                                                        ?>
                                                        <p style="margin-top: 8px">Color: <?= $colorName['name'] ?> </p>
                                                        <p style="margin-top: 8px">Màu sắc: <?= $sizeName['name'] ?> </p>

                                                        <p>Giá: <span style="color: #77dae6; font-weight: 600; margin-top: 10px; margin-top: 8px"><?= number_format($value['price']) ?></span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-right: 20px; text-wrap: nowrap;">
                                                    <p class="totalPrice">Giá Tổng: <span style="color: #77dae6; font-size: 20px;font-weight: 600;"><?= number_format($value['price'] * $value['quantity']) ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php

                                    }
                                }
                                ?>
                                <!-- Action -->
                                <?php
                                if ($status == 0) {
                                ?>
                                    <div style="display: flex; justify-content: flex-end; margin:30px 80px 0 0; ">
                                        <p style="font-size: 20px; font-weight: 600; ">Thành tiền: <span style="color: #dc3545 "><?= number_format($total) ?></span></p>
                                    </div>
                                    <div style="display: flex; justify-content: flex-end;">
                                        <a href="<?= ROOT_URL ?>?act=order-detail&id=<?= $key1 ?>" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #77dae6; font-size: 18px; margin-right: 10px">Xem chi tiết</a>
                                        <a href="javascript:confirmCancel('<?= ROOT_URL ?>?act=orders-canceled&id=<?= $key1 ?>')" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #dc3545; font-size: 18px">Hủy đơn hàng</a>
                                    </div>
                                <?php } else { ?>
                                    <div style="display: flex; justify-content: flex-end; margin:30px 80px 0 0; ">
                                        <p style="font-size: 20px; font-weight: 600; ">Thành tiền: <span style="color: #dc3545 "><?= number_format($total) ?></span></p>
                                    </div>
                                    <div style="display: flex; justify-content: flex-end;">
                                        <a href="<?= ROOT_URL ?>?act=order-detail&id=<?= $key1 ?>" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #77dae6; font-size: 18px; margin-right: 10px">Xem chi tiết</a>
                                    </div>
                                <?php }  ?>
                            </div>
                        <?php }
                    } else {
                        foreach ($listOrderByStatus as $key => $value) {
                            $listOrderByOrder[$value['order_id']] = getProductByOrderId($value['order_id']);
                            $status = $value['status_delivery'];
                            $message = "";
                            if ($status == 0) {
                                $message = "chờ xác nhận";
                            } else if ($status == 1) {
                                $message = "Chờ lấy hàng";
                            } else if ($status == 2) {
                                $message = "Chờ giao hàng";
                            } else if ($status == 3) {
                                $message = "Đã giao hàng";
                            }
                        }
                        ?>

                        <?php
                        if (!empty($listOrderByOrder)) {
                            foreach ($listOrderByOrder as $keys => $items) {

                        ?>

                                <div class="cart-info">
                                    <!-- Ngày mua đơn hàng -->
                                    <div class="cart-info__top" style="border-bottom: 1px solid #ccc;padding-bottom: 10px">
                                        <div style="display: flex; justify-content: space-between; width: 100%;">
                                            <p>Ngày mua đơn hàng: <b><?= $items['0']['create_at'] ?></b></p>
                                            <p>
                                                <i class="fa-solid fa-truck" style="color: #34c6dc; margin-right: 10px"></i>
                                                <?= $message ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                    $total = 0;
                                    foreach ($items as $key => $value) {
                                        $total += $items[$key]['price'] * $items[$key]['quantity'];
                                        if ($items[$key]['code_order'] == $value['code_order']) {

                                    ?>
                                            <!-- Thông tin đơn hàng -->
                                            <div class="cart-info__top" style="padding-bottom: 10px; margin-top: 40px; border-bottom: 1px solid #ccc">
                                                <div style="width: 100%;display: flex; justify-content: space-between;">
                                                    <div style="width: 100%; display: flex; gap: 30px">
                                                        <!-- Hình ảnh sản phảm -->
                                                        <div>
                                                            <img src="<?= ROOT_UPLOAD_URL . $value['image'] ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                                        </div>
                                                        <div>
                                                            <span><?= $value['name'] ?></span>
                                                            <span style="margin: 10px; ">x<?= $value['quantity'] ?></span>
                                                            <p style="margin-top: 10px; color: #a39a9a">Phân loại:<?= $value['cate_name'] ?></p>
                                                            <?php
                                                            $sizeName = getSizeName($value['size_id']);
                                                            $colorName = getColorName($value['color_id']);
                                                            ?>
                                                            <p style="margin-top: 8px">Color: <?= $colorName['name'] ?> </p>
                                                            <p style="margin-top: 8px">Màu sắc: <?= $sizeName['name'] ?> </p>
                                                            <p>Giá: <span style="color: #77dae6; font-weight: 600; margin-top: 10px"><?= number_format($value['price']) ?></span></p>
                                                        </div>
                                                    </div>
                                                    <div style="margin-right: 20px; text-wrap: nowrap;">
                                                        <p class="totalPrice">Giá Tổng: <span style="color: #77dae6; font-size: 20px;font-weight: 600;"><?= number_format($value['price'] * $value['quantity']) ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php

                                        }
                                    }
                                    ?>
                                    <!-- Action -->

                                    <?php
                                    if ($status == 0) {
                                    ?>
                                        <div style="display: flex; justify-content: flex-end; margin:30px 80px 0 0; ">
                                            <p style="font-size: 20px; font-weight: 600; ">Thành tiền: <span style="color: #dc3545 "><?= number_format($total) ?></span></p>
                                        </div>
                                        <div style="display: flex; justify-content: flex-end;">
                                            <a href="<?= ROOT_URL ?>?act=order-detail&id=<?= $keys  ?>" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #77dae6; font-size: 18px; margin-right: 10px">Xem chi tiết</a>
                                            <a href="javascript:confirmCancel('<?= ROOT_URL ?>?act=orders-canceled&id=<?= $keys ?>')" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #dc3545; font-size: 18px">Hủy đơn hàng</a>

                                        </div>
                                    <?php } else { ?>
                                        <div style="display: flex; justify-content: flex-end; margin:30px 80px 0 0; ">
                                            <p style="font-size: 20px; font-weight: 600; ">Thành tiền: <span style="color: #dc3545 "><?= number_format($total) ?></span></p>
                                        </div>
                                        <div style="display: flex; justify-content: flex-end;">
                                            <a href="<?= ROOT_URL ?>?act=order-detail&id=<?= $keys  ?>" style="margin-top: 50px; display: inline-block; padding: 12px 16px; color: #fff; background: #77dae6; font-size: 18px; margin-right: 10px">Xem chi tiết</a>
                                        </div>
                                    <?php }  ?>
                                </div>
                            <?php  }
                        } else { ?>
                            <!-- Trường hợp trống đơn hàng -->
                            <!-- Chi tiết đơn hàng -->
                            <div style="height: 600px; align-items: center;" class="cart-info">
                                <div style="justify-content: center;height: 100%; flex-direction: column;" class="cart-info__top">
                                    <div class="E_bb9k"></div>
                                    <p style="font-size: 20px;">Chưa có đơn hàng</p>
                                </div>
                            </div>
                    <?php     }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmCancel(delUrl) {
        if (confirm("Bạn có muốn huỷ đơn hàng không?")) {
            alert('Huỷ thành công')
            document.location = delUrl;
        }
    }
</script>