<main class="auth">
    <!-- Auth intro -->
    <div class="auth__intro">
        <a href="./" class="logo auth__intro-logo d-none d-md-flex">
            <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
            <h1 class="logo__title">grocerymart</h1>
        </a>
        <img src="<?= ROOT_ASSET_URL ?>client/assets/img/auth/intro.svg" alt="" class="auth__intro-img" />

        <button class="auth__intro-next d-none d-md-flex js-toggle" toggle-target="#auth-content">
            <img src="<?= ROOT_ASSET_URL ?>client/assets/img/auth/intro-arrow.svg" alt="" />
        </button>
    </div>

    <!-- Auth content -->
    <div id="auth-content" class="auth__content hide">
        <div class="auth__content-inner">
            <a href="./" class="logo">
                <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                <h1 class="logo__title">grocerymart</h1>
            </a>
            <h1 class="auth__heading">Forget Password</h1>

            <form action="#" method="post" class="form auth__form">
                <div class="form__group">
                    <div class="form__text-input">
                        <input type="email" name="email" id="" placeholder="Email" class="form__input" autofocus required />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/message.svg" alt="" class="form__input-icon" />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                    </div>
                </div>


                <div>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<p style="color: red; margin-top: 15px; text-align: left">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']);
                    } else {
                        echo "";
                    }
                    if (isset($_SESSION['success'])) {
                        echo '<p style="color: success; margin-top: 15px; text-align: left">' . $_SESSION['success'] . '</p>';
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>


                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn ">Get password</button>

                </div>
            </form>

            <p class="auth__text">
                You have an account yet?
                <a href="<?= ROOT_URL ?>?act=user-login" class="auth__link auth__text-link">Sign In</a>
            </p>
        </div>
    </div>
</main>