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
                        <li class="breadcrumb-item active">Ajouter Une Evaluation</li>
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
                            <h3 class='card-title text-center'> Ajouter une Evaluation </h3>
                        </div>
                        <div class='card-body'>
                            <form action="<?= base_url() ?>index.php/admin/save_assessment" method='POST'>
                                <div class="row my-2">
                                    <div class="col-12 form-group">
                                        <label> Activité : </label>
                                        <select class="form-control select2" style="width: 100%;" name="id_activite"
                                            required>
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
                                            required>
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
                                        <input type="text" class="form-control" name="periode" required>
                                    </div>

                                    <div class="col-4 form-group">
                                        <label for="inputName">Responsable :</label>
                                        <select class="form-control select2" style="width: 100%;"
                                            name="email_responsable" required>
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

                                    <div class="col-12 form-group">
                                        <input type="text" class="form-control evaluateurs" name="evaluateurs" disabled>
                                        <input type="hidden" class="form-control evaluateurs" name="evaluateurs"
                                            required />
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

                                            </tbody>
                                        </table>
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
</script>