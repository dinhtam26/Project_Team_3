<!-- MAIN -->
<main class="checkout-page">
    <div class="container">
        <!-- Search bar -->
        <div class="checkout-container">
            <div class="search-bar d-none d-md-flex">
                <input type="text" name="" id="" placeholder="Search for item" class="search-bar__input" />
                <button class="search-bar__submit">
                    <img src="./assets/icons/search.svg" alt="" class="search-bar__icon icon" />
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="checkout-container">
            <ul class="breadcrumbs checkout-page__breadcrumbs">
                <li>
                    <a href="./" class="breadcrumbs__link">
                        Home
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="./checkout.html" class="breadcrumbs__link">
                        Checkout
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Shipping</a>
                </li>
            </ul>
        </div>

        <!-- Checkout content -->
        <div class="checkout-container">
            <div class="row gy-xl-3">
                <div class="col-8 col-xl-12">
                    <div class="cart-info">
                        <h1 class="cart-info__heading">1. Shipping, arrives between Mon, May 16—Tue, May 24</h1>
                        <div class="cart-info__separate"></div>
                        <h2 class="cart-info__sub-heading">Items details</h2>
                        <div class="cart-info__list">
                            <!-- Cart item 1 -->
                            <?php

                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) :
                                    if ($value['userID'] == $_SESSION['user']['id']) {
                            ?>
                                        <article class="cart-item">
                                            <a href="./product-detail.html">
                                                <img src="<?= ROOT_UPLOAD_URL . $value['image'] ?>" alt="" class="cart-item__thumb" />
                                            </a>
                                            <div class="cart-item__content">
                                                <div class="cart-item__content-left">
                                                    <h3 class="cart-item__title">
                                                        <a href="./product-detail.html">
                                                            <?= $value['name'] ?>
                                                        </a>
                                                    </h3>
                                                    <p class="cart-item__price-wrap">
                                                        <?= number_format($value['price'], 0, ',', '.') ?>| <span class="cart-item__status">In Stock</span>
                                                    </p>
                                                    <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                                        <!-- Trừ -->
                                                        <a href="<?= ROOT_URL . '?act=cart-dec&productID=' . $value['id'] ?>" class="btn btn-danger">
                                                            <div class="cart-item__input">
                                                                -
                                                            </div>
                                                        </a>

                                                        <div class="cart-item__input">
                                                            <button class="cart-item__input-btn">
                                                                <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                                            </button>
                                                            <span><?= $value['quantity'] ?></span>
                                                            <button class="cart-item__input-btn">
                                                                <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                            </button>
                                                        </div>

                                                        <!-- Cộng -->
                                                        <a href="<?= ROOT_URL . '?act=cart-inc&productID=' . $value['id'] ?>" class="btn btn-danger">
                                                            <div class="cart-item__input">
                                                                +
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <?php $sizeName = getSizeName($value['size']) ?>
                                                        <p style="margin: 10px 0;">Size: <?= $sizeName['name'] ?></p>
                                                        <?php $colorName = getColorName($value['color']); ?>
                                                        <p>Color: <?= $colorName['name'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="cart-item__content-right">
                                                    <p class="cart-item__total-price"><?= number_format(($value['price'] * $value['quantity']), 0, ",", ".") ?></p>
                                                    <div class="cart-item__ctrl">

                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="<?= ROOT_URL . '?act=cart-del&productID=' . $value['id'] ?>" class="cart-item__ctrl-btn js-toggle" toggle-target="#delete-confirm">
                                                            <img src="./assets/icons/trash.svg" alt="" />
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                            <?php
                                    }
                                // else {
                                //     $_SESSION['cart'] = null;
                                // }
                                endforeach;
                            } else {
                                echo "<p style='text-align: center; font-weight: 600; color: #939389; margin-top: 40px'>Giỏ hàng của bạn còn trống</p>";
                                echo "<div style='display: flex; justify-content: center; margin-top: 40px'>
                                         <a style='color: #fff; background: #77dae6;padding: 10px 16px; font-weight: 600' href='" . ROOT_URL . "'>MUA NGAY</a>
                                     </div>";
                            }
                            ?>
                        </div>
                        <div class="cart-info__bottom d-md-none">
                            <div class="row">
                                <div class="col-8 col-xxl-7">
                                    <div class="cart-info__continue">
                                        <a href="<?= ROOT_URL ?>" class="cart-info__continue-link">
                                            <img class="cart-info__continue-icon icon" src="./assets/icons/arrow-down-2.svg" alt="" />
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php if (empty($_SESSION['cart'])) {
                } else { ?>
                    <div class="col-4 col-xl-12">
                        <div class="cart-info">
                            <div class="cart-info__row">
                                <span>Tất cả sản phẩm <span class="cart-info__sub-label">(items)</span></span>
                                <span><?= count($_SESSION['cart']); ?></span>
                            </div>
                            <div class="cart-info__row">
                                <span>Price <span class="cart-info__sub-label">(Total)</span></span>
                                <?php if (!empty($_SESSION['cart'])) {
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $total += ($value['price'] * $value['quantity']);
                                    }
                                } ?>
                                <span><?= number_format($total, 0, ",", ".") ?> VND</span>
                            </div>
                            <div class="cart-info__row">
                                <span>Shipping</span>
                                <span>$10.00</span>
                            </div>
                            <div class="cart-info__separate"></div>
                            <div class="cart-info__row">
                                <span>Estimated Total</span>
                                <span><?= number_format($total, 0, ",", ".") ?> VND</span>
                            </div>
                            <a href="<?= ROOT_URL ?>?act=order-checkout" class="cart-info__next-btn btn btn--primary btn--rounded">
                                Continue to checkout
                            </a>
                        </div>
                        <div class="cart-info">
                            <a href="#!">
                                <article class="gift-item">
                                    <div class="gift-item__icon-wrap">
                                        <img src="./assets/icons/gift.svg" alt="" class="gift-item__icon" />
                                    </div>
                                    <div class="gift-item__content">
                                        <h3 class="gift-item__title">Send this order as a gift.</h3>
                                        <p class="gift-item__desc">
                                            Available items will be shipped to your gift recipient.
                                        </p>
                                    </div>
                                </article>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php
echo "<pre/>";
print_r($_SESSION['cart']);
echo "<pre/>";
