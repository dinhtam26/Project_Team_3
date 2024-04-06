<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= ROOT_PATH_ADMIN ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT_URL_ADMIN ?>?act=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>

    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white  py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=users">List User</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=user-create">Create User</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-list"></i>
            <span>Categories</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=categories">List Categories</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=cate-create">Create Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Size -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColor" aria-expanded="true" aria-controls="collapseColor">
            <i class="fas fa-fw fa-maximize"></i>
            <span>Color</span>
        </a>
        <div id="collapseColor" class="collapse" aria-labelledby="headingColor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=color">List Color</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=color-create">Create Size</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Color -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSize" aria-expanded="true" aria-controls="collapseSize">
            <i class="fas fa-fw fa-color"></i>
            <span>Size</span>
        </a>
        <div id="collapseSize" class="collapse" aria-labelledby="headingSize" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=size">List Size</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=size-create">Create Size</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Product -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-product-hunt"></i>
            <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=products">List Product</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=product-create">Create Product</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Image -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImage" aria-expanded="true" aria-controls="collapseImage">
            <i class="fas fa-fw fa-Image-hunt"></i>
            <span>Image</span>
        </a>
        <div id="collapseImage" class="collapse" aria-labelledby="headingImage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=images">List Image</a>
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=image-create">Create Image</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Comment -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComment" aria-expanded="true" aria-controls="collapseComment">
            <i class="fas fa-fw fa-Comment-hunt"></i>
            <span>Comment</span>
        </a>
        <div id="collapseComment" class="collapse" aria-labelledby="headingComment" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=comment">List Comment</a>
                <!-- <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=image-create">Create Image</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Order -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseOrder">
            <i class="fas fa-fw fa-Order-hunt"></i>
            <span>Order</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingOrder" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= ROOT_URL_ADMIN ?>?act=orders">List Order</a>
            </div>
        </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">


</ul>