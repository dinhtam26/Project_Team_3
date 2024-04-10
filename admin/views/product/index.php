<?php
// Tổng phần tử 

$totalItems         =  $totalProduct['totalProduct'];

// Tổng phần tử trên 1 trang
$totalItemPerPage   = 7;
// Trang hiện tại
$currentPage        = (isset($_GET['page']) ? $_GET['page'] : 1);
// Tổng số trang 
$totalPage          = ceil($totalItems / $totalItemPerPage);
// Page Range
$pageRange          = 3;


$paginationHTML = "";
if ($currentPage > $totalPage || $currentPage < 1) {
    header("Location: errors.php");
    exit();
}
if ($totalPage > 1) {
    $start = '<li class="page-item"><a class="page-link" href="#">Start</a></li>';
    $prev  = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
    if ($currentPage > 1) {
        $start = '<li class="page-item"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=products/page=1" >Start</a></li>';
        $prev  = '<li class="page-item disabled"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=products/page=' . ($currentPage - 1) . '">Previous</a></li>';
    }

    $end = '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
    $next  = '<li class="page-item"><a class="page-link" href="#">End</a></li>';
    if ($currentPage < $totalPage) {
        $end = '<li class="page-item"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=products/page=' . $totalPage . '">End</a></li>';
        $next  = '<li class="page-item"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=products/page=' . ($currentPage + 1) . '">Next</a></li>';
    }

    if ($pageRange < $totalPage) {
        if ($currentPage == 1) {
            $startPage = 1;
            $endPage   = $pageRange;
        } else if ($currentPage == $totalPage) {
            $startPage = $totalPage - $pageRange + 1;
            $endPage   = $totalPage;
        } else {
            $startPage = $currentPage - ($pageRange - 1) / 2;
            $endPage   = $currentPage + ($pageRange - 1) / 2;
        }
    } else {
        $startPage = 1;
        $endPage   = $totalPage;
    }

    $listPage = "";
    for ($i = $startPage; $i <= $endPage; $i++) {
        if ($currentPage == $i) {
            $listPage .= ' <li class="page-item"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=product?page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li class="page-item"><a class="page-link" href="' . ROOT_URL_ADMIN . '?act=product?page=' . $i . '">' . $i . '</a></li>';
        }
    }
    $paginationHTML =   $start . $prev . $listPage . $next . $end;
}






$position = ($currentPage - 1) * $totalItemPerPage;

?>
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
    <div id="pagination"></div>
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- <li class="page-item disabled"><a class="page-link" href="#">Start</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            <li class="page-item"><a class="page-link" href="#">End</a></li> -->
            <?php echo $paginationHTML ?>
        </ul>
    </div>
</div>