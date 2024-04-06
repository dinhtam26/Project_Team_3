<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Comment</h1>



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
            <?php } ?>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 35%;">Nội dung</th>
                            <th style="width: 20%;">Sản phẩm</th>
                            <th>Người Bình Luận</th>
                            <th>Ngày Bình luận</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Sản phẩm</th>
                            <th>Người Bình Luận</th>
                            <th>Ngày Bình luận</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($listComment as $key => $value) : ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['content'] ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['fullName'] ?? "Chưa đặt tên" ?></td>
                                <td><?= $value['date_comment'] ?></td>
                                <td style="width: 1px" class="text-nowrap">
                                    <a href="<?= ROOT_URL_ADMIN ?>?act=comment-delete&id=<?= $value['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="text-white btn bg-danger">Delete</a>
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