<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- synthesis section -->
    <section class="content tab_synthesis visible">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="card">
                    <div class="card-header lead">
                        <p class="text-center">
                            Synthèse évaluation de l'entreprise :
                            <b> <?= $assessment->nom_paf ?> </b>
                        </p>
                        <p class="">
                            pour l'activité :
                            <b> <?= $assessment->designation ?> </b>
                        </p>
                        <p class="">
                            A :
                            <b> <?= $assessment->lieu ?> </b>
                        </p>
                    </div>

                    <div class="card-body fts">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>Participant </th>
                                    <?php
                                    for ($i = 1; $i <= 14; $i++) { ?>
                                    <th>Note <?= $i ?></th>
                                    <?php } ?>
                                    <!-- <th>Valeur PM</th>
                                    <th>Valeur PMO</th>
                                    <th>Valeur QHSE</th>
                                    <th>Note</th>
                                    <th>Observations </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                function getNote(
                                    $email,
                                    $question,
                                    $notes
                                ) {
                                    foreach ($notes as $note) {
                                        if ($note->email_participant === $email && $note->id_question === $question) {
                                            return $note->note;
                                        }
                                    }

                                    return 'pas de note';
                                }

                                foreach ($assessors as $assessor) {
                                ?>
                                <tr>
                                    <td> <?= $assessor->email_participant ?> </td>
                                    <?php
                                        for ($i = 1; $i <= 14; $i++) {
                                        ?>
                                    <td class="lead">
                                        <?= getNote($assessor->email_participant, $i, $notes) ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>