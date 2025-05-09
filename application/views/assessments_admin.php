<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ADMIN DASBOARD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Evaluation</li>
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
                            <h3 class="card-title"> Listes des Evaluations </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tableordered">
                                <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>période</th>
                                        <th>Partenaire</th>
                                        <th>Activite</th>
                                        <th>Lieu</th>
                                        <th>Responsable</th>
                                        <th>Evaluateurs</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody id="tab-recap-report">
                                    <?php
                                    foreach ($assessments as $assessment) {
                                    ?>
                                    <tr class="text-xs">
                                        <td><?= $assessment->id_evaluation ?></td>
                                        <td><?= $assessment->periode ?></td>
                                        <td><?= $assessment->nom_paf ?></td>
                                        <td><?= $assessment->designation ?></td>
                                        <td><?= $assessment->lieu ?></td>
                                        <td><?= $assessment->email_responsable ?></td>
                                        <td><?= $assessment->evaluateurs ?></td>
                                        <td>
                                            <a
                                                href="<?= base_url() . 'index.php/admin/update_assessment/' . $assessment->id_evaluation ?>">
                                                <i class="fas fa-pen text-md text-warning"></i></a>
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