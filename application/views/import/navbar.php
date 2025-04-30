<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class=".animation_shake" src="template/dist/img/Eneo_logo.jpg" alt="Logo" />
</div> -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php
        if (!($_SESSION['role'] == 'ASSESSOR')) {
        ?>
        <li class="nav-item">
            <a class="btn btn-outline-dark shadow shadow-0 font-weight-bold" href="<?= base_url(); ?>index.php/admin">
                <b>ADMINISTRATION</b> <i class="fas fa-sign-in-alt"></i>
            </a>
        </li>
        <?php
        }
        ?>

        <li class="nav-item">
            <a class="nav-link active" role="button">
                <i> <?= $this->session->sn . " " . $this->session->givenname ?> </i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>

    </ul>
</nav>