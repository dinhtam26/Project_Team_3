<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List User</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="d-flex justify-content-end mt-2 mr-4">
            <a href="<?= ROOT_URL_ADMIN ?>?act=cate-create" class="text-white btn bg-success">Add New Categories</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (isset($_COOKIE['Success'])) { ?>
                    <div class="alert alert-success">
                        <ul>
                            <?php

                            echo '<li> ' . $_COOKIE['Success'] . ' </li>';

                            ?>
                        </ul>
                    </div>
                <?php  } ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent_id</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent_id</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (!empty($listCate)) {
                            foreach ($listCate as $key => $cate) :
                        ?>
                                <tr>
                                    <td><?= $cate['id'] ?></td>
                                    <td><?= $cate['name'] ?></td>
                                    <td><?= $cate['parent_id'] ?></td>
                                    <td style="width: 1px" class="text-nowrap">
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=cate-detail&id=<?= $cate['id'] ?>" class="text-white btn bg-info">Show</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=cate-update&id=<?= $cate['id'] ?>" class="text-white btn bg-warning">Update</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=cate-delete&id=<?= $cate['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="text-white btn bg-danger">Delete</a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
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