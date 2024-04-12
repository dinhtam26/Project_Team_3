<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List User</h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
        </div>
        <div class="d-flex justify-content-end mt-2 mr-4">
            <a href="<?= ROOT_URL_ADMIN ?>?act=user-create" class="text-white btn bg-success">Add New User</a>
        </div>
        <div class="card-body">
            <?php if (isset($_COOKIE['success'])) { ?>
                <div class="alert alert-success">
                    <?= $_COOKIE['success'] ?>
                </div>
            <?php } ?>
            <?php if (isset($_COOKIE['message'])) { ?>
                <div class="alert alert-success">
                    <?= $_COOKIE['message'] ?>
                </div>
            <?php } ?>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Full Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Full Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (!empty($listUser)) {
                            foreach ($listUser as $key => $info) {
                                if ($info['avatar'] == null) {
                                    $info['avatar'] = "user/avatar.png";
                                }
                        ?>
                                <tr>
                                    <td><?= $info['id'] ?></td>
                                    <td><?= $info['username'] ?></td>
                                    <td><?= $info['fullname'] ?></td>
                                    <td><img src="<?= ROOT_UPLOAD_URL . $info['avatar'] ?>" alt="" width="60"> </td>
                                    <td><?= $info['email'] ?></td>
                                    <td><?= $info['phone'] ?></td>
                                    <td><?= $info['address'] ?></td>
                                    <td>
                                        <?php
                                        if ($info['type'] == 1) {
                                            echo '<span class=" text-white badge bg-success">Admin</span>';
                                        } else {
                                            echo '<span class="text-white badge bg-warning">Member</span>';
                                        }
                                        ?>
                                    </td>
                                    <td style="width: 1px" class="text-nowrap">
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=user-detail&id=<?= $info['id'] ?>" class="text-white btn bg-info">Show</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=user-update&id=<?= $info['id'] ?>" class="text-white btn bg-warning">Update</a>
                                        <a href="<?= ROOT_URL_ADMIN ?>?act=user-delete&id=<?= $info['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="text-white btn bg-danger">Delete</a>

                                    </td>
                                </tr>
                        <?php }
                        };
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
<?php
