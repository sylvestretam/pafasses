<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url(); ?>index.php/admin" class="navbar-brand">
            <img src="<?= base_url(); ?>public/dist/img/eneo_logo.jpg" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">PAF ASSESS</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Evaluateur</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= base_url(); ?>index.php/admin/assessors" class="dropdown-item">Liste</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="<?= base_url(); ?>index.php/admin/add_assessor" class="dropdown-item">Ajouter </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Activités</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= base_url(); ?>index.php/admin/activities" class="dropdown-item">Liste</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="<?= base_url(); ?>index.php/admin/add_activity" class="dropdown-item">Ajouter </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Evaluations</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= base_url(); ?>index.php/admin/assessments" class="dropdown-item">Liste</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="<?= base_url(); ?>index.php/admin/add_assessment" class="dropdown-item">Ajouter
                            </a></li>
                    </ul>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item">
                <a class="nav-link active" role="button">
                    <i> <?= $this->session->sn . " " . $this->session->givenname ?> </i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>index.php/dashboard" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>

    </div>
</nav>
<!-- /.navbar -->