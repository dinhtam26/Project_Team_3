<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            display: flex;
        }

        .tukhoa {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tim {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #77dae6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .tim:hover {
            background-color: #77dae6;
        }


        .sp_img {
            width: 20rem;
            transition: transform 0.3s ease-out;

        }

        .sp_img:hover {
            position: absolute;
            transform: scale(1.1);
        }
    </style>

</head>

<body>
    <header id="header" class="header">
        <div class="container">
            <div class="top-bar">
                <!-- More -->
                <button class="top-bar__more d-none d-lg-block js-toggle" toggle-target="#navbar">
                    <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/more.svg" alt="" class="icon top-bar__more-icon" />
                </button>

                <!-- Logo -->
                <a href="<?= ROOT_URL ?>" class="logo top-bar__logo">
                    <img src="<?= ROOT_ASSET_URL ?>client/assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__logo-img" />
                    <h1 class="logo__title top-bar__logo-title">grocerymart</h1>
                </a>

                <!-- Navbar -->
                <ul class="navbar-nav" style="display: flex; margin-left: 100px; gap: 50px">
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
                <form action="<?= ROOT_URL ?>?act=search" method="post" style="margin-left: 6rem;">
                    <input type="text" name="keyword" placeholder="Search..." class="tukhoa">
                    <button type="submit" class="tim">Search</button>
                </form>
                <!-- Actions -->
                <div class="top-act">
                    <a href="<?= ROOT_URL ?>?act=user-login" class="btn btn--text d-md-none">Sign In</a>
                    <a href="<?= ROOT_URL ?>?act=user-sigUp" class="top-act__sign-up btn btn--primary">Sign Up</a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>