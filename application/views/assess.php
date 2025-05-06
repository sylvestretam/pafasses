<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- assessment section -->
    <section class="content tab_assessment p-2">

        <form action="<?= base_url(); ?>index.php/assessments/assess" method="post">

            <input type="hidden" name="id_evaluation" value="<?= $assessment->id_evaluation ?>">
            <input type="hidden" name="id_activite" id="txt_provider" value="<?= $assessment->id_activite ?>">

            <div class="card card-solid">
                <div class="card-header">

                    <div class="row lead text-md">
                        <div class='col-12'>
                            <p class="p-1"> Vous évaluez : <b> <?= $assessment->nom_paf ?> </b> </p>
                        </div>
                        <div class='col-12'>
                            <p class="p-1"> Pour l'activité : <?= $assessment->designation ?> </p>
                        </div>
                        <div class='col-12'>
                            <p class="p-1"> A : <?= $assessment->lieu ?> </p>
                        </div>
                        <div class='col-12 '>
                            <p class="text-secondary"> <b>Légende</b> : les notes / 20 ; [0,5] = Médiocre,
                                [5,9] = Insuffissant, [10,12] = Passable, [13,16] = Bien, [16,20] = Très Bien </p>
                        </div>

                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">1. TECHNIQUE (Qualité de la prestation/ travaux/matériel) (30%)</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Conformité des travaux/prestations/matériel avec les normes en vigueur
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note1" max="20"
                                        min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">• Respect du cahier de charges
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note2" max="20"
                                        min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">• Efficacité des travaux sur la
                                    durée (fourniture
                                    régulière des prestations/matériel de qualité)
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note3" max="20"
                                        min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"> 2. HSE (20%) </h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">• Equipement personnel en EPI
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note4" max="20"
                                        min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Respect des procédures sécurité et exigences Eneo
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note5" max="20"
                                        min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Reporting des évènements HSE
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" id="inputobs1" name="note6" max="20"
                                        min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">3. FINANCE (20%)</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Acceptation des conditions de paiement Eneo
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note7" max="20" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Préfinancement des travaux
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note8" max="20" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Clarté dans la structure des prix/cout
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note9" max="20" min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">4. DELAIS (20%)</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Respect planning
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note10" max="20" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Disponibilité/Temps de réaction en cas de sollicitation Eneo
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note11" max="20" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Délais de restitution des documents après travaux /prestations
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note12" max="20" min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">5. ETHIQUE/VALEURS (10%)
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Respect des Valeurs Eneo
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note13" max="20" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputobs1" class="col-8 col-form-label">
                                    • Responsabilité sociale
                                </label>
                                <div class="col-2">
                                    <input type="number" class="form-control" name="note14" max="20" min="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Analyse SWOT
                            </h3>
                        </div>

                        <div class="card-body">
                            <textarea name="swot" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                    </div>

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Axes d’amélioration : (ou toute autre observation sur le PAF)
                            </h3>
                        </div>

                        <div class="card-body">
                            <textarea name="amelioration" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                    </div>

                    <div class="card card-secondary invisible">
                        <div class="card-header">
                            <h3 class="card-title">
                                Performance : MEDIOCRE (<65) SATISFAISANT (>65, <80) EXCELLENT (>80)
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <input type="number" class="form-control col-4" nam="performance" max="100" min="0"
                                    disabled>
                                <label for="inputobs1" class="col-2 col-form-label">
                                    / 100
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer ">
                    <div class="text-center">
                        <input class="btn btn-outline-success btn-block" type="submit" value="ENREGISTRER">
                    </div>
                </div>
            </div>
        </form>
    </section>


</div>

<script>
</script>