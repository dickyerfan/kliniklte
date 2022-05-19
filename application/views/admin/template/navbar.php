<nav class="main-header navbar navbar-expand navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <div>
            <h4 class="m-0"><?= $title; ?></h4>
        </div>

        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title2; ?></li>
        </ol> -->

        <h4 class="nav-link text-light border-light">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            echo date('H : i'); ?> WIB
        </h4>
    </ul>
</nav>