<aside class="main-sidebar sidebar-dark-primary elevation-0">

    <div class="pb-2 w-100 text-center text-white">
        <a href="<?= base_url(); ?>index.php/dashboard" class="w-100">
            <img src="<?= base_url(); ?>public/dist/img/eneo_logo.jpg" alt="Logo" class="brand-image elevation-3"
                style="width: 100%; opacity: .8">
        </a>
        <span class="brand-text display-4"> ASSESS </span>
    </div>
    <div class="divider"></div>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/dashboard" class="nav-link btn_nav_link menu_dashboard menu">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url(); ?>index.php/assessments" class="nav-link btn_nav_link menu_dashboard menu">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            EVALUATION(S)
                            <!-- <span class="right badge badge-warning">100</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item invisible">
                    <a href="<?= base_url(); ?>index.php/rapports" class="nav-link btn_nav_link menu_dashboard menu">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            RAPPORT(S)
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>