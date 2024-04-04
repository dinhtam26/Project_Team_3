<?php
$user = $_SESSION['user'];
$userInfo = getUserByID($user['id']);

?>
<header id="header" class="header">
    <div class="container">
        <div class="top-bar">
            <!-- More -->
            <button class="top-bar__more d-none d-lg-block js-toggle" toggle-target="#navbar">
                <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/more.svg" alt="" class="icon top-bar__more-icon" />
            </button>

            <!-- Logo -->
            <a href="./" class="logo top-bar__logo">
                <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__logo-img" />
                <h1 class="logo__title top-bar__logo-title">grocerymart</h1>
            </a>

            <!-- Navbar -->
            <ul class="navbar-nav" style="display: flex; margin-left: 80px; gap: 50px">
                <li class="nav-item">
                    <a style="font-weight: 600; font-size: 20px;" class="nav-link" href="<?= ROOT_URL ?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a style="font-weight: 600; font-size: 20px;" class="nav-link" href="<?= ROOT_URL ?>?act=products">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a style="font-weight: 600; font-size: 20px;" class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a style="font-weight: 600; font-size: 20px;" class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="navbar__overlay js-toggle" toggle-target="#navbar"></div>

            <!-- Search -->
            <form action="<?= ROOT_URL ?>?act=search" method="post" style="margin-left: 80px;">
                <input type="text" name="keyword" placeholder="Search..." style="border: 1px solid #ccc; padding: 8px; border-radius: 6px;">
                <button type="submit" class="tim" style="color: #fff; background-color: #77dae6; padding: 10px; border-radius: 6px">Search</button>
            </form>
            <!-- Actions -->
            <div class="top-act">


                <div class="top-act__group d-md-none">
                    <div class="top-act__btn-wrap">
                        <button class="top-act__btn">
                            <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/heart.svg" alt="" class="icon top-act__icon" />
                            <span class="top-act__title">03</span>
                        </button>

                        <!-- Dropdown -->
                        <div class="act-dropdown">
                            <div class="act-dropdown__inner">
                                <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/arrow-up.png" alt="" class="act-dropdown__arrow" />
                                <div class="act-dropdown__top">
                                    <h2 class="act-dropdown__title">You have 3 item(s)</h2>
                                    <a href="./favourite.html" class="act-dropdown__view-all">See All</a>
                                </div>
                                <div class="row row-cols-3 gx-2 act-dropdown__list">
                                    <!-- Cart preview item 1 -->
                                    <div class="col">
                                        <article class="cart-preview-item">
                                            <div class="cart-preview-item__img-wrap">

                                                <img src="<?= ROOT_ASSET_URL ?>client/assets/img/product/item-1.png" alt="" class="cart-preview-item__thumb" />
                                            </div>
                                            <h3 class="cart-preview-item__title">Lavazza Coffee Blends</h3>
                                            <p class="cart-preview-item__price">$329.00</p>
                                        </article>
                                    </div>

                                    <!-- Cart preview item 2 -->
                                    <div class="col">
                                        <article class="cart-preview-item">
                                            <div class="cart-preview-item__img-wrap">
                                                <img src="<?= ROOT_ASSET_URL ?>client/assets/img/product/item-2.png" alt="" class="cart-preview-item__thumb" />
                                            </div>
                                            <h3 class="cart-preview-item__title">Coffee Beans Espresso</h3>
                                            <p class="cart-preview-item__price">$39.99</p>
                                        </article>
                                    </div>

                                    <!-- Cart preview item 3 -->
                                    <div class="col">
                                        <article class="cart-preview-item">
                                            <div class="cart-preview-item__img-wrap">
                                                <img src="<?= ROOT_ASSET_URL ?>client/assets/img/product/item-3.png" alt="" class="cart-preview-item__thumb" />
                                            </div>
                                            <h3 class="cart-preview-item__title">Qualità Oro Mountain</h3>
                                            <p class="cart-preview-item__price">$47.00</p>
                                        </article>
                                    </div>

                                </div>
                                <div class="act-dropdown__separate"></div>
                                <div class="act-dropdown__checkout">
                                    <a href="<?= ROOT_URL ?>?act=cart-list" class="btn btn--primary btn--rounded act-dropdown__checkout-btn">
                                        Check Out All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-act__separate"></div>

                    <div class="top-act__btn-wrap">
                        <button class="top-act__btn">
                            <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/buy.svg" alt="" class="icon top-act__icon" />
                            <!-- <span class="top-act__title">$65.42</span> -->
                        </button>

                        <!-- Dropdown -->
                        <?php

                        if (empty($_SESSION['cart'])) {  ?>
                            <div class="act-dropdown">
                                <div class="act-dropdown__inner">
                                    <p style='text-align: center; font-weight: 600; color: #939389; margin-top: 40px'>Giỏ hàng của bạn còn trống</p>
                                    <div style='display: flex; justify-content: center; margin-top: 40px'>
                                        <a style='color: #fff; background: #77dae6;padding: 10px 16px; font-weight: 600' href='<?= ROOT_URL ?>'>MUA NGAY</a>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>
                            <!-- Có sản phẩm trong giỏ hàng -->
                            <?php if (!empty($_SESSION['cart'])) {
                                $total = 0;
                                $quantityTotal = 0;
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $total += ($value['price'] * $value['quantity']);
                                    $quantityTotal +=  $value['quantity'];
                                }
                            } ?>
                            <div class="act-dropdown">
                                <div class="act-dropdown__inner">
                                    <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/arrow-up.png" alt="" class="act-dropdown__arrow" />
                                    <div class="act-dropdown__top">
                                        <h2 class="act-dropdown__title">You have <?= $quantityTotal ?> item(s)</h2>
                                        <a href="<?= ROOT_URL ?>?act=cart-list" class="act-dropdown__view-all">See All</a>
                                    </div>
                                    <div class="row row-cols-3 gx-2 act-dropdown__list">
                                        <!-- Cart preview item 1 -->
                                        <?php foreach ($_SESSION['cart'] as $item) : ?>
                                            <div class="col">
                                                <article class="cart-preview-item">
                                                    <div class="cart-preview-item__img-wrap">
                                                        <img src="<?= ROOT_UPLOAD_URL ?><?= $item['image'] ?>" alt="" class="cart-preview-item__thumb" />
                                                    </div>
                                                    <?php

                                                    ?>
                                                    <h3 style="height: 40px;" class="cart-preview-item__title"><?= $item['name'] ?> <?= ($item['quantity'] > 1) ? "(" . $item['quantity'] . ")" : ""; ?></h3>
                                                    <p class="cart-preview-item__price"><?= number_format($item['price']) ?></p>
                                                </article>
                                            </div>
                                        <?php endforeach ?>

                                    </div>
                                    <div class="act-dropdown__bottom">
                                        <!-- Tổng số lượng -->
                                        <div class="act-dropdown__row act-dropdown__row--bold">
                                            <span class="act-dropdown__label">Số lượng</span>
                                            <span class="act-dropdown__value"><?= $quantityTotal ?></span>
                                        </div>
                                        <!-- Tổng tiền -->
                                        <div class="act-dropdown__row act-dropdown__row--bold">
                                            <span class="act-dropdown__label">Tổng tiền</span>
                                            <span class="act-dropdown__value"><?= number_format($total) ?></span>
                                        </div>
                                    </div>
                                    <div class="act-dropdown__checkout">
                                        <a href="<?= ROOT_URL ?>?act=cart-list" class="btn btn--primary btn--rounded act-dropdown__checkout-btn">
                                            Check Out All
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <?php

                ?>

                <div class="top-act__user">
                    <?php
                    if ($userInfo['avatar'] == "user/") { ?>
                        <img width="50" src="<?= ROOT_UPLOAD_URL ?>product/avatar.png" alt="" class="" />
                    <?php } else { ?>
                        <img style="border-radius: 50%; object-fit: cover; height: 50px" width="50" src="<?= ROOT_UPLOAD_URL ?><?= $userInfo['avatar'] ?>" alt="" />
                    <?php } ?>
                    <!-- Dropdown -->
                    <div class="act-dropdown top-act__dropdown">
                        <div class="act-dropdown__inner user-menu">
                            <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/arrow-up.png" alt="" class="act-dropdown__arrow top-act__dropdown-arrow" />

                            <div class="user-menu__top">

                                <?php
                                if ($userInfo['avatar'] == "user/") { ?>
                                    <img width="60" src="<?= ROOT_UPLOAD_URL ?>product/avatar.png" alt="" class="" />
                                <?php } else { ?>
                                    <img style="border-radius: 50%; object-fit: cover; height: 50px" width="50" src="<?= ROOT_UPLOAD_URL ?><?= $userInfo['avatar'] ?>" alt="" />
                                <?php } ?>
                                <div>
                                    <p class="user-menu__name"><?= $user['fullname'] ?? "" ?></p>
                                    <p><?= $user['email'] ?></p>
                                </div>
                            </div>

                            <ul class="user-menu__list">
                                <li>
                                    <a href="<?= ROOT_URL ?>?act=profile" class="user-menu__link">Profile</a>
                                </li>
                                <!-- <li>
                                    <a href="./favourite.html" class="user-menu__link">Favourite list</a>
                                </li> -->
                                <li class="user-menu__separate">
                                    <a href="#!" class="user-menu__link" id="switch-theme-btn">
                                        <span>Dark mode</span>
                                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/sun.svg" alt="" class="icon user-menu__icon" />
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#!" class="user-menu__link">Settings</a>
                                </li> -->
                                <li class="user-menu__separate">
                                    <a href="<?= ROOT_URL ?>?act=user-logout" class="user-menu__link">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
// debug($_SESSION);
?>