<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- assessment section -->
    <section class="content">
        <div class="row pt-4 p-1">

            <?php
            foreach ($assessments as $assessment) {
            ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            <p class="text-dark text-sm"><b><?= $assessment->nom_paf ?></b></p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-sm">
                                        <i class="fas fa-cog"></i> Activité : <?= $assessment->designation ?>
                                    </p>
                                    <p class="text-sm">
                                        <i class="fas fa-map-marker"></i>
                                        <i class="text-muted"> Lieu : <?= $assessment->lieu ?> </i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">

                                <?php
                                // if ($_SESSION['role'] == 'ASSESSOR') {
                                if (!($assessment->notes > 0)) {
                                ?>

                                    <a class="btn btn-xs btn-primary btn-flat" href="<?= base_url(); ?>index.php/assessments/assessment/<?= $assessment->id_evaluation ?>">
                                        <i class="nav-icon fas fa-pen"></i> EVALUER
                                    </a>

                                <?php } // } 
                                ?>

                                <a href="<?= base_url(); ?>index.php/synthese/index/<?= $assessment->id_evaluation ?>" class="btn btn-xs btn-success btn-flat">
                                    <i class="nav-icon fas fa-pen"></i> SYNTHESE
                                </a>
                                <a href="<?= base_url(); ?>index.php/rapports/rapportpdf/<?= $assessment->id_evaluation ?>" class="btn btn-xs btn-info btn-flat">
                                    <i class="nav-icon fas fa-book"></i> RAPPORT DAL
                                </a>
                                <a href="<?= base_url(); ?>index.php/rapports/rapportdcp/<?= $assessment->id_evaluation ?>" class="btn btn-xs btn-info btn-flat">
                                    <i class="nav-icon fas fa-book"></i> RAPPORT DCP
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>


    </section>


</div>