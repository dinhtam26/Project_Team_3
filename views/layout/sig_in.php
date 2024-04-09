<main class="auth">
    <!-- Auth intro -->
    <div class="auth__intro d-md-none">
        <img src="<?= ROOT_ASSET_URL ?>client/assets/img/auth/intro.svg" alt="" class="auth__intro-img" />
        <p class="auth__intro-text">
            The best of luxury brand values, high quality products, and innovative services
        </p>
    </div>

    <!-- Auth content -->
    <div class="auth__content">
        <div class="auth__content-inner">
            <a href="./" class="logo">
                <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                <h2 class="logo__title">grocerymart</h2>
            </a>
            <h1 class="auth__heading">Hello Again!</h1>
            <p class="auth__desc">
                Welcome back to sign in. As a returning customer, you have access to your previously saved all
                information.
            </p>

            <form action="#" method="POST" class="form auth__form">
                <div class="form__group">
                    <div class="form__text-input">
                        <input type="email" name="email" placeholder="Email" class="form__input" autofocus required />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/message.svg" alt="" class="form__input-icon" />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                    </div>
                    <p class="form__error">Email is not in correct format</p>
                </div>
                <div class="form__group">
                    <div class="form__text-input">
                        <input type="password" name="password" placeholder="Password" class="form__input" />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/lock.svg" alt="" class="form__input-icon" />
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                    </div>
                    <p class="form__error">Password must be at least 6 characters</p>
                </div>
                <!-- <div class="form__group form__group--inline">
                    <label class="form__checkbox">
                        <input type="checkbox" name="" class="form__checkbox-input d-none" />
                        <span class="form__checkbox-label">Set as default card</span>
                    </label>
                    <a href="./reset-password.html" class="auth__link form__pull-right">Forgot password?</a>
                </div> -->
                <div style="margin-top: 20px; color: red; text-align:left">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<p>' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']);
                    }

                    ?>
                </div>
                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn ">Sign In</button>
                    <!-- <button class="btn btn--outline auth__btn btn--no-margin">
                        <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/google.svg" alt="" class="btn__icon icon" />
                        Sign in with Google
                    </button> -->
                </div>
            </form>

            <div style="display: flex; justify-content: space-between; width: 100%;">
                <p class="auth__text">
                    Don’t have an account yet?
                    <a href="<?= ROOT_URL ?>?act=user-sigUp" class="auth__link auth__text-link">Sign Up</a>
                </p>
                <p class="auth__text">
                    <a href="<?= ROOT_URL ?>?act=forget-password" class="auth__link auth__text-link">Forget password</a>
                </p>
            </div>
        </div>
    </div>
</main>