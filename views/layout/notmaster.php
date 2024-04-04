<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Trang Sản phẩm</title>
    <!-- <link rel="stylesheet" href="<?= ROOT_ASSET_URL ?>client/assets/libs/bootstrap.min.css" /> -->
    <!--  -->
    <!-- <script src="<?= ROOT_ASSET_URL ?>client/assets/libs/bootstrap.bundle.min.js"></script> -->

    <script src="<?= ROOT_ASSET_URL ?>client/assets/libs/font-fontawesome-ae333ffef2.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= ROOT_ASSET_URL ?>client/assets/css/main.css" />
</head>

<body style="background-color: #f6f6f6">

    <!-- header -->

    <?php
    if (isset($arrParams['act']) && $arrParams['act'] == 'login') {
    } else {
        include_once PATH_VIEW . "layout/partials/header.php";
    }
    ?>


    <?php
    require_once PATH_VIEW . $arrParams['view'] . ".php";
    ?>

    <!-- Footer -->
    <?php
    if (isset($arrParams['act']) && $arrParams['act'] == 'login') {
        // return null;

    } else {
        include_once PATH_VIEW . "layout/partials/footer.php";
    }
    ?>
</body>

</html>