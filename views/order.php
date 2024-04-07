 <!-- MAIN -->
 <style>
     table,
     th,
     td {
         /* border: 1px solid black; */
         border-collapse: collapse;

     }

     th,
     td {
         padding: 10px;
         text-align: center;
     }

     th {
         font-weight: 600;
     }

     td {
         line-height: 100%;
     }

     /* a {
         min-width: 160px;
         padding: 12px 16px;
         display: inline-block;
         text-align: center;
         border-radius: 999px;
     } */
 </style>
 <form action="<?= ROOT_URL ?>?act=order-purchase" method="post" class="form cart-info__form">
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
                         <a href="./shipping.html" class="breadcrumbs__link">
                             Shipping
                             <img src="./assets/icons/arrow-right.svg" alt="" />
                         </a>
                     </li>
                     <li>
                         <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Payment method</a>
                     </li>
                 </ul>
             </div>

             <!-- Checkout content -->
             <div class="checkout-container">
                 <div class="row gy-xl-3">
                     <div class="col-8 col-xl-8 col-lg-12">
                         <!-- Chi tiết đơn hàng -->
                         <div class="cart-info">
                             <div class="cart-info__top">
                                 <h2 class="cart-info__heading cart-info__heading--lv2">Thông tin đơn hàng</h2>
                             </div>

                             <!-- THông tin đơn hàng -->
                             <table style="width: 100%; margin-top: 30px;">
                                 <thead>
                                     <tr style="align-items: center;">
                                         <th>Hình ảnh</th>
                                         <th>Tên sản phẩm</th>
                                         <th>Giá</th>
                                         <th>Kích thước</th>
                                         <th>Màu sắc</th>
                                         <th>Số lượng</th>
                                         <th>Tổng giá</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php if (isset($_SESSION['cart'])) :
                                            foreach ($_SESSION['cart'] as $item) :
                                                $colorName = getColorName($item['color']);
                                                $sizeName = getsizeName($item['size']);

                                        ?>
                                             <tr style="align-items: center; border-top: 1px solid #ccc; ">
                                                 <td><img width="60" src="<?= ROOT_UPLOAD_URL ?><?= $item['image'] ?>" alt=""></td>
                                                 <td><?= $item['name'] ?></td>
                                                 <td><?= number_format($item['price']) ?></td>
                                                 <td><?= $sizeName['name'] ?></td>
                                                 <td><?= $colorName['name'] ?></td>
                                                 <td><?= $item['quantity'] ?></td>
                                                 <td style="font-weight: 600"> <?= number_format($item['price'] * $item['quantity']) ?></td>
                                             </tr>
                                     <?php endforeach;
                                        endif ?>

                                 </tbody>
                             </table>

                             <!-- Tiếp tục mua hàng -->
                             <div class="cart-info__continue" style="margin-top: 30px">
                                 <a href="<?= ROOT_URL ?>" class="cart-info__continue-link">
                                     <img class="cart-info__continue-icon icon" src="./assets/icons/arrow-down-2.svg" alt="" />
                                     Continue Shopping
                                 </a>
                             </div>
                         </div>
                         <!-- Phương thức thanh toán -->
                         <div class="cart-info">
                             <h2 class="cart-info__heading cart-info__heading--lv2">Phương thức thanh toán</h2>
                             <div class="cart-info__separate"></div>
                             <!-- <h3 class="cart-info__sub-heading">Availeble Shipping method</h3> -->

                             <!-- Payment item 3 -->
                             <label>
                                 <article class="payment-item payment-item--pointer">
                                     <img src="<?= ROOT_UPLOAD_URL ?>pay_method/thanh-toan-sau-khi-nhan-hang-1.webp" alt="" class="payment-item__thumb" />
                                     <div class="payment-item__content">
                                         <div class="payment-item__info">
                                             <h3 class="payment-item__title">Thanh toán sau khi nhận hàng</h3>
                                             <p class="payment-item__desc payment-item__desc--low">Delivery: 2-3 days work</p>
                                         </div>

                                         <span class="cart-info__checkbox payment-item__checkbox">
                                             <input type="radio" value="0" name="status_payment" class="cart-info__checkbox-input payment-item__checkbox-input" />
                                             <!-- <span class="payment-item__cost">Free</span> -->
                                         </span>
                                     </div>
                                 </article>
                             </label>

                             <!-- Payment item 4 -->
                             <label>
                                 <article class="payment-item payment-item--pointer">
                                     <img src="<?= ROOT_UPLOAD_URL ?>pay_method/momo.jpg" alt="" class="payment-item__thumb" />
                                     <div class="payment-item__content">
                                         <div class="payment-item__info">
                                             <h3 class="payment-item__title">Thanh toán bằng Momo</h3>
                                             <p class="payment-item__desc payment-item__desc--low">Delivery: 2-3 days work</p>
                                         </div>

                                         <span class="cart-info__checkbox payment-item__checkbox">
                                             <input type="radio" value="1" name="status_payment" class="cart-info__checkbox-input payment-item__checkbox-input" />
                                             <!-- <span class="payment-item__cost">$12.00</span> -->
                                         </span>
                                     </div>
                                 </article>
                             </label>
                         </div>
                         <!-- Điều hướng -->
                         <div class="cart-info">
                             <!-- <h2 class="cart-info__heading cart-info__heading--lv2">Phương thức thanh toán</h2> -->
                             <div style="display: flex; justify-content: space-between">
                                 <!-- Quay lại -->
                                 <a style=" background-color: #c4c8cb;  min-width: 160px; padding: 12px 16px; display: inline-block;text-align: center; border-radius: 999px;" href="<?= ROOT_URL ?>?act=cart-list">Quay lại</a>
                                 <!-- Tiếp tục mua hàng -->
                                 <a style=" background-color: #a3cfbb; min-width: 160px; padding: 12px 16px; display: inline-block;text-align: center; border-radius: 999px;" href="<?= ROOT_URL ?>">Tiếp tục mua hàng</a>
                                 <!-- Lịch sử đơn hàng -->
                                 <a style=" background-color: #cff4fc; min-width: 160px; padding: 12px 16px; display: inline-block;text-align: center; border-radius: 999px;" href="<?= ROOT_URL ?>?act=order-history">Lịch sử các đơn hàng</a>
                             </div>

                         </div>
                         <?= $error ?? "" ?>
                     </div>
                     <div class="col-4 col-xl-4 col-lg-12">
                         <div class="cart-info">
                             <h2 class="cart-info__heading cart-info__heading--lv2">Thông tin đặt hàng</h2>

                             <!-- Name -->
                             <div class="form__group">
                                 <label for="name" class="form__label form__label--medium">Name</label>
                                 <div class="form__text-input">
                                     <input type="text" name="fullname" id="name" placeholder="Name" class="form__input" required value="<?= $_SESSION['user']['fullname'] ?? "" ?>" />
                                     <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                 </div>
                                 <p class="form__error">Password must be at least 6 characters</p>
                             </div>
                             <!-- Email -->
                             <div class="form__group">
                                 <label for="email" class="form__label form__label--medium">Email</label>
                                 <div class="form__text-input">
                                     <input type="email" name="email" id="email" placeholder="Email" class="form__input" required value="<?= $_SESSION['user']['email'] ?? "" ?>" />
                                     <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                 </div>
                                 <p class="form__error">Password must be at least 6 characters</p>
                             </div>
                             <!-- Phone -->
                             <div class="form__group">
                                 <label for="phone" class="form__label form__label--medium"> Phone </label>
                                 <div class="form__text-input">
                                     <input type="text" name="phone" id="phone" placeholder="Phone" class="form__input" required value="<?= $_SESSION['user']['phone'] ?? "" ?>" />
                                     <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                 </div>
                                 <p class="form__error">Password must be at least 6 characters</p>
                             </div>
                             <!-- Address -->
                             <div class="form__group">
                                 <label for="address" class="form__label form__label--medium"> Address </label>
                                 <div class="form__text-input">
                                     <input type="text" name="address" id="address" placeholder="Address" class="form__input" required value="<?= $_SESSION['user']['address'] ?? "" ?>" />
                                     <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                 </div>
                                 <p class="form__error">Password must be at least 6 characters</p>
                             </div>

                             <div class="cart-info__row" style="margin-top: 30px">
                                 <span>Sản phẩm<span class="cart-info__sub-label">(Tổng)</span></span>
                                 <span><?= total_quantity() ?></span>
                             </div>
                             <div class="cart-info__row">
                                 <span>Giá <span class="cart-info__sub-label">(Tổng)</span></span>
                                 <span><?= total_price() ?></span>
                             </div>
                             <div class="cart-info__separate"></div>

                             <div>
                                 <button style="width: 100%; color: #fff" name="payUrl" class="cart-info__next-btn btn btn--primary btn--rounded">Đặt mua</button>
                             </div>
                             <!-- <a href="#!">Pay $201.65</a> -->
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </main>
 </form>

 <?PHP
    echo "<pre/>";
    print_r($_SESSION['cart']);
    echo "<pre/>";
    ?>