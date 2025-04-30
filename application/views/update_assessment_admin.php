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
                        <li class="breadcrumb-item active">Modifier Une Evaluation</li>
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
                    <div class='card'>
                        <div class="card-header">
                            <h3 class='card-title text-center'> Modifier une Evaluation </h3>
                            <div class="card-tools">
                                <a class="btn btn-flat btn-danger btn-block"
                                    href="<?= base_url() ?>index.php/admin/delete_assessment/<?= $assessment->id_evaluation ?>">
                                    <i class="fas fa-minus"></i>
                                    SUPPRIMER
                                </a>
                            </div>
                        </div>
                        <div class='card-body'>
                            <form action="<?= base_url() ?>index.php/admin/save_update_assessment" method='POST'>
                                <input type="hidden" class="form-control" name="id_evaluation"
                                    value="<?= $assessment->id_evaluation ?>" required />
                                <div class="row my-2">
                                    <div class="col-12 form-group">
                                        <label> Activité : </label>
                                        <select class="form-control select2" style="width: 100%;" name="id_activite"
                                            id="id_activite" disabled>
                                            <option selected="selected" value="" disabled>Choisir une activité</option>

                                            <?php
                                            foreach ($activites as $activite) {
                                                echo ("<option value='" . $activite->id_activite . "'>" . $activite->designation . "</option>");
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="inputName">Partenaire :</label>
                                        <select class="form-control select2" style="width: 100%;" name="matricule_paf"
                                            id="matricule_paf" disabled>
                                            <option selected="selected" value="" disabled>Choisir un partenaire</option>

                                            <?php
                                            foreach ($pafs as $paf) {
                                                echo ("<option value='" . $paf->matricule_paf . "'>" . $paf->nom_paf . "</option>");
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="inputName">Période d'évaluation :</label>
                                        <input type="text" class="form-control" name="periode"
                                            value="<?= $assessment->periode ?>" disabled>
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="inputName">Responsable :</label>
                                        <select class="form-control select2" style="width: 100%;"
                                            name="email_responsable" id="email_responsable" disabled>
                                            <option selected="selected" value="" disabled>
                                                Choisir un responsable
                                            </option>

                                            <?php
                                            foreach ($responsables as $responsable) {
                                                echo ("<option value='" . $responsable->email_user . "'>" . $responsable->name_user . "</option>");
                                            }
                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="row my-2 border border-primary">
                                    <p class="h4 text-center col-12"> Ajouter les Evaluateurs </p>
                                    <div class="col-8 form-group">
                                        <label for="inputName">Responsable :</label>
                                        <select class="form-control select2" style="width: 100%;" name="evaluateur"
                                            id="evaluateur" required>
                                            <option selected="selected" value="" disabled>Choisir un Evaluateur
                                            </option>

                                            <?php
                                            foreach ($responsables as $responsable) {
                                                echo ("<option value='" . $responsable->email_user . "'>" . $responsable->name_user . "</option>");
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-4 mx-auto">
                                        <label for="inputName">.</label>
                                        <button type="button"
                                            class="btn btn-outline-dark btn-block btn-flat font-weight-bold"
                                            onclick="AddEvaluateur()">
                                            <i class='fas fa-arrow-down'></i> AJOUTER
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>evaluateur</th>
                                                    <th>...</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tab-evaluateur">
                                                <?php
                                                $txt = "";
                                                $i = 1;
                                                foreach ($assessors as $element) {
                                                    $txt = $txt . "" . $element->email_participant;
                                                ?>
                                                <tr>
                                                    <td> <?= $i++ ?> </td>
                                                    <td> <?= $element->email_participant ?> </td>
                                                    <td> <i class="fas fa-trash text-lg text-warning"
                                                            onclick="DeleteEvaluateur('<?= $element->email_participant ?>')"></i>
                                                    </td>
                                                </tr>
                                                <?php
                                                    if ($i <= sizeof($assessors))
                                                        $txt .= ",";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 form-group">
                                        <input type="text" class="form-control evaluateurs" value="" name="evaluateurs"
                                            disabled>
                                        <input type="hidden" class="form-control evaluateurs" name="evaluateurs"
                                            required />
                                    </div>

                                </div>

                                <div class="row my-2">
                                    <div class="col-4 mx-auto">
                                        <button type="submit"
                                            class="btn btn-outline-primary btn-block btn-flat font-weight-bold"> <i
                                                class='fas fa-upload'></i> ENREGISTER </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>


</div>
<script>
let evaluateurs = [];

<?php
    foreach ($assessors as $element) {
    ?>
if (!evaluateurs.includes('<?= $element->email_participant ?>')) {
    evaluateurs.push('<?= $element->email_participant ?>');
}
<?php
    }
    ?>
</script>