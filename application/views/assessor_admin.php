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
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Listes des Evaluateurs </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Fonction</th>
                                        <th>Participation</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody id="tab-recap-report">
                                    <?php
                                    $i = 1;
                                    foreach ($assessors as $assessor) {
                                    ?>
                                    <tr>
                                        <td><?= $i++ ?> </td>
                                        <td><?= $assessor->name_user ?></td>
                                        <td><?= $assessor->email_user ?></td>
                                        <td><?= $assessor->job_user ?></td>
                                        <td><?= $assessor->participation ?></td>
                                        <td>
                                            <a
                                                href="<?= base_url() . 'index.php/admin/delete_assessor/' . $assessor->pan_user ?>">
                                                <i class="fas fa-trash text-md text-warning"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>


</div>
<!-- ./wrapper -->