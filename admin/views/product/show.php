<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $arrParams['title'] ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 350px" class="fw-bold text-success">Trường dữ liệu</th>
                            <th class="fw-bold text-success">Dữ liệu</th>
                        </tr>
                        <?php
                        if (!empty($itemProduct)) {
                            foreach ($itemProduct as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= ucfirst($key) ?></td>
                                    <td><?= $value ?></td>
                                </tr>
                        <?php }
                        }
                        ?>

                        <tr>

                            <th class="text-danger">Size</th>
                            <th class="text-danger">Color</th>
                            <th class="text-danger">Số lượng</th>
                            <th class="text-danger">Giá tr sale</th>
                            <th class="text-danger">Giá sau sale</th>

                        </tr>




                        <?php
                        foreach ($variation as $key => $value) {
                            $sale = $value['sale'] / 100;
                            echo '<tr>
                                <td>' . $value['size'] . '</td>
                                <td>' . $value['color'] . '</td>
                                <td>' . $value['quantity'] . '</td>
                                <td>' . $value['price'] . '</td>
                                <td>' . ($value['price'] - ($value['price'] * $sale)) . '</td>

                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <a href="<?= ROOT_URL_ADMIN ?>?act=products" class="btn btn-success">Back List</a>
            </div>
        </div>
    </div>

</div>