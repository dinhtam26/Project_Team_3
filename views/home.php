</body>

</html>
</script>
<!-- MAIN -->
<main class="container home">
    <!-- Slideshow -->
    <?php
    include_once PATH_VIEW . "layout/partials/banner.php";
    ?>

    <!-- Browse Categories -->


    <div id="productList">
        <!-- Browse Products -->
        <section class="home__container">
            <div class="home__row">
                <h2 class="home__heading">Sản phẩm mới</h2>

            </div>

            <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
                <!-- Product card 1 -->
                <?php foreach ($products as $key => $value) : ?>
                    <?php if ($value['status'] == 1) { ?>
                        <div class="col">
                            <article class="product-card">
                                <div class="product-card__img-wrap">
                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $value['id'] ?>">
                                        <img src="<?= ROOT_UPLOAD_URL ?><?= $value['image'] ?>" alt="" class="product-card__thumb" />
                                    </a>
                                    <button class="like-btn product-card__like-btn">
                                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/heart.svg" alt="" class="like-btn__icon icon" />
                                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/heart-red.svg" alt="" class="like-btn__icon--liked" />
                                    </button>
                                </div>
                                <h3 class="product-card__title">
                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $value['id'] ?>"><?= $value['name'] ?></a>
                                </h3>
                                <p class="product-card__brand"><?= $value['cate_name'] ?></p>
                                <div class="product-card__row">
                                    <span class="product-card__price"><?= $value['price'] ?></span>
                                    <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/star.svg" alt="" class="product-card__star" />
                                    <span class="product-card__score">4.3</span>
                                </div>
                            </article>
                        </div>
                <?php }
                endforeach ?>



            </div>
        </section>


        <!-- Browse Products -->
        <section class="home__container">
            <div class="home__row">
                <h2 class="home__heading">Sản phẩm hot</h2>

            </div>

            <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
                <!-- Product card 1 -->
                <?php foreach ($products as $key => $value) : ?>
                    <?php if ($value['status'] == 0) { ?>
                        <div class="col">
                            <article class="product-card">
                                <div class="product-card__img-wrap">
                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $value['id'] ?>">
                                        <img src="<?= ROOT_UPLOAD_URL ?><?= $value['image'] ?>" alt="" class="product-card__thumb" />
                                    </a>
                                    <button class="like-btn product-card__like-btn">
                                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/heart-red.svg" style="color: red" alt="" class="like-btn__icon icon" />
                                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/.svg" alt="" class="like-btn__icon--liked" />
                                    </button>
                                </div>
                                <h3 class="product-card__title">
                                    <a href="<?= ROOT_URL ?>?act=product-detail&id=<?= $value['id'] ?>"><?= $value['name'] ?></a>
                                </h3>
                                <p class="product-card__brand"><?= $value['cate_name'] ?></p>
                                <div class="product-card__row">
                                    <span class="product-card__price"><?= $value['price'] ?></span>
                                    <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/star.svg" alt="" class="product-card__star active" />
                                    <span class="product-card__score">4.3</span>
                                </div>
                            </article>
                        </div>
                <?php }
                endforeach ?>
            </div>
        </section>
    </div>
</main>
<?php
