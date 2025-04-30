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
                        <li class="breadcrumb-item active">Activités</li>
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
                            <h3 class="card-title"> Listes des Activités </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 30%">Designation</th>
                                        <th style="width: 50%">Description</th>
                                        <th>Lieu</th>
                                        <th>Domaine</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody id="tab-recap-report">
                                    <?php
                                    $i = 1;
                                    foreach ($activities as $activity) {
                                    ?>
                                    <tr>
                                        <td><?= $i++ ?> </td>
                                        <td><?= $activity->designation ?></td>
                                        <td><?= $activity->description ?></td>
                                        <td><?= $activity->lieu ?></td>
                                        <td><?= $activity->id_domaine ?></td>
                                        <td>
                                            <a
                                                href="<?= base_url() . 'index.php/admin/delete_activity/' . $activity->id_activite ?>">
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