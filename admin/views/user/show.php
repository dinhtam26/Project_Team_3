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
                            <th class="fw-bold text-success">Trường dữ liệu</th>
                            <th class="fw-bold text-success">Dữ liệu</th>
                        </tr>
                        <?php foreach ($itemUser as $fieldName => $value) :  ?>
                            <tr>
                                <th><?= ucfirst($fieldName) ?></th>
                                <th>

                                    <?php
                                    $img = $itemUser['avatar'];
                                    switch ($fieldName) {
                                        case 'password':
                                            echo "**********";
                                            break;
                                        case 'avatar':
                                            echo '<img width="50" src="' . ROOT_UPLOAD_URL . '' . $img . ' " alt="">';
                                            echo "</br>";
                                            echo $img;
                                            break;
                                        case 'type':
                                            if ($itemUser['type'] == 1) {
                                                echo '<span class=" text-white badge bg-success">Admin</span>';
                                            } else {
                                                echo '<span class="text-white badge bg-warning">Member</span>';
                                            }
                                            break;
                                        default:
                                            echo $value;
                                            break;
                                    }

                                    ?>

                                </th>
                                <?php
                                // echo 
                                ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?= ROOT_URL_ADMIN ?>?act=users" class="btn btn-success">Back List</a>
            </div>
        </div>
    </div>

</div>