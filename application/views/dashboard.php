<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- assessment section -->
    <section class="content tab_assessment">
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
                        ... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <?= sizeof($pafs) ?>
                        </h3>

                        <p> Partenaire(S) </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        ... <i class="fas fa-arrow-circle-right"></i>
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
                        ... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="row disable ">

            <div class="col-md-4 invisible">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">
                            <i class="far fa-th"></i>
                            progression Générale
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-3 text-center"></div>

                            <div class="col-6 text-center">
                                <input type="text" class="knob" value="<?= 50 ?>" data-width="90" data-height="90"
                                    data-fgColor="#39CCCC">

                                <div class="knob-label">
                                    %
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6 ">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            <?= sizeof($assessments) ?>
                        </h3>

                        <p>Evaluations</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        ... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4 invisible">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-progress text-center"></i>
                            Progression General
                        </h3>
                    </div>

                    <div class="card-body" style="height:157px">

                        <div class="row">
                            <div class="col-3 text-center"></div>

                            <div class="col-6 text-center">
                                <span class='h2 font-weight-bold'>
                                    <?= 10 ?>
                                </span>
                                <span class='h1 font-weight-bold'>
                                    <?= "/100" ?>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 invisible">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-progress text-center"></i>
                            Evaluateur ayant Terminés
                        </h3>
                    </div>

                    <div class="card-body" style="height:157px">

                        <div class="row">
                            <div class="col-3 text-center"></div>

                            <div class="col-6 text-center">
                                <span class='h2 font-weight-bold'>
                                    <?= 10 ?>
                                </span>
                                <span class='h1 font-weight-bold'>
                                    <?= "/100" ?>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recap Evaluateur</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Evaluateur</th>
                                    <th>Activité(s)</th>
                                    <th>Prestataire(s)</th>
                                    <th>Evaluation(s)</th>
                                    <th style="width: 40px">Rate</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recap par Partenaires</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Evaluateur</th>
                                    <th>Activité(s)</th>
                                    <th>Prestataire(s)</th>
                                    <th>Evaluation(s)</th>
                                    <th style="width: 40px">Rate</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </section>


</div>

<script>
</script>