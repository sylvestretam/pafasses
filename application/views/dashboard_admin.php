<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ADMIN <small>DASBOARD</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?= sizeof($activites) ?>
                            </h3>

                            <p>ACTIVITE(S)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-th"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            ...
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?= sizeof($pafs) ?>
                            </h3>

                            <p> PARTENAIRE(S) </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            ...
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?= sizeof($assessors) ?>
                            </h3>

                            <p>EVALUATEUR(S)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            ...
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?= sizeof($assessments) ?>
                            </h3>

                            <p>EVALUATION(S)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            ...
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.content -->
</div>

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->