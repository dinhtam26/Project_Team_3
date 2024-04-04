<style>
    table,
    th,
    td {
        /* border: 1px solid black; */
        border-collapse: collapse;

    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    th {
        font-weight: 600;
    }

    td {
        line-height: 100%;
    }
</style>
<h1 style="text-align: center; font-size: 24px; font-weight: 600; margin-top: 50px; color: #77dae6">Chi tiết đơn hàng</h1>
<div style="width: 1320px; margin-left: auto; margin-right: auto">
    <table style="width: 100%; margin-top: 30px;">
        <thead>
            <tr style="align-items: center;">
                <th>Mã đơn hàng</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng giá</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($listHistoryOrder as $item) : ?>
                <tr style="align-items: center; border-top: 1px solid #ccc; ">
                    <td style="width: 10%;vertical-align: middle;"><?= $item['code_order'] ?></td>
                    <td style=" width: 15%"><img height="100" src="<?= ROOT_UPLOAD_URL . $item['image'] ?>" alt=""></td>
                    <td style="width: 40%; vertical-align: middle;"><?= $item['name'] ?></td>
                    <td style="width: 10%;vertical-align: middle;"><?= $item['quantity'] ?></td>
                    <td style="width: 10%;vertical-align: middle;"><?= number_format($item['price']) ?></td>
                    <td style="width: 10%;vertical-align: middle; font-weight:600"> <?= number_format(($item['quantity'] * $item['price'])) ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</div>
<!-- // Mã đơn hàng(order) Hình ảnh(product) Tên sản phẩm(product) Số lượng(order_detail) Giá sản phẩm(order_detail) Phương thức thanh toán -->
<?php
