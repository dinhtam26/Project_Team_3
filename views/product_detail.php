<!-- MAIN -->
<main class="product-page">
    <div class="container">
        <!-- Search bar -->
        <div class="product-container">
            <div class="search-bar d-none d-md-flex">
                <input type="text" name="" id="" placeholder="Search for item" class="search-bar__input" />
                <button class="search-bar__submit">
                    <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/search.svg" alt="" class="search-bar__icon icon" />
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="product-container">
            <ul class="breadcrumbs">
                <li>
                    <a href="#!" class="breadcrumbs__link">
                        Home
                        <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#!" class="breadcrumbs__link">
                        <?= $breadcrumbs['cate_parent'] ?>
                        <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#!" class="breadcrumbs__link">
                        <?= $breadcrumbs['cate_name'] ?>
                        <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#!" class="breadcrumbs__link">
                        <?= $breadcrumbs['name'] ?>
                        <!-- <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/arrow-right.svg" alt="" /> -->
                    </a>
                </li>
            </ul>
        </div>

        <!-- Product info -->
        <div class="product-container prod-info-content">
            <div class="row">
                <div class="col-5 col-xl-6 col-lg-12">
                    <div class="prod-preview">
                        <div class="prod-preview__list">
                            <div class="prod-preview__item">
                                <img src="<?= ROOT_UPLOAD_URL ?><?= $getOneProduct['image'] ?>" alt="" class="prod-preview__img" />
                            </div>
                            <div class="prod-preview__item">
                                <img src="<?= ROOT_ASSET_URL ?>client///assets/img/product/item-2.png" alt="" class="prod-preview__img" />
                            </div>
                            <div class="prod-preview__item">
                                <img src="<?= ROOT_ASSET_URL ?>client//assets/img/product/item-3.png" alt="" class="prod-preview__img" />
                            </div>
                            <div class="prod-preview__item">
                                <img src="<?= ROOT_ASSET_URL ?>client//assets/img/product/item-4.png" alt="" class="prod-preview__img" />
                            </div>
                        </div>
                        <div class="prod-preview__thumbs">
                            <?php foreach ($listImage as $key => $value) : ?>
                                <img src="<?= ROOT_UPLOAD_URL ?><?= $value['image'] ?>" alt="" class="prod-preview__thumb-img prod-preview__thumb-img--current" />

                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-xl-6 col-lg-12">
                    <form action="" class="form">
                        <section class="prod-info">
                            <h1 class="prod-info__heading">
                                <?= $getOneProduct['name'] ?>
                            </h1>
                            <div class="row">
                                <div class="col-5 col-xxl-6 col-xl-12">
                                    <div class="prod-prop">
                                        <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="prod-prop__icon" />
                                        <h4 class="prod-prop__title">(3.5) 1100 reviews</h4>
                                    </div>
                                    <!-- SIZE -->
                                    <label for="" class="form__label prod-info__label">Size</label>
                                    <div class="filter__form-group">
                                        <div class="form__tags">
                                            <?php foreach ($size as $key => $value) : ?>
                                                <?php if (isset($_GET['size_id']) && $_GET['size_id'] == $value['id']) { ?>
                                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $getOneProduct['id'] ?>&size_id=<?= $value['id'] ?? "" ?>" class="form__tag prod-info__tag" style="border: 1px solid yellow; color: #000"><?= $value['name'] ?></a>
                                                <?php } else { ?>
                                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $getOneProduct['id'] ?>&size_id=<?= $value['id'] ?? "" ?>" class="form__tag prod-info__tag"><?= $value['name'] ?></a>
                                                <?php } ?>
                                                <!-- <button class="form__tag prod-info__tag">Medium</button>
                                            <button class="form__tag prod-info__tag">Large</button> -->
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <!-- Color -->
                                    <label for="" class="form__label prod-info__label">Color</label>
                                    <div class="filter__form-group">
                                        <div class="form__tags">
                                            <?php
                                            if (!isset($_GET['size_id'])) {

                                                foreach ($color as $key => $value) {
                                                    echo  '<a href="#" class="form__tag prod-info__tag">' . $value['name'] . '</a>';
                                                }
                                            } else {
                                            ?>
                                                <?php foreach ($colorBySize as $key => $value) : ?>
                                                    <a href="#" class="form__tag prod-info__tag"><?= $value['name'] ?></a>
                                                    <!-- <button class="form__tag prod-info__tag">Medium</button>
                                            <button class="form__tag prod-info__tag">Large</button> -->
                                            <?php endforeach;
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7 col-xxl-6 col-xl-12">
                                    <div class="prod-props">
                                        <div class="prod-prop">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/document.svg" alt="" class="prod-prop__icon icon" />
                                            <h4 class="prod-prop__title">So sánh</h4>
                                        </div>
                                        <div class="prod-prop">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/buy.svg" alt="" class="prod-prop__icon icon" />
                                            <div>
                                                <h4 class="prod-prop__title">Vận chuyển</h4>
                                                <p class="prod-prop__desc">Từ 25.000 trong 1-3 ngày</p>
                                            </div>
                                        </div>
                                        <div class="prod-prop">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/bag.svg" alt="" class="prod-prop__icon icon" />
                                            <div>
                                                <h4 class="prod-prop__title">Pickup</h4>
                                                <p class="prod-prop__desc">Out of 2 store, today</p>
                                            </div>
                                        </div>
                                        <div class="prod-info__card">
                                            <div class="prod-info__row">
                                                <span class="prod-info__price" style="text-decoration: line-through;"><?= number_format($getOneProduct['price'], 0, ',', '.') ?></span>
                                                <span class="prod-info__tax"><?= $getOneProduct['sale'] ?>%</span>
                                            </div>
                                            <?php
                                            $price = $getOneProduct['price'] - ($getOneProduct['price'] * ($getOneProduct['sale'] / 100));
                                            $price = round($price, -3);
                                            ?>
                                            <p class="prod-info__total-price"><?= number_format($price, 0, ',', '.') ?></p>
                                            <div class="prod-info__row">
                                                <a href="<?= ROOT_URL ?>?act=cart-add&productID=<?= $getOneProduct['id'] ?>&quantity=1" class="btn btn--primary prod-info__add-to-cart">
                                                    Add to cart
                                                </a>
                                                <button class="like-btn prod-info__like-btn">
                                                    <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/heart.svg" alt="" class="like-btn__icon icon" />
                                                    <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/heart-red.svg" alt="" class="like-btn__icon--liked" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product content -->
        <div class="product-container">
            <div class="">
                <ul class="prod-tab__list">
                    <li class="prod-tab__item prod-tab__item--current">Description</li>
                    <li class="prod-tab__item prod-tab__item--current"><a href="#review">Review</a></li>
                    <li class="prod-tab__item prod-tab__item--current"><a href="#similar">Similar</a></li>
                    <li class="prod-tab__item prod-tab__item--current"><a href="#comment">Comment</a></li>
                </ul>
                <div class="prod-tab__contents">
                    <div class="prod-tab__content prod-tab__content--current">
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-12">
                                <div class="text-content prod-tab__text-content">
                                    <h2><?= $getOneProduct['name'] ?></h2>
                                    <p> </p>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="review" class="">
                        <div class="prod-content">
                            <h2 class="prod-content__heading">Khách hàng của chúng tôi đang nói gì</h2>
                            <div class="row row-cols-3 gx-lg-2 row-cols-md-1 gy-md-3">
                                <!-- Review card 1 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/img/avatar/avatar-1.png" alt="" class="review-card__avatar" />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Lê Thành</h4>
                                                <p class="review-card__desc">
                                                    Sản phẩm tuyệt vời tôi yêu chiếc áo này
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-half.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-blank.svg" alt="" class="review-card__star" />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review card 2 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/img/avatar/avatar-2.png" alt="" class="review-card__avatar" />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Đình Tam</h4>
                                                <p class="review-card__desc">
                                                    Mẫu áo thật tuyệt vời tôi thích chiếc áo này
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-half.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-blank.svg" alt="" class="review-card__star" />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review card 3 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img src="<?= ROOT_ASSET_URL ?>client//assets/img/avatar/avatar-3.png" alt="" class="review-card__avatar" />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Đức Toàn</h4>
                                                <p class="review-card__desc">
                                                    Sản phẩm tuyệt vời tôi yêu chiếc áo này
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-half.svg" alt="" class="review-card__star" />
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star-blank.svg" alt="" class="review-card__star" />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="similar" class="">
                        <div class="prod-content">
                            <h2 class="prod-content__heading">Similar items you might like</h2>
                            <div class="row row-cols-6 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-2">
                                <!-- Product card 1 -->
                                <?php foreach ($productByCate as $key => $value) : ?>
                                    <div class="col">
                                        <article class="product-card">
                                            <div class="product-card__img-wrap">
                                                <a href="<?= ROOT_ASSET_URL ?>client//product-detail.html">
                                                    <img src="<?= ROOT_UPLOAD_URL ?><?= $value['image'] ?>" alt="" class="product-card__thumb" />
                                                </a>
                                                <button class="like-btn product-card__like-btn">
                                                    <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/heart.svg" alt="" class="like-btn__icon icon" />
                                                    <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/heart-red.svg" alt="" class="like-btn__icon--liked" />
                                                </button>
                                            </div>
                                            <h3 class="product-card__title">
                                                <a href="<?= ROOT_ASSET_URL ?>client//product-detail.html"><?= $value['name'] ?></a>
                                            </h3>
                                            <p class="product-card__brand"><?= $value['cate_name'] ?></p>
                                            <div class="product-card__row">
                                                <span class="product-card__price"><?= $value['price'] ?></span>
                                                <img src="<?= ROOT_ASSET_URL ?>client//assets/icons/star.svg" alt="" class="product-card__star" />
                                                <span class="product-card__score">4.3</span>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Commemt -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

                $("#comment").load("<?= ROOT_URL_View . "comment.php" ?>", {
                    id: <?= $getOneProduct['id'] ?>,
                    id_user: <?= $_SESSION['user']['id'] ?>
                });

            });
        </script>


        <div id="comment">

        </div>
    </div>
    <!-- Comment -->
    <?php

    if (!isset($_SESSION['user'])) {
        foreach ($listComment as $key => $value) : ?>
            <div style="margin-top: 50px; display: flex; gap: 30px; margin-left: 107px">
                <!-- Chứa hình ảnh -->

                <div>
                    <!-- Kiểm tra: Nếu  value['avatar'] == null => thì ảnh mặc định là product/avatar -->
                    <!-- Nếu tồn tại thì lấy luôn ảnh đó -->
                    <?php if ($value['avatar'] == "user/") { ?>
                        <img style="border-radius: 50%" src="<?= ROOT_UPLOAD_URL ?>product/avatar.png" alt="" width="50px">
                    <?php } else { ?>
                        <img style="border-radius: 50%" src="<?= ROOT_UPLOAD_URL ?><?= $value['avatar'] ?>" alt="" width="50px">
                    <?php  } ?>
                </div>
                <!-- Chứa nội dung -->
                <div style="background: #f2f3f5; padding: 10px; border-radius: 8px; width: 1000px">
                    <div style="display: flex; justify-content: space-between">
                        <h3 style="font-size:16px; font-weight: 600"><?= $value['fullname'] ?></h3>
                        <p><?= $value['date_comment'] ?></p>
                    </div>
                    <p style="margin-top: 30px; line-height: 25px"><?= $value['content'] ?></p>
                </div>

            </div>
    <?php endforeach;
    }
    ?>
</main>
<?php
// echo "<pre/>";
// print_r($productByCate);
// echo "<pre/>";

// echo "<pre/>";
// print_r($breadcrumbs);
// echo "<pre/>";
?>