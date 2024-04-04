<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $arrParams['title'] ?></title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?= ROOT_ASSET_URL ?>client/assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT_ASSET_URL ?>client/assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT_ASSET_URL ?>client/assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?= ROOT_ASSET_URL ?>client/assets/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- <link rel="stylesheet" href="<?= ROOT_ASSET_URL ?>client/assets/libs/bootstrap.min.css" /> -->

    <!-- Fonts -->
    <link rel="stylesheet" href="<?= ROOT_ASSET_URL ?>client/assets/fonts/stylesheet.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="<?= ROOT_ASSET_URL ?>client/assets/css/main.css" />

    <!-- Lib bootstrap -->

    <script src="<?= ROOT_ASSET_URL ?>client/assets/libs/bootstrap.bundle.min.js"></script>
    <!-- Font-Icon -->
    <script src="<?= ROOT_ASSET_URL ?>client/assets/libs/font-fontawesome-ae333ffef2.js"></script>



    <!-- Scripts -->
    <!-- <script src="<?= ROOT_ASSET_URL ?>client/assets/js/scripts.js"></script> -->
    <!-- Jquery -->
    <!-- <script src="<?= ROOT_ASSET_URL ?>client/assets/js/jquery-1.10.2.min.js"></script> -->

</head>

<body>
    <!-- Header -->
    <?php
    if (isset($arrParams['act']) && $arrParams['act'] == 'login') {
    } else {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            include_once PATH_VIEW . "layout/partials/header_loginted.php";
            // unset($_SESSION['user']);
        } else {
            include_once PATH_VIEW . "layout/partials/header.php";
        }
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
<?php
if (isset($arrParams['script'])) {
    require_once PATH_VIEW . "style/" . $arrParams['script'] . ".php";
} ?>

</html>