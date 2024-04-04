<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Products</h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="d-flex justify-content-end mt-2 mr-4">
            <a href="<?= ROOT_URL_ADMIN ?>?act=product-create" class="text-white btn bg-success">Add New Product</a>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
            <?php } ?>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Create_at</th>
                            <th>Categories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Create_at</th>
                            <th>Categories</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        if (!empty($listAllProduct)) {
                            foreach ($listAllProduct as $key => $product) {
                                # code...

                        ?>
                                <tr>
                                    <td><?= $product['p_id'] ?></td>
                                    <td><?= $product['p_name'] ?></td>

                                    <td>
                                        <img width="50" src="<?= ROOT_UPLOAD_URL ?><?= $product['p_image'] ?>" alt="">
                                    </td>
                                    <td><?= $product['p_create_at'] ?></td>
                                    <td><?= $product['c_name'] ?></td>

                                    <td style="width: 1px" class="text-nowrap">
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=product-detail&id=<?= $product['p_id'] ?>" class="text-white btn bg-info">Show</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=product-update&id=<?= $product['p_id'] ?>" class="text-white btn bg-warning">Update</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=product-delete&id=<?= $product['p_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="text-white btn bg-danger">Delete</a>
                                    </td>
                                </tr>
                        <?php    }
                        }
                        ?>
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